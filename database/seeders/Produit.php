<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use App\Models\Prod;

class Produit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        //DB::table('diag_produits')->delete();

        $csvData = fopen(storage_path('\BDD_04082022.csv'), 'r');
        $firstline = true; 

        $c=0;

        while (($line = fgetcsv($csvData,1000, "\n")) !== false) {
            if (!$firstline) {
                //print_r($line);
                $lineItems = explode(';',($line[0])); //Separé les elements d'une ligne ( Séparateur ; )
                //print_r($lineItems);
                $ref    =   trim($lineItems[0]); //Reference du produit 
                

                if (!empty($ref)) {

                    $name = trim($lineItems[2]);

                    $type_produit_name      =   $lineItems[1]; 
                    $cerfa_name             =   $lineItems[4];
                    $cat_name               =   $lineItems[6];
                    $lot_name               =   $lineItems[16]; 

                    $mv         =   $lineItems[3];

                    $unite      =   trim($lineItems[7]);
                    $long       =   $lineItems[8];
                    $larg       =   $lineItems[9];
                    $epaiss     =   $lineItems[10];
                    $volume     =   $lineItems[11];
                    $code_dechet =  trim(str_replace(' ', '', $lineItems[12]));
                    $catD3E     =   trim($lineItems[15]);

                    //Clé étrangers 

                    //A verifieer !! //fcihier excel si c'est ecrit correctement 

                    if ($type_produit_name != null)
                        $type0   =   DB::table('diag_produit_types')->where('name', 'LIKE', "%" . $type_produit_name)->first();
                    if ($cerfa_name != null)
                        $cerfa  =   DB::table('diag_cerfas')->where('name', 'LIKE', "%" . $cerfa_name)->first();
                    if ($cat_name != null)
                        $cat    =   DB::table('diag_categories')->where('name', 'LIKE', "%" . $cat_name)->first();
                    if ($lot_name != null)
                        $lot    =   DB::table('diag_lots')->where('name', 'LIKE', "%" . $lot_name)->first();

                    $a = explode('-', $cat_name);

                    
                    $produit_name = trim($name); //Nom complet du produit ~ detail dechet dans le fichier excel 
                    $produit_option_name=$produit_name;

                    $split_name = explode('-',($produit_name)); // Separé entre nom et type(description) du produit  (Séparateur -)
                    
                    /* Boucle sur un ou plusieurs types d'un produit  */
                    $res = ""; //Chaine de caractére de sortie contient le type d'un produit
                    
                    //Boucle sur le nom complet pour pouvoir extraire la description compléte d'un produit 
                    for ($i=1; $i < count($split_name); $i++) { 
                        $type = trim($split_name[$i]);
                        $res .= $type . '-';
                    }
                    $full_types=rtrim($res,'-');  //Description compléte du produit  

                    //Type = nom du produit Ou valeur par default (Nom du produit dans cette algorithme qui suit ) 

                    //voir si un produit est present dans la bdd avant de l'ajouter 
                    $produit = DB::table('diag_produits')-> where('name', '=' , trim($split_name[0]))->first();

                    //Si le produit n'exite pas dans la bdd on l'ajoute à la table diag_produit puis dans la table diag_produit_options
                    if(!$produit) {

                        //On ajoute le produit dans notre base local + Recupre l'id du produit ajouté 
                        $produit_id = DB::table('diag_produits')->insertGetId([
                            'name'                  => trim($split_name[0]), //done
                            //'user_id'             =>
                            'cerfa_id'              => !empty($cerfa)   ? $cerfa->id    : null,
                            'type_produit_id'       => !empty($type0)    ? $type0->id     : null,
                            'cat_id'                => !empty($cat)     ? $cat->id      : null,
                            'lot_id'                => !empty($lot)     ? $lot->id      : null,
                            'classe'                => str_replace(' ', '', $a[0]),
                            'tags'                  => (!empty($catD3E)) ? $catD3E . "," : null, 
        
                            'created_at' => date('Y-m-d H:i:s')
                        ]);

                        //S'il le produit posséde un ou plusieurs types (~ description)
                        if($full_types)
                        {   
                           //Insertion dans la table diag_produit_options
                           DB::table('diag_produit_options')->insert([
                            'produit_id'            => $produit_id, //Insertion de l'id recuperer auparavant 
                            'name'                  => $full_types, //Insertion des types 
    
                            'unite'                 => $unite,
                            'masse_volumique'       => doubleval($this->tDouble($mv)),                    
                            'longueur'              => doubleval($this->tDouble($long)), 
                            'largeur'               => doubleval($this->tDouble($larg)), 
                            'epaisseur'             => doubleval($this->tDouble($epaiss)), 
                            'volume'                => doubleval($this->tDouble($volume)),
    
                            'code_dechet'           => $code_dechet,
                            'created_at' => date('Y-m-d H:i:s')
                            ]); 
                        }

                        //Si le produit ne possede pas de types (Soit le produit est mal ecrit dans le fichier Excel ou le/les type(s) n'exite(nt) pas )
                        else 
                        {   
                            //Insertion des differents valeurs dans la table diag_produit_options
                            DB::table('diag_produit_options')->insert([
                            'produit_id'            => $produit_id, 
                            'name'                  => trim($split_name[0]), // name.diag_produit_options = name.diag_produits

                            'unite'                 => $unite,
                            'masse_volumique'       => doubleval($this->tDouble($mv)),                    
                            'longueur'              => doubleval($this->tDouble($long)), 
                            'largeur'               => doubleval($this->tDouble($larg)), 
                            'epaisseur'             => doubleval($this->tDouble($epaiss)), 
                            'volume'                => doubleval($this->tDouble($volume)),
                            'code_dechet'           => $code_dechet,
                            'created_at' => date('Y-m-d H:i:s')
                            ]);
                        }
                    }

                    //Si le produit exite deja dans notre base de données 
                    else 
                    {   
                        //Si le produit posséde un ou plusierus types 
                        if($full_types)
                        {   
                            //Insertion des differents valeurs dans la table diag_produit_options
                            DB::table('diag_produit_options')->insert([
                            'produit_id'            => $produit->id, //Produit deja exitant, recupertaion de l 'id (ligne 87)
                            'name'                  => $full_types, //Insertion de type dans l'attribut name de la diag_produit_options
    
                            'unite'                 => $unite,
                            'masse_volumique'       => doubleval($this->tDouble($mv)),                    
                            'longueur'              => doubleval($this->tDouble($long)), 
                            'largeur'               => doubleval($this->tDouble($larg)), 
                            'epaisseur'             => doubleval($this->tDouble($epaiss)), 
                            'volume'                => doubleval($this->tDouble($volume)),
    
                            'code_dechet'           => $code_dechet,
                            'created_at' => date('Y-m-d H:i:s')
                            ]); 
                        }

                        //Le produit ne possede pas de types (Soit le produit est mal ecrit dans le fichier Excel ou le/les type(s) n'exite(nt) pas )
                        else 
                        {   //Insertion des differents valeurs dans la table diag_produit_options
                            DB::table('diag_produit_options')->insert([
                            'produit_id'            => $produit->id, //Produit deja exitant, recupertaion de l 'id (ligne 87)
                            'name'                  => trim($split_name[0]), // Pas de type pour ce produit donc : name.diag_produit_options = name.diag_produits 
                            
                            'unite'                 => $unite,
                            'masse_volumique'       => doubleval($this->tDouble($mv)),                    
                            'longueur'              => doubleval($this->tDouble($long)), 
                            'largeur'               => doubleval($this->tDouble($larg)), 
                            'epaisseur'             => doubleval($this->tDouble($epaiss)), 
                            'volume'                => doubleval($this->tDouble($volume)),
    
                            'code_dechet'           => $code_dechet,
                            'created_at' => date('Y-m-d H:i:s')
                            ]);
                        }
                    }
                }
            }
            
            $firstline = false;
        }
        fclose($csvData);
    }
    public function tDouble($str)
    {
        return str_replace(',', '.', $str);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categorie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //A verifier avec l'excel 
        DB::table('diag_lots')->delete();
        DB::table('diag_lots')->insert([
            ['id'=>1,'name' => 'Lot 1 : Enveloppe - Superstructure - Infrastructures - Maçonnerie'],
            ['id'=>2,'name' => 'Lot 2 : Couverture'],
            ['id'=>3,'name' => 'Lot 3 : Cloison - Doublage - Bardage'],
            ['id'=>4,'name' => 'Lot 4 : CVC (Climatisation, ventilation, chauffage)'],
            ['id'=>5,'name' => 'Lot 5 : Appareils d\'éclairage'],
            ['id'=>6,'name' => 'Lot 6 : Plafond suspendu'],
            ['id'=>7,'name' => 'Lot 7 : Mobilier'],
            ['id'=>8,'name' => 'Lot 8 : Installation sanitaire'],
            ['id'=>9,'name' => 'Lot 9 : Revêtement de sol'],
            ['id'=>10,'name' => 'Lot 10 : Mobilité - Ascenseur - monte charge'],
            ['id'=>11,'name' => 'Lot 11 : Isolation - Étanchéité'],
            ['id'=>12,'name' => 'Lot 12 : Aménagement extérieur'],
            ['id'=>13,'name' => 'Lot 13 : Sécurité incendie'],
            ['id'=>14,'name' => 'Lot 14 : Menuiserie - huisserie'],
            ['id'=>15,'name' => 'Lot 15 : Installation électrique'],
            ['id'=>16,'name' => 'Lot 16 : Déchets divers en vrac'],
            ['id'=>17,'name' => 'Lot 17 : Polluants - Amiante - Plomb'],
            ['id'=>18,'name' => 'Lot 18 : Installation diverse - Appareil / Equipement / Produit']
        ]);
        //-----------------------------------------------------------------------------------------------\\
        DB::table('diag_categories')->delete();
        DB::table('diag_categories')->insert([
            ['id'=>1,'name' => 'DD - Autres'],
            ['id'=>2,'name' => 'DND - Métal'],
            ['id'=>3,'name' => 'DND - DEEE'],
            ['id'=>4,'name' => 'DD - DEEE'],
            ['id'=>5,'name' => 'DND - Autres'],
            ['id'=>6,'name' => 'DND - Bois'],
            ['id'=>7,'name' => 'DD - Amiante'],
            ['id'=>8,'name' => 'DI - Béton/Pierre'],
            ['id'=>9,'name' => 'DND - Plâtre'],
            ['id'=>10,'name' => 'DD - Plomb'],
            ['id'=>11,'name' => 'DI - Terre cuite'],
            ['id'=>12,'name' => 'DND - Plastique'],
            ['id'=>13,'name' => 'DND - Etanchéité'],
            ['id'=>14,'name' => 'DND - Minérale'],
            ['id'=>15,'name' => 'DI - Céramique'],
            ['id'=>16,'name' => 'DND - Moquette'],
            ['id'=>17,'name' => 'DI - Verre'],
            ['id'=>18,'name' => 'DI - Bitume'],
            ['id'=>19,'name' => 'DND - Mélange'],
            ['id'=>20,'name' => 'DND - Plâtre + inerte'],
            ['id'=>21,'name' => 'DND - Plâtre/Béton'],
            ['id'=>22,'name' => 'DND - Terre'],
            ['id'=>23,'name' => 'DD - Climatisation'],
            ['id'=>24,'name' => 'TEST']
        ]);
        //-----------------------------------------------------------------------------------------------\\
        DB::table('diag_cerfas')->delete();
        DB::table('diag_cerfas')->insert([
            ['id'=>1,'name' => "Autres DD (à détailler obligatoirement en fin du présent tableau) (5)"],
            ['id'=>2,'name' => "Métaux (à détailler éventuellement en fin du présent tableau)"],
            ['id'=>3,'name' => "DEEE (2) non dangereux (à détailler obligatoirement en fin du présent tableau)"],
            ['id'=>4,'name' => "Equipements de chauffage, de climatisation ou frigorifiques contenant des fluides frigorigènes dangereux"],
            ['id'=>5,'name' => "Sources lumineuses (tubes fluorescents, néons, lampes à décharges, lampes à LED)"],
            ['id'=>6,'name' => "Autres DND (à détailler obligatoirement en fin du présent tableau) (5)"],
            ['id'=>7,'name' => "Faiblement adjuvantés"],
            ['id'=>8,'name' => "Amiante friable"],
            ['id'=>9,'name' => "Amiante lié à des matériaux inertes"],
            ['id'=>10,'name' => "Béton et pierre"],
            ['id'=>11,'name' => "Plaques et carreaux"],
            ['id'=>12,'name' => "Non traités"],
            ['id'=>13,'name' => "Peintures contenant des substances dangereuses (4)"],
            ['id'=>14,'name' => "Autres types d'amiante lié (3)"],
            ['id'=>15,'name' => "Tuiles et briques"],
            ['id'=>16,'name' => "Plastiques (à détailler éventuellement selon type de plastiques , ex : PVC) (2)"], /// Plastiques (à détailler éventuellement selon type de plastiques) (2)
            ['id'=>17,'name' => "Sources lumineuses (tubes fluorescents, néons, lampes à décharges, lampes à LED)"],
            ['id'=>18,'name' => "Autres DEEE (2) contenant des substances dangereuses (à détailler obligatoirement en fin du présent tableau) (5)"],
            ['id'=>19,'name' => "Enduit + support inerte"],
            ['id'=>20,'name' => "Complexe d'étanchéité sans goudron (à détailler éventuellement en fin du présent tableau)"],
            ['id'=>21,'name' => "Plastiques alvéolaires (PSE, XPS, PU) (2)"],
            ['id'=>22,'name' => "Laines minérales"],
            ['id'=>23,'name' => "Autres (Isolants)"],
            ['id'=>24,'name' => "Céramique (carrelage, faïence et sanitaires)"],
            ['id'=>25,'name' => "Fenêtres et autres ouvertures vitrées"],
            ['id'=>26,'name' => "Revêtements de sols"],
            ['id'=>27,'name' => "Verre sans menuiserie"],
            ['id'=>28,'name' => "Mélanges bitumineux (sans goudron) (à détailler éventuellement en fin du présent tableau)"],
            ['id'=>29,'name' => "Mélanges de DND listés ci-dessus"],
            ['id'=>30,'name' => "Terre végétale"],
            ['id'=>31,'name' => "Autres DD"],
            ['id'=>32,'name' => "TEST"],

            /* Pas de materiaux dedans */
            ['id'=>33,'name' => "Terre non polluées"],   
            ['id'=>34,'name' => "Mélanges de DI listés ci-dessus sans DND"],   
            ['id'=>35,'name' => "Autres déchets inertes"],   
            ['id'=>36,'name' => "Complexes plâtre + isolant"],   
            ['id'=>37,'name' => "Isolants Autres"],   
            ['id'=>38,'name' => "Végétaux"],   
            ['id'=>39,'name' => "Mélanges bitumineux contenant du goudron"],   
            ['id'=>40,'name' => "Complexe d'étanchéité contenant du goudron"],   
            ['id'=>41,'name' => "Bois traités contenant des substances dangereuses"],   
            ['id'=>42,'name' => "Terres contenant des substances dangereuses"]
        ]);
        //--------------------------------------------------------------------------------------------\\
        DB::table('diag_produit_types')->delete();
        DB::table('diag_produit_types')->insert([
            ['id'=>1,'name' => '"""Divers - DD"" ou ""comptage DD"""'],
            ['id'=>2,'name' => '"""Divers - DND"" ou \'comptage"""'],
            ['id'=>3,'name' => 'Autre - Amiante'],
            ['id'=>4,'name' => 'Bardage'],
            ['id'=>5,'name' => 'Bardage - Amiante'],
            ['id'=>6,'name' => 'Charpente'],
            ['id'=>7,'name' => 'Charpente - Plomb'],
            ['id'=>8,'name' => 'Conduit - Amiante'],
            ['id'=>9,'name' => 'Couverture'],
            ['id'=>10,'name' => 'Couverture - Amiante'],
            ['id'=>11,'name' => 'DEEE - DND'],
            ['id'=>12,'name' => 'Divers - DI'],
            ['id'=>13,'name' => 'Divers - Plomb'],
            ['id'=>14,'name' => 'Enduit'],
            ['id'=>15,'name' => 'Escalier'],
            ['id'=>16,'name' => 'Etanchéité'],
            ['id'=>17,'name' => 'Faux plafond'],
            ['id'=>18,'name' => 'Infrastructure'],
            ['id'=>19,'name' => 'Isolation - Mur'],
            ['id'=>20,'name' => 'Joint - Amiante'],
            ['id'=>21,'name' => 'Mur et cloison'],
            ['id'=>22,'name' => 'Mur - Amiante'],
            ['id'=>23,'name' => 'Mur - Infrastructure'],
            ['id'=>24,'name' => 'Mur - Plomb'],
            ['id'=>25,'name' => 'Ouvrant'],
            ['id'=>26,'name' => 'Ouvrant - Amiante'],
            ['id'=>27,'name' => 'Ouvrant - Plomb'],
            ['id'=>28,'name' => 'Plafond - Amiante'],
            ['id'=>29,'name' => 'Plancher'],
            ['id'=>30,'name' => 'Plinthe'],
            ['id'=>31,'name' => 'Plinthe - Amiante'],
            ['id'=>32,'name' => 'Plinthe - Plomb'],
            ['id'=>33,'name' => 'Poteaux - Poutre'],
            ['id'=>34,'name' => 'Poutre - IPN - Plomb'],
            ['id'=>35,'name' => 'Revêtement de sol'],
            ['id'=>36,'name' => 'Revêtement de sol - Amiante '],
            ['id'=>37,'name' => 'Sanitaire -Equipements'],
            ['id'=>38,'name' => 'Voirie - Amiante'],
            ['id'=>39,'name' => 'Vrac - Amiante'],
            ['id'=>40,'name' => 'VRD'],
            ['id'=>41,'name' => 'TEST'],
            ['id'=>42,'name' => 'Autre'],
            ['id'=>43,'name' => 'Dépôt - Amiante'],
            ['id'=>44,'name' => 'Cloisonnement '],
            ['id'=>45,'name' => 'Marche - Plomb'],
            ['id'=>46,'name' => 'Toiture '],
            ['id'=>47,'name' => 'Amiante'],
            ['id'=>48,'name' => 'Revêtement mur'],
            ['id'=>49,'name' => 'Sol'],
            ['id'=>50,'name' => 'Mur'],
            ['id'=>51,'name' => 'Convoyeur 50 T/h'],
            ['id'=>52,'name' => 'Convoyeur 350 T/h'],
            ['id'=>53,'name' => 'Convoyeur 1050 T/h'],
            ['id'=>54,'name' => 'Convoyeur 350 - 500 T/h'],
            ['id'=>55,'name' => 'Convoyeur 1050 T/h 2'],
            ['id'=>56,'name' => 'Eclairage '],
            ['id'=>57,'name' => 'Ouvrant '],
            ['id'=>58,'name' => 'Panneaux']
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LentghAwarePaginator;

class ProduitsController extends Controller
{
    public function index()
    {   
        $produit = DB::table('diag_produits')
        ->leftJoin('diag_produit_options', 'diag_produits.id', '=', 'diag_produit_options.produit_id')
        ->leftJoin('diag_cerfas', 'diag_produits.cerfa_id', '=', 'diag_cerfas.id')
        ->leftJoin('diag_lots','diag_produit.lot_id', '=', 'diag_lots.id')
        ->select('diag_produits.id', 'diag_produits.name', 'diag_produits.classe', 'diag_produit_options.name', 'diag_produit_options.masse_volumique','diag_cerfas.name','diag_lots.name')
        ->get();
        
        return view('index',['produit' => $produit]);  
    }




    /*
    public function paginate($items, $perPage = 4, $page = null)
    {   
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
    }*/
} 

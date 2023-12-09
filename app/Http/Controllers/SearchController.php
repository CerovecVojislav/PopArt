<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oglasi;
use App\Models\Kategorija;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');
        $request = Oglasi::where('ime', 'LIKE', "%$query%")
            ->orWhere('kategorija', 'LIKE', "%$query%")
            ->orWhere('opis', 'LIKE', "%$query%")
            ->orWhere('vlasnik', 'LIKE', "%$query%")
            ->get();
        return view('welcome', ['oglasiLista'=> $request,
        'kategorija'=>$kategorija]);
    }

    public function searchByKategorija($id){
        $kategorija = Kategorija::find($id);
        $request = Oglasi::where('kategorija', '==', '$kategorija->kategorija3')
        ->get();
        $kategorija = Kategorija::orderBy('kategorija1', 'asc') 
        ->orderBy('kategorija2', 'asc')
        ->get();
        return view('welcome', ['oglasiLista'=> $request,
        'kategorija'=>$kategorija]);
    }

    public function searchByKategorija2($id){
        $kategorija = Kategorija::find($id);
        $request = Oglasi::where('kategorija', '==', '$kategorija->kategorija2')
        ->get();
        $kategorija = Kategorija::orderBy('kategorija1', 'asc') 
        ->orderBy('kategorija2', 'asc')
        ->get();
        return view('welcome', ['oglasiLista'=> $request,
        'kategorija'=>$kategorija]);
    }
    
}

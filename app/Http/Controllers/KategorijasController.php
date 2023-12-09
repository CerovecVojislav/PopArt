<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorija;
use App\Models\Oglasi;

class KategorijasController extends Controller
{
    public function createKategorija(Request $request){
        $kategorija = new Kategorija;
        $kategorija->kategorija1 = $request->kategorija1;
        $kategorija->kategorija2 = $request->kategorija2;
        $kategorija->kategorija3 = $request->kategorija3;
        $kategorija->save();
        return redirect()->route('getKategorije');
    }

    

    public function getKategorije(){

        return view('kategorije.kategorije', ['kategorije'=>Kategorija::orderBy('kategorija1', 'asc')
        ->orderBy('kategorija2', 'asc')
        ->get()]);
    }

    public function updateKategorije(Request $request, $id){
        $kategorija = Kategorija::find($id);
        $kategorija->kategorija1 = $request->kategorija1;
        $kategorija->kategorija2 = $request->kategorija2;
        $kategorija->kategorija3 = $request->kategorija3;
        $kategorija->save();
        return redirect()->route('getKategorije');;
    }

    public function deleteKategorije($id){
        $kategorija = Kategorija::find($id);
        $kategorija->delete();
        return redirect()->route('getKategorije');
    }
    public function formK(){

        return view('kategorije.kategorijeCreate');
    }
    public function formKUpdate($id){
        return view('kategorije.kategorijeUpdate', ['kategorija'=>Kategorija::find($id)]);
    }
    public function welcome(){
        $kategorija = Kategorija::orderBy('kategorija1', 'asc') 
        ->orderBy('kategorija2', 'asc')
        ->get();
        return view('welcome', ['oglasiLista'=>Oglasi::all(),
        'kategorija'=>$kategorija]);
    }
}

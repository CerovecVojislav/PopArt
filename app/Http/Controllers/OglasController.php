<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oglasi;
use Illuminate\Support\Facades\Auth;

class OglasController extends Controller
{
    private function Req(Request $request, $newOglas){
        $newOglas->ime = $request->ime;
        $newOglas->vlasnik = Auth::user()->name;
        $newOglas->opis = $request->opis;
        $newOglas->path = $request->file('slika')->store('pictures', 'public');
        $newOglas->polovno = $request->polovno;
        $newOglas->cena = $request->cena;
        $newOglas->lokacija = $request->lokacija;
        $newOglas->kategorija= $request->kategorija;
        $newOglas->telefon = $request->telefon;
        $newOglas->save();
    }
    public function createOglas(Request $request){
        $newOglas = new Oglasi;
        Req($request, $newOglas);
        return redirect()->route('getOglasi');
    }
    public function getOglasi(){
        return view('oglasi.oglasi', ['oglasiLista'=>Oglasi::all()]);
    }
    public function deleteOglas($id){
        $oglas = Oglasi::find($id);
        $oglas->delete();
        return redirect()->route('getOglasi');
    }
    public function updateOglas(Request $request, $id){
        $newOglas = Oglasi::find($id);
        Req($request, $newOglas);
        return redirect()->route('getOglasi');
    }
    public function getOglasById($id){
        return view('oglasi.oglasAlone', ['oglas'=>Oglasi::find($id)]);
    }
    public function form(){
        return view('oglasi.oglas');
    }
    public function updateForm($id){
        return view('oglasi.oglasUpdate', ['oglas'=>Oglasi::find($id)]);
    }
    public function getOglasiByVlasnik(){
        return view('oglasi.oglasi', ['oglasiLista'=>Oglasi::where('vlasnik', Auth::user()->name)->get()]);
    }
}




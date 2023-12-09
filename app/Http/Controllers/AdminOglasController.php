<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oglasi;
use Illuminate\Support\Facades\Auth;

class AdminOglasController extends Controller
{
    public function acreateOglas(Request $request){
        $newOglas = new Oglasi;
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
        return redirect()->route('getOglasi');
    }
    public function agetOglasi(){
        return view('oglasi.oglasi', ['oglasiLista'=>Oglasi::all()]);
    }
    public function adeleteOglas($id){
        $oglas = Oglasi::find($id);
        $oglas->delete();
        return redirect()->route('getOglasi');
    }
    public function aupdateOglas(Request $request, $id){
        $newOglas = Oglasi::find($id);
        $newOglas->vlasnik = Auth::user()->name;
        $newOglas->ime = $request->ime;
        $newOglas->opis = $request->opis;
        $newOglas->path = $request->file('slika')->store('pictures', 'public');
        $newOglas->cena = $request->cena;
        $newOglas->lokacija = $request->lokacija;
        $newOglas->kategorija= $request->kategorija;
        $newOglas->telefon = $request->telefon;
        $newOglas->save();
        return redirect()->route('getOglasi');
    }
    public function agetOglasById($id){
        return view('oglasi.oglasAlone', ['oglas'=>Oglasi::find($id)]);
    }
    public function aform(){
        return view('oglasi.oglas');
    }
    public function aupdateForm($id){
        return view('oglasi.oglasUpdate', ['oglas'=>Oglasi::find($id)]);
    }
    public function agetOglasiByVlasnik(){
        return view('oglasi.oglasi', ['oglasiLista'=>Oglasi::where('vlasnik', Auth::user()->name)->get()]);
    }
}


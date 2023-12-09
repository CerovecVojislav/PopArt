<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative sm:flex sm:justify-center sm: min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div style="color: white">
                <a href="{{route('formK')}}">Kreiraj kategoriju</a><br><br>
                <h1>Kategorije:</h1><br>
                @foreach($kategorije as $kategorija)
                <div class="row justify-content-md-center" style="background:grey;margin:20px;padding:20px;">
                <h1>{{$kategorija->id}}--Kategorija: {{$kategorija->kategorija1}}, Podkategorija: {{$kategorija->kategorija2}}, Sekcija: {{$kategorija->kategorija3}}, <b><a href="{{route('deleteKategorije', $kategorija->id)}}">|Ukloni kategoriju|</a></b> <b><a href="{{ route('formKUpdate', $kategorija->id) }}">|Izmeni kategoriju|</a></b></h1>
                </div>
                @endforeach
            </div>
        </div>     
    </div>
    </div>
</x-app-layout>

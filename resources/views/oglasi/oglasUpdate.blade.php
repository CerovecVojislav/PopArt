<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative sm:flex sm:justify-center sm: min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div style="color: white;" >
                <h1>Lista oglasa:</h1><br>
                <div style="color:grey;">
                <form method="post" action="{{route('aupdateOglas', $oglas->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{csrf_field() }}
                <label for="ime">Ime</label><br>
                <input type="text" name="ime" value="{{$oglas->ime}}"><br>
                <label for="slika">Slika oglasa</label><br>
                <input type="file" name="slika"><br>
                <label for="cena">Cena</label><br>
                <input type="text" name="cena" value="{{$oglas->cena}}"><br>
                <label for="polovno">Polovno</label><br>
                <input type="checkbox" name="polovno"><br>
                <label for="kategorija">Kategorija</label><br>
                <input type="text" name="kategorija" value="{{$oglas->kategorija}}"><br>
                <label for="lokacija">Lokacija</label><br>
                <input type="text" name="lokacija" value="{{$oglas->lokacija}}"><br>
                <label for="telefon">Telefon</label><br>
                <input type="tel" name="telefon" value="{{$oglas->telefon}}"><br><br>
                <label for="opis" rows="10">Opis</label><br>
                <textarea name="opis" ></textarea><br>
                <input type="submit" value="Submit">
                </div>
            </form>
            </div>
        </div>     
    </div>
    </div>
</x-app-layout>

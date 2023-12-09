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
                <h1>Lista oglasa:</h1><br>
                @foreach($oglasiLista as $oglas)
                <a href="{{route('getOglasById', $oglas->id)}}">
                    <div class="row justify-content-md-center" style="background:rgba(31,41,55,255);margin:20px;padding:20px;">
                    <div>
                    <img src="http://localhost:8000/storage/{{$oglas->path}}" style="width:300px" alt="">
                    </div>
                    <div>
                    <b><h1>{{ $oglas-> ime }}</b></h1>
                    <h1>{{$oglas->lokacija}}</h1>
                    <h1>{{$oglas->cena}} din.</h1>
                    <h1>@if($oglas->polovno == 1)
                            <h1>Polovno</h1><br>
                        @else
                            <h1>Novo</h1><br>
                        @endif</h1>
                    @if(Auth()->user()->usertype == 'customer')
                    <h1><a href="{{ route('updateForm', $oglas->id)}}">Izmeni oglas</a></h1><br>
                    <h1><a href="{{ route('deleteOglas', $oglas->id)}}">Izbrisi oglas😧</a></h1>
                    @else
                    <h1><a href="{{ route('aupdateForm', $oglas->id)}}">Izmeni oglas</a></h1><br>
                    <h1><a href="{{ route('adeleteOglas', $oglas->id)}}">Izbrisi oglas😧</a></h1>
                    @endif
                    </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>     
    </div>
    </div>
</x-app-layout>

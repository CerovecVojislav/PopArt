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
                <h1>kreiraj kategoriju:</h1><br>
                <div class="row justify-content-md-center" style="background:grey;margin:20px;padding:20px;color:black;">
                <form method="post" action="{{ route('createKategorija') }}" accept-charset="UTF-8">
                {{csrf_field() }}
                <label for="kategorija1">Kategorija: </label><br>
                <input type="text" name="kategorija1"><br>
                <label for="kategorija2">Podkategorija: </label><br>
                <input type="text" name="kategorija2"><br>
                <label for="kategorija3">Sekcija: </label><br>
                <input type="text" name="kategorija3"><br><br>
                <input type="submit" value="Submit">
            </form>
            </div>
            </div>
        </div>     
    </div>
    </div>
</x-app-layout>

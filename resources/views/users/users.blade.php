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
                <h1>Lista korisnika:</h1><br>
                @foreach($users as $user)
                <div class="row justify-content-md-center" style="background:rgba(31,41,55,255);margin:20px;padding:20px;">
                <h1>username: {{$user->name}}, email: {{$user->email}}, usertype: {{$user-> usertype}}, <b><a href="{{route('deleteUser', $user->id)}}">|Ukloni korisnika|</a></b> <b><a href="{{ route('userForm', $user->id) }}">|Izmeni korisnika|</a></b></h1>
                </div>
                @endforeach
            </div>
        </div>     
    </div>
    </div>
</x-app-layout>

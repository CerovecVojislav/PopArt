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
                <div class="row justify-content-md-center" style="rgba(31,41,55,255);margin:20px;padding:20px;color:black;">
                <form method="post" action="{{route('updateUser', $user->id)}}" accept-charset="UTF-8">
                {{csrf_field() }}
                <label for="name">Username: </label><br>
                <input type="text" name="name"value="{{$user->name}}"><br>
                <label for="email">Email: </label><br>
                <input type="email" name="email" value="{{$user->email}}"><br>
                <label for="usertype">Usertype: </label><br>
                <input type="text" name="usertype" value="{{$user->usertype}}"><br><br>
                <input type="submit" value="Submit">
            </form>
            </div>
            </div>
        </div>     
    </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route('showBeers')}}">BEERS</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{$token ?? 'no token'}}
                    session {{session('token')}}
                    This is your token {{json_encode(Auth::user()->tokens()->first()->token)}}


                </div>
                <x-beers :beers="[]"></x-beers>
            </div>
        </div>
    </div>
</x-app-layout>

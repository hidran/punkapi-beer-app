<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Beers') }} :
            @if(session()->has('token'))

                Your API TOKEN: {{session('token')}}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Beers</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>image</th>
                          
                        </tr>
                        </thead>
                        <tbody id="beers">

                        @foreach($beers as $beer)

                            <tr>
                                <td>{{$beer['id']}}</td>
                                <td>{{$beer['name']}}</td>
                                <td><img loading="lazy" style="height: 120px" src="{{$beer['image_url']}}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"> {{$beers->links()}}</td>
                        </tr>
                        </tfoot>
                    </table>


                </div>

            </div>
        </div>
    </div>
    <script>
        const token = '{{session('token')}}' || localStorage.getItem('token');
        if (token && !localStorage.getItem('token')) {
            localStorage.setItem('token', token);
        }

    </script>
</x-app-layout>


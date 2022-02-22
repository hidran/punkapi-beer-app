<div>
    <h2>Beers</h2>
    <table class="table- table-dark table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($beers as $beer)
            <tr>
                <td>{{$beer->id}}</td>
                <td>{{$beer->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

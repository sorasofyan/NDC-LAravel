@extends("layout.admin")

@section("title","Countries")


@section("content")
<a href="{{ route('create-country') }}" class="btn btn-success">Create New Country</a>
<table align="center" class="table table-striped table-bordered">
    <thead>
        <tr>
    
            <th>Country</th>
            <th>City</th>
            <th>ISO2</th>
            <th>Code</th>
            <th>Area</th>
            <th>Population</th>
            <th width='20%'></th>

        </tr>
    </thead>
    <tbody>
        @foreach($country as $country)
        <tr>
           
            <td>{{ $country->name }}</td>
            <td>{{ $country->cities->count() }}</td>
            <td>{{ $country->iso2 }}</td>
            <td>{{ $country->code}}</td>
            <td>{{ $country->area }}</td>
            <td>{{ $country->Population}}</td>
            <td>
            <a class='btn btn-info btn-sm'  
            href='{{ route("edit-country", $country->id) }}'>Edit</a>
            <a class='btn btn-danger btn-sm'
            onclick='return confirm("Are you sure?")'
            href='{{ route("delete-country",$country->id) }}'>Delete</a>
           
            </td>
          
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

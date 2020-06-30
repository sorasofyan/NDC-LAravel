@extends("layout.admin")

@section("title","Cities")


@section("content")
<a href="{{ route('cities.create') }}" class="btn btn-success">Create New City</a>
<table align="center" class="table table-striped table-bordered">
<thead>
        <tr>
        <th>City</th>
        <th>Country</th>
        <th>Latlng</th>
        <th>Active</th>
            <th width='20%'></th>

        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            
            <td><a href='{{ route("cities.show", $city->id) }}'>{{ $city->name }}</a></td>
            <td>{{$city->country->name??'' }}</td>
            <td>{{ $city->latlng }}</td>
            <td><input type="checkbox" disabled {{$city->active?"checked":"" }}/></td>
           
             <td width="20%"> <form method="post" action="{{ route('cities.destroy', $city->id) }}">
           
            <a href='{{ route("cities.show", $city->id) }}'class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>
            
            <a href='{{ route("cities.edit",$city->id) }}' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

            <a href='{{ route("delete-city", $city->id) }}' onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
            @csrf
            @method("DELETE")
            </form>
            </td>
          
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

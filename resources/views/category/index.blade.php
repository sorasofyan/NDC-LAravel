@extends("layout.admin")

@section("title","Categories")


@section("content")
<form class="row mb-3">
<div class="col-8">
<input autofocus value="{{ request()->get('q') }}" type="text" class="form-control" placeholder="Enter Your Search" name="q"  />
</div>
 

 <div class="col-2">
 <button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> Search</button>
 </div>


 <div class="col-2">
    <a href="{{ route("categories.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New News</a>
  </div>
</form>
@if($categories->count()>0) 

<table align="center" class="table table-striped table-bordered">
<thead>
        <tr>
        <th>Title</th>
        <th>News</th>
        <th>Show</th>
        <th width='20%'></th>

        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td><a href="{{ route("categories.show", $category->id) }}">{{ $category->title }}</a></td>
            <td>{{ $category->news->count() }}</td>
            
            <td><input type="checkbox" disabled {{$category->show?"checked":"" }}/></td>
           
            <td width="20%"> <form method="post" action="{{ route('categories.destroy', $category->id) }}">
           
            <a href='{{ route("categories.show", $category->id) }}'class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>
            <a href='{{ route("categories.edit",$category->id) }}' class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
            <a href='{{ route("delete-category", $category->id) }}' onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
            @csrf
            @method("DELETE")
            </form>
            </td>
          
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@else
<div class="alert alert-warning"> Sorry there is no result to your search </div>

@endif
@endsection

@extends("layout.admin")

@section("title","Edit Category : $category->title")


@section("content")


<form  role="form" method="post" action="{{ route("categories.update", $category->id) }}">
        @method('PATCH')
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Caregory Title</label>
                    <input type="text" value='{{ $category->title }}'  class="form-control"id="title" name="title" placeholder="Enter Caregory Title">
                  </div>

                  
            <div class="form-check">
                    <input {{ $category->show?"checked":"" }} value='1' type="checkbox" name='show' class="form-check-input" id="show">
                    <label class="form-check-label" for='show'>Show</label>
                  </div>
                
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-default' href='{{  route("categories.index")}}'>Cancel</a>
                </div>
              </form>
@endsection

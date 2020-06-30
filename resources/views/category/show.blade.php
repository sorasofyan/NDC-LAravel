@extends("layout.admin")

@section("title","$category->name")


@section("content")


<form  role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Caregory Title</label>
                    <input type="text" value='{{ $category->title }}'class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter Category Title">
                  </div>

                 
                
            
            <div class="form-check">
                    <input {{ $category->show?"checked":"" }} value='1' type="checkbox" name='show' class="form-check-input" id="show">
                    <label class="form-check-label" for='show'>Show</label>
                  </div>
                
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
             
                  <a class='btn btn-default' href='{{  route("categories.index")}}'>Back</a>
                </div>
              </form>
@endsection

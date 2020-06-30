@extends("layout.admin")

@section("title","Edit Country")


@section("content")


<form method="post" action="{{ route('post-edit-country',$country->id) }}" role="form">
@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Country Name</label>
                    <input type="text"  value='{{$country->name}}' class="{{ $errors->has('name')?"is-invalid":""}} form-control" id="name" name="name" placeholder="Enter Country Name">
                  </div>
                  <div class="form-group">
                    <label for="ISO2">ISO2</label>
                    <input type="text"value='{{$country->iso2}}'class="{{ $errors->has('ISO2')?"is-invalid":""}} form-control" id="ISO2" name="ISO2" placeholder="Enter ISO2">
                  </div>
                  <div class="form-group">
                    <label for="code">code</label>
                    <input type="text" value='{{$country->code}}' class="{{ $errors->has('code')?"is-invalid":""}} form-control" id="code" name="code" placeholder="Enter Code">
                  </div>
                  <div class="form-group">
                    <label for="area">Area No</label>
                    <input type="text"  value='{{$country->area}}'class="{{ $errors->has('area')?"is-invalid":""}} form-control" id="area" name="area" placeholder="Enter Area Number">
                  </div>
                  <div class="form-group">
                    <label for="population">Population No</label>
                    <input type="text" value='{{$country->Population}}' class="{{ $errors->has('population')?"is-invalid":""}} form-control" id="population" name="population" placeholder="Enter population Number">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-default' href='{{ asset("/country") }}'>Cancel</a>
                </div>
              </form>
@endsection

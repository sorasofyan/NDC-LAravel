@extends("layout.admin")

@section("title","Create New City")


@section("content")


<form method="post" action="{{ route('cities.store') }}" role="form">
@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" value='{{old("name")}}' class="{{ $errors->has('name')?"is-invalid":""}} form-control" id="name" name="name" placeholder="Enter City Name">
                  </div>

                  <div class="form-group">
                    <label for="latlng">Latlng</label>
                    <input type="text" value='{{old("latlng")}}' class="{{ $errors->has('latlng')?"is-invalid":""}} form-control" id="latlng" name="latlng" placeholder="Enter Latlng">
                  </div>

                  <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option {{old('country_id')==$country->id?"selected":""}} value='{{$country->id}}'>{{$country->id}} - {{$country->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check">
                    <input  {{old('active')?"checked":"" }} value='1' type="checkbox" name='active' class="form-check-input" id="active">
                    <label class="form-check-label" for='active'>Active</label>
                  </div>
                
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-default' href='{{  route("cities.index")}}'>Cancel</a>
                </div>
              </form>
@endsection

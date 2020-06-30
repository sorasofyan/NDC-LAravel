@extends("layout.admin")

@section("title","Edit City $city->name")


@section("content")


<form  role="form" method="post" action="{{ route("cities.update", $city->id) }}">
        @method('PATCH')
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" value='{{ $city->name }}'  class="form-control"id="name" name="name" placeholder="Enter City Name">
                  </div>

                  <div class="form-group">
                    <label for="latlng">Latlng</label>
                    <input type="text" value='{{ $city->latlng }}' class=" form-control" id="latlng" name="latlng" placeholder="Enter Latlng">
                  </div>

                  <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                    <option>Select Country</option>
                    @foreach($countries as $country)
                        <option  {{ $country->id==$city->country_id?"selected":"" }}  value='{{$country->id}}'>{{$country->name}}</option>
                    @endforeach
                  
                      
                </select>
            </div>
            
            <div class="form-check">
                    <input {{ $city->active?"checked":"" }} value='1' type="checkbox" name='active' class="form-check-input" id="active">
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

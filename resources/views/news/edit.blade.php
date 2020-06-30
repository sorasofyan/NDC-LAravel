@extends("layout.admin")

@section("title","Edit New : $new->title")


@section("content")


<form  role="form" method="post"  enctype="multipart/form-data" action="{{ route("news.update", $new->id) }}">
@csrf
@method('PATCH')
                <div class="card-body">
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input type="text" value='{{ $new->title }}' class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="title" name="title" placeholder="Enter News Title ">
                  </div>

                  <div class="form-group">
                    <label for="summary">Summary</label>
                    <input type="text" value='{{ $new->summary }}' class="{{ $errors->has('summary')?"is-invalid":""}} form-control" id="summary" name="summary" placeholder="Enter Summary">
                  </div>

                  <div class="form-group row">
                          <div class='col-sm-6'>
                              <label for="imageFile">Image</label>
                              <div class="custom-file">
                                  <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                                  <label class="custom-file-label" for="image">Choose file</label>
                              </div>
                              @if($new->image)
                                  <img src='{{ asset("storage/".$new->image) }}' width='240' class='img-thumbnail mt-3' />
                              @endif
                          </div>
                      </div>

                  <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option {{ $category->id==$new->category_id?"selected":"" }} value='{{$category->id}}'>{{$category->id}} - {{ $new->category_id }} - {{$category->title}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" id="details" name="details">{{ $new->details }}</textarea>
            </div>
            <div class="form-check">
                    <input {{ $new->published?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
                    <label class="form-check-label" for='published'>Published</label>
                  </div>
                
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class='btn btn-default' href='{{  route("news.index")}}'>Cancel</a>
                </div>
              </form>
@endsection

@section("js")
<!-- هنا انا قلتله وين الملف وقلتله وين هوا  -->
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- هنا انا كتبت هاي الفنكشن عشان لما اختار الصوره يكتب -->
    <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection

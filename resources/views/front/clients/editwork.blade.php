@extends('front.layouts..master')
@section('content')


  <section id="add-work" >
  @include('front.layouts.nav')



    <div class="add-work-container ">
        <div class="container">
            <h3> تعديل الاعلان </h3>
            <div class="row">

                <div class="col-md-9 my-2">
                  <div class="tab-content" id="v-pills-tabContent">
                     <!-- add jobs section  -->
                    <div class="tab-pane fade show active" id="v-pills-add-jobs" role="tabpanel" aria-labelledby="v-pills-add-jobs-tab">
                        <div class="add-jobs">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        @include('flash::message')

                            <div class="header">

                                <h5>تعديل الاعلان</h5>
                            </div>
                            <form action="{{route('workclient.update',$record->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="form-content">
                                    <div class="input-container">
                                        <label for="job-title">عنوان الوظيفه</label>

                                        <input type="text" name="title" value="{{$record->title}}}" class=" @error('title') is-invalid @enderror"id="job-title" placeholder="عنوان الظيفه">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="input-container">
                                    <label for="job-title">نوع الوظيفه</label>

                                        {!! Form::select('parent', $categories->pluck('name','id')->toArray(),null, ['id'=>'parents','placeholder'=>' اختر الوظيفه']) !!}


                                    </div> --}}

                                    <div class="input-container">
                                    <label for="job-title">نوع الوظيفه</label>

                                        {{-- {!! Form::select('parent', $categories->pluck('name','id')->toArray(),null, ['id'=>'parents','placeholder'=>' اختر الوظيفه']) !!} --}}
                                        <select name="parent" class="form-control" id='parents' placeholder=' اختر الوظيفه'>
                                            <option>اختر الوظيفه</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $selectedId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                <div class="form-content">
                                    <div class="input-container">
                                    <label for="job-title"> الوظيفه</label>

                                    {{-- {!! Form::select('category_id',[],null, ['class' => 'form-control','id'=>'cat','placeholder'=>'الوظيفه']) !!} --}}

                                        <select name="category_id" class="form-control" id='parents' placeholder='الوظيفه'>
                                            <option>الوظيفه</option>
                                            @foreach($sub_categories as $category)
                                                <option value="{{ $category->id }}" {{ $selectedId2 == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        </select>
                                    </div>


                                    <div class="input-container">
                                        <label for="job-location">مكان الوظيفه </label>
                                        <div class="input-content">

                                            <input type="text" id="job-location" value="{{$record->address}}}" name="address" class=" @error('address') is-invalid @enderror" placeholder="عنوان الوظيفه">
                                            <span>
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label for="job-description">وصف الوظيفه</label>
                                    <textarea name="des" placeholder="وصف الوظيفه" id="job-description" cols="30" rows="10">{{$record->des}}</textarea>

                                </div>
                                <div class="input-container">
                                    <label for="job-description">تاريخ انتهاء الوظيفه </label>
                                    <input type="date"  value="{{$record->ex_date}}" class=" @error('ex_date') is-invalid @enderror" name="ex_date">
                                    @error('ex_date')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <br>
                                <div class="input-file">
                                    <div class="col-4">
                                        <input type="file" id="image"  name="image" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @if ($record->media()->exists())

                                            <img src="{{$record->media()->first()->url}}" width="90" height="90" class="view_image" alt="" >
                                        @endif
                                    </div>


                                </div>
                                <br>

                                <div class="input-container">
                                  <label class="checkbox-inline" >
                                     الحاله

                                  </label>

                                  <input type="checkbox" value="{{$record->status}}}" name="status" checked data-toggle="toggle">

                                </div>

                                <button type="submit"class="text-center">تعديل الاعلان</button>

                            </form>

                        </div>
                    </div>
                     <!-- add jobs-management section  -->


                     <!-- add candidates-management section  -->

                  </div>
                </div>
              </div>
        </div>
    </div>





</section>



  <a href="#" class="scrolltop">
    <i class="fas fa-angle-up"></i>
  </a>
  @push('script')
  <script>
  $(function () {

let rateSection = $('.rateYo')

rateSection.each(function () {
  let customerClasses = $(this).attr('class').split(' '),
      customer = customerClasses[1],
      customerRate = $(this).attr('data-rate')

  $(`.${customer}`).rateYo({
    rating: +customerRate,
    readOnly: true,
    ratedFill: "#FEBE42",
    normalFill: "#ABABAB",
    starWidth: "25px"
  });
})
});
</script>
<script>
      //if governorates changed
      $("#parents").change(function (e){
        e.preventDefault();
        // get gov
        var parent = $("#parents").val();
        if(parent)
        {

          $.ajax({
            url      : '{{url('sub?parent=')}}'+parent,
               type     : 'get',
            success  : function (data) {
              if(data.status == 1)
              {



                  $("#cat").empty();
                  $("#cat").append('<option >الوظيفه</option>');
                $.each(data.data, function(index,cat){
                  $("#cat").append('<option value="'+cat.id+'">'+cat.name+'</option>');
                });
              }
            },
            error : function (jqXhr, textStatus, errorMessage){
              alert(errorMessage);
            }
          });
        }
        else
        {
          $("#cat").empty();
          $("#cat").append('<option >الوظيفه</option>');
        }
      });
    </script>

    <script>
            $(document).on('change', '#image', function(){

                $('.view_image').fadeOut();
            });
    </script>
  @endpush

@stop






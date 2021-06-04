@extends('front.layouts.master')
@section('content')


  <section id="add-work" >
  @include('front.layouts.nav')



    <div class="add-work-container ">
        <div class="container">
            <h3>تنظيم و ادارة</h3>
            <div class="row">
                <div class="col-md-3 my-2">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                   <h4>الوظائف</h4>

                    <a class="nav-link active" id="v-pills-add-jobs-tab" data-toggle="pill" href="#v-pills-add-jobs" role="tab" aria-controls="v-pills-add-jobs" aria-selected="true">
                        أضف الوظائف
                    </a>
                    <a class="nav-link" id="v-pills-jobs-management-tab" data-toggle="pill" href="#v-pills-jobs-management" role="tab" aria-controls="v-pills-jobs-management" aria-selected="false">
                        أدارة الوظائف
                    </a>

                  </div>
                </div>
                <div class="col-md-9 my-2">
                  <div class="tab-content" id="v-pills-tabContent">
                     <!-- add jobs section  -->
                    <div class="tab-pane fade show active" id="v-pills-add-jobs" role="tabpanel" aria-labelledby="v-pills-add-jobs-tab">
                        <div class="add-jobs">
                        @include('flash::message')

                            <div class="header">

                                <h5>أضف وظيفة</h5>
                            </div>
                            <form action="{{route('addwork.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="form-content">
                                    <div class="input-container">
                                        <label for="job-title">عنوان الوظيفه</label>

                                        <input type="text" name="title"  class=" @error('title') is-invalid @enderror"id="job-title" placeholder="عنوان الظيفه">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-container">
                                    <label for="job-title">نوع الوظيفه</label>

                                        {!! Form::select('parent', $categories->pluck('name','id')->toArray(),null, ['id'=>'parents','placeholder'=>' اختر الوظيفه']) !!}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-content">
                                    <div class="input-container">
                                    <label for="job-title"> الوظيفه</label>

                                    {!! Form::select('category_id',[],null, ['class' => 'form-control','id'=>'cat','placeholder'=>'الوظيفه']) !!}

                                        </select>
                                    </div>
                                    <div class="input-container">
                                        <label for="job-location">مكان الوظيفه </label>
                                        <div class="input-content">

                                            <input type="text" id="job-location" name="address" class=" @error('address') is-invalid @enderror" placeholder="عنوان الوظيفه">
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
                                    <textarea  name="des" placeholder="وصف الوظيفه" id="job-description" cols="30" rows="10"></textarea>

                                </div>
                                <div class="input-container">
                                    <label for="job-description">تاريخ انتهاء الوظيفه </label>
                                    <input type="date" class=" @error('ex_date') is-invalid @enderror" name="ex_date">
                                    @error('ex_date')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <br>
                                <div class="input-file">
                                    <input type="file" id="image" name="image">
                                           @error('image')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                </div>
                                <br>

                                <div class="input-container">
                                  <label class="checkbox-inline" >
                                     الحاله

                                  </label>

                                  <input type="checkbox"  name="status" checked data-toggle="toggle">

                                </div>

                                <button type="submit"class="text-center">نشر الاعلان</button>

                            </form>

                        </div>
                    </div>
                     <!-- add jobs-management section  -->
                    <div class="tab-pane fade" id="v-pills-jobs-management" role="tabpanel" aria-labelledby="v-pills-jobs-management-tab">
                       <div class="jobs-management">
                          <div class="header">
                            <h5>اداره الوظائف </h5>
                            <h6>المتقدميين لعمل ويب ديزاين   </h6>
                            <div class="body">
                              @if(count($records))
                              @foreach($records as $record)

                              <div class="content">
                                <div class="content-head">
                                  <h4>{{$record->title}}</h4>

                                  @if ($record->status == "open")

                                     <h6 class="pending">مفتوح</h6>

                                  @else

                                     <h6 class="expired">مغلق</h6>

                                  @endif

                                </div>
                                <div class="content-body">
                                  <p><i class="far fa-calendar"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $record->created_at)->format('Y-m-d') }}</p>
                                </div>
                                <div class="content-bottom">

                                    @if($record->status=="open")

                                        {{-- <button class="diactivate"> <i class="fas fa-times"></i> الغاء تفعيل

                                        </button> --}}

                                        <a href="{{url(route('client-work.deactivate',$record->id))}}" class="diactivate"> غلق الاعلان</a>


                                    @else
                                        <a href="{{url(route('client-work.activate',$record->id))}}"
                                        class="activate">فتح الاعلان</a>
                                    @endif


                                  <a class="edit" href="{{url(route('workclient.edit',$record->id))}}"  title="تعديل"><i class="far fa-edit"></i></a>

                                  <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                    data-user_id="{{ $record->id }}" data-username="{{ $record->title }}"
                                    data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                        class="delete far fa-trash-alt"></i></a>

                                  <a href="{{url(route('offeruser',$record->id))}}" class="all-offers">كل العروض</a>
                                </div>

                              </div>
                              @endforeach

                              @endif


                            </div>
                        </div>
                       </div>
                    </div>

                  </div>
                </div>
              </div>
        </div>
    </div>


   <!-- Modal effects -->
   <div class="modal" id="modaldemo8" style="top: -13px;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف </h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('workclient.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="work_id" id="user_id" value="">
                    <input class="form-control" name="username" id="username" type="text" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </div>
            </form>

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

        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })

    </script>


  @endpush

@stop






<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>register  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">
</head>

<body>
    <section id="register">
        <div class="login-container">
            <div class="container">
                <div class="row m-auto justify-content-center">

                    <div class="col-lg-8">

                        <div class="login-content">
                            <h3>انشاء حساب</h3>
                                <form action="{{route('register')}}" method="POST">
                                     @csrf


                                        <div class="input-container">

                                        <input id="name" placeholder="الأسم " class=" @error('name') is-invalid @enderror"name="name" type="text">
                                        <label for="name"><img src="{{asset('front/assets/images/Icon material-person.png')}}" alt=""></label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-container">
                                        <input id="email" placeholder="البريد الالكتروني" class=" @error('email') is-invalid @enderror "name="email" type="email">
                                        <label for="email"><img src="{{asset('front/assets/images/Icon zocial-email.png')}}" alt=""></label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-container">
                                        <input id="phone" placeholder="رقم الهاتف" class=" @error('phone') is-invalid @enderror" name="phone" type="text">
                                        <label for="phone"><img src="{{asset('front/assets/images/Icon awesome-phone-alt.png')}}" alt=""></label>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                      @inject('governorates','App\Models\Governorate')
                                        {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, ['class' => "form-control" ,'id'=>'governorates','placeholder'=>' اختر المحافظه']) !!}


                                        </div>
                                        <div class="form-group">
                                           {!! Form::select('city_id',[],null, ['class' => 'form-control','id'=>'cities','placeholder'=>'المدينة']) !!}
                                           @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <select name="type" id="type" class="form-control  @error('type') is-invalid @enderror">
                                                <option value="" disabled selected>تسجيل ك</option>
                                                <option value="worker">عامل</option>
                                                <option value="client">عميل</option>
                                            </select>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                         </div>

                                    <div class="input-container">
                                        <input id="degree" placeholder="الدرجه العميه " class=" @error('degree') is-invalid @enderror" name="degree" type="text">
                                        @error('degree')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="degree"><img src="{{asset('front/assets/images/suitcase.png')}}" alt=""></label>

                                    </div>

                                    <div class="input-container">
                                        <input id="degree" placeholder="عدد سنوات الخبره "name="years_skills" class=" @error('years_skills') is-invalid @enderror" type="text">
                                        @error('years_skills')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="degree"><img src="{{asset('front/assets/images/suitcase.png')}}" alt=""></label>
                                    </div>

                                    <div class="input-container">
                                        <input id="degree" placeholder="الجنسيه"  name="nationality"  class=" @error('nationality') is-invalid @enderror"type="text">
                                        @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="degree"><img src="{{asset('front/assets/images/suitcase.png')}}" alt=""></label>
                                    </div>


                                    <div class="input-container">
                                        <input id="whats_number" placeholder="  رقم الواتس " class=" @error('whats_number') is-invalid @enderror"name="whats_number">
                                        <label for="whats_number"> </label>
                                           @error('whats_number')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-container">
                                        <input id="password"  name="password"   class=" @error('password') is-invalid @enderror"placeholder="الرقم السري" type="password">
                                        <label for="password"> </label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-container">
                                         <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder=" تاكيد الرقم السري  "name="password_confirmation"  autocomplete="new-password">
                                   <label for="password_confirmation"></label>
                                   @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> انشاء حساب </button>
                                    </div>

                               </form>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


</body>
<script src="{{asset('front/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('front/assets/js/popper.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}}"></script>
<script src="{{asset('front/assets/js/all.min.js')}}"></script>
<script src="{{asset('front/assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>
<script>
      //if governorates changed
      $("#governorates").change(function (e){
        e.preventDefault();
        // get gov
        var governorate_id = $("#governorates").val();
        if(governorate_id)
        {

          $.ajax({
            url      : '{{url('cities?governorate_id=')}}'+governorate_id,
               type     : 'get',
            success  : function (data) {
              if(data.status == 1)
              {
                console.log(governorate_id);


                  $("#cities").empty();
                  $("#cities").append('<option >المدينة</option>');
                $.each(data.data, function(index,city){
                  $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
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
          $("#cities").empty();
          $("#cities").append('<option >المدينة</option>');
        }
      });
    </script>

</html>

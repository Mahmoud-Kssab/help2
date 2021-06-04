<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">
</head>

<body>
    <section id="login">
        <div class="login-container">
            <div class="container">

                <div class="row m-auto justify-content-center">
                    <div class="col-lg-8 ">
                        <div class="login-content">
                            <div>
                                <h3>تسجيل الدخول</h3>
                                <p>تسجيل الدخول لحسابك</p>
                            </div>
                            <form method="POST" actipn="{{route('login')}}">
                               @csrf
                               <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="email" type="email"  placeholder="البريد الالكتروني" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>


                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="password" type="password"  placeholder="الرقم السري" class="@error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                               </div>

                                <button>دخول</button>

                                <a  href="{{ route('password.request') }}">
                                       هل نسيت الباسورد
                                </a>
                                <a href="{{route('register')}}">انشاء حساب</a>




                            </div>
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

</html>

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
    <section id="reset">
        <div class="login-container">
            <div class="container">
                <div class="row m-auto justify-content-center">
                    <div class="col-lg-8">
                        <div class="login-content">
                        <h3>استعداد كلمه المرور </h3>

                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  class="btn btn-primary">
                                      ارسال
                                    </button>
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
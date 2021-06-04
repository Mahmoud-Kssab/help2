<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <title>sho8l </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/assets/css/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">
</head>

<body>  <section id="landing-page" >


     <div class="home">
      <div class="menu-container">
      </div>
      <div class="menu-btn">
        <div class="btn-line"></div>
        <div class="btn-line"></div>
        <div class="btn-line"></div>
      </div>
      <nav class="menu">
        <ul class="menu-nav">
          <li class="nav-item current">
            <a href="{{route('front.home')}}" class="nav-link">
                الرئيسية
            </a>
          </li>


          @if (auth()->guard('web')->check())

            @if (auth()->guard('web')->user()->type == 'client')
                <li class="nav-item">
                    <a href="{{route('addwork')}}"> الاعلانات</a>

                </li>
            @else
                <li class="nav-item">
                    <a href="{{route('works.index')}}"> الاعلانات</a>

                </li>
            @endif

          @endif

          <li class="nav-item">
            <a href="{{route('contact')}}" class="nav-link">
                 أتصل بنا
            </a>
          </li>
          <div class="button-container nav-item" >

            @if (auth()->guard('web')->check())
            <a href="{{route('logout')}}">تسجيل خروج</a>

            @else

                <a href="{{route('login')}}">تسجيل الدخول</a>
                <a href="{{route('register')}}">إنشاء  حساب</a>
            @endif



        </div>
        </ul>
      </nav>

    <header>
        <ul class="list-unstyled">
            <li class="active"><a href="{{route('front.home')}}">الرئيسية</a></li>

            @if (auth()->guard('web')->check())

            @if (auth()->guard('web')->user()->type == 'client')
                <li class="nav-item">
                    <a href="{{route('addwork')}}"> الاعلانات</a>

                </li>
            @else
                <li class="nav-item">
                    <a href="{{route('works.index')}}"> الاعلانات</a>

                </li>
            @endif

          @endif

          <li><a href="{{route('contact')}}">أتصل بنا</a></li>
        </ul>
        <div class="button-container" >
            @if (auth()->guard('web')->check())

            <a href="{{route('logout')}}">تسجيل خروج</a>

            @else

                <a href="{{route('login')}}">تسجيل الدخول</a>
                <a href="{{route('register')}}">إنشاء  حساب</a>
            @endif
        </div>
    </header>


    <div class="our-home">

        <div class="content">
            <h1>منصة شغل</h1>
            <h3>للاشغال و التوظيف</h3>
        </div>

        <div class="social">
            <div class="icons">
                <a href="{{$setting->inst_link}}"><i class="fab fa-instagram"></i></a>
                <a href="{{$setting->fb_link}}"><i class="fab fa-facebook"></i></a>
                <a href="{{$setting->tw_link}}"><i class="fab fa-twitter"></i></a>
            </div>
        </div>


    </div>
    </div>

    <div class="info my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-3">
                    <h1>معلومات</h1>
                    <h3>ما هي منصه شغل ؟</h3>
                    <div class="lines">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                    </div>
                    <p>لتبسيط نجاحك في العمل والحياة
                        الأفضل لكل ميزانية ابحث عن خدمات عالية الجودة في كل نقطة
                        سعر. لا توجد أسعار بالساعة ، فقط تسعير قائم على المشروع.
                        جودة العمل تتم بسرعة ابحث عن المستقل المناسب لبدء العمل
                        على مشروعك في غضون دقائق بحث عن المستقل المناسب لبدء العمل على مشروعك في غضون دقائق عرف دائمًا ما ستدفعه مقدمًا. لن يتم تحرير دفعتك حتى توافق على العمل
                    </p>
                    <a class="app-btn dark">المزيد</a>

                </div>
                <div class="col-md-6 my-3">
                    <img src="./images/Group 55.png" alt="">
                </div>
            </div>
            <div class="row my-5">
              <div class="col-lg-6">
                <!-- Swiper -->
                <div class="swiper-container my-3">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{asset('front/assets/images/Mask Group 66.png')}}" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('front/assets/images/Mask Group 66.png')}}" alt=""></div>

                  </div>

                  <!-- Add Arrows -->
                  <div class="swiper-button-prev"></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="icon-container my-3">
                  <div>
                    <img src="{{asset('front/assets/images/quality.svg')}}" alt="">
                       <p>افضل جوده</p>
                  </div>
                  <div>
                    <img src="{{asset('front/assets/images/quality.svg')}}" alt="">
                       <p>افضل جوده</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>


    <div class="our-services py-5">
      <div class="container">
        <div class="header-center">
          <h1>بعض مهام شغل </h1>
          <h3>تعرف اكثر علي مهام موقع شغل</h3>
          <div class=" lines-vertical">
            <div class="line-1"></div>
            <div class="line-2"></div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-4 col-sm-6">
             <div class="content">
              <i class="fas fa-hands-helping"></i>
               <p>الالكترونية</p>
             </div>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="content">
              <i class="fas fa-hands-helping"></i>
              <p>الالكترونية</p>
            </div>
         </div>
         <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="content">
            <i class="fas fa-american-sign-language-interpreting"></i>
            <p>ضيافه</p>
          </div>
        </div>
       <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="content">
          <i class="fas fa-hands-helping"></i>
          <p>ضيافه</p>
        </div>
       </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="content">
        <i class="fas fa-american-sign-language-interpreting"></i>
        <p>الالكترونية</p>
      </div>
     </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="content">
          <i class="fas fa-american-sign-language-interpreting"></i>
          <p>الالكترونية</p>
        </div>
      </div>
        </div>
      </div>
    </div>

    <div class="our-services-2 ">
      <div class="container">
        <div class="header-center">
          <h1>بعض مهام شغل </h1>
          <h3>تعرف اكثر علي مهام موقع شغل</h3>
          <div class=" lines-vertical">
            <div class="line-1"></div>
            <div class="line-2"></div>
        </div>
        </div>
        <div class="row">

              @foreach ($records as $record)
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">

                    <img src="{{asset($record->media()->first()->url)}}" alt="" height="250" style="max-height: 250px">

                    <div class="body">

                        <div class="top">
                        <div class="left">
                            <div>
                            <p> {{  $record->title }} </p>
                            <img src="{{asset('front/assets/images/saudi-arabia.svg')}}" alt="saudi-arabia">
                            </div>
                            @foreach ($record->categories as $cat)
                                    {{optional($cat)->name}} <br>
                                @endforeach                            </div>
                        <div class="right">
                            (20 تقييم )
                            <span><i class="fas fa-star"></i> 4.5</span>
                        </div>
                        </div>
                        <div class="bottom">
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            250 ريال
                        </div>
                        <div>
                            <i class="far fa-clock"></i>
                            قبل 3 دقائق
                        </div>
                        </div>
                    </div>
                    </div>
                </div>



                @endforeach



          </div>




          </div>
      </div>
    </div>


    <div class="ratings">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7">
            <div class="rating-main">
              <div class="right">
                <h2>التقيمات</h2>
                <div class="content">
                  <h4>ماذا يتحدث نحن نوظف الأفضل فقط
                    مساعدين على هذا الكوكبعن شغل</h3>
                    <div class=" lines">
                      <div class="line-1"></div>
                      <div class="line-2"></div>
                    </div>
                  <p>يمكننا المساعدة في مهام عملك وحياتك الشخصية ،
                    مما يتيح لك التركيز على ما هو أكثر أهمية.
                    ببساطة هناك العديد من الاختلافات في فقرات المتاحة
                    ، ولكن الغالبية.</p>
                </div>
              </div>
              <div class="left">
                <div>
                  <div class="icon-container">
                      <img src="{{asset('front/assets/images/computer.svg')}}" alt="تصميم">
                      <span>256</span>
                  </div>
                  <h4>التصميم</h4>
                </div>
                <div>
                  <div class="icon-container">
                      <img src="((asset('front/assets/images/insurance.svg')}}" alt="تصميم">
                      <span>240</span>
                  </div>
                  <h4>التصميم</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 p-0">
            <div class="img-container">
              <img src="{{asset('front/assets/images/rate.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>



    </div>

    <div class="contact-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img src="{{asset('front/assets/images/contact.png')}}" alt="">
          </div>
          <div class="col-lg-6">
          <form action="{{route('user.contact')}}" method="post">
                             @csrf
              <h1>معلومات</h1>
              <h3>نحن نفضل ان نسمع منك؟</h3>
              @include('flash::message')

              <div class=" lines">
                <div class="line-1"></div>
                <div class="line-2"></div>
               </div>
                <div class="input-container">

                  <input type="text" name="name" placeholder="الأسم">
                  <input type="email" name="email" placeholder="الايميل">
                </div>
                <div class="input-container">
                  <input type="text" name="phone" placeholder="رقم الموبايل">
                  <input type="text" name="field" placeholder="المجال">
                </div>
                <textarea  id=""  name="content"placeholder="أكتب تعليقك" cols="30" rows="10" placeholder=""></textarea>
                <button type="submit" class="app-btn dark">
                  ارسال
                </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <a href="#" class="scrolltop">
    <i class="fas fa-angle-up"></i>
  </a>


    <footer>
    <div class="container">
      <div class="row">
        <div class="col-10 m-auto">
          <div class="row m-auto">
            <div class="col-md-4">
              <h3>موقع شغل</h3>
              <ul>
                <li><a href="">من نحن</a></li>
                <li><a href="">كيف يعمل الموقع</a></li>
                <li><a href="">انشاء خدمتك الخاصه</a></li>
                <li><a href="">إعرف كيف نضمن حقوقك</a></li>
                <li><a href="">بوابة العمل الحر</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h3>مجتمع شغل</h3>
              <ul>
                <li><a href="">نماذج أعمال قمت بتنفيذها</a></li>
                <li><a href="">طلبات الخدمات غير موجودة</a></li>
                <li><a href="">تجارب و قصص المستخدمين</a></li>
                <li><a href="">أمور عامة حول نرد</a></li>
                <li><a href="">بوابة الدعم</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h3>وسائل الدفع</h3>
              <img src="{{asset('front/assets/images/Group 1903.png')}}" alt="وسائل الدفع">
              <h3>تابع شغل</h3>
              <div class="icons">
                <div class="icons">
                    <a href="{{$setting->inst_link}}"><i class="fab fa-instagram"></i></a>
                    <a href="{{$setting->fb_link}}"><i class="fab fa-facebook"></i></a>
                    <a href="{{$setting->tw_link}}"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </footer>
  </body>
<script src="{{asset('front/assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('front/assets/js/popper.min.js')}}"></script>
<script src="{{asset('front/assets/js/bootstrap.min.js')}}}"></script>
<script src="{{asset('front/assets/js/all.min.js')}}"></script>
<script src="{{asset('front/assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/assets/js/main.js')}}"></script>


</html>



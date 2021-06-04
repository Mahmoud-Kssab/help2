@extends('front.layouts.master')
@section('content')



  <section id="contact-us" >
    @include('front.layouts.nav')

    <div class="profile-home">
          <div class="content">
              <h3>تواصل معنا</h3>
          </div>
    </div>


<!---------- form contact us  ------------->
<div class="container">

    <div class="row justify-content-center ">
        <div class="col-12">
            <div class="form-container py-5 ">
               <div class="header-center">
                   <h4>  تواصل معنا </h4>
                   <h2> نحن نحب أن نسمع منك</h2>
                   <div class=" lines-vertical">
                     <div class="line-1"></div>
                     <div class="line-2"></div>
                 </div>
                </div>
               {{-- <form>
                   <div class="input-container">
                       <input type="text" placeholder="الأسم">
                       <input type="email" placeholder="الايميل">
                   </div>
                   <div class="input-container">
                       <input type="text" placeholder="الهاتف">
                       <input type="text" placeholder="خدمة">
                   </div>
                   <textarea name="" id="" placeholder="اكتب الرساله" cols="30" rows="8"></textarea>
                   <button>تأكيد</button>
               </form> --}}

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
@stop


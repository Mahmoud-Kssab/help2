@extends('front.layouts..master') 
@section('content')
    </div>
    <div class="profile-home">
      <div class="content">
          <h3> اعلاناتي</h3>
          <h1>ابو عدنان السوري</h1>
      </div>
   </div>
 
  


   
   <div class="adverrisements-container">
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

                    <img src="{{asset('front/assets/images/ad.png')}}" alt="">

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



  

  </section>
  

  
  <a href="#" class="scrolltop active">
    <i class="fas fa-angle-up"></i>
  </a>

@stop

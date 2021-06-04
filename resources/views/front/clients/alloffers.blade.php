@extends('front.layouts..master')
@section('content')

  <section id="all-offers" >
     @include('front.layouts.nav')


     <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- add candidates-management section  -->
                <div class="candidates-management">
                    <h1>العروض  </h1>
                    <!-- <h3>   تاريخ الاعمال و الاراء</h3> -->
                    <div class="lines">
                      <div class="line-1"></div>
                      <div class="line-2"></div>
                    </div>
                    <div class="body">
                 @if(count($offer))
                    @foreach($offer as $record)

                        <div class="body-container">
                            @if ($record->user()->first()->media()->exists())

                                <img src="{{$record->user()->first()->media()->first()->url}}" alt="">
                            @endif
                          <div class="content">
                            <h5>{{$record->user()->first()->name}}</h5>                              <p>
                            <a href=""><i class="far fa-envelope"></i> {{$record->user()->first()->email}}</a>
                            <a href=""><i class="fas fa-phone-alt"></i> {{$record->user()->first()->phone}}</a>
                          </p >
                          <span class="rates">
                              <span class="rate-num">
                              {{$record->user()->first()-> personal_rate}}

                              </span>
                              <div class="rateYo customer-1" data-rate="3.5"></div>
                          </span>
                          <div class="links-container">
                              {{-- <a href=""><i class="far fa-file-alt"></i>   الملف الشخصى </a> --}}
                              <a href="{{route('chat.index', $record->user()->first()->id)}}" target="_blank" ><i class="far fa-envelope"></i>ارسال رساله</a>
                          </div>
                          </div>
                        </div>

                       @endforeach
                       @else
                       <div class="alert text-center" role="alert">
                         لا يوجد عروض
                       </div>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>




</section>



  <a href="#" class="scrolltop">
    <i class="fas fa-angle-up"></i>
  </a>






  @stop



@extends('front.layouts.master')
@section('content')


<section id="works" >
    @include('front.layouts.nav')

 <!-- start works container  -->
 <div class="works-container">
    <div class="container">
        <div class="row">



            @if (count($works))

            @foreach ($works as $work)

                <div class="col-lg-4 col-md-6">
                    <div class="works-card">
                        <div class="header">
                                <img src="{{$work->media()->first()->url}}" alt="">
                                {{-- <i class="fas fa-briefcase"></i> --}}
                            <div>
                                <a href="{{route('works.show', $work->id)}}">{{$work->title}}</a>



                                @foreach ($work->categories()->get() as $cat)
                                   <h4>{{$cat->name}}</h4>
                                @endforeach

                            </div>
                        </div>
                        <div class="body">
                            <span class="star"><i class="fas fa-star"></i></span>
                            <div class="content">
                                <p><i class="fas fa-map-marker-alt"></i> {{$work->address}}</p>
                                <p><i class="fas fa-briefcase"></i>دوام كامل</p>
                            </div>
                            <div class="content">
                            <p><i class="far fa-clock"></i> {{$work->ex_date}} </p>
                        </div>
                        </div>
                    </div>
                </div>

            @endforeach
            @else

            <div class="alert alert-success" style="width:100%" role="alert">
              <p class="text-center">لا توجد اعللانات</p>
            </div>

          @endif

        </div>
    </div>
  </div>
<!-- end of works container  -->




@stop

@extends('front.layouts.master')
@section('content')


<section id="job" >
    @include('front.layouts.nav')

    <div class="profile-home">
        <div class="jobs-container">
          <div class="container">
            <div class="row">

              <div class="col-md-9 my-2 d-flex align-items-end">
                <div class="main">

                    @if ($work->user()->exists())

                        @if ( $work->user()->first()->media()->first() )

                        <img src="{{asset($work->user()->first()->media()->first()->url)}}" alt="">
                        @else
                        <img src="{{asset('front/assets/images/avatar.jpg')}}" alt="">
                        @endif
                    @endif

                  <div class="content">
                    <div class="headers">
                      <h5>{{$work->user()->first()->name}}</h5>
                      <h6> صاحب العمل</h6>
                    </div>
                    <span class="rates">
                      <span class="rate-num">
                        {{round($work->user()->first()->personal_rate)}}
                      </span>
                      <div class="rateYo" data-rate="{{$work->user()->first()->personal_rate}}"></div>
                    </span>
                  </div>
                  <div class="flag">
                    {{-- <img src="./images/saudi-arabia.svg" alt=""> --}}
                    {{$work->address}}
                  </div>
                </div>
              </div>
              {{-- <div class="col-md-3 my-2 d-flex align-items-end">
                <div class="salary">
                  <h5>الراتب بالنسبه للعمل</h5>
                  <h4>$10K - 30K$</h4>
                </div>
              </div> --}}
            </div>
          </div>
        </div>

      </div>


      <!----------------------------- start jobs details ----------------->
      <div class="job-details my-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="right">
                <h1>تفاصيل العمل</h1>
                <div class="lines">
                  <div class="line-1"></div>
                  <div class="line-2"></div>
                </div>
                <p>
                    {{$work->des}}
                </p>

              </div>
            </div>
            <div class="col-lg-4">

                @include('flash::message')

                <div class="left">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    @if ( $offer)
                        <button type="button" class="apply btn btn-dengar" disabled >
                            لقد قمت بالتقديم من قبل
                        </button>
                    @else
                        <button type="button" class="apply" data-toggle="modal" data-target="#staticBackdrop">
                            التقديم للوظيفه
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    @endif

                  <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> تقدم الان</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h4>تقديم</h4>

                    <form action="{{route('offer.store')}}" method="POST">
                        @csrf
                        {{-- pass work id to the request  --}}
                        <input type="hidden" name="work_id" value="{{$work->id}}">


                        <div class="input-container">
                            <input id="title" name="title" placeholder=" العرض" type="text" >
                            <label for="title"><i class="fas fa-stopwatch"></i></label>

                        </div>

                        <div class="input-container">
                            <label for="content"><i class="fas fa-money-check-alt"></i></label>
                            <input  id="content" name="content"  placeholder="نبذة عن العرض" type="textarea">


                        </div>

                        <div class="input-container">
                            <label><i class="fas fa-money-check-alt"></i></label>
                            <input  id="min_price" name="min_price" min="0" placeholder="من" type="number" >
                            <input  id="max_price" name="max_price" placeholder="الي" type="number" >

                        </div>

                        <div class="input-container">
                            <label for="email"><i class="fas fa-money-check-alt"></i></label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="save" >تقديم</button>
                          </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>


                  <div class="content">
                    <h5>ملخص العمل</h5>

                    <div class="text">
                      <i class="fas fa-map-marker-alt"></i>
                      <div>
                        <h6>{{$work->user()->first()->city()->first()->governorate()->first()->name}}</h6>
                        <p>{{$work->address}}</p>
                      </div>

                    </div>
                    <div class="text">
                      <i class="fas fa-briefcase"></i>
                      <div>
                        <h6>نوع العمل</h6>
                        <p>دوام كامل</p>
                      </div>
                    </div>
                    <div class="text">
                      <i class="far fa-clock"></i>
                      <div>
                        <h6>تاريخ العرض</h6>
                        <p>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work->created_at)->format('Y-m-d')}}</p>
                      </div>

                    </div>



                    <div class="text">
                        <i class="far fa-clock"></i>
                        <div>
                            <h6>تاريخ الانتهاء</h6>
                            <p>{{ $work->ex_date}}</p>
                        </div>

                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!----------------------------- end of jobs details ---------------->



@stop




@push('js')

<script>


  /* Javascript of show rates */
  $(function () {
    customerRate = $(".rateYo").attr('data-rate')

    $(".rateYo").rateYo({
      rating: +customerRate,
      readOnly: true,
      ratedFill: "#FEBE42",
      normalFill: "#ABABAB",
      starWidth: "25px"
    });
  });


</script>
@endpush


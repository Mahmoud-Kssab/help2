@extends('layouts.main')
@section('page_title')
اضافة المدن
@endsection

@section('content')

    <section class="content-header">
        <h1>
            لوحة التحكم
            <small>المدن</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
            <li><a href="{{route('city.index')}}">  المدن </a></li>
            <li class="active">اضافة مدينة</li>
        </ol>
    </section>





    <section class="content">
        <!-- row opened -->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h4 class="card-title mg-b-0"> اضافة المحافظات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div><!-- /.box-header -->
                <div class="box-body">

                {{-- inject Governorate Model --}}
                @inject('model','App\Models\Governorate')


                @include('flash::message')
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                {!! Form::model($model,[
                    'action' => 'Admin\Main\CityController@store'
                    ]) !!}

                    <div class="form-group">
                    <label>الاسم</label>
                    {!! Form::text('name',null,[
                        'class' => 'form-control'
                    ]) !!}

                    </div>

                    <div class="form-group">

                        <label>محافظة</label>
                        @inject('governorates','App\Models\Governorate')
                        {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, ['class' => 'form-control','id'=>'governorates','placeholder'=>'المحافظة']) !!}

                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary"> حفظ </button>
                    </div>

                    {!! Form::close() !!}
                  </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->


        <!-- main-content closed -->
    </section>



@endsection
@section('js')

@endsection

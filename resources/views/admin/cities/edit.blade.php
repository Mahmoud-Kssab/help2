@extends('layouts.main')
@section('page_title')
تعديل المدن
@endsection

@section('content')


<section class="content-header">
    <h1>
        لوحة التحكم
        <small>المدن</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li><a href="{{route('governorate.index')}}">  المدن </a></li>
        <li class="active">تعديل المدن</li>
    </ol>
</section>

<section class="content">
    <!-- row opened -->
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h4 class="card-title mg-b-0"> تعديل مدينة</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div><!-- /.box-header -->
            <div class="box-body">

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

                    'action' => ['Admin\Main\CityController@update', $model->id],
                    'method' => 'put'

                ]) !!}

                <div class="form-group">

                    <label>المدينة</label>

                    {!! Form::text('name',null,[
                        'class' => 'form-control'
                    ]) !!}

                </div>

                    {!! Form::Label('governorate', 'المحافظة') !!}
                    {!! Form::select('governorate_id', $governorates, $selectedID, ['class' => 'form-control']) !!}

                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> تعديل </button>
                </div>

                {!! Form::close() !!}

              </div><!-- /.box-body -->
          </div><!-- /.box -->

        </div><!-- /.col -->
      </div><!-- /.row -->


    <!-- main-content closed -->
</section>












    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0"> تعديل المدن</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>

                <div class="card-body">
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
                        'action' => ['Admin\Main\CityController@update', $model->id],
                        'method' => 'put'
                        ]) !!}

                        <div class="form-group">
                        <label>name</label>
                        {!! Form::text('name',null,[
                            'class' => 'form-control'
                        ]) !!}

        </div>

        {!! Form::Label('governorate', 'Governorate:') !!}
        {!! Form::select('governorate_id', $governorates, $selectedID, ['class' => 'form-control']) !!}

        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary"> تعديل </button>
        </div>

        {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--/div-->

    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection

@extends('layouts.main')
@section('page_title')
تواصل معنا
@endsection



@section('content')

<section class="content-header">
    <h1>
        لوحة التحكم
        <small>تواصل معنا</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active">تواصل معنا</li>
    </ol>
</section>


<!-- Main content -->
<section class="content">


    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">تواصل معنا</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            @include('flash::message')
            {!! $dataTable->table([
            'class'=>'dataTable table table-striped table-hover  table-bordered'
            ]) !!}
          </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->
  </div><!-- /.row -->


    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

</section><!-- /.content -->

@endsection

@push('dt_js')
    {!! $dataTable->scripts() !!}
@endpush


@push('js')

@endpush

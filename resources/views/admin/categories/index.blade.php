@extends('layouts.main')
@section('css')
<link href="{{URL::asset('adminlte/js-tree/themes/default/style.css')}}" rel="stylesheet">
@endsection
@section('page_title')
الأقسام
@endsection

@section('content')

<!-- Modal -->
<div id="delete_bootstrap_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">حذف قسم</h4>
        </div>
        {!! Form::open(['url'=>'','method'=>'delete','id'=>'form_Delete_department']) !!}
        <div class="modal-body">
          <h4>
            هل تريد حذف القسم <span id="dep_name"></span>
          </h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">الغاء</button>
          {!! Form::submit("نعم", ['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
      </div>

    </div>
</div>



<section class="content-header">
    <h1>
        لوحة التحكم
        <small>الأقسام</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active">الأقسام</li>
    </ol>
</section>


<!-- Main content -->
<section class="content">


    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">الأقسام</h3>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
            <a href="{{route('category.create')}}" class="btn btn-primary">أضافة قسم</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            @include('flash::message')

            <a href="" class="btn btn-info edit_dep showbtn_control hide" ><i class="fa fa-edit"></i> تعديل</a>
            <a href="" class="btn btn-danger delete_dep showbtn_control hide"  data-toggle="modal" data-target="#delete_bootstrap_modal" ><i class="fa fa-trash"></i> حذف</a>
            <div id="jstree"></div>
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
@endpush



@push('js')

<script src="{{ URL::asset("adminlte/js-tree/jstree.js")}}"></script>
<script src="{{ URL::asset("adminlte/js-tree/jstree.wholerow.js")}}"></script>
<script src="{{ URL::asset("adminlte/js-tree/jstree.checkbox.js")}}"></script>


<script>
        $(document).ready(function(){

            // $(window).not('.box').click(function () {
            //     console.log('ddd');
            //     $('.showbtn_control').addClass('hide')
            // })

    $('#jstree').jstree({
    "core" : {
        'data' : {!! load_dep() !!},
        "themes" : {
        "variant" : "large"
        }
    },
    "checkbox" : {
        "keep_selected_style" : true
    },
    "plugins" : [ "wholerow" ]//checkbox
    });
    });
    $('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    var  name = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
        name.push(data.instance.get_node(data.selected[i]).text);
    }
    $('#form_Delete_department').attr('action','{{ url('admin/category') }}/'+r.join(', '));
    $('#dep_name').text(name.join(', '));
    if(r.join(', ') != '')
    {
        $('.showbtn_control').removeClass('hide');
        $('.edit_dep').attr('href','{{ url('admin/category') }}/'+r.join(', ')+'/edit');
    }else{
        $('.showbtn_control').addClass('hide');
    }


});


</script>



@endpush

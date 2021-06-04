@extends('layouts.main')
@section('page_title')
أضافة أقسام
@endsection

@section('css')
<link href="{{URL::asset('adminlte/js-tree/themes/default/style.css')}}" rel="stylesheet">
@endsection

@section('content')





<section class="content-header">
    <h1>
        لوحة التحكم
        <small>الأقسام</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li><a href="{{route('category.index')}}">  الأقسام </a></li>
        <li class="active">تعديل قسم</li>
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
            <a href="{{route('category.create')}}" class="btn btn-primary">تعديل قسم</a>
        </div><!-- /.box-header -->
        <div class="box-body">
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




        {!! Form::model($model,['method' => 'PATCH','route' => ['category.update', $model->id]]) !!}

           <div class="form-group">
               <div id="jstree"></div>
               <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
           </div>

          <div class="form-group">
              <label>اسم القسم</label>
              {!! Form::text('name',null,[
                  'class' => 'form-control'
                  ]) !!}
           </div>




          <div class="form-group">
            <button type="submit" class="btn btn-primary"> حفظ </button>
          </div>

          {!! Form::close() !!}
          </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->
  </div><!-- /.row -->


    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

</section><!-- /.content -->



@endsection
@push('js')


<script src="{{ URL::asset("adminlte/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>


<!-- Js Tree -->
<script src="{{URL::asset('adminlte/js-tree/jstree.js')}}"></script>
<script src="{{URL::asset('adminlte/js-tree/jstree.wholerow.js')}}"></script>
<script src="{{URL::asset('adminlte/js-tree/jstree.checkbox.js')}}"></script>
<!-- Js Tree -->

<script>
 $(document).ready(function(){

$('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep($model->parent,$model->id) !!},
    "themes" : {
      "variant" : "large"
    }
  },
  "checkbox" : {
    "keep_selected_style" : false
  },
  "plugins" : [ "wholerow" ]
});

});

$('#jstree').on('changed.jstree',function(e,data){
    var i , j , r = [];
    for(i=0,j = data.selected.length;i < j;i++)
    {
        r.push(data.instance.get_node(data.selected[i]).id);
    }
    $('.parent_id').val(r.join(', '));
});


</script>



@endpush

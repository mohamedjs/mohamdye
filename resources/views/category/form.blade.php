@extends('template')
@section('page_title')
  @lang('messages.category')
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('messages.category')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    @if($category)
                    {!! Form::model($category,["url"=>"category/$category->id","class"=>"form-horizontal","method"=>"patch","files"=>"True"]) !!}
                    @include('category.input',['buttonAction'=>'Edit','required'=>'  (optional)'])
                    @else
                    {!! Form::open(["url"=>"category","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                    @include('category.input',['buttonAction'=>''.__('messages.save').'','required'=>'  *'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script>

        $('#category').addClass('active');
        $('#category_create').addClass('active');

    </script>
@stop

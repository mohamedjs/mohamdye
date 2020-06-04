@if(isset($_REQUEST['product_id']))
<div class="form-group">
    <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.content')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select  name="product_id" class="form-control chosen-rtl">
            <option id="category_{{ $_REQUEST['product_id'] }}" value="{{ $_REQUEST['product_id'] }}">{{ $_REQUEST['title']}}</option>
        </select>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.content')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('product_id',$products->pluck('title','id'),null,['class'=>'form-control chosen-rtl','required']) !!}
    </div>
</div>
@endif
<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.operator')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
      <select class="form-control chosen-rtl"  name="operator_id[]" required @if(!$post) multiple @endif>
        @foreach($operators as $operator)
        <option value="{{$operator->id}}" @if($post) @if($post->operator_id == $operator->id) selected @endif @endif>{{$operator->name}}-{{$operator->country->title}}</option>
        @endforeach
      </select>
        <!-- {!! Form::select('operator_id[]',$operators->pluck('name','id'),null,['class'=>'form-control chosen-rtl','id' => 'first_select','required' ,'multiple']) !!} -->
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.published_date') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('published_date',null,['placeholder'=>__('messages.published_date'),'class'=>'form-control js-datepicker' ,'value' => 'date("Y-m-d")' , 'autocomplete' => 'off' ]) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.scheduled.status')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('active',array('1' => 'Active' , '0' => 'Not Active'),null,['class'=>'form-control chosen-rtl','required']) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>

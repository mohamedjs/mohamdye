<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.campain.title')*</label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('title',old('title'), ['class'=>'form-control input-lg','required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.short_code')*</label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('short_code',old('short_code'), ['class'=>'form-control input-lg','required' => 'required']) !!}
    </div>
</div>
{{-- {{dd(old('rtl'))}} --}}
<div class="form-group">
  <label class="col-sm-3 col-lg-2 control-label">@lang('messages.right_to_list') ?*</label>
  <div class="col-sm-9 col-lg-10 controls">
      <select class="form-control chosen-rtl" name="rtl">
          <option value="0">NO</option>
          <option value="1">YES</option>
      </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::button('<i class="fa fa-check"></i> Save',['type'=>'submit','class'=>'btn btn-primary']) !!}
    </div>
</div>

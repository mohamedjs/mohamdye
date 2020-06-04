@extends('template')
@section('page_title')
    @lang('messages.settings')
@stop
@section('content')

<!-- BEGIN Content -->
<div id="main-content">
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>@lang('messages.settings')</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">


                    <form action="{{url('setting')}}" method="post" class="form-horizontal form-bordered form-row-stripped" enctype="multipart/form-data"  novalidate>
              			{!! csrf_field() !!}
                        <input id="hidden_key" name="key" type="hidden" />

                        <div class="form-group">
                            <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.setting_types')</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select id="first_select" class="form-control chosen-rtl">
                                    @foreach ($types as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="textfield5" class="col-sm-3 col-lg-2 control-label">@lang('messages.key') *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="key" id="key" placeholder="@lang('messages.key')" class="form-control" required>
                            </div>
                          </div>

                        <div class="form-group" style="position: relative;">
                                <div id="map" hidden style="height: 300px;overflow:hidden"></div>
                         </div>


                        <div class="form-group"  id="cktextarea">
                            <label class="col-sm-3 col-lg-2 control-label">@lang('messages.value') *</label>
                            <div class="col-sm-9 col-lg-10 controls" >
                                <textarea class="form-control col-md-12 ckeditor" name="Advanced_Text" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="form-group" hidden id="normal_textarea">
                            <label class="col-sm-3 col-lg-2 control-label">@lang('messages.value') *</label>
                            <div class="col-sm-9 col-lg-10 controls" >
                                <textarea class="form-control col-md-12" id="map_value" name="Normal_Text" rows="6"></textarea>
                            </div>
                        </div>


                        <div class="form-group" hidden id="image_div">
                            <label class="col-sm-3 col-lg-2 control-label">@lang('messages.image') *</label>
                            <div class='col-sm-9 col-lg-10 controls'>
                                <div class='fileupload fileupload-new' data-provides='fileupload'>
                                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class='fileupload-preview fileupload-exists img-thumbnail' style='max-width: 200px; max-height: 150px; line-height: 20px;'></div>
                                    <div>
                                                <span class='btn btn-default btn-file'><span class='fileupload-new'>Select image</span>
                                                <span class='fileupload-exists'>Change</span>
                                                <input type='file' name='Image' accept="image/*"></span>
                                        <a href='#' class='btn btn-default fileupload-exists' data-dismiss='fileupload'>Remove</a>
                                    </div>
                                </div>
                                <span class='label label-important'>NOTE!</span>
                                <span>Only extension supported jpg, png, and jpeg</span>
                            </div>
                        </div>

                        <div class="form-group" hidden id="videocont" novalidate>
                          {!! Form::label('Video',\Lang::get('messages.video').'*',['class'=>'col-sm-3 col-lg-2 control-label']) !!}
                          <div class="col-sm-9 col-lg-10 controls">
                              {!! Form::file('Video',["accept"=>"video/*",'class'=>'default']) !!}
                               <span class='label label-important'>NOTE!</span>
                               <span>Only extension supported mp4, flv, and 3gp</span>
                          </div>

                        </div>

                        <div class="form-group" hidden id="audiocont" novalidate>
                            {!! Form::label('Audio',\Lang::get('messages.audio').'*',['class'=>'col-sm-3 col-lg-2 control-label']) !!}
                            <div class="col-sm-9 col-lg-10 controls">
                                {!! Form::file('Audio',["accept"=>"audio/*",'class'=>'default']) !!}
                             <span class='label label-important'>NOTE!</span>
                             <span>Only extension supported mp3, webm, and wav</span>
                            </div>
                        </div>

                        <div class="form-group" hidden id="fileManCont" novalidate>
                            {!! Form::label('File','Extensions Allowed *',['class'=>'col-sm-3 col-lg-2 control-label']) !!}
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control" name="extensions[]" multiple>
                                    <option value="image">Images</option>
                                    <option value="video">Videos</option>
                                    <option value="audio">Audios</option>
                                    <option value="text">Text</option>
                                    <option value="all">All Extensions</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" hidden id="selector">
                            <label class="col-sm-3 col-lg-2 control-label">Value *</label>
                            <div class="col-sm-9 col-lg-10 controls" >
                                <select class="form-control" name="selector">
                                  <option value="1"> True </option>
                                  <option value="0"> False</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="myField" id="myField" value="1" />

                        <div class="form-group last">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>@lang('messages.save')</button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVMkBopYgU1husR7s-iO2ngqirxVSZdw8"></script>
<script type="text/javascript" src="{{url('js/map.js')}}"></script>
<script>

    $('#first_select').on('change', function() {
        $('#key').prop('disabled', false);
        $('#hidden_key').val('') ;
        if (this.value == 1) {
            $('#normal_textarea').hide('slow');
            $('#image_div').hide('slow') ;
            $('#videocont').hide('slow');
            $('#audiocont').hide('slow') ;
            $('#cktextarea').show(1000);
            $('#fileManCont').hide('slow') ;
            $('#selector').hide('slow') ;
            $('#map').hide('slow') ;
            document.getElementById("myField").value = this.value;
        }
        else if (this.value == 2)
        {
            $('#normal_textarea').show(1000) ;
            $('#image_div').hide('slow');
            $('#cktextarea').hide('slow');
            $('#videocont').hide('slow');
            $('#audiocont').hide('slow') ;
            $('#fileManCont').hide('slow') ;
            $('#selector').hide('slow') ;
            $('#map').hide('slow') ;
            document.getElementById("myField").value = this.value;
        }
        else if(this.value == 3)
        {
            $('#normal_textarea').hide('slow');
            $('#image_div').show(1000) ;
            $('#cktextarea').hide('slow');
            $('#videocont').hide('slow');
            $('#audiocont').hide('slow') ;
            $('#fileManCont').hide('slow') ;
            $('#selector').hide('slow') ;
            $('#map').hide('slow') ;
            document.getElementById("myField").value = this.value;
        }
        else if(this.value == 4)
        {
            $('#normal_textarea').hide('slow');
            $('#videocont').show(1000) ;
            $('#cktextarea').hide('slow');
            $('#image_div').hide('slow');
            $('#audiocont').hide('slow') ;
            $('#fileManCont').hide('slow') ;
            $('#selector').hide('slow') ;
            $('#map').hide('slow') ;
            document.getElementById("myField").value = this.value;
        }
        else if (this.value == 5)
        {
            $('#normal_textarea').hide('slow');
            $('#audiocont').show(1000) ;
            $('#cktextarea').hide('slow');
            $('#image_div').hide('slow');
            $('#videocont').hide('slow') ;
            $('#fileManCont').hide('slow') ;
            $('#selector').hide('slow') ;
            $('#map').hide('slow') ;
            document.getElementById("myField").value = this.value;
        }
        else if (this.value == 6)
        {
            $('#normal_textarea').hide('slow');
            $('#audiocont').hide('slow') ;
            $('#cktextarea').hide('slow');
            $('#image_div').hide('slow');
            $('#videocont').hide('slow') ;
            $('#fileManCont').show(1000) ;
            $('#key').prop('disabled', true);
            $('#key').prop('value',"uploadAllow");
            $('#hidden_key').val('uploadAllow') ;
            $('#selector').hide('slow') ;
            $('#map').hide('slow') ;
            document.getElementById("myField").value = this.value;
        }
        else if (this.value == 7)
        {
            $('#normal_textarea').hide('slow');
            $('#audiocont').hide('slow');
            $('#cktextarea').hide('slow');
            $('#image_div').hide('slow');
            $('#videocont').hide('slow') ;
            $('#fileManCont').hide('slow') ;
            $('#map').hide('slow') ;
            $('#selector').show(1000) ;
            document.getElementById("myField").value = this.value;
            console.log(this.value);
        }

        else if (this.value == 8)
        {
            $('#normal_textarea').hide('slow');
            $('#audiocont').hide('slow');
            $('#cktextarea').hide('slow');
            $('#image_div').hide('slow');
            $('#videocont').hide('slow') ;
            $('#fileManCont').hide('slow') ;
            $('#selector').hide('slow') ;
            $('#map').show(1000) ;
            document.getElementById("myField").value = this.value;
            google.maps.event.addDomListener(window, 'load', initMap());
        }



    });

    $('#setting').addClass('active');
    $('#setting-create').addClass('active');
</script>
@stop

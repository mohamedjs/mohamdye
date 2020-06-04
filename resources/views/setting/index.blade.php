@extends('template')
@section('page_title')
	@lang('messages.settings')
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i>@lang('messages.settings_table')</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="{{url('setting/new')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
							<?php
								$table_name = "settings" ;
								// pass table name to delete all function
								// if the current route exists in delete all table flags it will appear in view
								// else it'll not appear
							?>
							@include('partial.delete_all')
						</div>
					</div>
					<br><br>
					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:18px"><input type="checkbox" onclick="select_all('settings')"></th>
								<th>@lang('messages.key')</th>
								<th>@lang('messages.value')</th>
								<th class="visible-md visible-lg" style="width:130px">@lang('messages.action')</th>
							</tr>
						</thead>
						<tbody id="tablecontents">
						@foreach($settings as $setting)
							<tr class="table-flag-blue">
								<td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$setting->id}}" onclick="collect_selected(this)"></td>
								<td>{{$setting->key}}</td>
								<td>
									@if(file_exists($setting->value))
                                     @if($setting->type_id == "3")
										<img src="{{url($setting->value)}}" width="300" height="225">
                                     @elseif($setting->type_id == "4")
                                       <video controls="" width="300" height="225">
                                        	<source src="{{url($setting->value)}}" preload="none">
                                        </video>
                                     @elseif($setting->type_id == "5")
                                       <audio controls="">
                                            <source src="{{url($setting->value)}}" type="audio/mpeg" preload="none">
                                        </audio>
                                     @endif
									@elseif($setting->type->title == 'selector')
										@if($setting->value)
										 True
										@else
										 False
										@endif
									@elseif($setting->key == 'service_center')
										<a href="{{ url('clients/service_center') }}">Service Center</a>
									@else
										{!! $setting->value !!}
									@endif
								</td>
								<td class="visible-md visible-lg">
								    <div class="btn-group">
								    	<a class="btn btn-sm show-tooltip" title="" href="{{url('setting/'.$setting->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
								        <a class="btn btn-sm btn-danger show-tooltip" title="" onclick = 'return ConfirmDelete()' href="{{url('setting/'.$setting->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
								    </div>
								</td>
							</tr>
                        @endforeach
                        @foreach($static_translations as $static_translation)
                        <tr class="table-flag-blue">
                            <th><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$static_translation->id}}" class="roles" onclick="collect_selected(this)"></th>
                            <td>{{$static_translation->key_word}}</td>
                            <td>
                                @if(strlen($static_translation->getBody()) < 50)
                                    <ul>
                                        @foreach($languages as $language)
                                            <li>
                                                {!!$static_translation->getBody($language->short_code)!!}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <a href="{{url('static_translation/'.$static_translation->id)}}" title="View Translation">View Translation</a>
                                @endif
                            </td>
                            <td class="visible-md visible-lg">
                                <div class="btn-group">
                                    <a class="btn btn-sm show-tooltip" title="" href="{{url('static_translation/'.$static_translation->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('static_translation/'.$static_translation->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
						</tbody>
						</table>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@stop
@section('script')
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

    // $(function () {
    // $("#example").DataTable();
		//
    // $( "#tablecontents" ).sortable({
    //   items: "tr",
    //   cursor: 'move',
    //   opacity: 0.6,
    //   update: function() {
    //       sendOrderToServer();
    //   }
    // });
		//
    // function sendOrderToServer() {
    //   var order = [];
    //   $('tr.table-flag-blue').each(function(index,element) {
    //     order.push({
    //       id: $(this).attr('data-id'),
    //       position: index+1
    //     });
    //   });
		//
    //   $.ajax({
    //     type: "POST",
    //     dataType: "json",
    //     url: "{{ url('sortabledatatable') }}",
    //     data: {
    //       order:order,
    //       _token: '{{csrf_token()}}'
    //     },
    //     success: function(response) {
    //         if (response.status == "success") {
    //           console.log(response);
    //         } else {
    //           console.log(response);
    //         }
    //     }
    //   });
		//
    // }
    // });

    </script>
	<script>
		$('#setting').addClass('active');
		$('#setting-index').addClass('active');
	</script>
@stop

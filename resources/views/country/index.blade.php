@extends('template')
@section('page_title')
	@lang('messages.country.countries')
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> @lang('messages.countries_table')</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="{{url('country/create')}}" data-original-title="Add new country"><i class="fa fa-plus"></i></a>
							<?php
								$table_name = "countries" ;
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
								<th>@lang('messages.campain.title')</th>
								<th class="visible-md visible-lg" style="width:130px">@lang('messages.action')</th>
							</tr>
						</thead>
						<tbody id="tablecontents">
						@foreach($countrys as $country)
							<tr class="table-flag-blue">
								<td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$country->id}}" onclick="collect_selected(this)"></td>
								<td>{{$country->title}}</td>
								<td class="visible-md visible-lg">
								    <div class="btn-group">
											<a class="btn btn-sm btn-success show-tooltip" title="@lang('messages.add_operator')" href="{{url("operator/create?country_id=".$country->id."&title=".$country->title)}}" data-original-title="Add Operator"><i class="fa fa-plus"></i></a>
								    	<a class="btn btn-sm show-tooltip" title="" href="{{url('country/'.$country->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
								      <a class="btn btn-sm btn-danger show-tooltip" title="" onclick = 'return ConfirmDelete()' href="{{url('country/'.$country->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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

    $(function () {
    	$("#example").DataTable();

    });

    </script>
	<script>
	$('#country').addClass('active');
	$('#country_index').addClass('active');
	</script>
@stop

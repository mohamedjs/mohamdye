@extends('template')
@section('page_title')
 @lang('messages.post')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-black">
                    <div class="box-title">
                        <h3><i class="fa fa-table"></i> @lang('messages.post')</h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-product">
                        <div class="btn-toolbar pull-right">
                            <div class="btn-group">
                                <a class="btn btn-circle show-tooltip" title="" href="{{url('post/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                                <?php
                                $table_name = "posts";
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
                                        <th style="width:18px"><input type="checkbox" onclick="select_all('posts')"></th>
                                        <th>@lang('messages.products')</th>
                                        <th>@lang('messages.published_date')</th>
                                        <th>@lang('messages.scheduled.status')</th>
                                        <th>@lang('messages.url')</th>
                                        <th>@lang('messages.users.users')</th>
                                        <th>@lang('messages.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$product)
                                    @foreach($product->operators as $value)
                                    <tr>
                                        <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$value->id}}" class="roles" onclick="collect_selected(this)"></td>
                                        <td>
                                            @foreach($languages as $language)
                                            <li> <b>{{$language->title}} :</b> {{$product->getTranslation('title',$language->short_code)}}</li>
                                            @endforeach
                                        </td>
                                        <td>{{$value->pivot->published_date}}</td>
                                        <td>@if($value->pivot->active) active @else not active @endif</td>
                                        <td>
                                          <input type="text"  id="url_h{{$value->id}}{{$key}}{{$value->pivot->id}}" value="{{$value->pivot->url}}">
                                          <span class="btn">{{$value->country->title}}-{{$value->name}}</span>
                                          <span class="btn" onclick="x = document.getElementById('url_h{{$value->id}}{{$key}}{{$value->pivot->id}}'); x.select();document.execCommand('copy')"> <i class="fa fa-copy"></i> </span>
                                          <br>
                                        </td>
                                        <td>{{DB::table('users')->where('id',$value->pivot->user_id)->first()->name}}</td>
                                        </td>
                                        <td class="visible-md visible-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-sm show-tooltip" href="{{url("post/".$value->pivot->id."/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("post/".$value->pivot->id."/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('script')
<script>


$('#post').addClass('active');
$('#post_index').addClass('active');

</script>
@stop

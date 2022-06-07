@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
@include('flash-message')
<div class="row mb-2">
<div class="col-sm-6">
<h1>{{ __('messages.user_list') }}</h1>
</div>
<div class="col-sm-6">
    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/create" >{{ __('messages.create_new_user') }}</a>
{{--    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/export" >{{ __('messages.download_user_list') }}</a>
    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/print" >{{ __('messages.print_user_list') }}</a>--}}
{{--    <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/users/printpreview" >Print Preview</a>--}}
</div>
</div>
@stop

@section('content')
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="20px">{{ 'S.N.' }}</th>
                <th>{{ 'Name' }}</th>
                <th>{{ 'Email' }}</th>
                <th>{{ 'Created Date' }}</th>
                <th width="300px">{{ 'Action' }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@stop

<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="{{ asset('css/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>
<script src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('js/datatables/dataTables.bootstrap4.min.js') !!}"></script>

<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
		drawCallback: function () {
                    $(".user-del-btn").click(function () {
                        let r = confirm('Are you sure you want to delete this item?');
                        return (r === true);
                    })
                },
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
		columnDefs: [
			{
				orderable: false,
				targets: [0,4]
			},
			{
				searchable: false,
                targets: [0,4]
			}
		],
    });
  });
 </script>

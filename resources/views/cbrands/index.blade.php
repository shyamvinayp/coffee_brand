@extends('adminlte::page')
@section('title', 'Coffee Brand | Lara Admin')

@section('content_header')
@include('flash-message')
<div class="row mb-2">
<div class="col-sm-6">
<h1>{{ 'Coffee Brands' }}</h1>
</div>
    <div class="col-sm-6">
        <a class="btn btn-info float-sm-right ml-2" href="{{URL::to('/')}}/cbrands/create" >{{ 'Create Coffee Brand' }}</a>
    </div>
</div>
@stop

@section('content')
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="20px">{{ 'Sr. No' }}</th>
                <th>{{ 'Name' }}</th>
                <th>{{ 'Image' }}</th>
                <th>{{ 'Vote Count' }}</th>
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
                    $(".brand-del-btn").click(function () {
                        let r = confirm('Are you sure you want to delete this item?');
                        return (r === true);
                    })
                },
        serverSide: true,
        ajax: "{{ route('cbrands.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image'},
            {data: 'votes', name: 'votes'},
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

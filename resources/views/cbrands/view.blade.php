<?php $yesNoOoptions = [''=> '--select--', 'yes' => 'Yes', 'no' => 'No'] ?>
@extends('adminlte::page')
<script src="{!! asset('js/datatables/jquery.js') !!}"></script>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('flash-message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>{{ 'Post View' }}</h4></div>
                    <div class="card-body">
                        <div class="spinloading"></div>
                        <div id="showMessage" class="center"></div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ 'Name' }}</label>
                            <div class="col-sm-9">
                                {{  $coffeeBrand->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ 'Coffee Brand Logo' }}</label>
                            <div class="col-sm-9">
                                <img src="{{  asset('storage/app/public/uploads/'.$coffeeBrand->image)    }}" width="120px" alt="" title="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-sm-9 text-right">
                                @if($isVoted)
                                    <a href="#" title="User already voted to this brand!" class="btn btn-secondary disabled" data-id="{{ $coffeeBrand->id }}" id="voteButton1" >Vote</a>
                                @else
                                <a href="#" class="btn btn-primary"  data-id="{{ $coffeeBrand->id }}" id="voteButton" >Vote</a>
                                @endif
                                <a href="#"><button onclick="window.history.back();" class="btn btn-primary hBack" type="button">{{ 'Back' }}</button></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    @include('cbrands.partials.create-edit-scripts')
@endsection



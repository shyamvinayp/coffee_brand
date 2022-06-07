<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ 'Name' }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::text('name', null, [
          'class' => 'form-control',
          'required'                      => 'required',
          'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
</div>

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ 'Image' }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::file('image', null, [
            'class' => 'form-control',
            'required'                      => 'required',
            'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('image') }}</span>
    </div>
</div>

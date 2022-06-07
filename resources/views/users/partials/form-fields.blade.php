<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.name') }}<span style="color:red;"> *</span></label>
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
    <label for="address_1" class="col-md-4 col-form-label text-md-right">{{ __('messages.email') }}<span style="color:red;"> *</span></label>
    <div class="col-md-6">
        {!! Form::text('email', null, [
            'class' => 'form-control',
            'required'                      => 'required',
            'data-parsley-trigger'          => 'change focusout',
          ]) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>
</div>

@if(empty($user))
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}<span style="color:red;"> *</span></label>
        <div class="col-md-6">
        <input id="password" required type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@endif


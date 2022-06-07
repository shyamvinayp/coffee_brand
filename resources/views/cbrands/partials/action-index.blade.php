@if(Auth::user())

    <div class="text-center" style="width:100%; min-width:80px">
        <form method="POST" action="{{URL::to('/')}}/cbrands/{{ $cbrand->id }}" accept-charset="UTF-8" style="display:inline;">
            <input name="_method" value="DELETE" type="hidden"><input name="_token" value="{{ csrf_token() }}" type="hidden">
            <button class="btn btn-xs btn-danger brand-del-btn" style="padding: 8px 13px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </form>
        <a href="{{URL::to('/')}}/cbrands/{{ $cbrand->id }}/view" class="btn btn-xs btn-info" style="padding: 8px 13px;"><i class="fa fa-eye"></i></a>
    </div>
@endif

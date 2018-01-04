  <div class="row">
    <div class="col-md-10 col-md-offset-1 jumbotron">
  @if (isset($request) && $request->session()->has('msg'))
      {{{ $request->session()->get('msg') }}}
  @endif
    </div>
  </div>

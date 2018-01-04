  <div class="col-md-10 col-md-offset-1 overlap" style="margin-top: 10px;">
    {!! $page->passage !!}
  </div>
  <div class="col-md-10 col-md-offset-1" style="margin-top: 10px;">
        {{ csrf_field() }}
        <div class="form-group">
            @if(isset($page->statement)))
              {!! '<b>'.$page->statement.'</b>' !!}
            @endif

            @foreach($options as $option)
              <div class="radio">
                  <input type="radio" name="option" value="{{ $option->oid }}" required> {!! $option->content !!}
              </div>
            @endforeach
                  </div>

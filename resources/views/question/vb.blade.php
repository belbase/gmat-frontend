  @if ($page->type=='passage')
    <div class="col-md-6" style="height:100%; overflow-y:auto;overflow-x:hidden;">
      {!! $page->passage !!}
    </div>
    <div class="col-md-6">
      {{ csrf_field() }}
      @if(isset($page->statement))
        {!! '<b>'.$page->statement.'</b>' !!}
      @endif
      <table class="table table-hover">
      @foreach($page->options as $option)
        <tr>
          <td><input type="radio" name="option" value="{{ $option->oid }}" required></td>
          <td>{!! $option->content !!}</td>
      </tr>
      @endforeach
    </table>
    </div>
  @else
    <div class="col-md-10 col-md-offset-1 overlap" style="height:50%;overflow-y:auto;overflow-x:hidden;">
      {!! $page->passage !!}
    </div>
    <div class="col-md-10 col-md-offset-1" style="height:80%;overflow-y:auto;overflow-x:hidden;">
          {{ csrf_field() }}
          <div class="form-group">
              @if(isset($page->statement))
                {!! '<b>'.$page->statement.'</b>' !!}
              @endif

              <table class="table table-hover">
              @foreach($page->options as $option)
                <tr>
                  <td><input type="radio" name="option" value="{{ $option->oid }}" required></td>
                  <td>{!! $option->content !!}</td>
              </tr>
              @endforeach
            </table>
          </div>

  @endif

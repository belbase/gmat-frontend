  <div class="col-md-10 col-md-offset-1" style="margin-top: 10px;">
      {!! $page->passage !!}
    </div>
    <div class="col-md-10 col-md-offset-1" style="margin-top: 10px;">
          {{ csrf_field() }}
          <div class="form-group">
              @foreach(json_decode($page->opt) as $id => $name)
                <div class="radio">
                    <input type="radio" name="option" value="{{ $id }}" required> {!! $name !!}
                </div>

              @endforeach
          </div>

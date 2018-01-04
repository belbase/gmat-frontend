    <div class="division" style="height:280px; overflow-y:auto;overflow-x:hidden;">
      {!! $page->passage !!}
    </div>
    <div class="division form-group">
      {{ csrf_field() }}
          <textarea name="response" class="form-control editor" rows="8" cols="80" placeholder="Write Here..." required></textarea>
    </div>

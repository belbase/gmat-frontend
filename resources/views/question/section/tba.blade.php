<?php
$data=(array) json_decode($page->opt);
if(count($data)!=0):
  ?>
    <div class="col-md-6">
      {!! $page->passage !!}
    </div>
    <div class="col-md-6">
      {{ csrf_field() }}
      <table class="table table-hover">
        <tr>
        @foreach ($data['hd'] as $item)
            <th><span class="p">{{ $item }}</span></th>
        @endforeach
        </tr>
        @foreach ($data['opt'] as $id => $item)
          {!! '<tr>' !!}
          {!! '<td><input type="radio"id="'.$id.'" name="'.$id.'" value="0" required/></td>' !!}
          {!! '<td><input type="radio"id="'.$id.'" name="'.$id.'" value="1" required/></td>' !!}
          {!! '<td><span class="p">'.$item.'</span></td>' !!}
          {!! '</tr>' !!}
        @endforeach
      </table>

      {{-- <input class="btn btn-primary" type="submit" name="Submit" value="submit"/> --}}
    </div>
  <?php
endif;
?>

<?php
  $data=(array) json_decode($page->opt);
  if(count($data)!=0):
    ?>
    <div class="col-md-12 overlap">
      {!! $page->passage !!}
    </div>
    <div class="col-md-12">
      {{ csrf_field() }}
      @foreach ($data['statement'] as $id => $item)
        <?php
        $val=$data['option'];
        $valt = $val->{$id};
        $array = "<select name='".$id."' required>
            <option>--select--</option>";
            ?>
            @foreach ($val->{$id}; as $key => $value)
              <?php $array.="<option value='".$key."'>".$value."</option>"; ?>
            @endforeach
            <?php
          $array.="</select>";
        ?>
        <p>{{{ strtoupper($id) }}}).{!! str_replace("[SEL]",$array,$item) !!}</p>
        <?php unset($arrayy); ?>
      @endforeach
      {{-- <input class="btn btn-primary" type="submit" name="Submit" value="submit"/> --}}
    </div>
          <?php
  endif;

?>

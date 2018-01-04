
<form class="" action="/dashboard/upload/image" method="post" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <input type="file" name="image" class="form-control">
  <input type="submit" name="submit" value="Upload" class="btn btn-primary">
</form>

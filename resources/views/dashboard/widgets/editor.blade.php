<div class="editor col-md-9">
  <input class="editor-title form-control input-lg" name="title" value="@if (isset($content->title)){{ $content->title }}@endif" placeholder="Title"/><hr/>
  <input type="hidden" name="db" value="{{{ $db }}}"/>
  @if (isset($id))
    <input type="hidden" name="id" value="{{{ $id }}}">
  @endif
    <input type="file" name="image" id="image" hidden>
    <div id="editor">
    </div>
  <i class="loader-icon fa fa-spinner fa-pulse fa-3x fa-fw"></i>
</div>
<script src="https://rawgit.com/Biggo6/biggojs/master/biggo.js"></script>
<script src="{{ asset('/assets/js/question.js') }}" charset="utf-8"></script>
<script>
$(document).ready(function(){
  //edit Options

  function btalert(alertType,message){
    var indicator = [];
    indicator["success"] = "Well done!";
    indicator["danger"] = "Oh snap!";
    indicator["warning"] = "Attention!";
    $("#page-top").prepend('<div class="noti col-md-10 offset-md-1 alert alert-'+alertType+' alert-dismissible show fade" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+indicator[alertType]+'</strong> '+message+'</div>');
    $(".noti").fadeTo(2000, 500).slideUp(500, function(){
      $(".noti").remove();
  });
  }

  // function prepareUpload(event)
  // {
  //   files = event.target.files;
  // }
  var token = $("input[name=_token]").val()
    $(".loader-icon").fadeOut('fast');

    function  showImageUI() {
    var self = this;
    function setImagevalue(image){
        var range = self.quill.getSelection();
        self.quill.insertEmbed(range.index, 'image', image, Quill.sources.USER);
        // console.log(self.quill.getText(0,self.quill.getLength()));
        // $('#result').append(self.quill.getText(0,self.quill.getLength()));
    }
    $("#image").click();
    $(function() {
      $("input:file").change(function (e){
        var image = $( 'input:file' )[0].files[0];
        var token = $("input[name=_token]").val()

        var isFileUpload = false;
        var data;
        isFileUpload = true;
        var data = new FormData();
        data.append( 'image', image);
        data.append('_token',token);

        var biggo = Biggo.talkToServer('/dashboard/upload/image', data, isFileUpload, 'post', 'text');
        biggo.then(function(res){
        if(res.error){
              btalert('danger','Image Not Uploaded');
              $(".loader-icon").fadeOut('slow');
            }
        else{
            var image= "/assets//"+res;
            setImagevalue(image);
            }
          });
    });
 });
}

  var container=$("#editor").get(0);
  var toolbarOptions =
  [
    [
      { 'font': [] }
    ]
    ,[
       'bold',
       'italic',
       'underline'
     ],
    [
      'link',
      'image',
      'formula'
    ],
    [
      { 'align': [] }
    ]
  ];

  var options = {
    debug: 'info',
    modules: {
      toolbar:{
        container: toolbarOptions, //'#toolbar',
        handlers: {
          'image': showImageUI
        }
      }
    },
    placeholder : 'Write Your Question',
    readOnly : false,
    theme : 'snow'
  }
  var editor = new Quill(container,options);
  @if (isset($content->passage))$("#editor").children().html(`{!! $content->passage !!}`);@endif
  function OBJtoHTML($obj){
    console.log(JSON.stringify($obj));
    var arr = $.map(JSON.stringify($obj), function(el) {
      return el
     });
     arr;
  }
//   editor.on('text-change', function() {
//
//     HTML_Container.value = html; // make this a <textarea>
// });

  // Store the Content in Database
  $("#save").on('click',function(){
    var data = getTypeOption();

    // var data = { _token:$("input[name=_token]").val(),
    //    title:$("input[name=title]").val(),
    //   question:$("#editor").children().html(),
    //   type:$("select[name=type] option:selected").val(),
    //   table:$("input[name=db]").val(),
    //   id:$("input[name=id]").val(),
    //   dif:$("select[name=dif] option:selected").val(),
    // };
    $.ajax({
      @if (isset($id))
      url: '/dashboard/question/update',
      @else
      url: '/dashboard/question/store',
      @endif

      type: 'POST',
      dataType: 'html',
      data: data,
      beforeSend: function() {
            $(".loader-icon").show();
        },
      error: function(data){
          console.log(data.statusText);
          btalert('danger',"we can't save the post right now");
            $(".loader-icon").fadeOut('slow')
      },
      success: function(data)
      {
        // var obj = $.parseJSON(data);
        console.log(data);
        // if(obj.sent == true){
        @if (!isset($id))
        window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "/dashboard/question/{{ strtolower($db) }}";
      }, 1000);
        @endif

          btalert('success',data);
          $(".loader-icon").fadeOut('slow');
          console.log(data);
        // }
      },
      timeout:3000,
    });
  });

});
</script>

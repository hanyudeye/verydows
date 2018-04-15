<?php if(!class_exists("View", false)) exit("no direct access allowed");?><script type="text/javascript">
function doUpload(s, e){
  var initform = function(){
    $.vdsMasker(false);
    $('#pop-upload').find('form')[0].reset();
    $('#pop-upload').find('span.vdsfielderr').remove();
  };
  switch(s){
    case 'pop':
      initform();
      $.vdsMasker(true);
      $('#pop-upload').vdsMidst({wrapper:$(window), gotop:-100}).show();
    break;
    case 'more':
      if($('#pop-upload dl dd').size() < 5){
        var tpl = "<dd><a class='f14 blue mr5' onclick='doUpload(\"remove\", this)'>[-]</a><input type='file' name='file[]' /></dd>";
        $('#pop-upload dl').append(tpl);
      }else{
        $('body').vdsAlert({msg:'一次最多只能上传5个文件'});      
      }
    break;
    case 'submit':
      var ck = 0;
      $('#pop-upload input[name="file[]"]').each(function(i){
        if(this.value != ''){ck = 1; return false;}
      });
      if(ck != 0) $('#pop-upload form').submit(); else $('body').vdsAlert({msg:'至少上传一个文件'});
    break;
    case 'remove':
      $(e).parent().remove();
    break;
    case 'close':
      initform();
      $('#pop-upload').hide().find('dd').remove();
    break;
  }
}
</script>
<div class="poper upload cut" id="pop-upload">
  <a class="close" onclick="doUpload('close')"></a>
  <div class="poper-hd"><font class="c888">上传目录：</font><?php if (empty($path)) : ?>[upload]<?php else : ?>[upload/<?php echo htmlspecialchars($path, ENT_QUOTES, "UTF-8"); ?>]<?php endif; ?></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'file', 'a'=>'upload', ));?>">
    <input type="hidden" name="path" value="<?php echo htmlspecialchars($path, ENT_QUOTES, "UTF-8"); ?>" />
    <div class="mt10 pad10 cut">
      <dl class="ta-c">
        <dt><button type="button" class="cbtn sm btn" onclick="doUpload('more')">+1 文件</button></dt>
        <dd><a class="f14 blue mr10" onclick="doUpload('remove', this)">[-]</a><input type="file" name="file[]" /></dd>
      </dl>
    </div>
    <div class="poper-bom ta-c mt5">
      <button type="button" class="ubtn btn" onclick="doUpload('submit')">上传</button>
      <span class="sep40"></span>
      <button type="button" class="fbtn btn" onclick="doUpload('close')">取消</button>
    </div>
  </form>
</div>
<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('backend/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/verydows.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/main.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/fontstylewidget.css">
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/datetimepicker.css"/>
<script type="text/javascript" src="public/script/jquery.js"></script>
<script type="text/javascript" src="public/theme/backend/js/verydows.js"></script>
<script type="text/javascript" src="public/theme/backend/js/fontstylewidget.js"></script>
<script type="text/javascript">
$(function(){
  //切换对应广告类型
  $('input[name="type"]').change(function(){
    var checked = $('input[name="type"]:checked').val();
    $('tr.type-tr').addClass('hide').find('span.vds-warning').remove();
    $('tr#type-'+checked).removeClass('hide');
  });
  //切换上传还是URL
  $('dl.upsw dt a').click(function(){
    $(this).siblings().removeClass('cur').parent().next('dd').children('div').addClass('hide');
    $(this).addClass('cur').parent().next('dd').find('div').eq($(this).index()).removeClass('hide');
  });
  //设置文字广告样式
  $('#text-color-widget').cxColor().on('change', function(){$(this).data('style', 'c:'+this.value);});
  $('#text-size-widget').vwFontSize();
  $('#text-bold-widget').vwFontFace('b');
  $('#text-underline-widget').vwFontFace('u');
  $('#text-italic-widget').vwFontFace('i');
  //设置广告日期
  $('#start_date').datetimepicker({
    format:'Y-m-d',
    formatDate: 'Y-m-d',
    allowBlank:true,
    onShow:function(ct){
      this.setOptions({maxDate:$('#end_date').val()? $('#end_date').val():false});
    },
    timepicker:false,
  });
  $('#end_date').datetimepicker({
    format:'Y-m-d',
    formatDate:'Y-m-d',
    allowBlank:true,
    onShow:function(ct){
      this.setOptions({minDate:$('#start_date').val()? $('#start_date').val():false});
    },
    timepicker:false
  });
});

function clearDateSelect(id){$('#'+id).val('');}

//提交表单
function submitForm(){
  var type = $('input[name="type"]:checked').val();
  $('#name').vdsFieldChecker({rules: {required:[true, '广告名称不能为空'], maxlen:[100, '广告名称不能超过100个字符']}});
  $('input[name="type"]').last().parent().vdsFieldChecker({rules: {selected:[typeof(type) != 'undefined', '必须选择一个广告类型']}});
  $('#seq').vdsFieldChecker({rules: {seq:[true, '排序只能填写0到99的整数']}});
	
  switch(type){
    case 'image':
      if($('#advimg div').eq(0).hasClass('hide')){
        $('#advimg div').eq(0).find('input').next('span.vdsfielderr').remove();
        $('#advimg div').eq(1).find('input').vdsFieldChecker({rules: {required:[true, '图片URL不能为空']}});
      }else{
        $('#advimg div').eq(1).find('input').next('span.vdsfielderr').remove();
        $('#advimg div').eq(0).find('input').vdsFieldChecker({rules: {required:[true, '请选择上传的图片文件']}});
      }
      $('#image-w').vdsFieldChecker({rules: {nonegint:[true, '宽度必须是正整数'], maxlen:[4, '宽度不能超过4位数']}});
      $('#image-h').vdsFieldChecker({rules: {nonegint:[true, '高度必须是正整数'], maxlen:[4, '高度不能超过4位数']}});
      $('#image-link').vdsFieldChecker({rules: {required:[true, '图片链接不能为空']}});
    break;
    case 'flash':
      if($('#advfla div').eq(0).hasClass('hide')){
        $('#advfla div').eq(0).find('input').next('span.vdsfielderr').remove();
        $('#advfla div').eq(1).find('input').vdsFieldChecker({rules: {required:[true, 'Flash URL不能为空']}});
      }else{
        $('#advfla div').eq(1).find('input').next('span.vdsfielderr').remove();
        $('#advfla div').eq(0).find('input').vdsFieldChecker({rules: {required:[true, '请选择上传的Flash文件']}});
      }
      $('#flash-w').vdsFieldChecker({rules: {nonegint:[true, '宽度必须是正整数'], maxlen:[4, '宽度不能超过4位数']}});
      $('#flash-h').vdsFieldChecker({rules: {nonegint:[true, '高度必须是正整数'], maxlen:[4, '高度不能超过4位数']}});
    break;
    case 'text':
      $('#text-content').vdsFieldChecker({rules: {required:[true, '文字内容不能为空']}});
      $('#text-link').vdsFieldChecker({rules: {required:[true, '文字链接不能为空']}});
      var tstyle = '';
      $('input.fwdt').each(function(i, e){
        if(typeof($(e).data('style')) != 'undefined') tstyle += $(e).data('style')+',';
      });
      $('#text-style').val(tstyle);
    break;
    case 'code':
      $('#code-content').vdsFieldChecker({rules: {required:[true, '广告代码不能为空']}, tipsPos:'br'});
    break;
  }
  $('form').vdsFormChecker();
}
</script>
</head>
<body>
<?php if ($_GET['a'] == 'add') : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>添加新广告</h2></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'adv', 'a'=>'add', 'step'=>'submit', ));?>">
    <div class="box">
      <div class="module">
        <table class="dataform">
          <tr>
            <th width="110">广告名称</th>
            <td><input class="w300 txt" name="name" id="name" type="text" /><p class="c999 mt10">注意：广告名称仅用于识别区分不同广告条目，并不在广告中显示</p></td>
          </tr>
          <tr>
            <th>广告位</th>
            <td>
              <select id="position_id" name="position_id" class="slt">
                <option value="0">选择广告位置</option>
                <?php if (!empty($position_list)) : ?>
                <option disabled="disabled">------------------------------</option>
                <?php $_foreach_v_counter = 0; $_foreach_v_total = count($position_list);?><?php foreach( $position_list as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?> <option <?php if ($position_id == $v['id']) : ?>selected="selected"<?php endif; ?> value="<?php echo htmlspecialchars($v['id'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v['name'], ENT_QUOTES, "UTF-8"); ?> (<?php if (!empty($v['width'])) : ?><?php echo htmlspecialchars($v['width'], ENT_QUOTES, "UTF-8"); ?><?php else : ?>不限<?php endif; ?>*<?php if (!empty($v['height'])) : ?><?php echo htmlspecialchars($v['height'], ENT_QUOTES, "UTF-8"); ?><?php else : ?>不限<?php endif; ?>)
                
                </option>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>广告类型</th>
            <td>
              <div class="pad10">
                <label class="mr10"><input type="radio" name="type" value="image" /><font class="ml5">图片</font></label>
                <label class="mr10"><input type="radio" name="type" value="flash" /><font class="ml5">Flash</font></label>
                <label class="mr10"><input type="radio" name="type" value="text" /><font class="ml5">文字</font></label>
                <label><input type="radio" name="type" value="code" /><font class="ml5">代码</font></label>
              </div>
            </td>
          </tr>
          <!-- 对应类别开始 -->
          <?php include $_view_obj->compile('backend/adv/type_image.html'); ?>
          <?php include $_view_obj->compile('backend/adv/type_flash.html'); ?>
          <?php include $_view_obj->compile('backend/adv/type_text.html'); ?>
          <!-- 对应类别结束 -->
          <tr id="type-code" class="type-tr hide">
            <th>广告代码</th>
            <td><textarea id="code-content" class="txtarea" name="code_params[content]" cols="80" rows="6"></textarea></td>
          </tr>
          <tr>
            <th><label for="start_date">起始日期</label></th>
            <td>
              <input title="起始日期" value="" class="date w150 txt" name="start_date" id="start_date" type="text" />
              <button class="cbtn btn ml5" type="button" onclick="clearDateSelect('start_date')">清除</button>
              <p class="c999 mt10">设置广告生效日期，格式为"yyyy-mm-dd"，留空为不限制起始日期</p>
            </td>
          </tr>
          <tr>
            <th><label for="end_date">结束日期</label></th>
            <td>
              <input title="结束日期" class="date w150 txt" name="end_date" id="end_date" type="text" />
              <button class="cbtn btn ml5" type="button" onclick="clearDateSelect('end_date')">清除</button>
              <p class="c999 mt10">设置广告结束日期，格式为"yyyy-mm-dd"，留空为不限制结束日期</p>
            </td>
          </tr>
          <tr>
            <th><label for="seq">显示顺序</label></th>
            <td><input id="seq" class="w50 txt" name="seq" type="text" value="99" /></td>
          </tr>
          <tr>
            <th>状态</th>
            <td>
              <div class="pad5">
                <label class="mr10 green"><input type="radio" name="status" value="1" checked="checked" /><font class="ml5">启用</font></label>
                <label class="red"><input type="radio" name="status" value="0" /><font class="ml5">关闭</font></label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="submitbtn">
        <button type="button" class="ubtn btn" onclick="submitForm()">保存并提交</button>
        <button type="reset" class="fbtn btn">重置表单</button>
      </div>
    </div>
  </form>
</div>
<?php else : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>编辑广告:<font class="ml5">[<?php echo htmlspecialchars($rs['adv_id'], ENT_QUOTES, "UTF-8"); ?>]</font></h2></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'adv', 'a'=>'edit', 'id'=>$rs['adv_id'], 'step'=>'submit', ));?>">
    <div class="box">
      <div class="module">
        <table class="dataform">
          <tr>
            <th width="110">广告名称</th>
            <td><input class="w300 txt" name="name" id="name" type="text" value="<?php echo htmlspecialchars($rs['name'], ENT_QUOTES, "UTF-8"); ?>" /><p class="c999 mt10">注意：广告名称仅用于识别区分不同广告条目，并不在广告中显示</p></td>
          </tr>
          <tr>
            <th>广告位</th>
            <td>
              <select id="position_id" name="position_id" class="slt">
                <option value="0">选择广告位置</option>
                <?php if (!empty($position_list)) : ?>
                <option disabled="disabled">------------------------------</option>
                <?php $_foreach_v_counter = 0; $_foreach_v_total = count($position_list);?><?php foreach( $position_list as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?><option value="<?php echo htmlspecialchars($v['id'], ENT_QUOTES, "UTF-8"); ?>" <?php if ($rs['position_id'] == $v['id']) : ?>selected="selected"<?php endif; ?>><?php echo htmlspecialchars($v['name'], ENT_QUOTES, "UTF-8"); ?> (<?php if (!empty($v['width'])) : ?><?php echo htmlspecialchars($v['width'], ENT_QUOTES, "UTF-8"); ?><?php else : ?>不限<?php endif; ?>*<?php if (!empty($v['height'])) : ?><?php echo htmlspecialchars($v['height'], ENT_QUOTES, "UTF-8"); ?><?php else : ?>不限<?php endif; ?>)
                
                </option>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>广告类型</th>
            <td>
              <div class="pad10">
                <label class="mr10"><input type="radio" name="type" value="image" <?php if ($rs['type'] == 'image') : ?>checked="checked"<?php endif; ?> /><font class="ml5">图片</font></label>
                <label class="mr10"><input type="radio" name="type" value="flash" <?php if ($rs['type'] == 'flash') : ?>checked="checked"<?php endif; ?> /><font class="ml5">Flash</font></label>
                <label class="mr10"><input type="radio" name="type" value="text" <?php if ($rs['type'] == 'text') : ?>checked="checked"<?php endif; ?> /><font class="ml5">文字</font></label>
                <label><input type="radio" name="type" value="code" <?php if ($rs['type'] == 'code') : ?>checked="checked"<?php endif; ?> /><font class="ml5">代码</font></label>
              </div>
            </td>
          </tr>
          <!-- 对应类别开始 -->
          <?php if ($rs['type'] == 'image') : ?>
          <tr id="type-image" class="type-tr">
            <th>图片广告</th>
            <td>
              <dl class="upsw pad5">
                <dt class="pad5"><a class="ml5 mr5">上传文件</a><a class="cur ml10">输入URL</a></dt>
                <dd class="mt5 pad5" id="advimg">
                  <div class="hide">
                    <label><input name="image_file" type="file" /></label>
                    <p class="c999 mt10">仅允许上传 "png"、"jpg"、"jpeg"、"gif" 类型的图片</p>
                  </div>
                  <div>
                    <label><input name="image_params[src]" class="w500 txt" type="text" value="<?php echo htmlspecialchars($rs['params']['src'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                    <a title="查看图片" class="picflag icon ml5" onclick="$(this).vdsPopMedia({src:'<?php echo htmlspecialchars($rs['params']['src'], ENT_QUOTES, "UTF-8"); ?>'})"></a>
                  </div>
                </dd>
              </dl>
              <div class="mt5 pad5">
                <label class="mr10"><font class="c666 mr5">图片宽度:</font><input id="image-w" class="w100 txt" name="image_params[width]" type="text" value="<?php echo htmlspecialchars($rs['params']['width'], ENT_QUOTES, "UTF-8"); ?>" /><font class="c999 ml5">像素(px)</font></label>
                <label><font class="c666 mr5">图片高度:</font><input id="image-h" class="w100 txt" name="image_params[height]" type="text" value="<?php echo htmlspecialchars($rs['params']['height'], ENT_QUOTES, "UTF-8"); ?>" /><font class="c999 ml5">像素(px)</font></label>
                <p class="c999 mt10">(选填) 图片在浏览器中的宽度和高度，如果留空或为0则表示不限制</p>
              </div>
              <div class="mt5 pad5">
                <label><font class="c666 mr5">图片标题:</font><input class="w300 txt" name="image_params[title]" type="text" value="<?php echo htmlspecialchars($rs['params']['title'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                <p class="c999 mt10">(选填) 鼠标悬停时图片广告显示的文字信息</p>
              </div>
              <div class="mt5 pad5">
                <label><font class="c666 mr5">图片链接:</font><input class="w400 txt" id="image-link" name="image_params[link]" type="text" value="<?php echo htmlspecialchars($rs['params']['link'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                <p class="c999 mt10">(*必填) 点击图片广告后页面跳转的链接地址，站外链接须以"http://"或"https://"开头</p>
              </div>
            </td>
          </tr>
          <?php else : ?>
          <?php include $_view_obj->compile('backend/adv/type_image.html'); ?>
          <?php endif; ?>
          <?php if ($rs['type'] == 'flash') : ?>
          <tr id="type-flash" class="type-tr">
            <th>Flash 广告</th>
            <td>
              <dl class="upsw pad5">
                <dt class="pad5"><a class="ml5 mr5">上传文件</a><a class="cur ml10">输入URL</a></dt>
                <dd class="mt5 pad5">
                  <div class="hide">
                    <label><input name="flash_file" type="file" /></label>
                    <p class="c999 mt10">仅允许上传 "swf"、"flv" 格式的Flash文件</p>
                  </div>
                  <div>
                    <label><input name="flash_params[src]" class="w500 txt" type="text" value="<?php echo htmlspecialchars($rs['params']['src'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                    <a title="查看Flash" class="flaflag icon ml5" onclick="$(this).vdsPopMedia({src:'<?php echo htmlspecialchars($rs['params']['src'], ENT_QUOTES, "UTF-8"); ?>'})"></a> </div>
                </dd>
              </dl>
              <div class="mt5 pad5">
                <label class="mr10"><font class="c666 mr5">Flash 宽度:</font><input id="flash-w" class="w100 txt" name="flash_params[width]" type="text" value="<?php echo htmlspecialchars($rs['params']['width'], ENT_QUOTES, "UTF-8"); ?>" /><font class="c999 ml5">像素(px)</font></label>
                <label><font class="c666 mr5">Flash 高度:</font><input id="flash-h" class="w100 txt" name="flash_params[height]" type="text" value="<?php echo htmlspecialchars($rs['params']['height'], ENT_QUOTES, "UTF-8"); ?>" /><font class="c999 ml5">像素(px)</font></label>
                <p class="c999 mt10">(选填) Flash在浏览器中的宽度和高度，如果留空或为0则表示不限制</p>
              </div>
            </td>
          </tr>
          <?php else : ?>
          <?php include $_view_obj->compile('backend/adv/type_flash.html'); ?>
          <?php endif; ?>
          <?php if ($rs['type'] == 'text') : ?>
          <tr id="type-text" class="type-tr">
            <th>文字广告</th>
            <td>
              <div class="pad5">
                <label><font class="c666 mr5">文字内容:</font><input id="text-content" class="w400 txt" name="text_params[content]" type="text" value="<?php echo htmlspecialchars($rs['params']['content'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                <p class="c999 mt10">(*必填) 在浏览器中显示的文字广告内容</p>
              </div>
              <div class="pad5">
                <font class="c666 mr5">文字样式:</font>
                <?php if ($rs['params']['style']['c']) : ?>
                <span class="mr5"><input title="颜色" type="text" data-style="c:<?php echo htmlspecialchars($rs['params']['style']['c'], ENT_QUOTES, "UTF-8"); ?>" class="fwdt widget-color" id="text-color-widget" readonly="readonly" value="<?php echo htmlspecialchars($rs['params']['style']['c'], ENT_QUOTES, "UTF-8"); ?>" /></span>
                <?php else : ?>
                <span class="mr5"><input title="颜色" type="text" data-style="c:0" class="fwdt widget-color" id="text-color-widget" readonly="readonly" value="#333333" /></span>
                <?php endif; ?>
                <?php if ($rs['params']['style']['s']) : ?>
                <span class="mr5"><input title="字号" type="text" data-style="s:<?php echo htmlspecialchars($rs['params']['style']['s'], ENT_QUOTES, "UTF-8"); ?>" class="fwdt widget-size c666" id="text-size-widget" readonly="readonly" value="<?php echo htmlspecialchars($rs['params']['style']['s'], ENT_QUOTES, "UTF-8"); ?>" /></span>
                <?php else : ?>
                <span class="mr5"><input title="字号" type="text" data-style="s:0" class="fwdt widget-size c666" id="text-size-widget" readonly="readonly" value="字号" /></span>
                <?php endif; ?>
                <?php if ($rs['params']['style']['b']) : ?>
                <span class="mr5"><input title="加粗" type="text" data-style="b:1" class="fwdt widget-face bold checked" id="text-bold-widget" readonly="readonly" value="B" /></span>
                <?php else : ?>
                <span class="mr5"><input title="加粗" type="text" data-style="b:0" class="fwdt widget-face bold" id="text-bold-widget" readonly="readonly" value="B" /></span>
                <?php endif; ?>
                <?php if ($rs['params']['style']['u']) : ?>
                <span class="mr5"><input title="下划线" type="text" data-style="u:1" class="fwdt widget-face underline checked" id="text-underline-widget" readonly="readonly" value="U" /></span>
                <?php else : ?>
                <span class="mr5"><input title="下划线" type="text" data-style="u:0" class="fwdt widget-face underline" id="text-underline-widget" readonly="readonly" value="U" /></span>                <?php endif; ?>
                <?php if ($rs['params']['style']['i'] != 0) : ?>
                <span><input title="斜体" type="text" data-style="i:1" class="fwdt widget-face italic checked" id="text-italic-widget" readonly="readonly" value="I" /></span>
                <?php else : ?>
                <span><input title="斜体" type="text" data-style="i:0" class="fwdt widget-face italic" id="text-italic-widget" readonly="readonly" value="I" /></span>
                <?php endif; ?>
                <input type="hidden" name="text_params[style]" id="text-style" />
              </div>
              <div class="mt5 pad5">
                <label><font class="c666 mr5">文字链接:</font><input id="text-link" class="w400 txt" name="text_params[link]" type="text" value="<?php echo htmlspecialchars($rs['params']['link'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                <p class="c999 mt10">(*必填) 点击文字广告后跳转的URL，站外链接须以"http://"或"https://"开头</p>
              </div>
            </td>
          </tr>
          <?php else : ?>
          <?php include $_view_obj->compile('backend/adv/type_text.html'); ?>
          <?php endif; ?>
          <?php if ($rs['type'] == 'code') : ?>
          <tr id="type-code" class="type-tr">
            <th>广告代码</th>
            <td><label><textarea id="code-content" class="txtarea" name="code_params[content]" cols="80" rows="6"><?php echo htmlspecialchars($rs['codes'], ENT_QUOTES, "UTF-8"); ?></textarea></label></td>
          </tr>
          <?php else : ?>
          <tr id="type-code" class="type-tr hide">
            <th>广告代码</th>
            <td><label><textarea id="code-content" class="txtarea" name="code_params[content]" cols="80" rows="6"></textarea></label></td>
          </tr>
          <?php endif; ?>
          <!-- 对应类别结束 -->
          <tr>
            <th>起始日期</th>
            <td>
              <input class="date w150 txt" name="start_date" id="start_date" type="text" <?php if (!empty($rs['start_date'])) : ?>value="<?php echo date('Y-m-d', $rs['start_date']);?>"<?php endif; ?> />
              <button class="cbtn btn ml5" type="button" onclick="clearDateSelect('start_date')">清除</button>
              <p class="c999 mt10">设置广告生效日期，格式为"yyyy-mm-dd"，留空为不限制起始日期</p>
            </td>
          </tr>
          <tr>
            <th>结束日期</th>
            <td>
              <input class="date w150 txt" name="end_date" id="end_date" type="text" <?php if (!empty($rs['end_date'])) : ?>value="<?php echo date('Y-m-d', $rs['end_date']);?>"<?php endif; ?> />
              <button class="cbtn btn ml5" type="button" onclick="clearDateSelect('end_date')">清除</button>
              <p class="c999 mt10">设置广告结束日期，格式为"yyyy-mm-dd"，留空为不限制结束日期</p>
            </td>
          </tr>
          <tr>
            <th>显示顺序</th>
            <td><input id="seq" class="w50 txt" name="seq" type="text" value="<?php echo htmlspecialchars($rs['seq'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th>状态</th>
            <td>
             <div class="pad5">
                <label class="mr10 green"><input type="radio" name="status" value="1" <?php if ($rs['status'] == 1) : ?>checked="checked"<?php endif; ?> /><font class="ml5">启用</font></label>
                <label class="red"><input type="radio" name="status" value="0" <?php if ($rs['status'] == 0) : ?>checked="checked"<?php endif; ?> /><font class="ml5">关闭</font></label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="submitbtn">
        <button type="button" class="ubtn btn" onclick="submitForm()">保存并更新</button>
        <button type="reset" class="fbtn btn">重置表单</button>
      </div>
    </div>
  </form>
</div>
<?php endif; ?>
<script type="text/javascript" src="public/theme/backend/js/datetimepicker.js"></script>
</body>
</html>
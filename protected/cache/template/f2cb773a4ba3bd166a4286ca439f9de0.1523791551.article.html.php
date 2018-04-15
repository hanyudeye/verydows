<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('backend/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/verydows.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/main.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/umeditor/themes/default/css/umeditor.min.css" />
<script type="text/javascript" src="public/script/jquery.js"></script>
<script type="text/javascript" src="public/theme/backend/js/verydows.js"></script>
<script type="text/javascript">
$(function(){
  $('#tabs').vdsTabsSwitch();
  $('dl.upsw dt a').click(function(){
    $(this).siblings().removeClass('cur').parent().next('dd').children('div').addClass('hide');
    $(this).addClass('cur').parent().next('dd').find('div').eq($(this).index()).removeClass('hide');
  });
  UM.getEditor('article_content', {textarea:'content', imageUrl: "<?php echo url(array('m'=>$MOD, 'c'=>'article', 'a'=>'editor', ));?>", initialFrameWidth: '98%'});
});

function submitForm(){
  $('#title').vdsFieldChecker({rules: {required:[true, '标题不能为空'], maxlen:[180, '标题不能超过180个字符']}});
  $('#art-form').vdsFormChecker();
}
</script>
</head>
<body>
<?php if ($_GET['a'] == "add") : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>添加新资讯</h2></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'article', 'a'=>'add', 'step'=>'submit', ));?>" id="art-form">
    <div class="box">
      <div class="tabs mt5"><ul id="tabs"><li class="cur">基本信息</li><li>资讯内容</li></ul></div>
      <div class="module swcon mt5">
        <table class="dataform">
          <tr>
            <th width="110">标题</th>
            <td><input class="w400 txt" name="title" id="title" type="text" /></td>
          </tr>
          <tr>
            <th>分类</th>
            <td>
              <select name="cate_id" class="slt">
                <option value="0">无分类</option>
                <?php if (!empty($cate_list)) : ?>
                <option disabled="disabled">------------------------------</option>
                <?php $_foreach_v_counter = 0; $_foreach_v_total = count($cate_list);?><?php foreach( $cate_list as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
                <option value="<?php echo htmlspecialchars($v['cate_id'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v['cate_name'], ENT_QUOTES, "UTF-8"); ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>图片</th>
            <td>
              <dl class="upsw pad5">
                <dt class="pad5"><a class="cur ml5 mr5">上传文件</a><a class="ml10">输入URL</a></dt>
                <dd class="mt5 pad5">
                  <div><input name="picture_file" type="file" /><p class="caaa mt10">仅允许上传 "png"、"jpg"、"jpeg"、"gif" 类型的图片</p></div>
                  <div class="hide"><input name="picture_src" class="w500 txt" type="text" /></div>
                </dd>
              </dl>
            </td>
          </tr>
          <tr>
            <th>简介</th>
            <td><textarea name="brief" id="brief" class="txtarea" cols="75" rows="3"></textarea></td>
          </tr>
          <tr>
            <th>Meta 关键词</th>
            <td><textarea class="txtarea" name="meta_keywords" cols="75" rows="3"></textarea></td>
          </tr>
          <tr>
            <th>Meta 描述</th>
            <td><textarea class="txtarea" name="meta_description" cols="75" rows="3"></textarea></td>
          </tr>
          <tr>
            <th>链接地址</th>
            <td><input class="w400 txt" name="link" type="text" placeholder="http://" /><p class="caaa mt10">站外链接地址或非系统自动构造的URL链接地址</p></td>
          </tr>
          <tr>
            <th>状态</th>
            <td>
              <div class="pad5">
                <label class="green mr10"><input type="radio" name="status" value="0" checked="checked" /><font class="ml5">正常</font></label>
                <label class="red"><input type="radio" name="status" value="1" /><font class="ml5">禁止显示</font></label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="module swcon mt5 hide"><script type="text/plain" id="article_content" style="height:300px;"></script></div>
      <div class="submitbtn">
        <button type="button" class="ubtn btn" onclick="submitForm()">保存并提交</button>
        <button type="reset" class="fbtn btn">重置表单</button>
      </div>
    </div>
  </form>
</div>
<?php else : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>编辑资讯:<font class=" ml5">[<?php echo htmlspecialchars($rs['id'], ENT_QUOTES, "UTF-8"); ?>]</font></h2></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'article', 'a'=>'edit', 'step'=>'submit', 'id'=>$rs['id'], ));?>" id="art-form">
    <div class="box">
      <div class="tabs mt5"><ul id="tabs"><li class="cur">基本信息</li><li>资讯内容</li></ul></div>
      <div class="module swcon mt5">
        <table class="dataform">
          <tr>
            <th width="110">标题</th>
            <td><input class="w400 txt" name="title" id="title" type="text" value="<?php echo htmlspecialchars($rs['title'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th>分类</th>
            <td>
              <select name="cate_id" class="slt">
                <option value="0">- 无分类 -</option>
                <?php if (!empty($cate_list)) : ?>
                <option disabled="disabled">------------------------------</option>
                <?php $_foreach_v_counter = 0; $_foreach_v_total = count($cate_list);?><?php foreach( $cate_list as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?> <?php if ($v['cate_id'] == $rs['cate_id']) : ?>
                <option selected="selected" value="<?php echo htmlspecialchars($v['cate_id'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v['cate_name'], ENT_QUOTES, "UTF-8"); ?></option>
                <?php else : ?>
                <option value="<?php echo htmlspecialchars($v['cate_id'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v['cate_name'], ENT_QUOTES, "UTF-8"); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>图片</th>
            <td>
              <dl class="upsw pad5">
                <?php if (!empty($rs['picture'])) : ?>
                <dt class="pad5"><a class="ml5 mr5">上传文件</a><a class="cur ml10">输入URL</a></dt>
                <dd class="mt5 pad5">
                  <div class="hide"><input name="picture_file" type="file" /><p class="caaa mt10">仅允许上传 "png"、"jpg"、"jpeg"、"gif" 类型的图片</p></div>
                  <div>
                    <label><input name="picture_src" class="w500 txt" type="text" value="<?php echo htmlspecialchars($rs['picture'], ENT_QUOTES, "UTF-8"); ?>" /></label>
                    <a title="查看图片" class="picflag icon ml5" onclick="$(this).vdsPopMedia({src:'<?php echo htmlspecialchars($rs['picture'], ENT_QUOTES, "UTF-8"); ?>'})"></a>
                  </div>
                </dd>
                <?php else : ?>
                <dt class="pad5"><a class="cur ml5 mr5">上传文件</a><a class="ml10">输入URL</a></dt>
                <dd class="mt5 pad5">
                  <div><input name="picture_file" type="file" /><p class="caaa mt10">仅允许上传 "png"、"jpg"、"jpeg"、"gif" 类型的图片</p></div>
                  <div class="hide"><input name="picture_src" class="w500 txt" type="text" /></div>
                </dd>
                <?php endif; ?>
              </dl>
            </td>
          </tr>
          <tr>
            <th>简介</th>
            <td><textarea name="brief" id="brief" class="txtarea" cols="75" rows="3"><?php echo htmlspecialchars($rs['brief'], ENT_QUOTES, "UTF-8"); ?></textarea></td>
          </tr>
          <tr>
            <th>Meta 关键词</th>
            <td><textarea class="txtarea" name="meta_keywords" cols="75" rows="3"><?php echo htmlspecialchars($rs['meta_keywords'], ENT_QUOTES, "UTF-8"); ?></textarea></td>
          </tr>
          <tr>
            <th>Meta 描述</th>
            <td><textarea class="txtarea" name="meta_description" cols="75" rows="3"><?php echo htmlspecialchars($rs['meta_description'], ENT_QUOTES, "UTF-8"); ?></textarea></td>
          </tr>
          <tr>
            <th>链接地址</th>
            <td><input class="w400 txt" name="link" type="text" value="<?php echo htmlspecialchars($rs['link'], ENT_QUOTES, "UTF-8"); ?>" placeholder="http://" /></td>
          </tr>
          <tr>
            <th>状态</th>
            <td>
              <div class="pad5">
                <?php if ($rs['status'] == 0) : ?>
                <label class="green mr10"><input type="radio" name="status" value="0" checked="checked" />正常</label>
                <label class="red"><input type="radio" name="status" value="1" />禁止显示</label>
                <?php else : ?>
                <label class="green mr10"><input type="radio" name="status" value="0" />正常</label>
                <label class="red"><input type="radio" name="status" value="1" checked="checked" />禁止显示</label>
                <?php endif; ?>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="module swcon mt5 hide"><script type="text/plain" id="article_content" style="height:300px;"><?php echo $rs['content']; ?></script></div>
      <div class="submitbtn">
        <button type="button" class="ubtn btn" onclick="submitForm()">保存并更新</button>
        <button type="reset" class="fbtn btn">重置表单</button>
      </div>
    </div>
  </form>
</div>
<?php endif; ?>
<script type="text/javascript" src="public/theme/backend/umeditor/umeditor.config.js"></script>
<script type="text/javascript" src="public/theme/backend/umeditor/umeditor.min.js"></script>
</body>
</html>
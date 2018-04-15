<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('backend/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/verydows.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/main.css" />
<script type="text/javascript" src="public/script/jquery.js"></script>
<script type="text/javascript" src="public/theme/backend/js/verydows.js"></script>
<script type="text/javascript">
function submitForm(){
  $('#cate_name').vdsFieldChecker({rules: {required:[true, '分类名称不能为空'], maxlen:[60, '分类名称不能超过60个字符']}});
  $('#seq').vdsFieldChecker({rules: {seq:[true, '排序必须为0到99的整数']}});
  $('form').vdsFormChecker();
}
</script>
</head>
<body>
<?php if ($_GET['a'] == 'add') : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>添加资讯分类</h2></div>
  <form method="post" action="<?php echo url(array('m'=>$MOD, 'c'=>'article_cate', 'a'=>'add', 'step'=>'submit', ));?>">
    <div class="box">
      <div class="module">
        <table class="dataform">
          <tr>
            <th width="110">分类名称</th>
            <td><input class="w200 txt" name="cate_name" id="cate_name" type="text" /></td>
          </tr>
          <tr>
            <th>Meta 关键词</th>
            <td><textarea name="meta_keywords" id="meta_keywords" class="txtarea" cols="68" rows="5"></textarea></td>
          </tr>
          <tr>
            <th>Meta 描述</th>
            <td><textarea name="meta_description" id="meta_description" class="txtarea" cols="68" rows="5"></textarea></td>
          </tr>
          <tr>
            <th>排序</th>
            <td><input value="99" class="w50 txt" name="seq" id="seq" type="text" /></td>
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
  <div class="loc">
    <h2><i class="icon"></i>编辑资讯分类:<font class="ml5">[<?php echo htmlspecialchars($rs['cate_id'], ENT_QUOTES, "UTF-8"); ?>]</font></h2>
  </div>
  <form method="post" action="<?php echo url(array('m'=>$MOD, 'c'=>'article_cate', 'a'=>'edit', 'step'=>'submit', 'id'=>$rs['cate_id'], ));?>">
    <div class="box">
      <div class="module">
        <table class="dataform">
          <tr>
            <th width="110">分类名称</th>
            <td><input class="w200 txt" name="cate_name" id="cate_name" value="<?php echo htmlspecialchars($rs['cate_name'], ENT_QUOTES, "UTF-8"); ?>" type="text" /></td>
          </tr>
          <tr>
            <th>Meta 关键词</th>
            <td><textarea name="meta_keywords" id="meta_keywords" class="txtarea" cols="68" rows="5"><?php echo htmlspecialchars($rs['meta_keywords'], ENT_QUOTES, "UTF-8"); ?></textarea></td>
          </tr>
          <tr>
            <th>Meta 描述</th>
            <td><textarea name="meta_description" id="meta_description" class="txtarea" cols="68" rows="5"><?php echo htmlspecialchars($rs['meta_description'], ENT_QUOTES, "UTF-8"); ?></textarea></td>
          </tr>
          <tr>
            <th>排序</th>
            <td><input class="w50 txt" name="seq" id="seq" value="<?php echo htmlspecialchars($rs['seq'], ENT_QUOTES, "UTF-8"); ?>" type="text" /></td>
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
</body>
</html>
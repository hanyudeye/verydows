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
  $('#name').vdsFieldChecker({rules:{required:[true, '名称不能为空'], maxlen:[60, '名称不能超过60个字符']}});
  $('#link').vdsFieldChecker({rules:{required:[true, '链接地址不能为空']}});
  $('#seq').vdsFieldChecker({rules:{seq:[true, '无效的排序！只能填写0到99的整数']}});
  $('form').vdsFormChecker();
}
</script>
</head>
<body>
<?php if ($_GET['a'] == 'add') : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>添加导航</h2></div>
  <form method="post" action="<?php echo url(array('m'=>$MOD, 'c'=>'nav', 'a'=>'add', 'step'=>'submit', ));?>">
    <div class="box">
      <div class="module">
        <table class="dataform">
          <tr>
            <th width="110">名称</th>
            <td><input class="w200 txt" name="name" id="name" type="text" /></td>
          </tr>
          <tr>
            <th>位置</th>
            <td>
              <select name="position" class="slt" id="position">
                <?php $_foreach_v_counter = 0; $_foreach_v_total = count($pos_map);?><?php foreach( $pos_map as $k => $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
                <option value="<?php echo htmlspecialchars($k, ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v, ENT_QUOTES, "UTF-8"); ?></option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>链接地址</th>
            <td><input class="w500 txt" name="link" id="link" type="text" /></td>
          </tr>
          <tr>
            <th>是否新窗口</th>
            <td>
              <div class="pad5">
                <label class="mr10">
                <input type="radio" name="target" value="1" checked="checked" />
                <font class="red ml5">是</font></label>
                <label>
                <input type="radio" name="target" value="0" />
                <font class="green ml5">否</font></label>
              </div>
            </td>
          </tr>
          <tr>
            <th>排序</th>
            <td><input class="w50 txt" name="seq" id="seq" type="text" value="99" /></td>
          </tr>
          <tr>
            <th>是否显示</th>
            <td>
              <div class="pad5">
                <label class="mr10"><input type="radio" name="visible" value="1" checked="checked" /><font class="red ml5">是</font></label>
                <label><input type="radio" name="visible" value="0" /><font class="green ml5">否</font></label>
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
  <div class="loc"><h2><i class="icon"></i>编辑导航:<font class="ml5">[<?php echo htmlspecialchars($rs['id'], ENT_QUOTES, "UTF-8"); ?>]</font></h2></div>
  <form method="post" action="<?php echo url(array('m'=>$MOD, 'c'=>'nav', 'a'=>'edit', 'step'=>'submit', 'id'=>$rs['id'], ));?>">
    <div class="box">
      <div class="module">
        <table class="dataform">
          <tr>
            <th width="110">名称</th>
            <td><input class="w200 txt" name="name" id="name" type="text" value="<?php echo htmlspecialchars($rs['name'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th>位置</th>
            <td>
              <select name="position" class="slt" id="position">
                <?php $_foreach_v_counter = 0; $_foreach_v_total = count($pos_map);?><?php foreach( $pos_map as $k => $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?> <?php if ($k == $rs['position']) : ?>
                <option selected="selected" value="<?php echo htmlspecialchars($k, ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v, ENT_QUOTES, "UTF-8"); ?></option>
                <?php else : ?>
                <option value="<?php echo htmlspecialchars($k, ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v, ENT_QUOTES, "UTF-8"); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>链接地址</th>
            <td><input class="w500 txt" name="link" id="link" type="text" value="<?php echo htmlspecialchars($rs['link'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th>是否新窗口</th>
            <td>
              <div class="pad5">
                <label class="mr10"><input type="radio" name="target" value="1" <?php if ($rs['target'] == 1) : ?>checked="checked"<?php endif; ?> /><font class="red ml5">是</font></label>
                <label><input type="radio" name="target" value="0" <?php if ($rs['target'] == 0) : ?>checked="checked"<?php endif; ?> /><font class="green ml5">否</font></label>
              </div>
            </td>
          </tr>
          <tr>
            <th>排序</th>
            <td><input class="w50 txt" name="seq" id="seq" type="text" value="<?php echo htmlspecialchars($rs['seq'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th>是否显示</th>
            <td>
              <div class="pad5">
                <label class="mr10"><input type="radio" name="visible" value="1" <?php if ($rs['visible'] == 1) : ?>checked="checked"<?php endif; ?> /><font class="red ml5">是</font></label>
                <label><input type="radio" name="visible" value="0" <?php if ($rs['visible'] == 0) : ?>checked="checked"<?php endif; ?> /><font class="green ml5">否</font></label>
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
</body>
</html>
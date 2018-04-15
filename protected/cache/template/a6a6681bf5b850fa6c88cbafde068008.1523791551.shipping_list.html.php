<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('backend/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/verydows.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/main.css" />
<script type="text/javascript" src="public/script/jquery.js"></script>
<script type="text/javascript" src="public/theme/backend/js/verydows.js"></script>
<script type="text/javascript" src="public/theme/backend/js/list.js"></script>
<script type="text/javascript">
$(function(){searchRes(1);});

function searchRes(page_id){
  var dataset = {type:$('#type').val(), kw: $('#kw').val(), page:page_id};
  $.asynList("<?php echo url(array('m'=>$MOD, 'c'=>'order_shipping', 'a'=>'index', 'step'=>'search', ));?>", dataset, function(data){
    if(data.status == 'success'){
      $('#rows').append(juicer($('#row-tpl').html(), data));
      $('#rows tr').vdsRowHover();
      $('#rows tr:even').addClass('even');
      if(data.paging != null) $('#rows').append(juicer($('#paging-tpl').html(), data));
    }else{
      $('#rows').append("<div class='nors mt5'>未找到相关数据记录...</div>");	
    }     
  });
}

function pageturn(page_id){searchRes(page_id);}
</script>
</head>
<body>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>发货列表</h2></div>
  <div class="box">
    <div class="doacts">
      <a class="ae btn" onclick="domulent('<?php echo url(array('m'=>$MOD, 'c'=>'order_shipping', 'a'=>'delete', ));?>')"><i class="remove"></i><font>删除</font></a>
    </div>
    <div class="stools mt5">
      <select id="type" class="slt">
        <option value="0">运单号</option>
        <option value="1">订单号</option>
      </select>
      <input type="text" class="w300 txt" id="kw" placeholder="输入运单号/订单号" />
      <button type="button" class="sbtn btn" onclick="searchRes(1)">搜 索</button>
    </div>
    <div class="module mt5" id="rows"></div>
    <?php include $_view_obj->compile('backend/lib/paging.html'); ?>
  </div>
</div>
<script type="text/template" id="row-tpl">
<form method="post" id="mulentform">
  <table class="datalist">
    <tr>
      <th width="60" colspan="2">编号</th>
      <th width="160">运单号</th>
      <th width="160">物流承运商</th>
      <th width="160">订单号</th>
      <th width="100">日期</th>
      <th class="ta-l">备注</th>
    </tr>
    {@each list as v}
    <tr>
      <td width="20"><input name="id[]" type="checkbox" value="${v.id}" /></td>
      <td width="40">${v.id}</td>
      <td><a class="blue" href="${v.tracking_url}" target="_blank">${v.tracking_no}</a></td>
      <td>${v.carrier_name}</td>
      <td><a class="blue" href="index.php?m=<?php echo htmlspecialchars($MOD, ENT_QUOTES, "UTF-8"); ?>&c=order&a=view&id=${v.order_id}">${v.order_id}</a></td>
      <td class="c666">${v.dateline}</td>
      <td class="ta-l">{@if v.memos !=''}<p class="c666">${v.memos}</p>{@else}<p class="caaa">无备注</p>{@/if}</td>
    </tr>
    {@/each}
  </table>
</form>
</script>
<script type="text/javascript" src="public/script/juicer.js"></script>
</body>
</html>
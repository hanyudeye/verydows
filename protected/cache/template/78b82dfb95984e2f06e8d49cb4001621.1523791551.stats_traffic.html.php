<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('backend/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/verydows.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/main.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/stats.css" />
<link rel="stylesheet" type="text/css" href="public/theme/backend/css/datetimepicker.css"/>
<script type="text/javascript" src="public/script/jquery.js"></script>
<script type="text/javascript" src="public/theme/backend/js/verydows.js"></script>
<script type="text/javascript" src="public/theme/backend/js/flot.js"></script>
<script type="text/javascript">
$(function(){
  showChart('<?php echo date("Y-m-d", $todaystamp - 86400 * 7);?>', '<?php echo date("Y-m-d");?>');
  //预设周期切换
  $('#preset-btn button').click(function(){
    if(!$(this).hasClass('disabled')){
      $('#preset-btn button.disabled').removeClass('disabled');
      $(this).addClass('disabled').blur();
      showChart($(this).data('start'), '<?php echo date("Y-m-d");?>');
    }
  });
  //日期选择
  $('#start_date').datetimepicker ({
    format:'Y-m-d',
    formatDate: 'Y-m-d',
    allowBlank:true,
    onShow:function(ct){
      this.setOptions({maxDate:$('#end_date').val()? $('#end_date').val():false})
    }, timepicker:false
  });
  $('#end_date').datetimepicker ({
    format:'Y-m-d',
    formatDate: 'Y-m-d',
    allowBlank:true,
    onShow:function(ct){
      this.setOptions({minDate:$('#start_date').val()? $('#start_date').val():false})
    }, timepicker:false
  });
});

function showChart(start, end){
  $.ajax({
    type: "post",
    dataType: "json",
    url: "<?php echo url(array('m'=>$MOD, 'c'=>'stats', 'a'=>'visitor', 'col'=>'traffic', 'search'=>'async', ));?>",
    data: {'start_date':start, 'end_date':end},
    beforeSend: function(){$('#linechart').off().hide();$('#linewrap .legend').hide();$('#linewrap .loading').show();},
    success: function(res){
      $('#linewrap .loading').hide();
      $('#linewrap .hint').hide();
      if(res.status == 'success'){
        $('#linechart').show();
        $('#linewrap .legend').show();
        var pv = {label:'PV', data:[]}, uv = {label:'UV', data:[]}, ip = {label:'IP', data:[]};
        $.each(res.data, function(k, v){
          pv.data.push([v.dateline, v.pv]);
          uv.data.push([v.dateline, v.uv]);
          ip.data.push([v.dateline, v.ip]);
        });
        setChart(pv, uv, ip);
      }
      else{
        $('#linewrap .hint').text('暂无相关数据').show();
      }
    },
    error: function(){
      $('#linewrap .loading').hide();
      $('#linewrap .legend').hide();
      $('#linewrap .hint').text('查询超时或出错!').show();
    }
  });
}

function setChart(pv, uv, ip){
  $.plot('#linechart', [pv, uv, ip], {
    series: {
      lines: {show: true},
      points: {show: true},
    },
    shadowSize: 1,
    grid: {hoverable: true},
    legend: {show: false},
    xaxis: {tickFormatter: function (v, axis) {return formatTimestamp(v, 'm-d');}},
    yaxis:{min: 0}
  });
}

function selectDate(){
  var start = $('#start_date').val(), end = $('#end_date').val();
  showChart(start, end);
}
</script>
</head>
<body>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>访问统计</h2></div>
  <div class="box">
    <div class="bw-row pad10 ta-c cut">
      <a class="sbtn sm disabled btn">流量分析</a><span class="sep20"></span>
      <a class="sbtn sm btn" href="<?php echo url(array('m'=>$MOD, 'c'=>'stats', 'a'=>'visitor', 'col'=>'referrer', ));?>">来源分析</a><span class="sep20"></span>
      <a class="sbtn sm btn" href="<?php echo url(array('m'=>$MOD, 'c'=>'stats', 'a'=>'visitor', 'col'=>'terminal', ));?>">终端分析</a><span class="sep20"></span>
      <a class="sbtn sm btn" href="<?php echo url(array('m'=>$MOD, 'c'=>'stats', 'a'=>'visitor', 'col'=>'area', ));?>">地区分析</a>
    </div>
    <?php if (!empty($latest)) : ?>
    <div class="module mt5">
      <table class="datalist">
        <tr>
          <th width="150">日期</th>
          <th>页面浏览量(PV)</th>
          <th width="29%">独立访客(UV)</th>
          <th width="29%">IP</th>
        </tr>
        <?php $_foreach_v_counter = 0; $_foreach_v_total = count($latest);?><?php foreach( $latest as $k => $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
        <tr>
          <td class="c666"><?php if ($k == 0) : ?>今日<?php else : ?>昨日<?php endif; ?></td>
          <td><?php echo htmlspecialchars($v['pv'], ENT_QUOTES, "UTF-8"); ?></td>
          <td><?php echo htmlspecialchars($v['uv'], ENT_QUOTES, "UTF-8"); ?></td>
          <td><?php echo htmlspecialchars($v['ip'], ENT_QUOTES, "UTF-8"); ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <?php endif; ?>
    <div class="bw-row mt5 pad10 ta-c cut">
      <div class="bw-row pad10 cut">
        <div class="chart-btnopt ta-l fl cut" id="preset-btn">
          <button type="button" class="disabled cbtn btn" data-start="<?php echo date('Y-m-d', $todaystamp - 86400 * 7);?>">最近7日</button>
          <span class="sep20"></span>
          <button type="button" class="cbtn btn" data-start="<?php echo date('Y-m-d', $todaystamp - 86400 * 15);?>">最近15日</button>
          <span class="sep20"></span>
          <button type="button" class="cbtn btn" data-start="<?php echo date('Y-m-d', $todaystamp - 86400 * 30);?>">最近1个月</button>
          <span class="sep20"></span>
          <button type="button" class="cbtn btn" data-start="<?php echo date('Y-m-d', $todaystamp - 86400 * 90);?>">最近3个月</button>
        </div>
        <div class="chart-dateopt ta-r fr cut">
          <label><font class="c888 mr5">开始日期</font><input title="开始日期" value="" class="date w100 txt"name="start_date" id="start_date" type="text" /></label>
          <span class="sep10"></span>
          <label><font class="c888 mr5">截止日期</font><input title="截止日期" value="" class="date w100 txt"name="end_date" id="end_date" type="text" /></label>
          <button class="cbtn btn" type="button" onclick="selectDate()">查询</button>
        </div>
      </div>
      <div class="linewrap module mt5 cut" id="linewrap">
        <div class="foldline module" id="linechart"></div>
        <div class="hint caaa hide"></div>
        <div class="loading x-auto hide"></div>
        <div class="legend mt8 hide">
          <label class="pv"><i class="icon"></i><font>页面浏览量(PV)</font></label>
          <label class="uv"><i class="icon"></i><font>独立访客(UV)</font></label>
          <label class="ip"><i class="icon"></i><font>IP</font></label>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="public/theme/backend/js/datetimepicker.js"></script>
</body>
</html>
<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="verydows-baseurl" content="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($cateinfo['meta_keywords'], ENT_QUOTES, "UTF-8"); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($cateinfo['meta_description'], ENT_QUOTES, "UTF-8"); ?>" />
<title><?php echo htmlspecialchars($cateinfo['cate_name'], ENT_QUOTES, "UTF-8"); ?> - <?php echo htmlspecialchars($GLOBALS['cfg']['site_name'], ENT_QUOTES, "UTF-8"); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($common['theme'], ENT_QUOTES, "UTF-8"); ?>/css/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($common['theme'], ENT_QUOTES, "UTF-8"); ?>/css/category.css" />
<script type="text/javascript" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/public/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($common['theme'], ENT_QUOTES, "UTF-8"); ?>/js/general.js"></script>
</head>
<body>
<!-- 顶部开始 -->
<?php echo layout_topper(array('common'=>$common, ));?>
<!-- 顶部结束 -->
<!-- 头部开始 -->
<?php echo layout_header(array('common'=>$common, ));?>
<!-- 头部结束 -->
<div class="loc w1100">
  <div>
    <a href="<?php echo url(array('c'=>'main', 'a'=>'index', ));?>">网站首页</a>
    <b>&gt;</b>
    <?php $_foreach_v_counter = 0; $_foreach_v_total = count($breadcrumbs);?><?php foreach( $breadcrumbs as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
    <?php if ($cateinfo['cate_id'] != $v['cate_id']) : ?><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$v['cate_id'], ));?>"><?php echo htmlspecialchars($v['cate_name'], ENT_QUOTES, "UTF-8"); ?></a><b>&gt;</b><?php else : ?><font><?php echo htmlspecialchars($v['cate_name'], ENT_QUOTES, "UTF-8"); ?></font><?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
<!-- 主体开始 -->
<div class="container w1100 mt10">
  <div class="module cut">
    <!-- 左侧开始 -->
    <div class="w210 fl cut">
      <?php if (!empty($recommend)) : ?>
      <div class="sli mb10">
        <h2>热门推荐</h2>
        <?php $_foreach_v_counter = 0; $_foreach_v_total = count($recommend);?><?php foreach( $recommend as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
        <dl>
          <dt class="fl"><a href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><img alt="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/upload/goods/prime/50x50/<?php echo htmlspecialchars($v['goods_image'], ENT_QUOTES, "UTF-8"); ?>" /></a></dt>
          <dd class="lt"><a title="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><?php echo truncate($v['goods_name']);?></a><p><i>¥</i> <?php echo htmlspecialchars($v['now_price'], ENT_QUOTES, "UTF-8"); ?></p></dd>
        </dl>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <?php if (!empty($history)) : ?>
      <div class="sli mb10">
        <h2>最近浏览</h2>
        <?php $_foreach_v_counter = 0; $_foreach_v_total = count($history);?><?php foreach( $history as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
        <dl>
          <dt class="fl"><a href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><img alt="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/upload/goods/prime/50x50/<?php echo htmlspecialchars($v['goods_image'], ENT_QUOTES, "UTF-8"); ?>" /></a></dt>
          <dd class="lt"><a title="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><?php echo truncate($v['goods_name']);?></a><p><i>¥</i> <?php echo htmlspecialchars($v['now_price'], ENT_QUOTES, "UTF-8"); ?></p></dd>
        </dl>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
    <!-- 左侧结束 -->
    <!-- 右侧开始 -->
    <div class="w880">
      <?php if (!empty($bargain)) : ?>
      <!-- 特价促销开始 -->
      <div class="recommend mb10 cut">
        <?php $_foreach_v_counter = 0; $_foreach_v_total = count($bargain);?><?php foreach( $bargain as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
        <dl>
          <dt class="fl"><a href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><img width="100" height="100" alt="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/upload/goods/prime/100x100/<?php echo htmlspecialchars($v['goods_image'], ENT_QUOTES, "UTF-8"); ?>" /></a></dt>
          <dd>
            <a title="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><?php echo truncate($v['goods_name'], 40);?></a>
            <?php if ($v['original_price'] > 0) : ?>
            <p class="ori mt10"><i>¥</i> <?php echo htmlspecialchars($v['original_price'], ENT_QUOTES, "UTF-8"); ?></p>
            <?php endif; ?>
            <p class="mt2"><i>¥</i> <?php echo htmlspecialchars($v['now_price'], ENT_QUOTES, "UTF-8"); ?></p>
          </dd>
        </dl>
        <?php endforeach; ?>
      </div>
      <!-- 特价促销结束 -->
      <?php endif; ?>
      <!-- 过滤筛选开始 -->
      <div class="filter cut">
        <?php if (!empty($filters['brand'])) : ?>
        <div class="ftitem cut">
          <h4 class="fl">品牌：</h4>
          <div class="ftopt">
            <div class="fl"><?php if ($u['brand'] == 0) : ?><a class="cur">不限</a><?php else : ?><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], ));?>">不限</a><?php endif; ?></div>
            <dl>
              <?php $_foreach_v_counter = 0; $_foreach_v_total = count($filters['brand']);?><?php foreach( $filters['brand'] as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
              <?php if ($u['brand'] == $v['brand_id']) : ?><dd><a class="cur" title="<?php echo htmlspecialchars($v['brand_name'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($v['brand_name'], ENT_QUOTES, "UTF-8"); ?></a></dd><?php else : ?><dd><a title="<?php echo htmlspecialchars($v['brand_name'], ENT_QUOTES, "UTF-8"); ?>" href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$v['brand_id'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], ));?>"><?php echo htmlspecialchars($v['brand_name'], ENT_QUOTES, "UTF-8"); ?></a></dd><?php endif; ?>
              <?php endforeach; ?>
            </dl>
          </div>
        </div>
        <?php endif; ?>
        <?php if (!empty($filters['attr'])) : ?>
        <?php $_foreach_v_counter = 0; $_foreach_v_total = count($filters['attr']);?><?php foreach( $filters['attr'] as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
        <div class="ftitem cut">
          <h4 class="fl"><?php echo htmlspecialchars($v['name'], ENT_QUOTES, "UTF-8"); ?>：</h4>
          <div class="ftopt">
            <div class="fl"><?php if ($v['unlimit']['checked'] == 1) : ?><a class="cur">不限</a><?php else : ?><a title="不限" href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$v['unlimit']['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], ));?>">不限</a><?php endif; ?></div>
            <dl>
              <?php $_foreach_vv_counter = 0; $_foreach_vv_total = count($v['opts']);?><?php foreach( $v['opts'] as $vv ) : ?><?php $_foreach_vv_index = $_foreach_vv_counter;$_foreach_vv_iteration = $_foreach_vv_counter + 1;$_foreach_vv_first = ($_foreach_vv_counter == 0);$_foreach_vv_last = ($_foreach_vv_counter == $_foreach_vv_total - 1);$_foreach_vv_counter++;?>	
              <?php if ($vv['checked'] == 1) : ?>
              <dd><a class="cur" title="<?php echo htmlspecialchars($vv['name'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($vv['name'], ENT_QUOTES, "UTF-8"); ?></a></dd><?php else : ?><dd><a title="<?php echo htmlspecialchars($vv['name'], ENT_QUOTES, "UTF-8"); ?>" href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$vv['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], ));?>"><?php echo htmlspecialchars($vv['name'], ENT_QUOTES, "UTF-8"); ?></a></dd><?php endif; ?>
              <?php endforeach; ?>
            </dl>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!empty($filters['price'])) : ?>
        <div class="ftitem cut">
          <h4 class="fl">价格：</h4>
          <div class="ftopt">
            <div class="fl"><?php if ($u['minpri'] == 0 && $u['maxpri'] == 0) : ?><a class="cur">不限</a><?php else : ?><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'sort'=>$u['sort'], ));?>">不限</a><?php endif; ?></div>
            <dl>
              <?php $_foreach_v_counter = 0; $_foreach_v_total = count($filters['price']);?><?php foreach( $filters['price'] as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>	
              <?php if ($u['minpri'] == $v['min'] && $u['maxpri'] == $v['max']) : ?><dd><a class="cur"><?php echo htmlspecialchars($v['str'], ENT_QUOTES, "UTF-8"); ?></a></dd><?php else : ?><dd><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$v['min'], 'maxpri'=>$v['max'], 'sort'=>$u['sort'], ));?>"><?php echo htmlspecialchars($v['str'], ENT_QUOTES, "UTF-8"); ?></a></dd><?php endif; ?>
              <?php endforeach; ?>
            </dl>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <!-- 过滤筛选结束 -->
      <!-- 商品列表开始 -->
      <?php if (!empty($goods_list)) : ?>
      <div class="module mt10">
        <div class="display cut">
          <div class="seq fl cut">
            <ul>
              <?php if ($u['sort'] == 0) : ?>
              <li class="cur"><a>默认排序</a></li>
              <?php else : ?>
              <li><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'0', ));?>">默认排序</a></li>
              <?php endif; ?>
              <?php if ($u['sort'] == 1) : ?>
              <li class="cur"><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'2', ));?>">价格<i class="up icon"></i></a></li>
              <?php elseif ($u['sort'] == 2) : ?>
              <li class="cur"><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'1', ));?>">价格<i class="dw icon"></i></a></li>
              <?php else : ?>
              <li><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'2', ));?>">价格<i class="up icon"></i></a></li>
              <?php endif; ?>
              <?php if ($u['sort'] == 3) : ?>
              <li class="cur"><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'4', ));?>">上架时间<i class="dw icon"></i></a></li>
              <?php elseif ($u['sort'] == 4) : ?>
              <li class="cur"><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'3', ));?>">上架时间<i class="up icon"></i></a></li>
              <?php else : ?>
              <li><a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>'3', ));?>">上架时间<i class="dw icon"></i></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="spt fr cut">
            <ul>
              <?php if (!empty($goods_paging)) : ?>
              <li class="sum c999">共<b class="red"><?php echo htmlspecialchars($goods_paging['total_count'], ENT_QUOTES, "UTF-8"); ?></b>件商品</li>
              <li class="flip">
                <?php if ($goods_paging['current_page'] == $goods_paging['first_page']) : ?>
                <font>&lt;</font>
                <?php else : ?>
                <a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], 'page'=>$goods_paging['prev_page'], ));?>">&lt;</a>
                <?php endif; ?>
                <span><b class="red"><?php echo htmlspecialchars($goods_paging['current_page'], ENT_QUOTES, "UTF-8"); ?></b> / <?php echo htmlspecialchars($goods_paging['total_page'], ENT_QUOTES, "UTF-8"); ?></span>
                <?php if ($goods_paging['current_page'] == $goods_paging['last_page']) : ?>
                <font>&gt;</font>
                <?php else : ?>
                <a href="<?php echo url(array('c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], 'page'=>$goods_paging['next_page'], ));?>">&gt;</a>
                <?php endif; ?>
              </li>
              <?php else : ?>
              <li class="sum c999">共<b class="red"><?php echo count($goods_list);?></b>件商品</li>
              <li class="flip"><font>&lt;</font><span class="c999">1 / 1</span><font>&gt;</font></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="gli cut">
          <ul>
            <?php $_foreach_v_counter = 0; $_foreach_v_total = count($goods_list);?><?php foreach( $goods_list as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?>
            <li>
              <div class="im"><a href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><img alt="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/upload/goods/prime/150x150/<?php echo htmlspecialchars($v['goods_image'], ENT_QUOTES, "UTF-8"); ?>" /></a></div>
              <h3><a title="<?php echo htmlspecialchars($v['goods_name'], ENT_QUOTES, "UTF-8"); ?>" href="<?php echo url(array('c'=>'goods', 'a'=>'index', 'id'=>$v['goods_id'], ));?>"><?php echo truncate($v['goods_name'], 40);?></a></h3>
              <p class="price"><i>¥</i> <?php echo htmlspecialchars($v['now_price'], ENT_QUOTES, "UTF-8"); ?></p>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <!-- 页码开始 -->
        <div class="module aln-c mt20">
          <?php echo layout_paging(array('paging'=>$goods_paging, 'class'=>'paging', 'c'=>'category', 'a'=>'index', 'id'=>$u['cate'], 'brand'=>$u['brand'], 'att'=>$u['att'], 'minpri'=>$u['minpri'], 'maxpri'=>$u['maxpri'], 'sort'=>$u['sort'], ));?>
        </div>
        <!-- 页码结束 -->
      </div>
      <?php else : ?>
      <div class="nors mt10 pad10 aln-c c999">抱歉！未找到匹配的商品数据...</div>
      <?php endif; ?>
      <!-- 商品列表结束 -->
    </div>
    <!-- 右侧结束 -->
  </div>
  <div class="cl"></div>
  <?php echo layout_helper();?>
</div>
<!-- 主体结束 -->
<div class="cl"></div>
<!-- 页脚开始 -->
<?php echo layout_footer();?>
<!-- 页脚结束 -->
<script type="text/javascript" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/public/script/juicer.js"></script>
</body>
</html>
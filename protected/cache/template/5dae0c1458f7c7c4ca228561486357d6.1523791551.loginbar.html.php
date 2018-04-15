<?php if(!class_exists("View", false)) exit("no direct access allowed");?><script type="text/javascript">
function popLoginbar(callback){
  var login = $('#vdspoploginbar');
  $.getJSON("<?php echo url(array('c'=>'api/captcha', 'a'=>'login', ));?>", function(captchaStatus){
    if(captchaStatus.enabled){
      resetCaptcha();
      login.find('.captcha').show();
    }
    
    var width = login.width(), height = login.height(), left = ($(window).width()-login.outerWidth(true))/2, top = ($(window).height()-login.outerHeight(true))/2;
    
    $.vdsMasker(true);
    login.show().css({width:0, height:0, left:'50%', top:'50%'}).find('span.vdsfielderr').remove();
    login.animate({width:width, height:height, left:left, top:top}, 'fast').find('.close').on('click', function(){
      $.vdsMasker(false);
      login.hide().find('span.vdsfielderr').remove();
    });
    //登录请求
    login.find('.go').on('click', function(){
      var username = login.find('input[name="username"]'), password = login.find('input[name="password"]'), captcha = login.find('dl.captcha'), btn = this;
      username.vdsFieldChecker({rules:{required:[true, '请输入用户名']}, tipsPos:'fixed'});
      password.vdsFieldChecker({rules:{required:[true, '请输入密码']}, tipsPos:'fixed'});
      if(!captcha.is(':hidden')){
        captcha.find('input[name="captcha"]').vdsFieldChecker({rules: {required:[true, '请输入验证码']}, tipsPos:'fixed'});
      }
      var formChecker = login.find('form').vdsFormChecker({isSubmit: false});

      if(formChecker){
        $.ajax({
          type: 'post',
          dataType: 'json',
          url: "<?php echo url(array('c'=>'api/user', 'a'=>'login', ));?>",
          beforeSend: function(){$(btn).addClass('disabled').text('正在登陆...').prop('disabled', true)},
          data: {username:username.val(), password:hex_md5($('#password').val()+'Verydows'), captcha:captcha.find('input[name="captcha"]').val(), stay:login.find('input[name="stay"]').val()},
          success: function(res){
            if(res.status == 'success'){
              $.vdsMasker(false); login.hide(); viewTopUserbar();
              if(typeof(callback) === 'function') callback();
            }else{
              login.find('p.red').text(res.msg).show().fadeOut(2500, function(){
                $(btn).removeClass('disabled').text('登 陆').prop('disabled', false);
	resetCaptcha();
              });
              if(res.captcha == 'enabled' && captcha.is(':hidden')){
	login.find('.captcha').show();
	login.css({height:'auto', top:login.position().top - (captcha.outerHeight(true) + login.find('div.captcha').outerHeight(true))});
              }
            }
          }
        });
      }
    });
  });
}

function resetCaptcha(){
  var container = $('#vdspoploginbar'), src = "<?php echo url(array('c'=>'api/captcha', 'a'=>'image', 'v'=>'random', ));?>";
  container.find('.captcha img').attr('src', src.replace('random', Math.random()));
  container.find('input[name="captcha"]').focus();	
}
</script>
<div class="poplogin" id="vdspoploginbar">
  <h2>您尚未登录</h2>
  <p class="f14 red aln-c hide"></p>
  <form>
  <div class="popbody">
    <dl class="username">
      <dt><i class="icon"></i></dt>
      <dd><input name="username" type="text" placeholder="请输入用户名" /></dd>
    </dl>
    <dl class="pwd mt20">
      <dt><i class="icon"></i></dt>
      <dd><input name="password" type="password" id="password" placeholder="请输入密码" /></dd>
    </dl>
    <dl class="captcha mt20 hide">
      <dt><i class="icon"></i></dt>
      <dd><input name="captcha" id="captcha" type="text" placeholder="请输入验证码" /></dd>
    </dl>
    <div class="captcha mt15 hide">
      <a class="fr" onclick="resetCaptcha()"><i class="refresh icon"></i><font>点击刷新</font></a>
      <img src="<?php echo url(array('c'=>'api/captcha', 'a'=>'image', ));?>" id="captcha-img" />
    </div>
    <div class="ck module mt20 cut">
      <div class="fl"><label><input name="stay" type="checkbox" value="1" /><font class="ml5 c666">一周内自动登录</font></label></div>
      <div class="fr"><a href="<?php echo url(array('c'=>'retrieve', 'a'=>'password', ));?>">忘记密码？</a></div>
    </div>
    <div class="module mt20"><button type="button" class="go radius4">登 陆</button></div>
    <div class="c999 ml10 mt20">您还没有账号？ <a href="<?php echo url(array('c'=>'user', 'a'=>'register', ));?>">快速注册</a></div>
    <a class="close"><i class="icon"></i></a>
  </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo htmlspecialchars($common['baseurl'], ENT_QUOTES, "UTF-8"); ?>/public/script/md5.js"></script>
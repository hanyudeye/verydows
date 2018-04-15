<?php if(!class_exists("View", false)) exit("no direct access allowed");?><tr id="type-image" class="type-tr hide">
  <th>图片广告</th>
  <td>
    <dl class="upsw pad5">
      <dt class="pad5"><a class="cur ml5 mr5">上传文件</a><a class="ml10">输入URL</a></dt>
      <dd class="mt5 pad5" id="advimg">
        <div>
          <label>
          <input name="image_file" type="file" />
          </label>
          <p class="c999 mt10">仅允许上传 "png"、"jpg"、"jpeg"、"gif" 类型的图片</p>
        </div>
        <div class="hide">
          <label>
          <input title="URL" name="image_params[src]" class="w500 txt" type="text" />
          </label>
        </div>
      </dd>
    </dl>
    <div class="mt5 pad5">
      <label class="mr10"><font class="c666 mr5">图片宽度:</font><input title="宽度" id="image-w" class="w100 txt" name="image_params[width]" type="text" /><font class="c999 ml5">像素(px)</font></label>
      <label><font class="c666 mr5">图片高度:</font><input title="高度" id="image-h" class="w100 txt" name="image_params[height]" type="text" /><font class="c999 ml5">像素(px)</font></label>
      <p class="c999 mt10">(选填) 图片在浏览器中的宽度和高度，如果留空或为0则表示不限制</p>
    </div>
    <div class="mt5 pad5">
      <label><font class="c666 mr5">图片标题:</font><input title="标题" class="w300 txt" name="image_params[title]" type="text" /></label>
      <p class="c999 mt10">(选填) 鼠标悬停时图片广告显示的文字信息</p>
    </div>
    <div class="mt5 pad5">
      <label><font class="c666 mr5">图片链接:</font><input id="image-link" class="w400 txt" name="image_params[link]" type="text" /></label>
      <p class="c999 mt10">(*必填) 点击图片广告后页面跳转的链接地址，站外链接须以"http://"或"https://"开头</p>
    </div>
  </td>
</tr>
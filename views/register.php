<h1 class="title">注册</h1>
<form action="" method="post" class="section">
<div class="field">
  <label class="label">用户名</label>
  <div class="control">
    <input class="input" type="text" name="username" placeholder="请输出用户名称">
  </div>
</div>

<div class="field">
  <label class="label">邮件地址</label>
  <div class="control has-icons-left has-icons-right">
    <input name="email" class="input is-success" type="email" placeholder="Text input" value="请输入有效邮件地址">
  </div>
  <!-- <p class="help is-danger">This email is invalid</p> -->
  <!-- <p class="help is-success">This username is available</p> -->
</div>

<div class="field">
  <label class="label">密码</label>
  <div class="control has-icons-left has-icons-right">
    <input name="password" class="input is-success" type="password" placeholder="Text input" value="请输入密码">
  </div>
  <!-- <p class="help is-danger">This email is invalid</p> -->
  <!-- <p class="help is-success">This username is available</p> -->
</div>
<div class="field">
  <label class="label">确认密码</label>
  <div class="control has-icons-left has-icons-right">
    <input name="confirmPassword" class="input is-success" type="password" placeholder="Text input" value="请输入确认密码">
  </div>
  <!-- <p class="help is-danger">This email is invalid</p> -->
  <!-- <p class="help is-success">This username is available</p> -->
</div>

<div class="field is-grouped">
  <div class="control">
    <button type="submit" class="button is-link">提交</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">取消</button>
  </div>
</div>
</form>
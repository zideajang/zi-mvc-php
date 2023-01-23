<h1 class="title">Contact page</h1>
<form class="section">
<div class="field">
  <label class="label">标题</label>
  <div class="control">
    <input class="input" type="text" name="subject" placeholder="请输出用户名称">
  </div>
</div>

<div class="field">
  <label class="label">用户邮件</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-success" type="email" placeholder="Text input" value="请输入有效邮件地址">
  </div>
  <p class="help is-danger">This email is invalid</p>
  <p class="help is-success">This username is available</p>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <textarea  class="textarea"  placeholder="请输入内容" ></textarea>
  </div>
 
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Submit</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>
</div>
</form>
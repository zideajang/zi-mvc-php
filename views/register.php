<h1 class="title">注册</h1>
<?php $form = \app\core\form\Form::begin('',"post")?>
  <?php echo $form->field($model,'username',"用户名")?>
  <?php echo $form->field($model,'email',"邮件地址")?>
  <?php echo $form->field($model,'password',"密码")->passwordField()?>
  <?php echo $form->field($model,'confirmPassword',"重置密码")->passwordField()?>
  <div class="field is-grouped">
  <div class="control">
    <button type="submit" class="button is-link">提交</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">取消</button>
  </div>
</div>
<?php echo \app\core\form\Form::end()?>

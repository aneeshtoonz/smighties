<section class="content-header">
<h1>
Change password
<small>Mange your account password</small>
</h1>
</section>
<?php $this->load->view('shared/bread-crumbs');?>
<?php $this->load->view('shared/flash-message');?>
<section class="content">
<div class="row">
<div class="col-md-6">
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">User Information</h3>
</div>
<form role="form" name="category_save" action="" method="post" enctype="multipart/form-data">
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Current password</label>
<input type="password" class="form-control" name="current_password" value="<?php echo (isset($post) && $post['current_password'] != '') ? $post['current_password'] : '';?>" id="current_password" maxlength="50">
<?php if(form_error('current_password')):?>
<div id="div_text1" class="eror"><?php echo form_error('current_password');?></div>
<?php endif;?>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-6">
<label for="exampleInputEmail1">Password</label>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
<input type="password" class="form-control" name="password" value="<?php echo (isset($post) && $post['password'] != '') ? $post['password'] : '';?>" placeholder="Password" id="password" maxlength="50">
<?php if(form_error('password')):?>
<div id="div_text1" class="eror"><?php echo form_error('password');?></div>
<?php endif;?>
</div>
<div class="col-md-6">
<input type="password" class="form-control" name="confirm_password" value="<?php echo (isset($post) && $post['confirm_password'] != '') ? $post['confirm_password'] : '';?>" id="confirm_password" placeholder="Confirm password" maxlength="50">
<?php if(form_error('confirm_password')):?>
<div id="div_text1" class="eror"><?php echo form_error('confirm_password');?></div>
<?php endif;?>
</div>
</div>
</div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-success" name="save">Change password</button>
</div>
</form>
</div>
</div>
</div>
</section>

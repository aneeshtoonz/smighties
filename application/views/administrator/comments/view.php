<section class="content-header">
<h1>
User Information
</h1>
</section>
<section class="content">
<div class="row">
<div class="col-md-8">
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title">User Information</h3>
</div>

<form class="form-horizontal" action="<?php echo $ctrlUrl?>/publish/<?php echo $record->cid;?>/<?php echo ($record->status == 1) ? '0' : '1';?>">
<div class="col-sm-12">
  <div class="form-group">
  <label for="focusedinput" class="col-sm-4 control-label">Blog title :</label>
  <div class="col-sm-8 infotext">
  <?php echo $record->blog_title?>
  </div>
  </div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Name :</label>
<div class="col-sm-8 infotext">
<?php echo $record->owner?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Email Address :</label>
<div class="col-sm-8 infotext">
<?php echo $record->email?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Message :</label>
<div class="col-sm-8 infotext">
<?php echo $record->comments?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Added on:</label>
<div class="col-sm-8 infotext">
<?php echo date('d/m/Y', strtotime($record->pdate))?>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="box-footer text-center">
    <button type="submit" class="btn btn-success" name="save" ><?php echo ($record->status == 1) ? 'Unpublish' : 'Publish';?> Comment</button>
</div>
</form>
</div>
</div>
</div>
</section>

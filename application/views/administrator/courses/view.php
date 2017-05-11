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
<form class="form-horizontal">
<div class="col-sm-12">
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Name :</label>
<div class="col-sm-8 infotext">
<?php echo $record->name?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Contact No :</label>
<div class="col-sm-8 infotext">
<?php echo $record->contact_no?>
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
<?php echo $record->message?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Added on:</label>
<div class="col-sm-8 infotext">
<?php echo date('d/m/Y', strtotime($record->created_on))?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Source from:</label>
<div class="col-sm-8 infotext">
<?php echo ucfirst($record->source)?>
</div>
</div>
</div>
<div class="clearfix"></div>
</form>
</div>
</div>
</div>
</section>

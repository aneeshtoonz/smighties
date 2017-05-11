<?php if($this->session->flashdata('success_message')):?>
<div class="col-lg-12 m-b-md">
<div class="alert alert-success alert-dismissible no-margins alert-sm" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<?php echo $this->session->flashdata('success_message');?>
</div>
</div>
<?php endif;?>
<?php if($this->session->flashdata('error_message')):?>
<div class="col-lg-12 m-b-md">
<div class="alert alert-danger alert-dismissible no-margins alert-sm" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<?php echo $this->session->flashdata('error_message');?>
</div>
</div>
<?php endif;?>

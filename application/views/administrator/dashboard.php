<section class="content-header">
<h1>
Dashboard
<small>Control panel</small> </h1>
<?php $this->load->view('shared/bread-crumbs');?>
</section>
<section class="content">
<?php $this->load->view('shared/flash-message');?>
<div class="row">
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php echo $count;?>
</h3>
<p>
Poster design competition LP
</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="<?php echo $posterUrl;?>" class="small-box-footer">
More info <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php echo $countCourses;?>
</h3>
<p>
Courses LP
</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="<?php echo $coursesUrl;?>" class="small-box-footer">
More info <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 connectedSortable">
</div>
</div>
</section>

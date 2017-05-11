<section class="content-header">
<h1>
Comments Filter
</h1>
</section>
<style>.common-button{background:#efebeb;border-radius:3px;height:102px;padding:0}.common-button a:hover{background:#e4e4e4}.common-button a{color:#777474;font-size:18px;font-weight:bold;padding:38px 20px 13px 30px;display:inline-block;width:100%;height:102px;transition:all .2s ease-in}</style>
<?php $this->load->view('shared/bread-crumbs');?>
<section class="content">
<div class="row">
<div class="col-lg-2 col-xs-3">
<div class="small-box bg-green">
<div class="inner">
<h3>&nbsp;
<?php echo $count?>
</h3>
<p>
Comments
</p>
</div>
</div>
</div>
</div>
<div class="row">
<?php $this->load->view('shared/flash-message');?>
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Comments List</h3>
</div>
<div class="box-body table-responsive no-padding">
<table width="596%" class="table table-hover">
<tr>
<th>Sl.No#</th>
<th>
<a href="<?php echo $ctrlUrl?>?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=owner">Name <i class="<?php echo ($sort == 'asc' && $field == 'name') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a>
</th>
<th>Email</th>
<th>
<a href="<?php echo $ctrlUrl?>?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=pdate">Added on <i class="<?php echo ($sort == 'asc' && $field == 'created_on') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a>
</th>
<th>Publish</th>
<th>Action</th>
</tr>
<?php if($records):?>
<?php $i=0;?>
<?php foreach($records as $key=> $value):?>
<tr>
<td><?php echo ++$i;?></td>
<td><?php echo $value->name;?></td>
<td><?php echo $value->email;?></td>
<td><?php echo date('d/M/Y', strtotime($value->created_on));?></td>
<td>
  <a href="<?php echo $ctrlUrl?>/publish/<?php echo $value->id;?>/<?php echo ($value->published == 1) ? '0' : '1';?>"><?php echo ($value->published == 1) ? 'Unpublish' : 'Publish';?></a>&nbsp;
</td>
<td>
  <a href="<?php echo $ctrlUrl?>/view/<?php echo $value->id;?>">View</a>
  <a href="<?php echo $ctrlUrl?>/delete/<?php echo $value->id;?>" class="delete remove-item-action">Delete</a>
</td>
</tr>
<?php endforeach;?>
<?php else:?>
<tr>
<td colspan="5">No records has been found</td>
</tr>
<?php endif;?>
</table>
<div class="col-lg-12">
<?php echo $this->pagination->create_links(); ?>
</div>
</div>
</div>
</div>
</div>
</section>

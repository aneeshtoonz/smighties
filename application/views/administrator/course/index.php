<section class="content-header">
<h1>
Course Manage
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
Courses
</p>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12" style="margin-bottom: 15px;">
  <a href="<?php echo $ctrlUrl?>/add" class="btn btn-danger">Add</a>
  <button type="button" onclick="javascript: var form = document.getElementById('orderitems'); form.submit();" class="btn btn-success">Save Order</button>
</div>
</div>
<div class="row">
<?php $this->load->view('shared/flash-message');?>
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">List Courses</h3>
</div>
<div class="box-body table-responsive no-padding">
<form action="<?php echo HOST_URL?>/Administrator/Course/order" name="orderitems" method="post" id="orderitems">
  <table width="596%" class="table table-hover">
  <tr>
  <th>Sl.No#</th>
  <th>
  <a href="<?php echo $ctrlUrl?>?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=name">Name <i class="<?php echo ($sort == 'asc' && $field == 'name') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a>
  </th>
  <th>Meta Title</th>
  <th><a href="<?php echo $ctrlUrl?>?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=created_on">Added on <i class="<?php echo ($sort == 'asc' && $field == 'created_on') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a></th>
  <th>Order</th>
  <th>Publish</th>
  <th>Action</th>
  </tr>
  <?php if($records):?>
  <?php $i=0;?>
  <?php foreach($records as $key=> $value):?>
  <tr>
  <td><?php echo ++$i;?></td>
  <td><?php echo $value->name;?></td>
  <td title="<?php echo $value->meta_title;?>"><?php echo character_limiter($value->meta_title, 20, '...');?></td>
  <td><?php echo date('d/M/Y', strtotime($value->created_on));?></td>
  <td>
    <input type="text" name="orderby[]" value="<?php echo $value->orderby;?>" style="width: 40px; padding: 4px;"/>
    <input type="hidden" name="array_id[]" value="<?php echo $value->id;?>" />
  </td>
  <td>
    <a href="<?php echo $ctrlUrl?>/publish/<?php echo $value->id;?>/<?php echo ($value->is_active == 'Y') ? 'N' : 'Y';?>"><?php echo ($value->is_active == 'Y') ? 'Unpublish' : 'Publish';?></a>&nbsp;
  </td>
  <td>
    <a href="<?php echo $ctrlUrl?>/edit/<?php echo $value->id;?>">Edit</a>&nbsp;
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
</form>
<div class="col-lg-12">
<?php echo $this->pagination->create_links(); ?>
</div>
</div>
</div>
</div>
</div>
</section>

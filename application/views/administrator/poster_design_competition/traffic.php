<section class="content-header">
<h1>
User Traffic : Poster Design Competition 2017
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
User Traffic
</p>
</div>
</div>
</div>
<?php if($count_source_group):?>
<?php foreach ($count_source_group as $key => $value):?>
  <div class="col-lg-2 col-xs-3">
  <div class="small-box bg-gray">
  <div class="inner">
  <h3>&nbsp;
  <?php echo $value->count?>
  </h3>
  <p style="margin:0px;padding:0px;">
  <?php echo $value->source?>
  </p>
  <p style="margin:0px;padding:0px;">unique views</p>
  </div>
  </div>
  </div>
<?php endforeach;?>
<?php endif;?>
</div>
<div class="row">
<?php $this->load->view('shared/flash-message');?>
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Traffic Data</h3>
</div>
<div class="box-body table-responsive no-padding">
<table width="596%" class="table table-hover">
<tr>
<th>Sl.No#</th>
<th>
<a href="<?php echo $ctrlUrl?>/site_traffic?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=ip_address">IP Address <i class="<?php echo ($sort == 'asc' && $field == 'name') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a>
</th>
<th><a href="<?php echo $ctrlUrl?>/site_traffic?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=source">Source <i class="<?php echo ($sort == 'asc' && $field == 'source') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a></th>
<th>
<a href="<?php echo $ctrlUrl?>/site_traffic?sort=<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>&field=created_on">Added on <i class="<?php echo ($sort == 'asc' && $field == 'created_on') ? 'ion-chevron-up' : 'ion-chevron-down'?>" style="font-size: 10px;margin-left:2px;"></i></a>
</th>
</tr>
<?php if($records):?>
<?php $i=0;?>
<?php foreach($records as $key=> $value):?>
<tr>
<td><?php echo ++$i;?></td>
<td><?php echo $value->ip_address;?></td>
<td><?php echo $value->source?></td>
<td><?php echo date('d/M/Y', strtotime($value->created_on));?></td>
</tr>
<?php endforeach;?>
<?php else:?>
<tr>
<td colspan="4">No records has been found</td>
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

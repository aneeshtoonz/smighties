<?php if($records):?>
    <div class="group-page" data-page="<?php echo $page?>">
      <?php foreach ($records as $key => $value):?>

          <a data-id="<?php echo $value->id;?>" class="hvr-grow col-lg-3 col-xs-6 col-sm-6 col-md-3 smighty-item" data-toggle="modal" data-target="#profileModal" href="<?php echo HOST_URL?>/async/smighty-profile/<?php echo $value->id?>">

               <span class="image <?php echo strtolower($value->element)?>" style="background: url('<?php echo $image_show_path?>/<?php echo $value->image_url?>') no-repeat 50% 50%; background-size: 80%;">

                   <span class="profile-btm">
                       <?php echo $value->name?>
                   </span>

               </span>

               <span class="clearfix"></span>

               <span class="smighty-footer">
                   <button>More Info</button>
                   <span class="clearfix"></span>
               </span>

               <span class="clearfix"></span>

          </a>

      <?php endforeach;?>
    </div> 
<?php endif;?>

<button type="button" class="button-close" data-dismiss="modal" aria-label="Close">
  <i class="ion-close-round"></i>
</button>

<div class="profile-left pull-left">

    <h2 class="text-left"><?php echo $data->name?></h2>

    <div class="text-center profile-image">
        <img src="<?php echo $image_show_path?>/<?php echo $data->image_url?>" />
    </div>

    <div class="text-center">
          <a href="<?php echo $card_show_path?>/<?php echo $data->sm_card?>" download="<?php echo $card_show_path?>/<?php echo $data->sm_card?>" class="button-bubble">
              <span class="left"></span>
              <span class="middle">Get Smighty Card</span>
              <span class="right"></span>
         </a>
    </div>

</div>

<div class="profile-right">

    <div class="profile-info">
        <p class="head">PERSONALITY</p>
        <p><?php echo $data->personality?></p>
    </div>

    <div class="profile-info">
        <p class="head">POWER</p>
        <p><?php echo $data->power?></p>
    </div>

    <div class="profile-info">
        <p class="head">WEAKNESS</p>
        <p><?php echo $data->weakness?></p>
    </div>

    <div class="profile-info">
        <p class="head">FAVOURITE COLOR</p>
        <p><?php echo $data->fav_color?></p>
    </div>

    <div class="profile-info">
        <p class="head">FAVOURITE FOOD</p>
        <p><?php echo $data->fav_food?></p>
    </div>

    <div class="profile-info">
        <p class="head">BIRTHDAY</p>
        <p><?php echo date('F d', strtotime($data->birthday))?></p>
    </div>

    <div class="row">
        <div class="col-lg-6">
          <div class="profile-info">
              <p class="head">ELEMENT</p>
              <p><?php echo $data->element?></p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="profile-info">
              <p class="head">RARITY</p>
              <p><?php echo $data->rarity?></p>
          </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>

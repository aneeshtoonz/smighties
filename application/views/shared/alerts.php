<?php if(isset($Error)):?>
<div class="alert <?php echo (isset($Error) && $Error == 'Y') ? 'alert-danger' : 'alert-success'?> no-margins alert-sm">
<?php echo $MSG;?>
</div>
<?php endif;?>

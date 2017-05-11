<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Add Testimonial
    </h1>

</section>

<?php $this->load->view('shared/bread-crumbs');?>
<?php $this->load->view('shared/alerts');?>

<!-- Main content -->
<section class="content">

  <!-- form start -->
  <form role="form" name="category_save" action="" method="post"  enctype="multipart/form-data">

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                </div><!-- /.box-header -->

                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo (isset($post) && $post['name'] != '') ? $post['name'] : '';?>" id="name" maxlength="50">
                            <?php if(form_error('name')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('name');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Company</label>
                            <input type="text" class="form-control" name="company" value="<?php echo (isset($post) && $post['company'] != '') ? $post['company'] : '';?>" id="company" maxlength="50" />
                            <?php if(form_error('company')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('company');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>
                            <input type="text" class="form-control" name="designation" value="<?php echo (isset($post) && $post['designation'] != '') ? $post['designation'] : '';?>" id="designation" maxlength="50" />
                            <?php if(form_error('designation')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('designation');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook URL</label>
                            <input type="text" class="form-control" name="fb_url" value="<?php echo (isset($post) && $post['fb_url'] != '') ? $post['fb_url'] : '';?>" id="fb_url" maxlength="50" />
                            <?php if(form_error('fb_url')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('fb_url');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Show on home page?</label>
                            <input type="checkbox" name="show_home" <?php echo (isset($post) && $post['show_home'] != '') ? 'checked' : '';?> id="show_home" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="userfile" id="userfile" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Comment</label>
                            <textarea class="form-control" style="height: 150px;" name="comment" id="comment"><?php echo (isset($post) && $post['comment'] != '') ? $post['comment'] : '';?></textarea>

                            <?php if(form_error('comment')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('comment');?></div>
                            <?php endif;?>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" name="save" >Update page content</button>
                        </div>

                    </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

    </div>
    <!-- /.row -->

    </form>

</section><!-- /.content -->

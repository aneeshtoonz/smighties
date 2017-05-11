<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Add News Details
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
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo (isset($post) && $post['title'] != '') ? $post['title'] : '';?>" id="title" maxlength="50">
                            <?php if(form_error('title')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('title');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">SEO Title</label>
                            <input type="text" class="form-control" name="seo_title" value="<?php echo (isset($post) && $post['seo_title'] != '') ? $post['seo_title'] : '';?>" id="seo_title" maxlength="50" />
                            <?php if(form_error('seo_title')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('seo_title');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords" value="<?php echo (isset($post) && $post['meta_keywords'] != '') ? $post['meta_keywords'] : '';?>" id="meta_keywords" placeholder="eg:- animation courses, animation courses in Kerala" />

                            <?php if(form_error('meta_keywords')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('meta_keywords');?></div>
                            <?php endif;?>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Description</label>
                            <textarea class="form-control" style="height: 150px;" name="meta_description" id="meta_description"><?php echo (isset($post) && $post['meta_description'] != '') ? $post['meta_description'] : '';?></textarea>

                            <?php if(form_error('meta_description')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('meta_description');?></div>
                            <?php endif;?>

                        </div>

                        <div class="form-group">

                          <?php if($image_url):?>
                          <div class="row">
                            <div class="col-lg-12">
                               <img src="<?php echo $imageShowPath?>/<?php echo $image_url?>" width="300"/>
                            </div>
                          </div>
                          <?php endif;?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="userfile" id="userfile" />

                                    <?php if(isset($IMGError) && $IMGError == 'Y'):?>
                                        <div id="div_text1" class="eror" ><?php echo $IMGMSG;?></div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                    <div class="box-body">

                      <div class="form-group">
                          <label for="exampleInputEmail1">Short Description</label>
                          <textarea class="form-control" style="height: 150px;" name="description" id="description"><?php echo (isset($post) && $post['description'] != '') ? $post['description'] : '';?></textarea>

                          <?php if(form_error('description')):?>
                              <div id="div_text1" class="eror" ><?php echo form_error('description');?></div>
                          <?php endif;?>

                      </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Page content</label>
                          <textarea class="form-control editor" name="detail_news" id="detail_news"><?php echo (isset($post) && $post['detail_news'] != '') ? $post['detail_news'] : '';?></textarea>

                          <?php if(form_error('detail_news')):?>
                              <div id="div_text1" class="eror" ><?php echo form_error('detail_news');?></div>
                          <?php endif;?>

                      </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" name="save" >Update page content</button>
                        </div>

                    </div>

            </div><!-- /.box -->
        </div><!-- /.col -->

    </div>
    <!-- /.row -->

    </form>

</section><!-- /.content -->

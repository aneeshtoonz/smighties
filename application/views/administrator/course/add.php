<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Add Course Details
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
                            <label for="exampleInputEmail1">Short name</label>
                            <input type="text" class="form-control" name="short_name" value="<?php echo (isset($post) && $post['short_name'] != '') ? $post['short_name'] : '';?>" id="short_name" maxlength="50" />
                            <?php if(form_error('short_name')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('short_name');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="Animation & Film Making" <?php echo (isset($post) && $post['category'] != 'Animation & Film Making') ? 'selected' : '';?>>Animation & Film Making</option>
                                <option value="Gaming" <?php echo (isset($post) && $post['category'] != 'Gaming') ? 'selected' : '';?>>Gaming</option>
                                <option value="Visual Effects" <?php echo (isset($post) && $post['category'] != 'Visual Effects') ? 'selected' : '';?>>Visual Effects</option>
                                <option value="Graphic & Multimedia" <?php echo (isset($post) && $post['category'] != 'Graphic & Multimedia') ? 'selected' : '';?>>Graphic & Multimedia</option>
                            </select>
                            <?php if(form_error('category')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('category');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Duration</label>
                            <input type="text" class="form-control" name="duration" value="<?php echo (isset($post) && $post['duration'] != '') ? $post['duration'] : '';?>" id="duration" maxlength="50" />
                            <?php if(form_error('duration')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('duration');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Affiliation (if any)</label>
                            <input type="text" class="form-control" name="affiliation" value="<?php echo (isset($post) && $post['affiliation'] != '') ? $post['affiliation'] : '';?>" id="affiliation" maxlength="50" />
                            <?php if(form_error('affiliation')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('affiliation');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Course SEO Url</label>
                            <input type="text" class="form-control" name="seo_link" value="<?php echo (isset($post) && $post['seo_link'] != '') ? $post['seo_link'] : '';?>" id="seo_link" maxlength="50" />
                            <?php if(form_error('seo_link')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('seo_link');?></div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="<?php echo (isset($post) && $post['meta_title'] != '') ? $post['meta_title'] : '';?>" id="meta_title" />

                            <?php if(form_error('meta_title')):?>
                                <div id="div_text1" class="eror" ><?php echo form_error('meta_title');?></div>
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

                    </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                    <div class="box-body">

                      <div class="form-group">
                          <label for="exampleInputEmail1">Page content</label>
                          <textarea class="form-control editor" name="content" id="content"><?php echo (isset($post) && $post['content'] != '') ? $post['content'] : '';?></textarea>

                          <?php if(form_error('content')):?>
                              <div id="div_text1" class="eror" ><?php echo form_error('content');?></div>
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

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Logs
        <small>See the activity logs</small>
    </h1>

</section>

 <?php $this->load->view('shared/bread-crumbs');?>

<!-- Main content -->
<section class="content">

  <!-- Small boxes (Stat box) -->
  <div class="row">


      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner">
                  <h3>&nbsp;

                  </h3>
                  <p>
                      Clear logs
                  </p>
              </div>
              <div class="icon">
                  <i class="ion ion-trash-a"></i>
              </div>
              <a href="<?php echo $ctrlUrl?>/clear" class="small-box-footer">
                  Click here <i class="fa fa-arrow-circle-right"></i>
              </a>
          </div>
      </div><!-- ./col -->

  </div><!-- /.row -->

    <!-- top row -->
    <div class="row">

        <?php $this->load->view('shared/flash-message');?>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Logs List</h3>
                    <div class="box-tools">
                        <form action="" name="search" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control input-sm pull-right" value="<?php echo (isset($search) && $search != '') ? $search : '';?>" style="width: 180px;" placeholder="Search on Controllers"/>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table width="596%" class="table table-hover">
                        <tr>
                            <th>Sl.No#</th>
                            <th>Name</th>
                            <th>Controller</th>
                            <th>Action</th>
                            <th>Message</th>
                            <th>Created on</th>
                            <th>Delete</th>
                        </tr>

                        <?php if($records):?>

                          <?php $i = 0;?>

                          <?php foreach($records as $key => $value):?>
                          <tr>
                              <td><?php echo ++$i;?></td>
                              <td><?php echo $value->username;?></td>
                              <td><?php echo $value->controller;?></td>
                              <td><?php echo $value->action;?></td>
                              <td><?php echo $value->message;?></td>
                              <td><?php echo date('Y M d h:i:s A', strtotime($value->crdate));?></td>
                              <td><a class="remove-item-action" href="<?php echo $ctrlUrl?>/delete/<?php echo $value->_id?>">Delete</a></td>
                          </tr>
                        <?php endforeach;?>

                        <?php else:?>

                          <tr>
                              <td colspan="7">No records has been found</td>
                          </tr>

                        <?php endif;?>

                    </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>
    <!-- /.row -->


</section><!-- /.content -->

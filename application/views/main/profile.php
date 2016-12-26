<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>
        </div>            
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage your profile data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>assets/img/userIcon.jpg" alt="Avatar">
                                </div>
                            </div>
                            <?php
                            foreach($info_user as $var){
                            ?>
                                <h3><?php echo $var->name; echo " ".$var->surname; ?></h3>
                                <ul class="list-unstyled user_data">
                                    <li>
                                        <i class="fa fa-user user-profile-icon" style="margin-right:5px;"></i> <?php echo $var->user_name; ?>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope user-profile-icon" style="margin-right:5px;"></i> <?php echo $var->email; ?>
                                    </li>
                                    
                                    <?php
                                    if($role != 1){
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>main/user_queries/<?php echo $id_user; ?>"><i class="fa fa-database user-profile-icon" style="margin-right:5px;"></i> <?php echo $num_queries." Queries"; ?></a>
                                        </li>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <li>
                                            <i class="fa fa-database user-profile-icon" style="margin-right:5px;"></i> You can't create queries.
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            <?php
                            }
                            ?>
                            <br />
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-10">
                                    <h2>Change your personal data</h2>
                                </div>
                            </div>
                            <div style="margin-top:20px;">
                                <form action="<?php echo base_url(); ?>main/profile_data_val" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Name </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="text" name="name" value="<?php echo set_value('name') ?>" class="form-control" placeholder="New name" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Surname </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="text" name="surname" value="<?php echo set_value('surname') ?>" class="form-control" placeholder="New surname" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Password * </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="password" name="password" class="form-control" placeholder="Confirm password" />
                                            <small style="color:red;"><?php echo form_error('password'); ?></small>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                                            <button type="submit" class="btn btn-success">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-10">
                                    <h2>Change your password</h2>
                                </div>
                            </div>
                            <div style="margin-top:20px;">
                                <form action="<?php echo base_url(); ?>main/profile_pass_val" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Old pass * </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="password" name="oldpass" class="form-control" placeholder="Old password" />
                                            <small style="color:red;"><?php echo form_error('oldpass'); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-5 col-sm-5 col-xs-12">New pass * </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="password" name="newpass1" class="form-control" placeholder="New password" />
                                            <small style="color:red;"><?php echo form_error('newpass1'); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Repeat new pass * </label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <input type="password" name="newpass2" class="form-control" placeholder="New password" />
                                            <small style="color:red;"><?php echo form_error('newpass2'); ?></small>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                                            <button type="submit" class="btn btn-success">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
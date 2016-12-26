<div class="top_nav">
    <div class="nav_menu">
        <nav>
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>assets/img/userIcon.jpg" alt=""><strong><?php echo $username; ?></strong>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="<?php echo base_url(); ?>main/profile"> Profile</a></li>
                        <?php
                        if($role == 1){
                            ?>
                            <li><a href="<?php echo base_url(); ?>home/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            <?php
                        }
                        else{
                            ?>
                            <li><a href="<?php echo base_url(); ?>main/user_queries"> My queries</a></li>
                            <li><a href="<?php echo base_url(); ?>home/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Search by web portal</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of the configuration files of web portal '<?php echo $wp_name; ?>'</h2>
                        <a href="<?php echo base_url(); ?>main/web_portal_list"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:55%">File name</th>
                                    <th style="width:15%">Web portal</th>
                                    <th style="width:15%">Category</th>
                                    <th style="width:15%">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($cf_names as $var){
                                ?>
                                <tr>
                                    <td><a href="<?php echo base_url(); ?>main/file_queries/<?php echo $var->id_cf; ?>"><?php echo $var->name; ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>main/web_portal/<?php echo $var->id_wp; ?>"><?php echo $var->namewp; ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>main/category/<?php echo $var->id_cat; ?>"><?php echo $var->namecat; ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>main/date/<?php echo $var->file_date; ?>"><?php echo $var->file_date; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
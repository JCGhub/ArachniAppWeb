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
                        <h2>Full list of the configuration files</h2>
                        <a href="<?php echo base_url(); ?>query/web_portal_list"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                        </p>
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
                                    <td><a href="<?php echo base_url(); ?>query/file_queries/<?php echo $var->id_cf; ?>"><?php echo $var->name; ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>query/web_portal/<?php echo $var->id_wp; ?>"><?php echo $var->namewp; ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>query/category/<?php echo $var->id_cat; ?>"><?php echo $var->namecat; ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>query/date/<?php echo $var->file_date; ?>"><?php echo $var->file_date; ?></td>
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
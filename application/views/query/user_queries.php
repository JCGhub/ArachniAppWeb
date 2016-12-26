<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Queries</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of the queries of the user '<?php echo $username; ?>'</h2>
                        <a href="javascript:window.history.go(-1);"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                        </p>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Query name</th>
                                    <th style="width:30%">File</th>
                                    <th style="width:12%">Role</th>
                                    <th style="width:15%">Creator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($user_queries as $var){
                                ?>
                                <tr>
                                    <td><a href="<?php echo base_url(); ?>query/file_name_row/<?php echo $var->id_query; ?>"><?php echo $var->name; ?></a><i class="fa fa-eye pull-right"></i></td>
                                    <td><?php echo $var->namecf; ?></td>
                                    <td><?php echo $var->namerole; ?></td>
                                    <td><?php echo $username; ?></td>
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
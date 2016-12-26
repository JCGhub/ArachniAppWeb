<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>File Queries</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of the queries of the file '<?php echo $name_file; ?>'</h2>
                        <?php
                        if($role != "1"){
                            ?>
                            <a href="<?php echo base_url(); ?>query/query_form/<?php echo $id_cf; ?>"><button class="btn btn-info btn-xs pull-right" style="vertical-align:middle;" type="button">Create query</button></a>
                            <?php
                        }
                        ?>
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
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No query for this configuration file!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
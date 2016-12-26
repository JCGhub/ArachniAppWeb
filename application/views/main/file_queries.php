<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>File Name Queries</h3>
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
                            <a href="<?php echo base_url(); ?>main/query_form/<?php echo $id_cf; ?>"><button class="btn btn-info btn-xs pull-right" style="vertical-align:middle;" type="button">Create query</button></a>
                            <?php
                        }
                        ?>
                        <a href="javascript:window.history.go(-1);"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Query name</th>
                                    <th style="width:15%">Role</th>
                                    <th style="width:20%">Creator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($file_queries as $var){
                                ?>
                                <tr>
                                    <td><a href="<?php echo base_url(); ?>main/file_name_row/<?php echo $var->id_query; ?>"><?php echo $var->name; ?></a>
                                    <?php
                                    if($var->name != "Default query" && $id_user == $var->id_user){
                                        ?>
                                        <a href="<?php echo base_url(); ?>main/delete_query/<?php echo $var->id_query; ?>"><i class="fa fa-trash-o pull-right" style="padding-left:5px;"></i></a>
                                        <?php
                                    }
                                    ?>
                                    <a href="<?php echo base_url(); ?>main/query_view/<?php echo $var->id_query; ?>"><i class="fa fa-eye pull-right"></i></a></td>
                                    <td><?php echo $var->namerole; ?></td>
                                    <td><?php echo $var->nameuser; ?></td>
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
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detailed information</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Attributes of entity '<?php echo $entity; ?>'<small>from file '<?php echo $id_cf; ?>'</small></h2>
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
                                    <th style="width:17%">Attribute name</th>
                                    <th>Information</th>
                                    <th style="width:15%">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($info as $var){
                                ?>
                                <tr>
                                    <td><?php echo $var->name; ?></td>
                                    <td><?php echo $var->value; ?></td>
                                    <td><?php echo $var->date; ?></td>
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
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Query Results</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Query '<?php echo $name_query; ?>' of the file name '<?php echo $name_file; ?>'</h2>
                        <button class="btn btn-info btn-xs pull-right" style="vertical-align:middle;" type="button" id="export" data-export="export" onclick="$('table').tableToCSV();">Export to CSV</button>
                        <a href="javascript:window.history.go(-1);"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <?php
                                    $i = 0;
                                    $j = 0;

                                    foreach($fields as $fi){
                                        switch($fi){
                                            case "id_str": ?> <th style="width:6%"><?php echo $fi; ?></th> <?php
                                                            break;
                                            case "name": ?> <th style="width:12%"><?php echo $fi; ?></th> <?php
                                                            break;

                                            case "value": ?> <th><?php echo $fi; ?></th> <?php
                                                            break;

                                            case "entity": ?> <th style="width:10%"><?php echo $fi; ?></th> <?php
                                                            $i++;
                                                            break;

                                            case "date": ?> <th style="width:15%"><?php echo $fi; ?></th> <?php
                                                            $j++;
                                                            break;

                                            case "id_wp": ?> <th style="width:6%"><?php echo $fi; ?></th> <?php
                                                            break;

                                            case "id_cf": ?> <th style="width:6%"><?php echo $fi; ?></th> <?php
                                                            break;

                                            case "id_cat": ?> <th style="width:6%"><?php echo $fi; ?></th> <?php
                                                            break;

                                            default: ?> <th><?php echo $fi; ?></th> <?php
                                                        break;
                                        }
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($result as $var){
                                ?>
                                <tr>
                                    <?php
                                    foreach($fields as $fivar){
                                        if($i == 1 && $j == 1 && $fivar == "value"){
                                        ?>
                                            <td><?php echo $var->$fivar; ?><a href="<?php echo base_url(); ?>main/info_detail/<?php echo $var->entity; ?>/<?php echo $var->date; ?>"><i class="fa fa-external-link pull-right"></i></a></td>
                                        <?php
                                        }
                                        else{
                                        ?>
                                            <td><?php echo $var->$fivar; ?></td>
                                        <?php
                                        }                                    
                                    }
                                    ?>
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
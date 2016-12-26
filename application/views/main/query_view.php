<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Query</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>SQL sentence of the query '<?php echo $query_name; ?>'</h2>
                        <a href="javascript:window.history.go(-1);"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            <?php
                            echo $query_view;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
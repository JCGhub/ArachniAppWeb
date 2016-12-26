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
                        <h2>Full list of web portals</small></h2>
                        <a href="<?php echo base_url(); ?>query"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="<?php echo base_url(); ?>query/web_portal" class="form-horizontal form-label-left" method="get">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select the web portal</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="selectWebPortal" class="select2_single form-control" tabindex="-1">
                                        <?php
                                        foreach($portals as $var){
                                        ?>
                                            <option value="<?php echo $var->id_wp; ?>"><?php echo $var->name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
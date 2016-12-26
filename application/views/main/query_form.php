<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create query</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Query form of the file name '<?php echo $name_file; ?>'</h2>
                        <a href="javascript:window.history.go(-1);"><button class="btn btn-warning btn-xs pull-right" style="vertical-align:middle;" type="button">Return</button></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            This is where you can create a query about downloaded information. Do not forget that the name of the table is 'string_info', and remember to specify the id of the current configuration file in the WHERE clause. If you have used alias in your query, you must provide them. The FROM clause is obvious.
                        </p>
                        <p class="text-muted font-13 m-b-30">
                            <b>Invalid words/characters:</b> Field identificators in SELECT and WHERE clauses (id_xx) and ';' character.
                        </p>
                        <br />
                        <form action="<?php echo base_url(); ?>main/query_form_val/<?php echo $id_cf; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Query name * </label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="name" value="<?php echo set_value('name') ?>" class="form-control" placeholder="Name" />
                                    <small style="color:red;"><?php echo form_error('name'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Role</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <select name="role" class="select2_single form-control" tabindex="-1">
                                        <?php
                                        foreach($roles as $var){
                                        ?>
                                            <option value="<?php echo $var->id_role; ?>"><?php echo $var->name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">SELECT * </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea name="select" class="form-control" rows="1" placeholder="<?php echo "column1, column2, ..."; ?>"></textarea>
                                    <small style="color:red;"><?php echo form_error('select'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">First alias </label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input type="text" name="alias1" class="form-control" placeholder="Alias 1" />
                                    <small style="color:red;"><?php echo form_error('alias1'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Second alias </label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input type="text" name="alias2" class="form-control" placeholder="Alias 2" />
                                    <small style="color:red;"><?php echo form_error('alias2'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Third alias </label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input type="text" name="alias3" class="form-control" placeholder="Alias 3" />
                                    <small style="color:red;"><?php echo form_error('alias3'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Fourth alias </label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input type="text" name="alias4" class="form-control" placeholder="Alias 4" />
                                    <small style="color:red;"><?php echo form_error('alias4'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">ON </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea name="on" class="form-control" rows="1" placeholder="alias1.field = alias2.field ..."></textarea>
                                    <small style="color:red;"><?php echo form_error('on'); ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">WHERE </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea name="where" class="form-control" rows="2" placeholder="<?php echo "value LIKE '%Beautiful%' AND ..."; ?>"></textarea>
                                    <small style="color:red;"><?php echo form_error('where'); ?></small>
                                </div>
                                <label class="col-md-2 col-sm-2 col-xs-12">;</label>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
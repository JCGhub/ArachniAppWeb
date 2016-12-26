<div class="animate form login_form">
    <section class="login_content">
        <?php echo form_open('home/signin_val'); ?>
        <h2>Enter to ArachniApp</h2>
        </br>
            <div>
                <small style="color:red;"><?php echo form_error('username'); ?></small>
                <input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control" placeholder="Username" />
            </div>
            <div>
                <small style="color:red;"><?php echo form_error('password'); ?></small>
                <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>
            <div class="loginButton">
                <input class="btn btn-default submit" type="submit" value="Sign in" />
            </div>
            <!--<div class="loginButton">
                <a class="reset_pass" href="<?php echo base_url(); ?>recovery_pass">Lost your password?</a>
            </div>-->
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link">New to site?
                    <a href="<?php echo base_url(); ?>home/signup"> Create Account </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                    <img src="<?php echo base_url(); ?>/assets/img/AAlogo2.png" style="width:60%;">
                    <br />
                    <br />
                    <p>&copy; 2016 · All rights reserved · Web design based on the Bootstrap 3 template Gentelella Alela!</p>
                </div>
            </div>
        </form>
    </section>
</div>
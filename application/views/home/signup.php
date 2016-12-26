<div class="animate form login_form">
    <section class="login_content">
        <?php echo form_open('home/signup_val'); ?>
        <h2>Create a new account</h2>
        </br>
            <div>
                <small style="color:red;"><?php echo form_error('username'); ?></small>
                <input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control" placeholder="Username" />
            </div>
            <div>
                <small style="color:red;"><?php echo form_error('name'); ?></small>
                <input type="text" name="name" value="<?php echo set_value('name') ?>" class="form-control" placeholder="Name" />
            </div>
            <div>
                <small style="color:red;"><?php echo form_error('surname'); ?></small>
                <input type="text" name="surname" value="<?php echo set_value('surname') ?>" class="form-control" placeholder="Surname" />
            </div>
            <div>
                <small style="color:red;"><?php echo form_error('email'); ?></small>
                <input type="text" name="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Email" />
            </div>
            <div>
                <small style="color:red;"><?php echo form_error('password'); ?></small>
                <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>
            <div>
                <input class="btn btn-default submit" type="submit" value="Submit" />
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link">Already a member?
                    <a href="<?php echo base_url(); ?>"> Log in </a>
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
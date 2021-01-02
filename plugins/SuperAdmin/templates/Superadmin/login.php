<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Login</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>

                <form method="post" accept-charset="utf-8" id="admin-login-form" action="">
                    <input type="hidden" name="_csrfToken" value="<?=$this->request->getAttribute('csrfToken');?>">
                    <div class="form-area">
                        <div class="input text">
                            <input type="text" name="email" class="md-input" id="email" placeholder="Username"/>
                        </div><div class="input password">
                            <input type="password" name="password" class="md-input" id="password" placeholder="Password"/>
                        </div>
                        <input class="wc-btn-normal" type="submit" value="Sign in">
                    </div>

                    <div class="remeber-box flex-container">
                        <label class="wc-checkbox-radio tfs-8">
                            <span class="color-black">Remember Me</span>
                            <input type="checkbox">
                            <span class="b-input"></span>
                        </label>
                        <div class="forget">
                            <!-- <a href="/forgot-password">Forgot Password ?</a> -->
                            <?=$this->Html->link('Forgot Password ?','/super-admin/forgot-password');?>
                        </div>
                    </div>
                </form>

                

              <!--  <div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div> -->

                <div class="separate-box">
                    <span>or</span>
                </div>
                <div class="new-signup">
                    <a href="#">Sign up for new account</a>
                </div>
            </div>
        </div>

    </div>
</section>
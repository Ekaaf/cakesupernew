<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Login</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user,['id'=>'admin-login-form','type' => 'post']) ?>
                
                    <div class="form-area">
                        <?php 
                            echo $this->Form->control('email',['class'=>'md-input','type'=>'email','required' => false, 'placeholder'=>'Email', 'label' => false]);

                            echo $this->Form->control('password',['class'=>'md-input', 'type'=>'password', 'required' => false, 'placeholder'=>'Password','label' => false]);
                        ?>
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
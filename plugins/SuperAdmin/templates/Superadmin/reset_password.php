<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Reset Password</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user,['id'=>'admin-login-form','type' => 'post']) ?>
                    <div class="form-area">
                        <?php
                            echo $this->Form->control('new_password',['class'=>'md-input', 'type'=>'password', 'required' => false, 'placeholder'=>'New Password','label' => false]);

                            echo $this->Form->control('confirm_password',['class'=>'md-input', 'type'=>'password', 'required' => false, 'placeholder'=>'Confirm Password','label' => false]);

                        ?>
                        <input class="wc-btn-normal" type="submit" value="Reset Password">
                    </div>

                </form>

                

            </div>
        </div>

    </div>
</section>
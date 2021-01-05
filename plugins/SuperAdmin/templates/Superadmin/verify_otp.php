<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Verify Otp</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($usersOtp,['id'=>'admin-login-form','type' => 'post']) ?>
                    <div class="form-area">
                        <?php 
                            echo $this->Form->control('otp',['class'=>'md-input','required' => false, 'placeholder'=>'OTP', 'label' => false]);
                        ?>
                        <input class="wc-btn-normal" type="submit" value="Verify">
                    </div>
                </form>

                

            </div>
        </div>

    </div>
</section>
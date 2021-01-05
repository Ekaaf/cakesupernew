<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Forgot Password</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>

                <?= $this->Flash->render() ?>
                <?= $this->Form->create($passwordReset,['id'=>'admin-login-form','type' => 'post']) ?>
                    <input type="hidden" name="_csrfToken" value="<?=$this->request->getAttribute('csrfToken');?>">
                    <div class="form-area">
                        <?php 
                            echo $this->Form->control('email',['class'=>'md-input','type'=>'email', 'required' => false, 'placeholder'=>'email', 'label' => false]);
                        ?>
                        <input class="wc-btn-normal" type="submit" value="Send">
                    </div>
                </form>

                

            </div>
        </div>

    </div>
</section>
<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Reset Password</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>

                <form method="post" accept-charset="utf-8" id="admin-login-form" action="">
                    <input type="hidden" name="_csrfToken" value="<?=$this->request->getAttribute('csrfToken');?>">
                    <div class="form-area">
                        <div class="input text">
                            <input type="password" name="new_password" class="md-input" id="new_password" placeholder="New Password"/>
                        </div><div class="input password">
                            <input type="password" name="confirm_password" class="md-input" id="confirm_password" placeholder="Confirm Password"/>
                        </div>
                        <input class="wc-btn-normal" type="submit" value="Reset Password">
                    </div>

                </form>

                

            </div>
        </div>

    </div>
</section>
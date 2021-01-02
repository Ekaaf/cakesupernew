<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Verify Otp</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>

                <form method="post" accept-charset="utf-8" id="admin-login-form" action="">
                    <input type="hidden" name="_csrfToken" value="<?=$this->request->getAttribute('csrfToken');?>">
                    <div class="form-area">
                        <div class="input text">
                            <input type="text" name="otp" id="otp" class="md-input" placeholder="OTP"/>
                        </div>
                        <input class="wc-btn-normal" type="submit" value="Verify">
                    </div>
                </form>

                

            </div>
        </div>

    </div>
</section>
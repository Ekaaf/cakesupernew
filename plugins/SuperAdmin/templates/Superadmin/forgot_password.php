<section class="main-body-container">

    <div class="login-area">
        <div class="login-right">
            <div class="login-box v-middle">
                <h3>Forgot Password</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>

                <form method="post" accept-charset="utf-8" id="admin-login-form" action="">
                    <input type="hidden" name="_csrfToken" value="<?=$this->request->getAttribute('csrfToken');?>">
                    <div class="form-area">
                        <div class="input text">
                            <input type="email" name="email" id="email" class="md-input" placeholder="email"/>
                        </div>
                        <input class="wc-btn-normal" type="submit" value="Send">
                    </div>
                </form>

                

            </div>
        </div>

    </div>
</section>
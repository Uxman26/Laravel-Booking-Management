@extends('layout.app')
@section('section')
    <!-- ================ Login section start ================= -->
    <section class="signin-content">
        <div class="container">
            <div class="row align-items-center text-center text-md-left">
                <div class="col-md-5" style="margin: auto">
                    <p class="title">Sign In To Your Account.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="https://bookforvisa.com/login" id="login-form">
                                <input type="hidden" name="_token" value="IHqxkXP113kY1DvgrhLTblK6OXHTXyPlTqgBGpkM">
                                <input type="hidden" name="booked_type" value="">
                                <input type="hidden" name="booked_id" value="">
                                <input type="hidden" name="flight_id" value="">
                                <input type="hidden" name="hotel_id" value="">
                                <input type="hidden" name="redirect_to" value="">
                                <div class="row mb-4 mt-4 social-login-btns">
                                    <div class="col-sm-12 social-buttons">
                                        <a class="btn btn-block btn-social btn-google-plus"
                                            href="https://bookforvisa.com/login/google">
                                            <i class="fab fa-google-plus-square mr-2"></i>
                                            Sign in with Google
                                        </a>
                                        <a class="btn btn-block btn-social btn-facebook"
                                            href="https://bookforvisa.com/login/facebook">
                                            <i class="fab fa-facebook-square mr-2"></i>
                                            Sign in with Facebook
                                        </a>
                                        <a class="btn btn-block btn-social btn-twitter"
                                            href="https://bookforvisa.com/login/twitter">
                                            <i class="fab fa-twitter-square mr-2"></i>
                                            Sign in with Twitter
                                        </a>
                                    </div>
                                </div>
                                <p class="text-center or-log">Or</p>

                                <div class="form-group np3 ">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email">
                                </div>

                                <div class="form-group np3 mpb mb-2">
                                    <input id="password" type="password" class="form-control" name="password"
                                        placeholder="Password">
                                </div>

                                <div class="row">
                                    <div class="checkbox  c808080 col-sm-6 sh_pass np col-xs-6">
                                        <label id="show-password">
                                            <input type="checkbox" id="showpass"><label
                                                for="show-password"><span></span></label>
                                            Show Password </label>
                                    </div>

                                    <div class="checkbox  c808080 col-sm-6 np col-xs-6 text-right">
                                        <p class="pull-right c808080 checkbox">
                                            <a href="https://bookforvisa.com/password/reset" class="c808080 p10">
                                                Forget Password
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <div id="recaptcha" class="g-recaptcha"
                                    data-sitekey="6Lcjmh4nAAAAAN9GSssHVAxEm7mRLI2ZimQF7YCq" data-callback="setResponse"
                                    data-size="invisible"></div>
                                <div class="text-center">
                                    <button class="button button-hero mt-4 mb-4" id="submit-btn-login">LOGIN</button>
                                </div>

                                <div class="clearfix"></div>

                                <p class="text-center mb-4 no-account">Don&#039;t have an account ? <a
                                        href="https://bookforvisa.com/register" class="">Sign up here</a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ================ Login section end ================= -->
@endsection

@extends('layout.app')
@section('section')
    <style>
        #contact_modal .modalcontact-info ul li .info-card .content h2 {

            margin: 0px 0px 0px 0px !important;
        }

        #contact_modal .modalcontact-info ul li {

            padding: 4px;
        }

        .wrapper {
            width: 100%;
            text-align: center;
        }

        .heading {
            font-size: 40px;
            padding-bottom: 10px;
        }

        a.btn.big:hover {
            background: #e40001;
            color: #fff
        }

        a.btn.big {
            border: 1px solid #e40001;
            color: #e40001;
            padding: 16px;
            font-size: 20px;
        }

        .wrapper i.fa.fa-envelope {
            font-size: 50px;
            margin: 40px 0 16px;
        }

        .link-item {
            align-items: center;
        }

        .link-item {
            display: flex;
            font-size: 18px;
            color: #495059;
            line-height: 24px;
            padding-bottom: 0;
            padding-top: 14px;
        }

        li {
            list-style: none;
            padding: 12px;
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        img.icons {
            height: 33px;
            margin: 8px 10px;
            width: 27px;
            object-fit: contain;
        }
    </style>
    <!--================Service Area Start =================-->
    <section class="section-margin contact-sec fourk-heigth-control" style="margin: 20px 0px !important;">
        <div class="container">
            <div class="section-intro text-center pb-4">
                <h2> Contact Us</h2>
                <p>Get in touch and let us know how we can help.</p>
            </div>

            <div class="row justify-content-center align-items-center">

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" style="display:none;">
                    <a style="color: #000000;" href="#" data-toggle="modal" data-target="#contact_modal1"
                        class="modal_contact_us" id="flight">
                        <div class="service-card text-center">

                            <div class="service-card-img">
                                <img class="img-fluid"
                                    src="https://bookforvisa.com/assets_newdesign/img/contact/service-3.png" alt="">
                            </div>

                            <div class="service-card-body">
                                <h3>Flight Inquiry</h3>
                                <p>If you have any flight or visa application related question, feel free to contact us</p>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" style="display:none;">
                    <a style="color: #000000;" href="#" data-toggle="modal" data-target="#contact_modal1"
                        class="modal_contact_us" id="hotel">
                        <div class="service-card text-center">

                            <div class="service-card-img">
                                <img class="img-fluid"
                                    src="https://bookforvisa.com/assets_newdesign/img/contact/service-2.png" alt="">
                            </div>

                            <div class="service-card-body">
                                <h3>Hotel Inquiry</h3>
                                <p>If you have any hotel related question or reservation inquiry, feel free to contact us
                                </p>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-4 mb-4 mb-lg-0">
                    <a style="color: #000000;" href="#" data-toggle="modal" data-target="#contact_modal1"
                        class="modal_contact_us" id="help">
                        <div class="service-card text-center">

                            <div class="service-card-img">
                                <img class="img-fluid"
                                    src="https://bookforvisa.com/assets_newdesign/img/contact/service-1.png" alt="">
                            </div>

                            <div class="service-card-body">
                                <h3>Help &amp; Support</h3>
                                <p>If you have need any help related to flight or hotel reservation, feel free to contact us
                                </p>
                            </div>

                        </div>
                        <div class="d-flex">
                            <ul class="list-unstyled contect_us">
                                <li class="link-item">
                                    <img src="https://bookforvisa.com/assets/images/location.png" class="icons">99 Wall
                                    Street #09 New York, NY 10005<p></p>
                                </li>
                                <li class="link-item">
                                    <img src="https://bookforvisa.com/assets/images/29.png" class="icons"><a
                                        style="padding: 0px;"
                                        href="mailto:support@bookforvisa.com">support@bookforvisa.com</a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>


                <div class="col-md-5">
                    <div class="row">
                        <div class="wrapper center">
                            <i class="fa fa-envelope"></i>
                            <div class="heading">Write to Us</div>
                            <a href="mailto:support@bookforvisa.com" class="btn big">support@bookforvisa.com</a>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>

    <!-- contact  Model -->
    <div class="modal fade contact_modal" id="contact_modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title text-center" id="exampleModalLongTitle">Contact Us</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"
                            style="position: absolute; right: 20px; z-index: 999 !important">&times;</span>
                    </button>
                </div>
                <form method="post" data-form-title="CONTACT US" id="contact_us_form"
                    action="https://bookforvisa.com/contact">
                    <div class="modal-body px-0 py-0">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="modalcontact-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="info-card">
                                                <div class="media">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                                <div class="content">
                                                    <h2>Address</h2>

                                                    <p>99 Wall Street #09 <br>
                                                        New York, NY 10005</p>

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-card">
                                                <div class="media">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="content">
                                                    <h2>General Support</h2>
                                                    <p>support@bookforvisa.com</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 py-5">
                                <div class="contact-form">
                                    <div class="title">
                                        <h2>Send Us Message</h2>
                                    </div>
                                    <input type="hidden" data-form-email="true">
                                    <input type="hidden" name="_token"
                                        value="JlwGlDBb06Y8ejQFTTZw8fBCw5OpKnpfNpi12Jre">
                                    <div id="recaptcha" class="g-recaptcha"
                                        data-sitekey="6Lcjmh4nAAAAAN9GSssHVAxEm7mRLI2ZimQF7YCq"
                                        data-callback="setResponse" data-size="invisible" style="display: none"></div>
                                    <input type="hidden" id="contact_type" name="contact_type" value="">
                                    <div class="form-group">
                                        <label>Full Name *</label>
                                        <input type="text" class="form-control" name="name" required=""
                                            placeholder="" data-form-field="Name" value="">
                                        <div class="text text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" name="email" required=""
                                            placeholder="" data-form-field="Email" value="">
                                        <div class="text text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Phone</label>
                                        <input type="tel" class="form-control" name="phone" placeholder=""
                                            data-form-field="Phone" value="">
                                        <div class="text text-danger"></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" placeholder="" rows="7" data-form-field="Message"></textarea>
                                        <div class="text text-danger"></div>
                                    </div>
                                    <div class="form-group">

                                    </div>

                                    <button type="submit" class="btn btn-primary" id="flight-select">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style type="text/css">
        .modal-header {
            padding: 0px !important;
            border-bottom: none;
        }

        .contact_modal.modal .modal-header button {
            z-index: 999 !important;
        }

        .bg-shape::after {
            height: unset !important;
        }
    </style>
@endsection

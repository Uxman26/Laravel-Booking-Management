@extends('layout.app')
@section('section')
    <style>
        .news_title {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>
    <style type="text/css">
        .bg-shape::after {
            height: unset !important;
        }
    </style>
    <!--================Blog Area =================-->
    <section class="blog_area section-margin-large my-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog-head mt-4 mb-5 text-center">
                        <h2>Blogs</h2>
                    </div>
                    <div class="blog_left_sidebar">
                        <div class="row">


                            <div class="col-lg-4">
                                <section class="card___main_holder">
                                    <header class="card__head">
                                        <div class="card__image"
                                            style="background: url(https://bookforvisa.com/storage/articles/16895952581660373620cardmapr-nl-LVA3S6isNYQ-unsplash.jpg);">
                                        </div>
                                        <div class="card__author">
                                            <div class="author">
                                                <img src="https://bookforvisa.com/assets_newdesign/img/paper-plane.svg"
                                                    alt="reactLogo" class="author__image">
                                                <div class="author__content">
                                                    <p class="author__header">Flight Booking</p>
                                                    <p class="author__subheader">17 Jul, 23</p>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="card__body">
                                        <h2 class="card__headline"><a
                                                href="https://bookforvisa.com/article/17/detail/what-is-a-flight-reservation-for-visa">What
                                                Is A Flight Reservation For Visa?</a></h2>
                                        <p class="card__text">When traveling overseas, you might come across the term flight
                                            reservation for visa during the booking or visa application process. There are
                                            many reasons why you might need a flight reservation for v... </p>
                                    </div>
                                    <footer class="card__foot">
                                        <span class="card__link"><a
                                                href="https://bookforvisa.com/article/17/detail/what-is-a-flight-reservation-for-visa">Read
                                                more</a></span>
                                    </footer>
                                </section>
                            </div>


                            <!-- <a target="_blank" href="https://bookforvisa.com/article/17/detail/what-is-a-flight-reservation-for-visa">
                                  <div class="col-md-4">
                                      <article class="blog_item">
                                          <div class="blog_item_img">
                                              <img class="card-img rounded-0" src="https://bookforvisa.com/storage/articles/16895952581660373620cardmapr-nl-LVA3S6isNYQ-unsplash.jpg"
                                                   alt="What Is A Flight Reservation For Visa?">
                                          </div>

                                          <div class="blog_details">
                                              <a href="#" class="blog_item_date">
                                                  <h3>Flight Booking</h3>
                                              </a>
                                              <a target="_blank" class="d-block"
                                                 href="https://bookforvisa.com/article/17/detail/what-is-a-flight-reservation-for-visa">
                                                  <h2>What Is A Flight Reservation For Visa?</h2>
                                              </a>
                                              <p>When traveling overseas, you might come across the term flight reservation for visa during the booking or visa application process. There are many reasons why you might need a flight reservation for v... </p>
                                              <ul class="blog-info-link">
                                                  <li><a href="#"><i class="far fa-clock"></i> 17 Jul, 23 </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </article>
                                  </div>
                              </a> -->


                            <div class="col-lg-4">
                                <section class="card___main_holder">
                                    <header class="card__head">
                                        <div class="card__image"
                                            style="background: url(https://bookforvisa.com/storage/articles/1628251161photo-1556388158-158ea5ccacbd.jpeg);">
                                        </div>
                                        <div class="card__author">
                                            <div class="author">
                                                <img src="https://bookforvisa.com/assets_newdesign/img/paper-plane.svg"
                                                    alt="reactLogo" class="author__image">
                                                <div class="author__content">
                                                    <p class="author__header">Flight Booking</p>
                                                    <p class="author__subheader">01 May, 22</p>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="card__body">
                                        <h2 class="card__headline"><a
                                                href="https://bookforvisa.com/article/13/detail/connecting-flight-for-visa-application">Connecting
                                                flight for visa application</a></h2>
                                        <p class="card__text">Some travelers might see connecting flights as an
                                            inconvenience, while others see them as a great opportunity to save money. But
                                            for the purpose&nbsp;of visa application, it is best to have a reservat... </p>
                                    </div>
                                    <footer class="card__foot">
                                        <span class="card__link"><a
                                                href="https://bookforvisa.com/article/13/detail/connecting-flight-for-visa-application">Read
                                                more</a></span>
                                    </footer>
                                </section>
                            </div>


                            <!-- <a target="_blank" href="https://bookforvisa.com/article/13/detail/connecting-flight-for-visa-application">
                                  <div class="col-md-4">
                                      <article class="blog_item">
                                          <div class="blog_item_img">
                                              <img class="card-img rounded-0" src="https://bookforvisa.com/storage/articles/1628251161photo-1556388158-158ea5ccacbd.jpeg"
                                                   alt="Connecting flight for visa application">
                                          </div>

                                          <div class="blog_details">
                                              <a href="#" class="blog_item_date">
                                                  <h3>Flight Booking</h3>
                                              </a>
                                              <a target="_blank" class="d-block"
                                                 href="https://bookforvisa.com/article/13/detail/connecting-flight-for-visa-application">
                                                  <h2>Connecting flight for visa application</h2>
                                              </a>
                                              <p>Some travelers might see connecting flights as an inconvenience, while others see them as a great opportunity to save money. But for the purpose&nbsp;of visa application, it is best to have a reservat... </p>
                                              <ul class="blog-info-link">
                                                  <li><a href="#"><i class="far fa-clock"></i> 01 May, 22 </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </article>
                                  </div>
                              </a> -->


                            <div class="col-lg-4">
                                <section class="card___main_holder">
                                    <header class="card__head">
                                        <div class="card__image"
                                            style="background: url(https://bookforvisa.com/storage/articles/1628251277phil-mosley-wOK2f2stPDg-unsplash.jpg);">
                                        </div>
                                        <div class="card__author">
                                            <div class="author">
                                                <img src="https://bookforvisa.com/assets_newdesign/img/paper-plane.svg"
                                                    alt="reactLogo" class="author__image">
                                                <div class="author__content">
                                                    <p class="author__header">Flight Booking</p>
                                                    <p class="author__subheader">17 Mar, 22</p>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="card__body">
                                        <h2 class="card__headline"><a
                                                href="https://bookforvisa.com/article/10/detail/visa-application-during-covid-19">Visa
                                                Application During Covid-19</a></h2>
                                        <p class="card__text">The procedure of getting a visa application accepted is
                                            getting much tougher than before since the covid-19 global pandemic. From travel
                                            limitations and screening requirements prior to and on arrival ... </p>
                                    </div>
                                    <footer class="card__foot">
                                        <span class="card__link"><a
                                                href="https://bookforvisa.com/article/10/detail/visa-application-during-covid-19">Read
                                                more</a></span>
                                    </footer>
                                </section>
                            </div>


                            <!-- <a target="_blank" href="https://bookforvisa.com/article/10/detail/visa-application-during-covid-19">
                                  <div class="col-md-4">
                                      <article class="blog_item">
                                          <div class="blog_item_img">
                                              <img class="card-img rounded-0" src="https://bookforvisa.com/storage/articles/1628251277phil-mosley-wOK2f2stPDg-unsplash.jpg"
                                                   alt="Visa Application During Covid-19">
                                          </div>

                                          <div class="blog_details">
                                              <a href="#" class="blog_item_date">
                                                  <h3>Flight Booking</h3>
                                              </a>
                                              <a target="_blank" class="d-block"
                                                 href="https://bookforvisa.com/article/10/detail/visa-application-during-covid-19">
                                                  <h2>Visa Application During Covid-19</h2>
                                              </a>
                                              <p>The procedure of getting a visa application accepted is getting much tougher than before since the covid-19 global pandemic. From travel limitations and screening requirements prior to and on arrival ... </p>
                                              <ul class="blog-info-link">
                                                  <li><a href="#"><i class="far fa-clock"></i> 17 Mar, 22 </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </article>
                                  </div>
                              </a> -->
                        </div>



                        <!-- <section class="card___main_holder">
                <header class="card__head">
                  <div class="card__image"></div>
                  <div class="card__author">
                    <div class="author">
                      <img src="paper-plane.svg" alt="reactLogo" class="author__image">
                      <div class="author__content">
                        <p class="author__header">Flight Booking</p>
                        <p class="author__subheader">6 Aug, 2021</p>
                      </div>
                    </div>
                  </div>
                </header>
                <div class="card__body">
                  <h2 class="card__headline">The Vat of Acid Episode</h2>
                  <p class="card__text">Morty wants Rick to create a save function
                    in real life like in video games, and thus live without consequences.
                  Also, there is a huge acid tank.</p>
                </div>
                <footer class="card__foot">
                  <span class="card__link">Read more</span>
                </footer>
              </section> -->



                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="text-align: center;">
                                <a href="https://bookforvisa.com/all-articles">
                                    <button class="button">more Blog Posts</button>
                                </a>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  <hr> -->















































        </div>
    </section>

    <style type="text/css">
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
    <!--================Blog Area =================-->
@endsection

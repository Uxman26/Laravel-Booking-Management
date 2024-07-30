 <!--================ Header Menu Area start =================-->

 <header class="header_area">

     <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light">
             <div class="container box_1620">
                 <a class="navbar-brand logo_h" href="{{route('index')}}"><img
                         src="https://bookforvisa.com/assets_newdesign/img/logo.png" alt=""></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <button type="button" class="border-0 currency-btn"
                     style="background: transparent;    white-space: nowrap;" data-toggle="modal"
                     data-target="#currencymodal">
                     <span class="leftbtn"><span class="flag-icon flag-icon-us flag-icon-squared"></span></span>
                     <span class="madal-btn"> USD </span>
                 </button>
                 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

                     <ul class="nav navbar-nav menu_nav justify-content-end">
                         <li class="nav-item active"><a class="nav-link" href="{{route('index')}}">Home</a>
                         </li>
                         <li class="nav-item "><a class="nav-link" href="{{route('about')}}">About
                                 Us</a></li>
                         <li class="nav-item "><a class="nav-link" href="{{route('faq')}}">FAQ</a></li>
                         <li class="nav-item "><a class="nav-link" href="{{route('blog')}}">Blog</a></li>

                         <li class="nav-item "><a class="nav-link" href="{{route('contact')}}">Contact</a>
                         </li>

                         <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a>
                         </li>
                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>

 <header class="mobile__menu_offcanvas">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="nav_holder_wrapper">
                     <div class="web___main__logo">
                         <a class="" href="{{route('index')}}"><img
                                 src="https://bookforvisa.com/assets_newdesign/img/logo.png" alt=""></a>
                     </div>
                     <button type="button" class="border-0 currency-btn"
                         style="background: transparent;    white-space: nowrap;" data-toggle="modal"
                         data-target="#currencymodal">
                         <span class="leftbtn"><span class="flag-icon flag-icon-us flag-icon-squared"></span></span>
                         <span class="madal-btn"> USD </span>
                     </button>
                     <div class="offcanvas___menu_call">
                         <a href="#my-id" uk-toggle><i class="fa fa-bars" aria-hidden="true"></i></a>

                         <div class="offcanvas__area">
                             <div id="my-id" uk-offcanvas="overlay: true;flip:true">
                                 <div class="uk-offcanvas-bar">

                                     <button class="uk-offcanvas-close" type="button" uk-close></button>


                                     <div class="offcanvas___menu_wrapper">
                                         <!-- <div class="uk-width-1-2@s uk-width-2-5@m"> -->
                                         <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>

                                             <!-- <div class="profile__img">
                                                <img src="https://bookforvisa.com/assets_newdesign/img/about/about-media.png">
                                            </div> -->

                                             <li><a href="{{route('login')}}">Login</a></li>

                                             <li class="active"><a href="{{route('index')}}"
                                                     class="active___color">Home</a></li>
                                             <li class=""><a href="{{route('about')}}">About
                                                     Us</a></li>
                                             <li class=""><a href="{{route('faq')}}">FAQ</a></li>
                                             <li class=""><a href="{{route('blog')}}">Blog</a>
                                             </li>
                                             <li class=""><a href="{{route('contact')}}">Contact</a>
                                             </li>

                                         </ul>

                                         <div class="footer__content">
                                             <p><a href="{{route('index')}}">bookforvisa</a> All Right
                                                 Reserved</p>
                                         </div>
                                         <!-- </div> -->
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!--================Header Menu Area =================-->

 <!-- home page currency madal start -->

 <div class="modal fade" id="currencymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg main-modal-div">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Currency Picker</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                         aria-hidden="true">&times;</span></button>
             </div>
             <div class="fixed-div" style="padding: 20px">
                 <div class="typeahead__container" style="width: 100%;">
                     <div class="typeahead__field">
                         <div class="typeahead__query">
                             <input class="js-typeahead-french_v1" name="french_v1[query]" placeholder="Search"
                                 autocomplete="off">
                         </div>
                         <div class="typeahead__button">
                             <button type="submit">
                                 <i class="typeahead__search-icon"></i>
                             </button>
                         </div>
                     </div>
                 </div>

             </div>
             <div class="modal-body">
                 <div id="currencybox" class="currency-modal-list-items">


                     <div class="currency-modal changecurrency " data-curr_code="AUD_$">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-au flag-icon-squared"></span>
                             <span class="country-name">AUD - </span>
                             <span class="currency">$</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">Australia</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="CAD_$">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-ca flag-icon-squared"></span>
                             <span class="country-name">CAD - </span>
                             <span class="currency">$</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">Canada</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="CNY_¥">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-cn flag-icon-squared"></span>
                             <span class="country-name">CNY - </span>
                             <span class="currency">¥</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">China</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="EUR_€">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-eu flag-icon-squared"></span>
                             <span class="country-name">EUR - </span>
                             <span class="currency">€</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">European Union</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="INR_₹">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-in flag-icon-squared"></span>
                             <span class="country-name">INR - </span>
                             <span class="currency">₹</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">India</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="SGD_$">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-sg flag-icon-squared"></span>
                             <span class="country-name">SGD - </span>
                             <span class="currency">$</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">Singapore</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="THB_฿">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-th flag-icon-squared"></span>
                             <span class="country-name">THB - </span>
                             <span class="currency">฿</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">Thailand</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="AED_د.إ">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-ae flag-icon-squared"></span>
                             <span class="country-name">AED - </span>
                             <span class="currency">د.إ</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">United Arab Emirates</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="GBP_£">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-gb flag-icon-squared"></span>
                             <span class="country-name">GBP - </span>
                             <span class="currency">£</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">United Kingdom</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                     <div class="currency-modal changecurrency " data-curr_code="USD_$">
                         <div class="currency-modal-list-item-line-one">
                             <span class="flag-icon flag-icon-us flag-icon-squared"></span>
                             <span class="country-name">USD - </span>
                             <span class="currency">$</span>
                         </div>
                         <div class="currency-modal-list-item-line-two">
                             <span class="full-country">United States</span>
                         </div>
                         <span class=" currency-modal-list-item-tick"></span>
                     </div>

                 </div>

             </div>
             <div class="currency-modal-footer">
                 <i id="scroll_currency" class="arrow-icon down"></i>
             </div>
         </div>
     </div>
 </div>

 <!-- home page currency madal exit -->

@extends('layout.app')
@section('section')



    <style>
        @media(min-width:320px) and (max-width:660px) {
            .flight-search .asside-left {
                height: 100% !important;
                overflow-y: hidden !important;
            }

            .slick-carousel {
                display: block !important;
            }
        }

        .hotel-star-filter {
            display: none;
        }

        .main_rowas {
            margin: 30px 0px -70px;

        }

        .slick-slide {
            width: 160px;
        }

        /* Color of the arrows */
        .slick-next::before,
        .slick-prev::before {
            color: blue;
        }

        .slick-slide img {

            height: 60px;
        }

        .slick-carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: wrap;
        }

        .mark,
        mark {
            background: #fff !important;
        }

        .slick-carousel div {
            padding: 3px;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            text-align: center;
            margin: 2px;
        }
    </style>
    <!--================Hero Banner Area Start =================-->
    <!-- <style type="text/css">
                             body{
                              overflow-x: hidden !important;
                             }
                            </style> -->
    <div id="map" style="display:none !important;"></div>
    <section class="hero-banner">
        <div class="container">

            <div class="row align-items-center text-md-left">
                <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12 mb-0 mb-md-0">
                    <div class="hero-form pt-0 pb-3 mt-3 mb-3 " data-aos="zoom-in">
                        <ul class="nav nav-tabs bg_flight mt-4 ml-4 mr-4" role="tablist" id="trip_list">
                            <li class="nav-item flight">

                                <a id="ex1-flight-3" data-toggle="tab" href="#ex-flight" role="tab"
                                    aria-controls="ex-flight" aria-selected="true" class="nav-link rotate-ico active"><i
                                        class="fas fa-plane"></i> Flight </a>
                            </li>
                            <li class="nav-item hotel">

                                <a id="ex1-hotel-3" data-toggle="tab" href="#ex-hotel" role="tab"
                                    aria-controls="ex-hotel" aria-selected="false" class="nav-link "><i
                                        class="fas fa-bed"></i>Hotel</a>
                            </li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane fade show active" id="ex-flight" role="tabpanel"
                                aria-labelledby="ex1-tab-2">
                                <div id="flight" class="tab-pane   show active">
                                    <ul class="nav nav-tabs" role="tablist" style="justify-content:center !important;">
                                        <li class="nav-item">
                                            <a href="#one_way" class="nav-link active" data-toggle="tab"
                                                onclick="oneWay(this)">One-way</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#round_trip" class="round_trip nav-link " data-toggle="tab"
                                                onclick="roundWay(this)">Round Trip</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#multi_city" class="nav-link  " data-toggle="tab"
                                                onclick="multiCity(this)">Multi City</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content mt-2">
                                    <div id="one_way" class="tab-pane show active">
                                        <style>
                                            .select2-container--default .select2-selection--multiple .select2-selection__rendered {
                                                line-height: 25px !important;
                                            }

                                            .origins__destination_wrapper {
                                                display: flex;
                                                justify-content: space-between;
                                            }

                                            .origin___input_wrapper {
                                                width: 47%;
                                            }

                                            .destinations___input_wrapper {
                                                width: 47%;
                                            }

                                            .select2-container {
                                                width: initial !important;
                                                display: block;
                                            }
                                        </style>

                                        <form class="general-form " id="flight-search"
                                            action="https://bookforvisa.com/flight-search" method="post">
                                            <input type="hidden" name="_token"
                                                value="Q6iim9lCsiavPdOYuUEyaflVXaL7mZ2hDqMEEjbM"> <input type="hidden"
                                                id="flight-select-data">
                                            <input type="hidden" id="tripSetData">
                                            <input type="hidden" id="airportlistdata"
                                                value="https://bookforvisa.com/getAirports">
                                            <input type="hidden" id="autosave_flight"
                                                value="https://bookforvisa.com/autosave-flight">
                                            <input type="hidden" id="flightsearchurl"
                                                value="https://bookforvisa.com/flight">
                                            <input type="hidden" name="flight_type" id="flight_type" value="oneway">
                                            <input type="hidden" id="connect_icon"
                                                value="https://bookforvisa.com/assets_newdesign/img/icon/flight-connect.png">
                                            <input type="hidden" id="routeName" value="home">
                                            <input type="hidden" name="origin_texts[]" value="">
                                            <input type="hidden" name="destination_texts[]" value="">
                                            <input type="hidden" id="request_params" value="null">
                                            <input type="hidden" id="hotel_id" name="hotel_id" value="">
                                            <input type="hidden" id="booked_id" name="booked_id" value="">
                                            <input type="hidden" id="booked_type" name="booked_type" value="">
                                            <input type="hidden" id="can_make_revision_request"
                                                name="is_revision_request" value="">
                                            <input type="hidden" id="home_page" value="home">



                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="origins__destination_wrapper">
                                                        <div class="origin___input_wrapper">
                                                            <div class="form-group">
                                                                <label for="inputEmail4">Origin</label>
                                                                <div class="input-wrapper-ico">
                                                                    <i class="fas fa-plane-departure"></i>
                                                                    <select class="form-control select2-departure"
                                                                        name="origin_city" id="departure-city">
                                                                        <option value="disabled" disabled=""
                                                                            selected="">Type Any City Name
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="converter___img">
                                                            <div class="exchange-ico"
                                                                style="display: flex;justify-content: center;
                align-items: center; height: 100%;">
                                                                <img
                                                                    src="https://bookforvisa.com/assets_newdesign/img/icon/icon-exchange.png">
                                                            </div>
                                                        </div>
                                                        <div class="destinations___input_wrapper">
                                                            <div class="form-group">
                                                                <label for="inputPassword4">Destination</label>
                                                                <div class="input-wrapper-ico">
                                                                    <i class="fas fa-plane-arrival"></i>
                                                                    <select class="form-control select2-destination"
                                                                        name="destination_city" id="destination-city">
                                                                        <option value="disabled" disabled=""
                                                                            selected="">Type Any City Name
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group asadsx" id="primary-search">
                                                        <label for="inputEmail4">Depart Date</label>
                                                        <div class="input-wrapper-ico">
                                                            <i class="far fa-calendar-alt"></i>
                                                            <input type="text" value=""
                                                                class="form-control des-date" placeholder="Departure Date"
                                                                id="flight-departure-date" name="departure_date"
                                                                autocomplete="off" required readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col" style="display: none;" id="return-date">
                                                    <div class="form-group asadsx">
                                                        <label for="inputEmail4">Return Date</label>
                                                        <div class="input-wrapper-ico">
                                                            <i class="far fa-calendar-alt"></i>
                                                            <input type="text" value="" class="form-control "
                                                                placeholder="Return Date" id="flight-return-date"
                                                                name="flight_return_date" autocomplete="off" required
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col" style="display: none">
                                                    <div class="form-group">
                                                        <label for="inputPassword4">Class</label>
                                                        <div class="input-wrapper">
                                                            <select class="form-control" name="flight_class"
                                                                id="flight-class" style="padding-left: 4px !important;">
                                                                <option value="Coach" selected>Economy Class</option>
                                                                <option value="Business">Business Class</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="multiCityRecords" style="">
                                                        <div id="order" class="row mb-2 mt-2"
                                                            style="margin-left: -15px !important; margin-right: -15px !important;">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12" id="multiCityActionLink"
                                                        style="display: none;">
                                                        <div class="form-group " id="addcity"
                                                            style="display: none; color: #333536;">
                                                            <a href="javascript:void(0)" onclick="addmore()"
                                                                id="addMore"> + Add More Cities</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class=" col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label for="countries">Exclude Transit Through</label>
                                                            <select style="padding-left: 9px !important;"
                                                                id="avoid_countries" name="avoid_countries[]" multiple
                                                                data-placeholder="eg: United States">
                                                                <option value="AW">Aruba</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AX">Åland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="TF">French Southern and Antarctic
                                                                    Lands</option>
                                                                <option value="AG">Antigua and Barbuda</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BI">Burundi</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BF">Burkina Faso</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BA">Bosnia and Herzegovina</option>
                                                                <option value="BL">Saint Barthélemy</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BO">Bolivia</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BN">Brunei</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="CF">Central African Republic
                                                                </option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CI">Ivory Coast</option>
                                                                <option value="CM">Cameroon</option>
                                                                <option value="CD">DR Congo</option>
                                                                <option value="CG">Republic of the Congo</option>
                                                                <option value="CK">Cook Islands</option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="KM">Comoros</option>
                                                                <option value="CV">Cape Verde</option>
                                                                <option value="CR">Costa Rica</option>
                                                                <option value="CU">Cuba</option>
                                                                <option value="CW">Curaçao</option>
                                                                <option value="CX">Christmas Island</option>
                                                                <option value="KY">Cayman Islands</option>
                                                                <option value="CY">Cyprus</option>
                                                                <option value="CZ">Czech Republic</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DO">Dominican Republic</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="ER">Eritrea</option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FJ">Fiji</option>
                                                                <option value="FK">Falkland Islands</option>
                                                                <option value="FR">France</option>
                                                                <option value="FO">Faroe Islands</option>
                                                                <option value="FM">Micronesia</option>
                                                                <option value="GA">Gabon</option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="GG">Guernsey</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GN">Guinea</option>
                                                                <option value="GP">Guadeloupe</option>
                                                                <option value="GM">Gambia</option>
                                                                <option value="GW">Guinea-Bissau</option>
                                                                <option value="GQ">Equatorial Guinea</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="GU">Guam</option>
                                                                <option value="GY">Guyana</option>
                                                                <option value="HK">Hong Kong</option>
                                                                <option value="HN">Honduras</option>
                                                                <option value="HR">Croatia</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IM">Isle of Man</option>
                                                                <option value="IN">India</option>
                                                                <option value="IO">British Indian Ocean Territory
                                                                </option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IR">Iran</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JE">Jersey</option>
                                                                <option value="JO">Jordan</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="KZ">Kazakhstan</option>
                                                                <option value="KE">Kenya</option>
                                                                <option value="KG">Kyrgyzstan</option>
                                                                <option value="KH">Cambodia</option>
                                                                <option value="KI">Kiribati</option>
                                                                <option value="KN">Saint Kitts and Nevis</option>
                                                                <option value="KR">South Korea</option>
                                                                <option value="XK">Kosovo</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="LA">Laos</option>
                                                                <option value="LB">Lebanon</option>
                                                                <option value="LR">Liberia</option>
                                                                <option value="LY">Libya</option>
                                                                <option value="LC">Saint Lucia</option>
                                                                <option value="LI">Liechtenstein</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="LS">Lesotho</option>
                                                                <option value="LT">Lithuania</option>
                                                                <option value="LU">Luxembourg</option>
                                                                <option value="LV">Latvia</option>
                                                                <option value="MO">Macau</option>
                                                                <option value="MF">Saint Martin</option>
                                                                <option value="MA">Morocco</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="MD">Moldova</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="MH">Marshall Islands</option>
                                                                <option value="MK">Macedonia</option>
                                                                <option value="ML">Mali</option>
                                                                <option value="MT">Malta</option>
                                                                <option value="MM">Myanmar</option>
                                                                <option value="ME">Montenegro</option>
                                                                <option value="MN">Mongolia</option>
                                                                <option value="MP">Northern Mariana Islands
                                                                </option>
                                                                <option value="MZ">Mozambique</option>
                                                                <option value="MR">Mauritania</option>
                                                                <option value="MS">Montserrat</option>
                                                                <option value="MQ">Martinique</option>
                                                                <option value="MU">Mauritius</option>
                                                                <option value="MW">Malawi</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="YT">Mayotte</option>
                                                                <option value="NA">Namibia</option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NE">Niger</option>
                                                                <option value="NF">Norfolk Island</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="NI">Nicaragua</option>
                                                                <option value="NU">Niue</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="NO">Norway</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="NR">Nauru</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option>
                                                                <option value="PA">Panama</option>
                                                                <option value="PN">Pitcairn Islands</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PW">Palau</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PR">Puerto Rico</option>
                                                                <option value="KP">North Korea</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PS">Palestine</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Réunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russia</option>
                                                                <option value="RW">Rwanda</option>
                                                                <option value="SA">Saudi Arabia</option>
                                                                <option value="SD">Sudan</option>
                                                                <option value="SN">Senegal</option>
                                                                <option value="SG">Singapore</option>
                                                                <option value="GS">South Georgia</option>
                                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SL">Sierra Leone</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="SM">San Marino</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="PM">Saint Pierre and Miquelon
                                                                </option>
                                                                <option value="RS">Serbia</option>
                                                                <option value="SS">South Sudan</option>
                                                                <option value="ST">São Tomé and Príncipe</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SK">Slovakia</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="SZ">Swaziland</option>
                                                                <option value="SX">Sint Maarten</option>
                                                                <option value="SC">Seychelles</option>
                                                                <option value="SY">Syria</option>
                                                                <option value="TC">Turks and Caicos Islands
                                                                </option>
                                                                <option value="TD">Chad</option>
                                                                <option value="TG">Togo</option>
                                                                <option value="TH">Thailand</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TK">Tokelau</option>
                                                                <option value="TM">Turkmenistan</option>
                                                                <option value="TL">Timor-Leste</option>
                                                                <option value="TO">Tonga</option>
                                                                <option value="TT">Trinidad and Tobago</option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="TV">Tuvalu</option>
                                                                <option value="TW">Taiwan</option>
                                                                <option value="TZ">Tanzania</option>
                                                                <option value="UG">Uganda</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="UM">United States Minor Outlying
                                                                    Islands</option>
                                                                <option value="UY">Uruguay</option>
                                                                <option value="US">United States</option>
                                                                <option value="UZ">Uzbekistan</option>
                                                                <option value="VA">Vatican City</option>
                                                                <option value="VC">Saint Vincent and the Grenadines
                                                                </option>
                                                                <option value="VE">Venezuela</option>
                                                                <option value="VG">British Virgin Islands</option>
                                                                <option value="VI">United States Virgin Islands
                                                                </option>
                                                                <option value="VN">Vietnam</option>
                                                                <option value="VU">Vanuatu</option>
                                                                <option value="WF">Wallis and Futuna</option>
                                                                <option value="WS">Samoa</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZA">South Africa</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail4">Travellers</label>
                                                        <select style="padding-left: 4px !important"
                                                            name="travllers_count" class="form-control"
                                                            id="flight-travllers-count"
                                                            onchange="getDetailsTraveller(this)">
                                                            <option selected="" value="disabled" disabled="">
                                                                Travellers</option>
                                                            <option value="1" selected>1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div id="traverllerDetails" class="row mb-2 mt-2"></div>
                                                </div>
                                                <div class="col-md-12"
                                                    style="display: none; margin-top: 7px; margin-bottom: -28px;"
                                                    id="validation-errors">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <button type="submit" id="flight-search-btn"
                                                        class="btn btn-primary">Search Flight</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ex-hotel" role="tabpanel" aria-labelledby="ex1-tab-2">
                                <div id="hotel" class="tab-pane show active">
                                </div>
                                <div class="tab-content">

                                    <div id="single-booking" class="tab-pane show active">
                                        <style>
                                            .addbutton span {
                                                background: transparent;
                                                border: 0;
                                                outline: none;
                                                color: #0BADDD;
                                                font-size: 12px;
                                                cursor: pointer;
                                            }

                                            .pac-container {
                                                background-color: #fff;

                                                z-index: 1000;
                                                border-radius: 2px;
                                                border-top: 1px solid #d9d9d9;
                                                font-family: Arial, sans-serif;
                                                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                                                -moz-box-sizing: border-box;
                                                -webkit-box-sizing: border-box;
                                                box-sizing: border-box;
                                                overflow: hidden;
                                                position: relative !important;

                                                width: 100% !important;
                                                left: 0px !important;
                                                top: 0px !important;
                                            }

                                            .pac-logo:after {
                                                content: "";
                                                padding: 1px 1px 1px 0;
                                                height: 18px;
                                                box-sizing: border-box;
                                                text-align: right;
                                                display: block;
                                                background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3.png);
                                                background-position: right;
                                                background-repeat: no-repeat;
                                                background-size: 120px 14px
                                            }

                                            .hdpi.pac-logo:after {
                                                background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png)
                                            }

                                            .pac-item {
                                                cursor: default;
                                                padding: 0 4px;
                                                text-overflow: ellipsis;
                                                overflow: hidden;
                                                white-space: nowrap;
                                                line-height: 30px;
                                                text-align: left;
                                                border-top: 1px solid #e6e6e6;
                                                font-size: 11px;
                                                color: #999
                                            }

                                            .pac-item:hover {
                                                background-color: #ebf2fe;

                                            }

                                            .pac-item:hover .pac-icon-marker {
                                                background-position: -18px -161px
                                            }

                                            .pac-item-selected,
                                            .pac-item-selected:hover {
                                                background-color: #ebf2fe
                                            }

                                            .pac-matched {
                                                font-weight: 700
                                            }

                                            .pac-item-query {
                                                font-size: 13px;
                                                padding-right: 3px;
                                                color: #000
                                            }

                                            .pac-icon {
                                                width: 15px;
                                                height: 20px;
                                                margin-right: 7px;
                                                margin-top: 6px;
                                                display: inline-block;
                                                vertical-align: top;
                                                background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons.png);
                                                background-size: 34px
                                            }

                                            .hdpi .pac-icon {
                                                background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons_hdpi.png)
                                            }

                                            .pac-icon-search {
                                                background-position: -1px -1px
                                            }

                                            .pac-item-selected .pac-icon-search {
                                                background-position: -18px -1px
                                            }

                                            .pac-icon-marker {
                                                background-position: -1px -161px
                                            }

                                            .pac-item-selected .pac-icon-marker {
                                                background-position: -18px -161px
                                            }

                                            .pac-placeholder {
                                                color: gray
                                            }

                                            .closebtn {
                                                position: absolute;
                                                right: 0px;
                                                top: -12px;
                                                background: #FFFFFF;
                                                box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.171);
                                                border-radius: 5px;
                                                outline: 0;
                                                border: 0;
                                                color: #df5e5e;
                                                cursor: pointer;
                                                width: 20px;
                                                height: 20px;
                                                display: inline-flex;
                                                justify-content: center;

                                                padding: 3px;

                                            }

                                            .addbutton span {
                                                background: transparent;
                                                border: 0;
                                                outline: none;
                                                color: #0BADDD;
                                                font-size: 12px;
                                                cursor: pointer;

                                            }
                                        </style>
                                        <form class="general-form hotel-search mt-2" method="post"
                                            action="https://bookforvisa.com/book-hotel" autocomplete="off">
                                            <input type="hidden" name="_token"
                                                value="Q6iim9lCsiavPdOYuUEyaflVXaL7mZ2hDqMEEjbM"> <input type="hidden"
                                                name="hotelType" id="hotelType" value="1">
                                            <input type="hidden" id="hotel_results" name="hotel_results"
                                                value="">
                                            <input type="hidden" id="selected_hotel_id" name="selected_hotel_id"
                                                value="">
                                            <input type="hidden" id="parent_hotel_id" name="parent_hotel_id"
                                                value="">
                                            <input type="hidden" id="booking_count" name="booking_count"
                                                value="0">
                                            <input type="hidden" id="booking_count_edit" name="booking_countedit"
                                                value="0">
                                            <input type="hidden" id="request_params" name="request_params"
                                                value="null">
                                            <input type="hidden" id="flight_id" value="">
                                            <input type="hidden" id="booked_id" name="booked_id" value="">
                                            <input type="hidden" id="booked_type" name="booked_type" value="">
                                            <input type="hidden" value="https://bookforvisa.com/search-hotel"
                                                id="get-hotel-search-route">
                                            <div class="form-row" id="booking-type" style="display:none">
                                                <div class="form-group col-md-12">
                                                    <strong>Please place hotel booking for each city one at a
                                                        time.</strong>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group hotel_New">
                                                        <label for="inputPassword4">City Name</label>
                                                        <div class="">
                                                            <input type="text" class="form-control destination"
                                                                name="destination_city" id="destination"
                                                                placeholder="Type Any City Name" value="">
                                                            <div class="pac-container"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail4">Checkin Date</label>
                                                        <div class="input-wrapper-ico">
                                                            <i class="far fa-calendar-alt"></i>
                                                            <input type="text" class="form-control"
                                                                name="checkin_date" id="checkin_date" readonly
                                                                placeholder="Checkin Date" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="inputPassword4">Checkout Date</label>
                                                        <div class="input-wrapper-ico">
                                                            <i class="far fa-calendar-alt"></i>
                                                            <input type="text" class="form-control add_checkoutdate"
                                                                name="checkout_date" id="checkout_date" readonly
                                                                placeholder="Checkout Date" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="multihotel">
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 mb-4">
                                                    <div class="addbutton">
                                                        <span id="addbtndiv">
                                                            <i class="fa fa-plus" aria-hidden="true"></i> Add another
                                                            cities
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="inputEmail4">Travellers</label>
                                                        <select name="travellers" class="form-control"
                                                            id="no_of_travellers_hotel">
                                                            <option selected="" value="disabled" disabled="">
                                                                Travellers
                                                            </option>
                                                            <option value="1" selected>
                                                                1</option>
                                                            <option value="2">
                                                                2</option>
                                                            <option value="3">
                                                                3</option>
                                                            <option value="4">
                                                                4</option>
                                                            <option value="5">
                                                                5</option>
                                                            <option value="6">
                                                                6</option>
                                                            <option value="7">
                                                                7</option>
                                                            <option value="8">
                                                                8</option>
                                                            <option value="9">
                                                                9</option>
                                                            <option value="10">
                                                                10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-row">

                                                <div class="col">
                                                    <button type="button" class="btn btn-primary search-hotel-btn"
                                                        id="hotel-search-btn">Search Hotel</button>
                                                </div>


                                                <div class="col" style="display: none;">
                                                    <a id="hotel-checkout"
                                                        href="https://bookforvisa.com/checkout_preview?"
                                                        class="btn checkout-btn btn-success border-0 w-100 d-inline"
                                                        type="button">Checkout</a>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <ul>
                                                    </ul>
                                                </div>
                                            </div>
                                            <input type="hidden" id="hotel_request_data" value="&quot;&quot;">
                                            <input type="hidden" id="route_remove_hotel"
                                                value="https://bookforvisa.com/hotel-remove">
                                            <input type="hidden" id="checkout_full_url"
                                                value="https://bookforvisa.com/">
                                            <input type="hidden" id="checkout_url" value="https://bookforvisa.com/">
                                            <input type="hidden" id="checkout_hotel_url"
                                                value="https://bookforvisa.com/checkout">
                                            <input type="hidden" id="checkout_flight_url"
                                                value="https://bookforvisa.com/checkout">
                                            <input type="hidden" id="hotel_current_url"
                                                value="https://bookforvisa.com/?booking=single">
                                            <input type="hidden" name="home_page" id="home_page" value="home">
                                            <input type="hidden" name="homeurlauto" id="homeurlauto"
                                                value="https://bookforvisa.com/autosave-hotel">
                                            <input type="hidden" name="booking" value="single">
                                        </form>


                                        <div class="form-group hotel-star-filter mt-3 only-show-in-mobile-str-rating">
                                            <label>Stars</label>
                                            <select class="hotel-stars">
                                                <option value="0" selected="">All</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type='hidden' id='cities_url' value="https://bookforvisa.com/getCities">
                                </div>
                            </div>

                            <div class="mt-4 mb-2" id="flightMoreResults" style="display:none;">
                                <b>Click On Search Again For More Results</b>
                            </div>
                            <div class="mt-4 mb-2" id="flightDirectRoutes" style="display:none;">
                                <div class="alert alert-success" role="alert">
                                    <span class="badge badge-success" id="directFlights"></span>
                                </div>
                            </div>

                            <div style="display: none;" id="result-set-display">
                                <div class="title mt-4 result-cities">
                                </div>
                                <div class="widget-flight-results search-result">
                                    <div class="widget-price-head">
                                        <div class="title result-cities-code">
                                        </div>
                                        <div class="time-est">
                                            <span id="flightTimeDuration"><i class="far fa-clock"></i></span>
                                        </div>
                                    </div>
                                    <div id="no-result-errors"></div>
                                    <ul id="flight-images">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12  mb-0 mb-md-0 bg-hideondesktop">


                    <div class='btn__container'>
                        <a href="javascript:void(0);" class="after-class-end">
                            <span class='pulse-button'><i class="fa fa-play"></i></span>
                        </a>
                    </div>




                    <!-- <div class="banner-video-icon"> -->
                    <!-- <a class="popup-youtube after-class-end" > -->
                    <!-- <img src="https://bookforvisa.com/assets_newdesign/img/pla-icon-dark.png" style="width: 20%; !important;"> -->

                    <!--   <div class="bg"></div>
                                                <div class="button">
                                                  <a href="javascript:void(0);" class="popup-youtube after-class-end">
                                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                  </a>
                                                </div> -->
                    <!-- </a> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner Area End =================-->


    <div class="mobile-bg-img bg-hideonmobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class='btn__container'>
                        <a href="javascript:void(0);" class="popup-youtube after-class-end">
                            <span class='pulse-button'><i class="fa fa-play"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--================Service Area Start =================-->
    <!-- <section class="section-margin ">
                              <div class="container">
                                <div class="section-intro text-center pb-90px">
                                  <h2>What is Flight & Hotel Itinerary for <br>
                                    Visa Applications?</h2>Please verify that you are not a robot.
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                </div>

                                <div class="row">
                                  <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="flip-left">
                                    <div class="service-card text-center">
                                      <div class="service-card-img">
                                        <img class="img-fluid" src="https://bookforvisa.com/assets_newdesign/img/home/service1.png" alt="">
                                      </div>
                                      <div class="service-card-body">
                                        <h3>Hotel Booking</h3>
                                        <p>Great so dominion two seed give dry rule be fowl him female you will gathered creeping and
                                          created air</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="slide-up">
                                    <div class="service-card text-center">
                                      <div class="service-card-img">
                                        <img class="img-fluid" src="https://bookforvisa.com/assets_newdesign/img/home/service2.png" alt="">
                                      </div>
                                      <div class="service-card-body">
                                        <h3>Flight Booking</h3>
                                        <p>Great so dominion two seed give dry rule be fowl him female you will gathered creeping and
                                          created air</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="flip-right">
                                    <div class="service-card text-center">
                                      <div class="service-card-img">
                                        <img class="img-fluid" src="https://bookforvisa.com/assets_newdesign/img/home/service3.png" alt="">
                                      </div>
                                      <div class="service-card-body">
                                        <h3>Destination Booking</h3>
                                        <p>Great so dominion two seed give dry rule be fowl him female you will gathered creeping and
                                          created air</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section> -->
    <!--================Service Area End =================-->
    <div class="main_rowas">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slick-carousel">

                        <div>

                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_1.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_2.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_3.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_4.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_5.png" style="height: 60px;">
                        </div>
                        <div>

                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_6.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_7.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_8.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_9.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_10.png" style="height: 60px;">
                        </div>
                        <div>
                            <img src="https://bookforvisa.com/assets/img/flightlogo/fli_11.png" style="height: 60px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--================About Area Start =================-->

    <div class="section___for_mobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion js-accordion">



                        <!-- Accordion item -- Start Here  -->
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">How To Book Flight or Hotel For your
                                Visa Application</div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents">

                                    <section class="how___it_works" style="padding-top: 0px;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="offset-lg-1 col-lg-10 hide____it_mobile">
                                                    <div class="upper__layer_number">
                                                        <hr>
                                                        <div class="list__card_number_wrapper">
                                                            <div class="list__card_common">
                                                                <span class="color__apply_1">1</span>
                                                            </div>
                                                            <div class="list__card_common">
                                                                <span class="color__apply_2">2</span>
                                                            </div>
                                                            <div class="list__card_common">
                                                                <span class="color__apply_3">3</span>
                                                            </div>
                                                            <div class="list__card_common">
                                                                <span class="color__apply_4">4</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 hide____it_mobile"></div>

                                                <div class="col-lg-3 mt-5">
                                                    <div class="how__it_work_main_wrapper hover__1">
                                                        <div class="number___for_mobile extra__pading">
                                                            <span>1</span>
                                                        </div>
                                                        <div class="how__it_work_content">
                                                            <div class="how__it_work_image">
                                                                <picture>
                                                                    <source media="(min-width:320px) and (max-width:767px)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_2.svg">
                                                                    <source
                                                                        media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_2.svg">
                                                                    <img src="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_2.svg"
                                                                        alt="" class="img-fluid">
                                                                </picture>
                                                                <!-- <picture>
                                                <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_1.svg">
                                                  <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_1.svg">
                                                    <img src="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_1.svg" alt="" class="img-fluid">
                                                  </picture> -->
                                                            </div>
                                                            <div class="how__it_work_image_content">
                                                                <!-- <h5>Choose Booking Type</h5>
                                                  <p>Choose whether it is a one-way trip, round trip, or multi-city for flight booking. Select single or multi booking for hotel.</p> -->
                                                                <h5>Search for Flight or Hotel</h5>
                                                                <p>Search for the flight or hotel by filling in the
                                                                    booking and personal details.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mt-5">
                                                    <div class="how__it_work_main_wrapper hover__2">
                                                        <div class="number___for_mobile">
                                                            <span>2</span>
                                                        </div>
                                                        <div class="how__it_work_content">
                                                            <div class="how__it_work_image">
                                                                <picture>
                                                                    <source media="(min-width:320px) and (max-width:767px)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_3.svg">
                                                                    <source
                                                                        media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_3.svg">
                                                                    <img src="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_3.svg"
                                                                        alt="" class="img-fluid">
                                                                </picture>
                                                            </div>
                                                            <div class="how__it_work_image_content">
                                                                <h5>Select Flight or Hotel</h5>
                                                                <p>View flight or hotel details or directly select the
                                                                    desired service.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mt-5">
                                                    <div class="how__it_work_main_wrapper hover__3">
                                                        <div class="number___for_mobile">
                                                            <span>3</span>
                                                        </div>
                                                        <div class="how__it_work_content">
                                                            <div class="how__it_work_image">
                                                                <picture>
                                                                    <source media="(min-width:320px) and (max-width:767px)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                                                    <source
                                                                        media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                                                    <img src="https://bookforvisa.com/assets_newdesign/img/Step_4.svg"
                                                                        alt="" class="img-fluid">
                                                                </picture>
                                                            </div>
                                                            <div class="how__it_work_image_content">
                                                                <h5>Confirm Your Booking</h5>
                                                                <p>Confirm your booking details and pay for the booking
                                                                    to get your visa itinerary.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mt-5">
                                                    <div class="how__it_work_main_wrapper hover__4"
                                                        style="height: 484px;">
                                                        <div class="number___for_mobile">
                                                            <span>4</span>
                                                        </div>
                                                        <div class="how__it_work_content">
                                                            <div class="how__it_work_image">
                                                                <picture>
                                                                    <source media="(min-width:320px) and (max-width:767px)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/step_4-1.svg">
                                                                    <source
                                                                        media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                                                        srcset="https://bookforvisa.com/assets_newdesign/img/step_4-1.svg">
                                                                    <img src="https://bookforvisa.com/assets_newdesign/img/step_4-1.svg"
                                                                        alt="" class="img-fluid">
                                                                </picture>
                                                            </div>
                                                            <div class="how__it_work_image_content">
                                                                <h5>Download Your Booking</h5>
                                                                <p>Your booking will be ready for you to download and
                                                                    print
                                                                    out immediately</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>


                                </div>
                            </div>
                        </div>
                        <!-- Accordion item -- End's Here  -->



                        <!-- Accordion item -- Start Here  -->
                        <!-- <div class="accordion__item js-accordion-item">
                                        <div class="accordion-header js-accordion-header">How Hotel Booking Works</div>
                                        <div class="accordion-body js-accordion-body">
                                          <div class="accordion-body__contents">
                                            <section class="how___it_works" style="padding-top: 0px;">
                                              <div class="container">
                                                <div class="row">
                                                  <div class="offset-lg-1 col-lg-10 hide____it_mobile"  >
                                                    <div class="upper__layer_number">
                                                      <hr>
                                                      <div class="list__card_number_wrapper">
                                                        <div class="list__card_common">
                                                          <span class="color__apply_5">1</span>
                                                        </div>
                                                        <div class="list__card_common">
                                                          <span class="color__apply_6">2</span>
                                                        </div>
                                                        <div class="list__card_common">
                                                          <span class="color__apply_7">3</span>
                                                        </div>
                                                        <div class="list__card_common">
                                                          <span class="color__apply_8">4</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-1 hide____it_mobile"></div>
                                                  <div class="col-lg-3 mt-5">
                                                    <div class="how__it_work_main_wrapper hover__5">
                                                      <div class="number___for_mobile extra__pading">
                                                        <span>1</span>
                                                      </div>
                                                      <div class="how__it_work_content">
                                                        <div class="how__it_work_image">
                                                          <picture>
                                                            <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_1.svg">
                                                              <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_1.svg">
                                                                <img src="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_1.svg" alt="" class="img-fluid">
                                                              </picture>
                                                            </div>
                                                            <div class="how__it_work_image_content">
                                                              <h5>Choose Your Hotel</h5>
                                                              <p>Choose whether it is a single booking or multi booking.</p>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-3 mt-5">
                                                        <div class="how__it_work_main_wrapper hover__6">
                                                          <div class="number___for_mobile">
                                                            <span>2</span>
                                                          </div>
                                                          <div class="how__it_work_content">
                                                            <div class="how__it_work_image">
                                                              <picture>
                                                                <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_2.svg">
                                                                  <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_2.svg">
                                                                    <img src="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_2.svg" alt="" class="img-fluid">
                                                                  </picture>
                                                                </div>
                                                                <div class="how__it_work_image_content">
                                                                  <h5>Search Your Hotel</h5>
                                                                  <p>Search for the available hotels by filling in the traveling city, check-in and check-out date, travelers count, and personal details.</p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="col-lg-3 mt-5">
                                                            <div class="how__it_work_main_wrapper hover__7">
                                                              <div class="number___for_mobile">
                                                                <span>3</span>
                                                              </div>
                                                              <div class="how__it_work_content">
                                                                <div class="how__it_work_image">
                                                                  <picture>
                                                                    <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_3.svg">
                                                                      <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_3.svg">
                                                                        <img src="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_3.svg" alt="" class="img-fluid">
                                                                      </picture>
                                                                    </div>
                                                                    <div class="how__it_work_image_content">
                                                                      <h5>Reserve Hotel</h5>
                                                                      <p>View hotel details to confirm the reservation.</p>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-lg-3 mt-5">
                                                                <div class="how__it_work_main_wrapper hover__8">
                                                                  <div class="number___for_mobile">
                                                                    <span>4</span>
                                                                  </div>
                                                                  <div class="how__it_work_content">
                                                                    <div class="how__it_work_image">
                                                                      <picture>
                                                                        <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                                                          <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                                                            <img src="https://bookforvisa.com/assets_newdesign/img/Step_4.svg" alt="" class="img-fluid">
                                                                          </picture>
                                                                        </div>
                                                                        <div class="how__it_work_image_content">
                                                                          <h5>Confirm Booking</h5>
                                                                          <p>Confirm the hotel reservation details and pay for the booking.</p>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </section>
                                                          </div>
                                                        </div>
                                                      </div> -->
                        <!-- Accordion item -- End's Here  -->



                        <!-- Accordion item -- Start Here  -->
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">About Us</div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents">
                                    <div class="col-lg-12">
                                        <div class="section-intro-img mobile__setting_about_us"
                                            style="text-align: center;">
                                            <picture>
                                                <source media="(min-width:320px) and (max-width:767px)"
                                                    srcset="https://bookforvisa.com/assets_newdesign/img/contact/newimage-1.png">
                                                <source
                                                    media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                                    srcset="https://bookforvisa.com/assets_newdesign/img/contact/newimage-1.png">
                                                <img src="https://bookforvisa.com/assets_newdesign/img/contact/newimage-1.png"
                                                    class="img-fluid" style="width: 100%;">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="section-intro">
                                            <h2 data-aos="zoom-out" style="margin-top: 12%;">
                                                Why Do I Need A Flight &amp; Hotel Reservation For
                                                <span>visa Application?</span>
                                            </h2>
                                            <p>If you have plan to travel abroad, you might need an entry visa from the
                                                embassy of the destination country you plan to visit. To obtain this
                                                visa, you need to submit a visa application. Flight &amp; hotel
                                                reservation are the mandatory requirement for any type of visa
                                                application. </p>
                                            <p>With us, you can get all the reservations you need in a matter of few
                                                minutes. You can get reservations for flight &amp; hotel to any
                                                destinations or countries instantly, even while you are at the embassy.
                                                These reservations are acceptable for visa application to any country.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion item -- End's Here  -->

                        <!-- Accordion item -- Start Here  -->

                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">Why Us</div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents">
                                    <!-- <div class="col-lg-12">
                                              <div class="section-intro-img" style="text-align: center;" >
                                                <picture>
                                                  <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png">
                                                    <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png">
                                                      <img src="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png" class="img-fluid" style="width: 100%;">
                                                    </picture>
                                                  </div>
                                                </div> -->

                                    <div class="col-lg-12">
                                        <div class="section-intro-img" style="text-align: center;">
                                            <picture>
                                                <source media="(min-width:320px) and (max-width:767px)"
                                                    srcset="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png">
                                                <source
                                                    media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                                    srcset="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png">
                                                <img src="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png"
                                                    class="img-fluid" style="width: 100%;">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="about-content">
                                            <h2>Here Are The Reasons Why You Should Use Our Service: </h2>
                                            <ul data-aos="slide-up" class="pl-0">
                                                <li>
                                                    <div class="reason___li_wrapper">
                                                        <div class="reason___li_icon">
                                                            <span><i class="fab fa-telegram-plane"></i></span>
                                                        </div>
                                                        <div class="reason___li_content">
                                                            <p>Instant download your PDF reservation.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="reason___li_wrapper">
                                                        <div class="reason___li_icon">
                                                            <span><i class="fab fa-telegram-plane"></i></span>
                                                        </div>
                                                        <div class="reason___li_content">
                                                            <p>Same price for one way, return and multi city flight
                                                                reservation.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="reason___li_wrapper">
                                                        <div class="reason___li_icon">
                                                            <span><i class="fab fa-telegram-plane"></i></span>
                                                        </div>
                                                        <div class="reason___li_content">
                                                            <p>Avoid flight transit in the US, UK or any country that
                                                                require a transit visa.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="reason___li_wrapper">
                                                        <div class="reason___li_icon">
                                                            <span><i class="fab fa-telegram-plane"></i></span>
                                                        </div>
                                                        <div class="reason___li_content">
                                                            <p>Unlimited date revision should you change your travel
                                                                plan.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="reason___li_wrapper">
                                                        <div class="reason___li_icon">
                                                            <span><i class="fab fa-telegram-plane"></i></span>
                                                        </div>
                                                        <div class="reason___li_content">
                                                            <p>No cancellation fee</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- <li>
                                                            <div class="reason___li_wrapper">
                                                              <div class="reason___li_icon">
                                                                <span><i class="fab fa-telegram-plane"></i></span>
                                                              </div>
                                                              <div class="reason___li_content">
                                                                <p>Free TripPlanner access to create your daily trip plans</p>
                                                              </div>
                                                            </div>
                                                          </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion item -- End's Here  -->


                        <!-- Accordion item -- Start Here  -->
                        <div class="accordion__item js-accordion-item" id="pricing-accordion">
                            <div class="accordion-header js-accordion-header">Pricing &amp; Plans
                            </div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents">
                                    <div class="col-lg-4">
                                        <div class="card shadow-sm overflow-hidden price-card-odd">
                                            <div class="card-body">
                                                <h4 class="font-weight-bold text-center mb-3" style="font-size: 26px;">
                                                    Flight Reservation</h4>
                                                <div class="price-card-tree-svg text-center">
                                                    <img class="img-fluid"
                                                        src="https://bookforvisa.com/assets_newdesign/img/home/flightbooking.svg"
                                                        alt="" style="width: 70%;">
                                                </div>

                                                <div class="mb-4 text-left">
                                                    <div class="display-4 font-weight-bold text-center"
                                                        data-pricing-value="15">$<span class="price"
                                                            style="position: relative;">15

                                                            <div class="promotion-price-main"
                                                                style="display: inline-block;position: absolute;top: -22px;">
                                                                <span class="burst-8"
                                                                    style="text-decoration: line-through;font-size: 26px;color: red;line-height: 0;background: rgba(255, 0, 0,0.1);padding: 0px 24px;border-radius: 50px;">
                                                                    $30
                                                                </span>
                                                            </div>


                                                        </span><span style="font-size: 16px;">/Per Person or
                                                            Child</span>
                                                    </div>
                                                    <div class="font-weight-bold"></div>
                                                </div>
                                                <div class="card__content_price">
                                                    <h6>One Way/Round Way/Multi City
                                                    </h6>
                                                    <p>Multi flight for same price (Up To 5 Cities)</p>
                                                </div>
                                                <div class="card__content_price" style="padding: 15px 0px;">
                                                    <h6>Unlimited Revision</h6>
                                                </div>
                                                <div class="general__info" style="visibility: hidden;">
                                                    <p>Price is for one hotel reservation. Hotel reservation for multi
                                                        city available at extra cost.</p>
                                                </div>
                                                <!-- <div class="download___btns">
                                          <a href="#" class="pdfShowDialog" ><i class="fas fa-file-pdf" data-toggle="modal" data-target="#hotelModel"></i>Flight PDF</a>

                                        </div> -->

                                                <div class="get___started_btn mobile__view">
                                                    <a href="https://bookforvisa.com/flight">get Started</a>
                                                </div>

                                            </div>
                                            <div class="price-layer-svg">
                                                <!-- layer svg -->
                                                <svg id="Layer_1" data-name="Layer 1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35">
                                                    <defs>
                                                        <style>
                                                            .color-1 {
                                                                fill: #6C63FF;
                                                                isolation: isolate;
                                                            }

                                                            .cls-1 {
                                                                opacity: 0.1;
                                                            }

                                                            .cls-2 {
                                                                opacity: 0.2;
                                                            }

                                                            .cls-3 {
                                                                opacity: 0.4;
                                                            }

                                                            .cls-4 {
                                                                opacity: 0.6;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <title>bottom-part1</title>
                                                    <g id="bottom-part">
                                                        <g id="Group_747" data-name="Group 747">
                                                            <path id="Path_294" data-name="Path 294"
                                                                class="cls-1 color-1"
                                                                d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z"
                                                                transform="translate(0 0)"></path>
                                                            <path id="Path_297" data-name="Path 297"
                                                                class="cls-2 color-1"
                                                                d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z"
                                                                transform="translate(0 0)"></path>
                                                            <path id="Path_296" data-name="Path 296"
                                                                class="cls-3 color-1"
                                                                d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z"
                                                                transform="translate(0 0)"></path>
                                                            <path id="Path_295" data-name="Path 295"
                                                                class="cls-4 color-1"
                                                                d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z"
                                                                transform="translate(0 0)"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <!-- /layer svg -->
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-lg-4 mt-4">
                                        <div class="card shadow-sm overflow-hidden price-card-odd">
                                            <div class="card-body">
                                                <h4 class="font-weight-bold text-center mb-3" style="font-size: 26px;">
                                                    Hotel Reservation</h4>
                                                <div class="price-card-tree-svg text-center">
                                                    <img class="img-fluid"
                                                        src="https://bookforvisa.com/assets_newdesign/img/home/hotalbooking.svg"
                                                        alt="" style="width: 70%;">
                                                </div>

                                                <div class="mb-4 text-left">
                                                    <div class="display-4 font-weight-bold text-center"
                                                        data-pricing-value="15">$<span class="price"
                                                            style="position: relative;">15

                                                            <div class="promotion-price-main"
                                                                style="display: inline-block;position: absolute;top: -22px;">
                                                                <span class="burst-8"
                                                                    style="text-decoration: line-through;font-size: 26px;color: red;line-height: 0;background: rgba(255, 0, 0,0.1);padding: 0px 24px;border-radius: 50px;">
                                                                    $30
                                                                </span>
                                                            </div>

                                                        </span><span style="font-size: 16px;">/Per Person or
                                                            Child</span>
                                                    </div>
                                                    <div class="font-weight-bold"></div>
                                                </div>
                                                <div class="card__content_price" style="padding: 15px 0px;">
                                                    <h6>Unlimited Stays Duration</h6>
                                                </div>
                                                <div class="card__content_price" style="padding: 15px 0px;">
                                                    <h6>Unlimited Revision</h6>
                                                </div>
                                                <div class="general__info">
                                                    <!-- <p>Price is for one hotel reservation. Hotel reservation for multi city available at extra cost.</p> -->
                                                    <p>Price is for one hotel Booking. Hotel Booking for multi city
                                                        available at extra cost.</p>
                                                </div>

                                                <!-- <div class="download___btns">
                                            <a href="#" class="pdfShowDialog" data-toggle="modal" data-target="#hotelMOdelmain"><i class="fas fa-file-pdf"></i>Hotel PDF</a>

                                        </div> -->

                                                <div class="get___started_btn mobile__view">
                                                    <a href="https://bookforvisa.com/hotel?booking=single">get
                                                        Started</a>
                                                </div>

                                            </div>
                                            <div class="price-layer-svg">
                                                <!-- layer svg -->
                                                <svg id="Layer_1" data-name="Layer 1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35">
                                                    <defs>
                                                        <style>
                                                            .color-1 {
                                                                fill: #6C63FF;
                                                                isolation: isolate;
                                                            }

                                                            .cls-1 {
                                                                opacity: 0.1;
                                                            }

                                                            .cls-2 {
                                                                opacity: 0.2;
                                                            }

                                                            .cls-3 {
                                                                opacity: 0.4;
                                                            }

                                                            .cls-4 {
                                                                opacity: 0.6;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <title>bottom-part1</title>
                                                    <g id="bottom-part">
                                                        <g id="Group_747" data-name="Group 747">
                                                            <path id="Path_294" data-name="Path 294"
                                                                class="cls-1 color-1"
                                                                d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z"
                                                                transform="translate(0 0)"></path>
                                                            <path id="Path_297" data-name="Path 297"
                                                                class="cls-2 color-1"
                                                                d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z"
                                                                transform="translate(0 0)"></path>
                                                            <path id="Path_296" data-name="Path 296"
                                                                class="cls-3 color-1"
                                                                d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z"
                                                                transform="translate(0 0)"></path>
                                                            <path id="Path_295" data-name="Path 295"
                                                                class="cls-4 color-1"
                                                                d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z"
                                                                transform="translate(0 0)"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <!-- /layer svg -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion item -- End's Here  -->

                        <!-- Accordion item -- Start Here  -->
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">Testimonials</div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents">

                                    <div class="col-lg-12">
                                        <div class="bookforvisa owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="main__testimonial_wrapper">
                                                    <div class="color___overlay_testimonials">
                                                        <div class="testimonials__content">
                                                            <p>
                                                            <p>&quot; Never thought a great service like this even
                                                                exist! We visit our parents in Birmingham
                                                                every&nbsp;year, and going through the visa application
                                                                process is a nightmare. But not anymore&nbsp;😊 &quot;
                                                            </p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="testimonials__giver_content">
                                                        <div class="testimonials__giver_content_img">
                                                            <div class="testimonials__giver_content_img_main">
                                                                <img
                                                                    src="https://bookforvisa.com/storage/testimonials/1683364792hina.patel.jpeg">
                                                            </div>
                                                            <div class="testimonials__giver_content_main">
                                                                <h5>Hina Patel</h5>
                                                                <p>Mumbai, India</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="main__testimonial_wrapper">
                                                    <div class="color___overlay_testimonials">
                                                        <div class="testimonials__content">
                                                            <p>
                                                            <p>&quot; Getting a visa during pandemic is never an easy
                                                                task. But here, I can change my booking date to suit my
                                                                visa appointment with no extra charge! &quot;</p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="testimonials__giver_content">
                                                        <div class="testimonials__giver_content_img">
                                                            <div class="testimonials__giver_content_img_main">
                                                                <img
                                                                    src="https://bookforvisa.com/storage/testimonials/1646536480v3_0298170.jpeg">
                                                            </div>
                                                            <div class="testimonials__giver_content_main">
                                                                <h5>Ada Wong</h5>
                                                                <p>Shanghai, China</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="main__testimonial_wrapper">
                                                    <div class="color___overlay_testimonials">
                                                        <div class="testimonials__content">
                                                            <p>
                                                            <p>&quot; Thank you team for your professional support and
                                                                help. Your service help me get my visa approved! Never
                                                                thought it was going to be that simple. &quot;</p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="testimonials__giver_content">
                                                        <div class="testimonials__giver_content_img">
                                                            <div class="testimonials__giver_content_img_main">
                                                                <img
                                                                    src="https://bookforvisa.com/storage/testimonials/1646536007v3_0321596.jpeg">
                                                            </div>
                                                            <div class="testimonials__giver_content_main">
                                                                <h5>Intan Lestari</h5>
                                                                <p>Jakarta, Indonesia</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="main__testimonial_wrapper">
                                                    <div class="color___overlay_testimonials">
                                                        <div class="testimonials__content">
                                                            <p>
                                                            <p>&quot; My visa got approved! Thanks for your great
                                                                service. Will definitely use your service again for my
                                                                next trip. &quot;</p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="testimonials__giver_content">
                                                        <div class="testimonials__giver_content_img">
                                                            <div class="testimonials__giver_content_img_main">
                                                                <img
                                                                    src="https://bookforvisa.com/storage/testimonials/1646535854v3_0244546.jpeg">
                                                            </div>
                                                            <div class="testimonials__giver_content_main">
                                                                <h5>Miguel Fernandez</h5>
                                                                <p>Manila, Philippines</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="main__testimonial_wrapper">
                                                    <div class="color___overlay_testimonials">
                                                        <div class="testimonials__content">
                                                            <p>
                                                            <p>&quot; If you need a flight or hotel booking for your
                                                                visa application, you&#39;ve come to the right place. I
                                                                was surprised by the seamless process of how fast I got
                                                                my booking.&nbsp;&quot;</p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="testimonials__giver_content">
                                                        <div class="testimonials__giver_content_img">
                                                            <div class="testimonials__giver_content_img_main">
                                                                <img
                                                                    src="https://bookforvisa.com/storage/testimonials/16833648961646535637v3_0137283.jpeg">
                                                            </div>
                                                            <div class="testimonials__giver_content_main">
                                                                <h5>Rebecca Fitzpatrick</h5>
                                                                <p>Ontario, Canada</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion item -- Ends Here  -->

                    </div>
                </div>
            </div>
        </div>
    </div>











    <section class="section-padding magic-ball-about about___us_desktop" style="padding: 50px 0px 0px 0px;">

        <section class="how___it_works" style="padding-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="how__it_works_flight">
                            <h6 style="padding-top: 0px;">How To Book Flight or Hotel For your Visa Application</h6>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-10 hide____it_mobile">
                        <div class="upper__layer_number">
                            <hr>
                            <div class="list__card_number_wrapper">
                                <div class="list__card_common">
                                    <span class="color__apply_1">1</span>
                                </div>
                                <div class="list__card_common">
                                    <span class="color__apply_2">2</span>
                                </div>
                                <div class="list__card_common">
                                    <span class="color__apply_3">3</span>
                                </div>
                                <div class="list__card_common">
                                    <span class="color__apply_4">4</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 hide____it_mobile"></div>
                    <div class="col-lg-3 mt-5 margin_remover__mobile">
                        <div class="how__it_work_main_wrapper hover__1">
                            <div class="number___for_mobile extra__pading">
                                <span>1</span>
                            </div>
                            <div class="how__it_work_content">
                                <div class="how__it_work_image">
                                    <picture>
                                        <source media="(min-width:320px) and (max-width:767px)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_2.svg">
                                        <source
                                            media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_2.svg">
                                        <img src="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_2.svg"
                                            alt="" class="img-fluid">
                                    </picture>
                                </div>
                                <div class="how__it_work_image_content">
                                    <h5>Search for Flight or Hotel</h5>
                                    <p>Search for the flight or hotel by filling in the booking and personal details.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5">
                        <div class="how__it_work_main_wrapper hover__2">
                            <div class="number___for_mobile">
                                <span>2</span>
                            </div>
                            <div class="how__it_work_content">
                                <div class="how__it_work_image">
                                    <picture>
                                        <source media="(min-width:320px) and (max-width:767px)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_22svg">
                                        <source
                                            media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_3.svg">
                                        <img src="https://bookforvisa.com/assets_newdesign/img/Flight_Booking_Step_3.svg"
                                            alt="" class="img-fluid">
                                    </picture>
                                </div>
                                <div class="how__it_work_image_content">
                                    <h5>Select Flight or Hotel</h5>
                                    <p>View flight or hotel details or directly select the desired service.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5">
                        <div class="how__it_work_main_wrapper hover__3">
                            <div class="number___for_mobile">
                                <span>3</span>
                            </div>
                            <div class="how__it_work_content">
                                <div class="how__it_work_image">
                                    <picture>
                                        <source media="(min-width:320px) and (max-width:767px)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                        <source
                                            media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                        <img src="https://bookforvisa.com/assets_newdesign/img/Step_4.svg"
                                            alt="" class="img-fluid">
                                    </picture>
                                </div>
                                <div class="how__it_work_image_content">
                                    <h5>Confirm Your Booking</h5>
                                    <p>Confirm your booking details and pay for the booking to get your visa itinerary.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-5">
                        <div class="how__it_work_main_wrapper hover__4" style="height: 484px;">
                            <div class="number___for_mobile">
                                <span>4</span>
                            </div>
                            <div class="how__it_work_content">
                                <div class="how__it_work_image">
                                    <picture>
                                        <source media="(min-width:320px) and (max-width:767px)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/step_4-1.svg">
                                        <source
                                            media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)"
                                            srcset="https://bookforvisa.com/assets_newdesign/img/step_4-1.svg">
                                        <img src="https://bookforvisa.com/assets_newdesign/img/step_4-1.svg"
                                            alt="" class="img-fluid">
                                    </picture>
                                </div>
                                <div class="how__it_work_image_content">
                                    <h5>Download Your Booking</h5>
                                    <p>Your booking will be ready for you to download and print out immediately</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Hotel -- Booking -->
        <!--
                            <section class="how___it_works" style="padding-top: 0px;">
                                  <div class="container">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <div class="how__it_works_flight">
                                          <h6>How Hotel Booking Works</h6>
                                        </div>
                                      </div>
                                      <div class="offset-lg-1 col-lg-10 hide____it_mobile"  >
                                        <div class="upper__layer_number">
                                          <hr>
                                          <div class="list__card_number_wrapper">
                                            <div class="list__card_common">
                                              <span class="color__apply_5">1</span>
                                            </div>
                                            <div class="list__card_common">
                                              <span class="color__apply_6">2</span>
                                            </div>
                                            <div class="list__card_common">
                                              <span class="color__apply_7">3</span>
                                            </div>
                                            <div class="list__card_common">
                                              <span class="color__apply_8">4</span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-1 hide____it_mobile"></div>
                                      <div class="col-lg-3 mt-5 margin_remover__mobile">
                                        <div class="how__it_work_main_wrapper hover__5">
                                          <div class="number___for_mobile extra__pading">
                                            <span>1</span>
                                          </div>
                                          <div class="how__it_work_content">
                                            <div class="how__it_work_image">
                                              <picture>
                                                <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_1.svg">
                                                  <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_1.svg">
                                                    <img src="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_1.svg" alt="" class="img-fluid">
                                                  </picture>
                                                </div>
                                                <div class="how__it_work_image_content">
                                                  <h5>Choose Your Hotel</h5>
                                                  <p>Choose whether it is a single booking or multi booking.</p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-lg-3 mt-5">
                                            <div class="how__it_work_main_wrapper hover__6">
                                              <div class="number___for_mobile">
                                                <span>2</span>
                                              </div>
                                              <div class="how__it_work_content">
                                                <div class="how__it_work_image">
                                                  <picture>
                                                    <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_2.svg">
                                                      <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_2.svg">
                                                        <img src="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_2.svg" alt="" class="img-fluid">
                                                      </picture>
                                                    </div>
                                                    <div class="how__it_work_image_content">
                                                      <h5>Search Your Hotel</h5>
                                                      <p>Search for the available hotels by filling in the traveling city, check-in and check-out date, travelers count, and personal details.</p>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-lg-3 mt-5">
                                                <div class="how__it_work_main_wrapper hover__7">
                                                  <div class="number___for_mobile">
                                                    <span>3</span>
                                                  </div>
                                                  <div class="how__it_work_content">
                                                    <div class="how__it_work_image">
                                                      <picture>
                                                        <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_3.svg">
                                                          <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_3.svg">
                                                            <img src="https://bookforvisa.com/assets_newdesign/img/Hotel_Booking_Step_3.svg" alt="" class="img-fluid">
                                                          </picture>
                                                        </div>
                                                        <div class="how__it_work_image_content">
                                                          <h5>Reserve Hotel</h5>
                                                          <p>View hotel details to confirm the reservation. </p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-3 mt-5">
                                                    <div class="how__it_work_main_wrapper hover__8">
                                                      <div class="number___for_mobile">
                                                        <span>4</span>
                                                      </div>
                                                      <div class="how__it_work_content">
                                                        <div class="how__it_work_image">
                                                          <picture>
                                                            <source media="(min-width:320px) and (max-width:767px)" srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                                              <source media="(min-width: 768px) and (max-width:1024px) and (orientation: portrait)" srcset="https://bookforvisa.com/assets_newdesign/img/Step_4.svg">
                                                                <img src="https://bookforvisa.com/assets_newdesign/img/Step_4.svg" alt="" class="img-fluid">
                                                              </picture>
                                                            </div>
                                                            <div class="how__it_work_image_content">
                                                              <h5>Confirm Booking</h5>
                                                              <p>Confirm the hotel reservation details and pay for the booking.</p>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </section>
                             -->


        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-intro">
                        <h2 style="margin-top: 12%;">Why Do I Need A Flight &amp; Hotel Reservation For
                            <span>visa Application?</span>
                        </h2>
                        <p>If you have plan to travel abroad, you might need an entry visa from the embassy of the
                            destination country you plan to visit. To obtain this visa, you need to submit a visa
                            application. Flight &amp; hotel reservation are the mandatory requirement for any type of
                            visa application. </p>
                        <p>With us, you can get all the reservations you need in a matter of few minutes. You can get
                            reservations for flight &amp; hotel to any destinations or countries instantly, even while
                            you are at the embassy. These reservations are acceptable for visa application to any
                            country. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-intro-img" style="text-align: center;">
                        <img src="https://bookforvisa.com/assets_newdesign/img/contact/newimage-1.png" class="img-fluid"
                            style="width: 70%;">
                    </div>
                </div>
                <div class="col-lg-6 order-set-2" style="text-align: center;">
                    <div class="section-intro-img margin-set">
                        <img src="https://bookforvisa.com/assets_newdesign/img/contact/sec-img-2.png" class="img-fluid"
                            style="width: 70%;">
                    </div>
                </div>
                <div class="col-lg-6 order-set-1">
                    <div class="about-content margin-set-2">
                        <h2>Here Are The Reasons Why You Should Use Our Service: </h2>
                        <ul class="pl-0">
                            <li><i class="fab fa-telegram-plane"></i> Instant download your PDF reservation. </li>
                            <li><i class="fab fa-telegram-plane"></i> Same price for one way, return and multi city
                                flight reservation.</li>
                            <li><i class="fab fa-telegram-plane"></i> Avoid flight transit in the US, UK or any
                                country that require a transit visa.</li>
                            <li><i class="fab fa-telegram-plane"></i> Unlimited date revision should you change your
                                travel plan.</li>
                            <li><i class="fab fa-telegram-plane"></i> No cancellation fee</li>
                            <!-- <li><i class="fab fa-telegram-plane"></i> Free TripPlanner access to create your daily trip plans</li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <style type="text/css">
                .section-intro {
                    max-width: 100% !important;
                }

                .section-intro h2 {
                    text-transform: capitalize !important;
                    margin-bottom: 20px;
                    font-weight: 600;
                }

                .section-intro h2>span {
                    color: #6400e4;
                }

                .margin-set {
                    margin-top: 16%;
                }

                .margin-set-2 {
                    margin-top: 20%;
                }

                @media(min-width:320px) and (max-width:767px) {
                    .order-set-1 {
                        order: 1 !important;
                    }

                    .order-set-2 {
                        order: 2 !important;
                    }

                    .section-intro-img img {
                        width: 100% !important;
                    }
                }

                @media (min-width: 768px) and (max-width: 1024px)and (orientation: portrait) {
                    .order-set-1 {
                        order: 1 !important;
                    }

                    .order-set-2 {
                        order: 2 !important;
                    }

                    .section-intro-img {
                        text-align: center !important;
                    }

                    .section-intro {
                        max-width: 100% !important;
                    }

                    .banner-video-icon {
                        display: none;
                    }

                    .margin-set {
                        margin-top: 5%;
                    }
                }

                @media only screen and (min-device-width: 1024px) and (max-device-width: 1024px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2) {
                    .order-set-1 {
                        order: 2 !important;
                    }

                    .order-set-2 {
                        order: 1 !important;
                    }


                }



                .about-content h2 {
                    text-transform: capitalize !important;
                    margin-bottom: 20px;
                    font-weight: 600;
                }
            </style>

            <!-- <div class="section-intro text-center pb-90px">
                                  <h2 data-aos="zoom-out">Why do I need a flight & hotel reservation for <br> visa application?</h2>
                                  <p>If you have plan to travel abroad, you might need an entry visa from the embassy of the destination country you plan to visit. To obtain this visa, you need to submit a visa application. Flight & hotel reservation are the mandatory requirement for any type of visa application. </p>
                                  <p>With us, you can get all the reservations you need in a matter of few minutes. You can get reservations for flight & hotel to any destinations or countries instantly, even while you are at the embassy. These reservations are acceptable for visa application to any country. </p>
                                </div>

                                <div class="row">
                                  <div class="col-lg-7 col-md-7 align-self-center about-content">
                                    <h2>Here are the reasons why you should use our service: </h2>
                                    <ul data-aos="slide-up" class="pl-0">
                                      <li><i class="fab fa-telegram-plane"></i> Instant download your PDF reservation. </li>
                                      <li><i class="fab fa-telegram-plane"></i> Same price for one way, return and multi city flight reservation.</li>
                                      <li><i class="fab fa-telegram-plane"></i> Avoid flight transit in the US, UK or any country that require a transit visa.</li>
                                      <li><i class="fab fa-telegram-plane"></i> Unlimited date revision should you change your travel plan.</li>
                                      <li><i class="fab fa-telegram-plane"></i> No cancellation fee</li>
                                      <li><i class="fab fa-telegram-plane"></i> Free TripPlanner access to create your daily trip plans</li>
                                    </ul>
                                  </div>
                                  <div class="col-lg-5 col-md-5">
                                    <div class="video-matrics">



                                    </div>
                                  </div>
                                </div> -->
        </div>
    </section>
    <!--================About Area End =================-->
    <section class="section-padding pricing-table price___plan_desktop" id="pricingtable">
        <div class="container">
            <div class="section-intro text-center pb-90px">
                <h2 style="font-weight: 600;">Pricing &amp; Plans</h2>
            </div>
            <div class="row" style="justify-content: center;">


                <div class="col-lg-4">
                    <div class="card shadow-sm overflow-hidden price-card-odd">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-center mb-3" style="font-size: 26px;">
                                Flight Reservation</h4>
                            <div class="price-card-tree-svg text-center">
                                <img class="img-fluid"
                                    src="https://bookforvisa.com/assets_newdesign/img/home/flightbooking.svg"
                                    alt="" style="width: 70%;">
                            </div>

                            <div class="mb-4 text-left">
                                <div class="display-4 font-weight-bold text-center" data-pricing-value="  $15"><span
                                        class="price" style="position: relative;"> $15







                                    </span><span style="font-size: 16px;">/Per Person or Child</span>
                                </div>
                                <div class="font-weight-bold"></div>
                            </div>
                            <div class="card__content_price">
                                <h6>One Way/Round Way/Multi City
                                </h6>
                                <p>Multi flight for same price (Up To 5 Cities)</p>
                            </div>
                            <div class="card__content_price" style="padding: 15px 0px;">
                                <h6>Unlimited Revision</h6>
                            </div>
                            <div class="general__info" style="visibility: hidden;">
                                <p>Price is for one hotel reservation. Hotel reservation for multi city available at
                                    extra cost.</p>
                            </div>
                            <!-- <div class="general__info" style="visibility: hidden;">
                                          <p>Price is for one hotel reservation. Hotel reservation for multi city available at extra cost.</p>
                                        </div> -->
                            <!-- <div class="download___btns" style="margin-top: 23%;">
                                          <a href="#" class="pdfShowDialog" data-toggle="modal" data-target="#hotelModel"><i class="fas fa-file-pdf"></i>Flight PDF</a>


                                        </div> -->

                            <div class="get___started_btn" style="margin-bottom: 25%;">
                                <a href="https://bookforvisa.com/flight">get Started</a>
                            </div>
                            <div class="price-layer-svg">
                                <!-- layer svg -->
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 350 112.35">
                                    <defs>
                                        <style>
                                            .color-1 {
                                                fill: #6C63FF;
                                                isolation: isolate;
                                            }

                                            .cls-1 {
                                                opacity: 0.1;
                                            }

                                            .cls-2 {
                                                opacity: 0.2;
                                            }

                                            .cls-3 {
                                                opacity: 0.4;
                                            }

                                            .cls-4 {
                                                opacity: 0.6;
                                            }
                                        </style>
                                    </defs>
                                    <title>bottom-part1</title>
                                    <g id="bottom-part">
                                        <g id="Group_747" data-name="Group 747">
                                            <path id="Path_294" data-name="Path 294" class="cls-1 color-1"
                                                d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z"
                                                transform="translate(0 0)"></path>
                                            <path id="Path_297" data-name="Path 297" class="cls-2 color-1"
                                                d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z"
                                                transform="translate(0 0)"></path>
                                            <path id="Path_296" data-name="Path 296" class="cls-3 color-1"
                                                d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z"
                                                transform="translate(0 0)"></path>
                                            <path id="Path_295" data-name="Path 295" class="cls-4 color-1"
                                                d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z"
                                                transform="translate(0 0)"></path>
                                        </g>
                                    </g>
                                </svg>
                                <!-- /layer svg -->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="card shadow-sm overflow-hidden price-card-odd">
                        <div class="card-body">
                            <h4 class="font-weight-bold text-center mb-3" style="font-size: 26px;">
                                Hotel Reservation</h4>
                            <div class="price-card-tree-svg text-center">
                                <img class="img-fluid"
                                    src="https://bookforvisa.com/assets_newdesign/img/home/hotalbooking.svg"
                                    alt="" style="width: 70%;">
                            </div>

                            <div class="mb-4 text-left">
                                <div class="display-4 font-weight-bold text-center" data-pricing-value=" $15"><span
                                        class="price" style="position: relative;"> $15



                                    </span><span style="font-size: 16px;">/Per Person or Child</span>
                                </div>
                                <div class="font-weight-bold"></div>
                            </div>
                            <div class="card__content_price" style="padding: 15px 0px;">
                                <h6>Unlimited Stays Duration</h6>
                            </div>
                            <div class="card__content_price" style="padding: 15px 0px;">
                                <h6>Unlimited Revision</h6>
                            </div>
                            <div class="general__info">
                                <!-- <p>Price is for one hotel reservation. Hotel reservation for multi city available at extra cost.</p> -->
                                <p>Price is for one hotel booking. Hotel booking for multi city available at extra cost.
                                </p>
                            </div>
                            <!--
                                        <div class="download___btns">
                                          <a href="#" class="pdfShowDialog2" data-toggle="modal" data-target="#hotelMOdelmain"><i class="fas fa-file-pdf"></i>Hotel PDF</a>

                                        </div> -->

                            <div class="get___started_btn" style="margin-bottom: 25%;">
                                <a href="https://bookforvisa.com/hotel?booking=single">get Started</a>
                            </div>
                            <div class="price-layer-svg">
                                <!-- layer svg -->
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 350 112.35">
                                    <defs>
                                        <style>
                                            .color-1 {
                                                fill: #6C63FF;
                                                isolation: isolate;
                                            }

                                            .cls-1 {
                                                opacity: 0.1;
                                            }

                                            .cls-2 {
                                                opacity: 0.2;
                                            }

                                            .cls-3 {
                                                opacity: 0.4;
                                            }

                                            .cls-4 {
                                                opacity: 0.6;
                                            }
                                        </style>
                                    </defs>
                                    <title>bottom-part1</title>
                                    <g id="bottom-part">
                                        <g id="Group_747" data-name="Group 747">
                                            <path id="Path_294" data-name="Path 294" class="cls-1 color-1"
                                                d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z"
                                                transform="translate(0 0)"></path>
                                            <path id="Path_297" data-name="Path 297" class="cls-2 color-1"
                                                d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z"
                                                transform="translate(0 0)"></path>
                                            <path id="Path_296" data-name="Path 296" class="cls-3 color-1"
                                                d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z"
                                                transform="translate(0 0)"></path>
                                            <path id="Path_295" data-name="Path 295" class="cls-4 color-1"
                                                d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z"
                                                transform="translate(0 0)"></path>
                                        </g>
                                    </g>
                                </svg>
                                <!-- /layer svg -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="testimonials__main_wrapper mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonials__main_heading">
                            <h4>Testimonials</h4>
                            <!-- <p>our client loves us because our quality work</p> -->
                            <p>See Why Our Client Loves our Services</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <div class="bookforvisa owl-carousel owl-theme">
                            <div class="item">
                                <div class="main__testimonial_wrapper">
                                    <div class="color___overlay_testimonials">
                                        <div class="testimonials__content">
                                            <p>
                                            <p>&quot; Never thought a great service like this even exist! We visit our
                                                parents in Birmingham every&nbsp;year, and going through the visa
                                                application process is a nightmare. But not anymore&nbsp;😊 &quot;</p>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="testimonials__giver_content">
                                        <div class="testimonials__giver_content_img">
                                            <div class="testimonials__giver_content_img_main">
                                                <img
                                                    src="https://bookforvisa.com/storage/testimonials/1683364792hina.patel.jpeg">
                                            </div>
                                            <div class="testimonials__giver_content_main">
                                                <h5>Hina Patel</h5>
                                                <p>Mumbai, India</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="main__testimonial_wrapper">
                                    <div class="color___overlay_testimonials">
                                        <div class="testimonials__content">
                                            <p>
                                            <p>&quot; Getting a visa during pandemic is never an easy task. But here, I
                                                can change my booking date to suit my visa appointment with no extra
                                                charge! &quot;</p>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="testimonials__giver_content">
                                        <div class="testimonials__giver_content_img">
                                            <div class="testimonials__giver_content_img_main">
                                                <img
                                                    src="https://bookforvisa.com/storage/testimonials/1646536480v3_0298170.jpeg">
                                            </div>
                                            <div class="testimonials__giver_content_main">
                                                <h5>Ada Wong</h5>
                                                <p>Shanghai, China</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="main__testimonial_wrapper">
                                    <div class="color___overlay_testimonials">
                                        <div class="testimonials__content">
                                            <p>
                                            <p>&quot; Thank you team for your professional support and help. Your
                                                service help me get my visa approved! Never thought it was going to be
                                                that simple. &quot;</p>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="testimonials__giver_content">
                                        <div class="testimonials__giver_content_img">
                                            <div class="testimonials__giver_content_img_main">
                                                <img
                                                    src="https://bookforvisa.com/storage/testimonials/1646536007v3_0321596.jpeg">
                                            </div>
                                            <div class="testimonials__giver_content_main">
                                                <h5>Intan Lestari</h5>
                                                <p>Jakarta, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="main__testimonial_wrapper">
                                    <div class="color___overlay_testimonials">
                                        <div class="testimonials__content">
                                            <p>
                                            <p>&quot; My visa got approved! Thanks for your great service. Will
                                                definitely use your service again for my next trip. &quot;</p>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="testimonials__giver_content">
                                        <div class="testimonials__giver_content_img">
                                            <div class="testimonials__giver_content_img_main">
                                                <img
                                                    src="https://bookforvisa.com/storage/testimonials/1646535854v3_0244546.jpeg">
                                            </div>
                                            <div class="testimonials__giver_content_main">
                                                <h5>Miguel Fernandez</h5>
                                                <p>Manila, Philippines</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="main__testimonial_wrapper">
                                    <div class="color___overlay_testimonials">
                                        <div class="testimonials__content">
                                            <p>
                                            <p>&quot; If you need a flight or hotel booking for your visa application,
                                                you&#39;ve come to the right place. I was surprised by the seamless
                                                process of how fast I got my booking.&nbsp;&quot;</p>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="testimonials__giver_content">
                                        <div class="testimonials__giver_content_img">
                                            <div class="testimonials__giver_content_img_main">
                                                <img
                                                    src="https://bookforvisa.com/storage/testimonials/16833648961646535637v3_0137283.jpeg">
                                            </div>
                                            <div class="testimonials__giver_content_main">
                                                <h5>Rebecca Fitzpatrick</h5>
                                                <p>Ontario, Canada</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <style type="text/css">
            .modal-open .modal {
                overflow-y: scroll !important;
            }
        </style>
    </section>


    <div class="modal fade" id="hotelModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://bookforvisa.com/assets_newdesign/img/flight-pldf.png" style="width: 100%;">
                </div>
                <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="hotelMOdelmain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://bookforvisa.com/assets_newdesign/img/hotel-pdf.png" style="width: 100%;">
                </div>
                <!--  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div> -->
            </div>
        </div>
    </div>
@endsection

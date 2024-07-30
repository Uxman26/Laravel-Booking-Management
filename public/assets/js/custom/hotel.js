var hotelResults;
var map;
var marker;
var markerCount;
var newBounds;
var infowindow;
var hotelDisplayCount = 0;
var starValue = 0;
var hotelSearchParams = null;

var styles = [
    {
        stylers: [
            {
                hue: "#007fff",
            },
            {
                saturation: 89,
            },
        ],
    },
    {
        featureType: "administrative.country",
        elementType: "labels",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "administrative.land_parcel",
        elementType: "labels",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "poi",
        elementType: "labels.text",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "poi.business",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "road",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "road",
        elementType: "labels.icon",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "road.local",
        elementType: "labels",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "transit",
        stylers: [
            {
                visibility: "off",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "geometry",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "geometry.fill",
        stylers: [
            {
                lightness: -20,
            },
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "geometry.stroke",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "labels",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "labels.icon",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "labels.text",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "labels.text.fill",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "transit.station.airport",
        elementType: "labels.text.stroke",
        stylers: [
            {
                visibility: "on",
            },
        ],
    },
    {
        featureType: "water",
        stylers: [
            {
                color: "#ffffff",
            },
        ],
    },
];

$(document).ready(function ($) {
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    mapInit();
    // googlePlaces();
    suggestCities();
    $(".widget-flight-results").hide();
    $("#hotel-checkout").closest('.col').hide();
    $("#hotel-not-found").hide();

    if ($("#saved_hotels").length) {
        hotelSearchParams = JSON.parse($("#saved_hotels").val());
        console.log(hotelSearchParams);
        let html = "";
        for (let i = 0; i < hotelSearchParams.length; i++) {
            html += hotelListTemplate(
                hotelSearchParams[i]["hotel_result"]["hotelset"][0],
                hotelSearchParams[i]["hotel_search_query"],
                false
            );
        }

    }

    if ($("#hotel_request_data").length) {
        let hotel_request_data = JSON.parse($("#hotel_request_data").val());
        // console.log(hotel_request_data)
        if (hotel_request_data.hasOwnProperty("search")) {
            let hotelType = hotel_request_data.search.hotelType;
            let totalBookings = hotel_request_data.search.booking_count;
            let totalDestinations =
                hotel_request_data.search.destinations.length;
            let hotel = (html = "");
            let hotel_info = null;
            if (hotelType == 2) {

                if (totalBookings < totalDestinations) {
                    $("#destination").val(
                        hotel_request_data.search.destinations[totalBookings]
                    );
                    $("#checkin_date").val(
                        hotel_request_data.search.checkins[totalBookings]
                    );
                    $("#checkout_date").val(
                        hotel_request_data.search.checkouts[totalBookings]
                    );
                    setTimeout(function () {
                        $("#hotel-search-btn").trigger("click");
                    }, 2);
                } else if (totalBookings == totalDestinations) {

                    $("#checkin_date").val("");
                    $("#checkout_date").val("");
                }
            } else {
                setTimeout(function () {
                    $("#hotel-search-btn").trigger("click");
                }, 2);
            }
            try {
                for (let i = 0; i < hotel_request_data.hotel.length; i++) {
                    hotel = hotel_request_data.hotel[i];
                    hotel_info = hotel["search_result"]["hotelset"][0];
                    hotel_info.id = hotel.id;

                    html += hotelListTemplate(
                        hotel_info,
                        hotel["search_query"],
                        false
                    );
                }
                if (hotel_request_data.hotel.length) {
                    $("#label-booked-hotels")
                        .removeClass("d-none")
                        .addClass("d-block");
                        $("#hotel-checkout").closest('.col').show();
                }
            } catch (err) {}

            $("#booked-hotels-container").html(html).show();
        }
    }

    $(".hotel-booking").on("click",function(e){
        e.preventDefault();
        $(".hotel-booking").removeClass('active');
        $(this).addClass('active');
        $("input[name=hotelType]").val($(this).data('hoteltype'));
        $("input[name=booking]").val($(this).data('booking'));
    });
    $("#no_of_travellers_hotel").change(function () {
        let numberTraveller = $(this).val();
        // console.log(numberTraveller)
        if (numberTraveller > 1) {
            let html = "";
            for (let c = 1; c < numberTraveller; c++) {
                html += `<div class="extra_travellers">


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Full Name</label>
                                    <div class="input-wrapper-ico">
                                        <i class="far fa-user"></i>
                                        <input type="text" name="first_name[]" class="form-control" required>
                                    </div>
                                </div>

                            </div>
                        </div>`;
            }
            $(document).find(".general-form  .extra_travellers").remove();
            $(html).insertAfter(".must_travellers");
        } else {
            $(document).find(".general-form  .extra_travellers").remove();
        }
    });



    $("#checkin_date").daterangepicker({
        singleDatePicker: true,
        autoApply: true,
        minDate: new Date(),
        locale: {
            format: "DD/MM/YYYY",
        },

    });

    var pickerHotel = $("#checkin_date").daterangepicker({
        minDate: new Date(),
        autoApply: true,
        linkedCalendars: false,
        autoUpdateInput: false,
    });

    pickerHotel.on("apply.daterangepicker", function (ev, picker) {

        $(this).val(picker.startDate.format("DD/MM/YYYY"));

        $("#checkout_date").daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            minDate: moment( picker.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY").add(1, "d"),
            locale: {
                format: "DD/MM/YYYY",
            },
        }).on("apply.daterangepicker", function (ev, pickers){

            $('#checkin_date').data('daterangepicker').setEndDate(moment( pickers.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY"));
        });
        $("#checkout_date")
            .data("daterangepicker")
            .setStartDate(picker.endDate.format("DD/MM/YYYY"));
    });



    $("#checkout_date").daterangepicker({
        singleDatePicker: true,
        autoApply: true,
        showDropdowns: false,
        minDate: moment( $("#checkin_date").val()??new Date(), "DD/MM/YYYY").add(1, "d"),
        locale: {
            format: "DD/MM/YYYY",
        },

    }).on("apply.daterangepicker", function (ev, pickers){

        $('#checkin_date').data('daterangepicker').setEndDate(moment( pickers.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY"));
    });


    $("#hotel-search-btn").on("click", function () {

        form = $(".hotel-search");
        //new code home page search
        $homepage = form.find("#home_page").val();
        if ($homepage === "home" || $homepage === "article.detail") {


//my new code

var params = form.serialize();
$multiple=$("#hotelType").val();

    $.LoadingOverlay("show"); //  $(".divLoading").show();
var data = {
    booked_id: $("#booked_id").val(),
    booked_type: $("#booked_type").val(),
    flight_id: $("#flight_id").val(),
    request_params: params,
};
url =$("#homeurlauto").val();
// console.log(url)
$.ajax({
    type: "POST",
    url: url,
    data: data,
    dataType: "JSON",
    success: function (data) {
        clearSearchResults();

        if (!data.error) {
            window.location.href = data.redirect_url;

        }else{
            Swal.fire({
                // title: 'Are you sure?Do you want to book another hotel or proceed to checkout?',
                title: "",
                text: data.message,
                type: "error",
                showCancelButton: false,

            })
        }
    },
});
return false;
}
// else
// {
//     window.location.href = "hotel?" + params;

// }
//end





        if (window.location.pathname === "/") {
            data = form
                .find(
                    "input[name=destination_city],input[name=checkin_date],input[name=checkout_date],input[name=travellers],input[name=home_page],input[name=booking]"
                )
                .serialize();
            window.location.href = "hotel?" + data;
        }
        //end

        url = $("#get-hotel-search-route").val();

        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            dataType: "JSON",
            success: function (data) {
                $("#no-result-errors").html("");
                if (data.error) {
                    $.LoadingOverlay("hide");
                    showAlertForHotelError("Hotel Error", data.message);
                   return false;
                }
                hotelResults = data;
                $("#hotel_results").val(JSON.stringify(data));
                $("#show-hotel-results").html("");
                $(".widget-flight-results").show();
                showResults(hotelResults);
                $(".asside-wrapper").animate(
                    { scrollTop: $("#result-set-display").offset().top },
                    1800
                );
                $.LoadingOverlay("hide");

                $(".asside-left").animate(
                    {
                        scrollTop:
                            $("#label-selected-hotels").offset().top - 120,
                    },
                    1500
                );
            },
        });
    });

    $(".hotel-stars").on("change", function () {
        starValue = this.value;
        if (hotelResults) {
            //$(".divLoading").show();
            $.LoadingOverlay("show");
            $("#show-hotel-results").html("");
            showResults(hotelResults);
        }
    });

    $(document)
        .off("click", ".view-hotel-detail")
        .on("click", ".view-hotel-detail", function () {
            let selectedId = $(this).attr("data-id");
            let allHotels = hotelResults.hotelset;

            for (let i = 0; i < allHotels.length; i++) {
                if (selectedId == allHotels[i].id) {
                    showModal(allHotels[i]);
                }
            }
        });
    $(document).on("click", "#icon_checkin_date", function () {
        $("#checkin_date").trigger("focus");
    });

    $(document).on("click", "#icon_checkout_date", function () {
        $("#checkout_date").trigger("focus");
    });
    var $lastDate = "";
    $(document).on("click", "#updatehotel", function () {
        // $.LoadingOverlay("show");
        form = $(".hotel-search");

        var submitButton = $("#updatehotel");
        submitButton.prop("disabled", true);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "JSON",
            beforeSend: function () {
                // window.scrollTo(0, 440);
                submitButton.prop("disabled", true);
                $.LoadingOverlay("show");
            },

            success: function (data) {
                $.LoadingOverlay("hide");
                if (data.error) {
                    submitButton.prop("disabled", false);
                    $.LoadingOverlay("hide");
                    showAlertForHotelError("Hotel Error", data.message);
                    return false;
                }

                //check hotel
                let request_data = JSON.parse($("#hotel_request_data").val());
                $("#booking_count_edit").val(data.booking_count);
                if (
                    data.booking_count ==
                    request_data.search.destinations.length
                ) {
                    $.LoadingOverlay("show");
                    window.location.href = data.redirect_url;
                    return false;
                } else {
                    Swal.fire(
                        "Good job!",
                        "Your Hotel Itinerary has been updated",
                        "success"
                    );
                }

                $("#destination").val(
                    request_data.search.destinations[data.booking_count]
                );
                if ($("#destination_revision").length) {
                    $("#destination_revision").val(
                        request_data.search.destinations[data.booking_count]
                    );
                }

                $lastDate = $("#checkout_date").val();

                let dateVal = $lastDate;
                var datearray = dateVal.split("/");
                var newdate =
                    datearray[1] + "/" + datearray[0] + "/" + datearray[2];
                let lastDates = new Date(newdate);
                let tomorrow = new Date(newdate);
                startdate = moment(lastDates)
                    .add(1, "days")
                    .format("DD/MM/YYYY");
                enddate = moment(tomorrow).add(2, "days").format("DD/MM/YYYY");

                $("#checkin_date")
                    .val(startdate)
                    .daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minDate: startdate,
                        locale: {
                            format: "DD/MM/YYYY",
                        },
                    });

                $("#checkout_date")
                    .val(enddate)
                    .daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true,
                        minDate: enddate,
                        locale: {
                            format: "DD/MM/YYYY",
                        },
                    }).on("apply.daterangepicker", function (ev, pickers){

                        $('#checkin_date').data('daterangepicker').setEndDate(moment( pickers.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY"));
                    });

                submitButton.prop("disabled", false);
            },
        });
    });
    $(document).on("click", "#hotel-select", function () {
        //  $(".divLoading").show();
        //$.LoadingOverlay("show");
        $("#selected_hotel_id").val($(this).attr("data-hotel-id"));
        let form = $(".hotel-search");
        var params = form.serialize();

        var data = {
            booked_id: $("#booked_id").val(),
            booked_type: $("#booked_type").val(),
            flight_id: $("#flight_id").val(),
            request_params: params,
        };
        url = form.attr("action");
        // console.log(url)
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "JSON",
            success: function (data) {
                clearSearchResults();
                // console.log(data);
                // return false;

                if (!data.error) {
                    if (data.hotel_type == 1) {
                        window.location.href = data.redirect_url;
                    }
                    if (data.hotel_type == 2) {
                        $("#parent_hotel_id").val(data.parent_hotel_id);
                        $("#booking_count").val(data.booking_count);
                        $("#hotel-checkout").attr("href", data.redirect_url);
                        selectedHotelTemplate(data.bookings);
                      //  $("#hotel-checkout").show();
                      $("#hotel-checkout").closest('.col').show();
                        document.getElementById("hotel-count").style.display =
                            "";
                        $("#count-of-hotel").html(
                            data.booking_count + " Hotels Booked"
                        );
                        $("#label-selected-hotels")
                            .removeClass("d-block")
                            .addClass("d-none");
                        $(".select___hotal").hide();
                        if (data.booking_count >= 6) {
                            window.location.href = data.redirect_url;
                        } else {
                            let request_data = JSON.parse(
                                $("#hotel_request_data").val()
                            );
                            if (
                                request_data.hasOwnProperty("search") &&
                                request_data.flight != null
                            ) {
                                if (
                                    data.booking_count ==
                                    request_data.search.destinations.length
                                ) {
                                    window.location.href = data.redirect_url;
                                    return false;
                                }
                                $("#destination").val(
                                    request_data.search.destinations[
                                        data.booking_count
                                    ]
                                );
                                if ($("#destination_revision").length) {
                                    $("#destination_revision").val(
                                        request_data.search.destinations[
                                            data.booking_count
                                        ]
                                    );
                                }
                                $("#checkin_date").val(
                                    request_data.search.checkins[
                                        data.booking_count
                                    ]
                                );
                                $("#checkout_date").val(
                                    request_data.search.checkouts[
                                        data.booking_count
                                    ]
                                );
                                if (
                                    data.booking_count <
                                    request_data.search.destinations.length
                                ) {
                                    setTimeout(function () {
                                        $("#hotel-search-btn").trigger("click");
                                    }, 2);
                                }
                            } else {
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                        confirmButton: "btn btn-success ml-2",
                                        cancelButton: "btn btn-danger",
                                    },
                                    buttonsStyling: false,
                                });

                                swalWithBootstrapButtons
                                    .fire({
                                        // title: 'Are you sure?Do you want to book another hotel or proceed to checkout?',
                                        title: "",
                                        text: "",
                                        type: "info",
                                        showCancelButton: true,
                                        confirmButtonText: "Book another Hotel",
                                        cancelButtonText: "Checkout!",
                                        cancelButtonColor: "#6059f6",
                                        reverseButtons: true,
                                    })
                                    .then((result) => {
                                        if (result.value) {
                                        } else if (
                                            result.dismiss ===
                                            Swal.DismissReason.cancel
                                        ) {
                                            window.location.href =
                                                data.redirect_url;
                                        }
                                    });
                            }
                        }
                    }
                }
            },
        });
    });
});

function onChangeBooking(val) {
    $("#hotelType").val(val);
    val == 1 ? $("#booking-type").hide() : $("#booking-type").show();
}

function showResults(hotels) {
    //$.LoadingOverlay("hide");
    // $(".divLoading").hide();
    mapInit();
    let allHotels = hotels.hotelset;
    // console.log(allHotels)
    hotelDisplayCount = 0;
    if (allHotels.length > 0) {
        $("#hotel-not-found").hide();
        newBounds = new google.maps.LatLngBounds();
        // $("#hotel-destination-tag").text($("#destination").val());
        showHotelSorted(allHotels, starValue, 3);
        showHotelSorted(allHotels, starValue, 4);
        showHotelSorted(allHotels, starValue, 5);
    } else {
        $("#hotel-not-found").show();
    }
}

function showHotelSorted(allHotels, starFilter, starNum) {
    for (let i = 0; i < allHotels.length; i++) {
        if (hotelDisplayCount < 80) {
            markerCount = i;

            if (allHotels[i].stars == starNum) {
                if (starFilter == 0) {
                    let details = hotelListTemplate(allHotels[i]);
                    $("#show-hotel-results").append(details);
                    $("#label-selected-hotels")
                        .removeClass("d-none")
                        .addClass("d-block");
                    addHotelOnMap(allHotels[i]);
                } else {
                    if (starFilter == allHotels[i].stars) {
                        let details = hotelListTemplate(allHotels[i]);
                        $("#show-hotel-results").append(details);
                        addHotelOnMap(allHotels[i]);
                    }
                }
                hotelDisplayCount++;
            }
        }
    }
}

function addHotelOnMap(hotel) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(hotel.lat, hotel.lon),
        map: map,
    });

    google.maps.event.addListener(
        marker,
        "click",
        (function (marker, markerCount) {
            return function () {
                infowindow.setContent(hotel.name);
                infowindow.open(map, marker);
            };
        })(marker, markerCount)
    );

    newBounds.extend(marker.position);
    map.fitBounds(newBounds);
}

function startTemplate(hotel) {
    var stars = hotel.stars == 0 ? 4 : hotel.stars;
    let star = "<span>";
    for (let i = 0; i < parseInt(stars); i++) {
        star = star + '<i class="fas fa-star"></i>';
    }
    return star + "</span>";
}

function showModal(hotel, readonly = false) {
    $("#hotel_name").text(hotel.name);
    $("#room_name").text(hotel.room_name);
    $("#bed_name").text(hotel.bed_name);
    $("#total_nights").text(hotel.total_nights);
    $("#max_persons").text(hotel.max_persons);
    $("#hotel_img").attr(
        "src",
        "" + hotel.thumburl.replace("square60", "square200")
    );
    $("#hotel_address").text(hotel.address);
    $("#rating-" + hotel.stars).prop("checked", true);
    $("#hotel_rating").text(hotel.stars);
    $("#hotel_reviews").text(hotel.reviews);

    var price = Math.round(hotel.displayprice);
    $("#hotel_price").html("$" + price + `<sub> per night</sub>`);
    $("#hotel-select").attr("data-hotel-id", hotel.id);
    if (readonly) {
        $("#hotel_detail").find(".modal-footer").hide();
    }
    $("#hotel_detail").modal("show");
}

function mapInit() {
    var mapOptions = {
        zoom: 3,
        center: new google.maps.LatLng(31.521559999999997, 74.40359000000001),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        opacity: 0.2,
        styles: styles,
        mapTypeControl: false,
        streetViewControl: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP,
        },
        fullscreenControl: false,
    };

    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    infowindow = new google.maps.InfoWindow();
}

// Character Count Ellipsis
function ellipsisChar(text, size = 30) {
    let len = text.length;
    if (len >= size) {
        text = text.substring(0, size) + "...";
    }
    return text;
}

function clearSearchResults() {
    $.LoadingOverlay("hide");

    $("#hotel_detail").modal("hide");
    $("#show-hotel-results").html("");
    $("#hotel-destination-tag").text("");

}

function selectedHotelTemplate(bookings) {
    let html = "";

    for (let i = 0; i < bookings.length; i++) {
        html = html + hotelListTemplate(bookings[i], null, true);
    }

    $("#booked-hotels-container").html(html);
    $("#label-booked-hotels").removeClass("d-none").addClass("d-block");
}

function hotelListTemplate(hotel, search_params = null, deletable = false) {
    var price = Math.round(hotel.displayprice);

    $("#hotel_price").html("$" + price + `<sub> per night</sub>`);
    html = `
    <div class="hotel___detail_wrapper ${
        hotel.id ? "deletable-" + hotel.id : ""
    }">
    <div class="row">
    <div class="col-md-1  pr-0 mobile___replace">
        <div class="hotel__img">
            <img src="${hotel.thumburl.replace(
                "square60",
                "square100"
            )}" class="img-fluid">
        </div>
    </div>
        <div class="col-md-11">
        <div class="hotal___details">
            <ul>
                <li class="hotel-name">${hotel.name}</li>
                <li class="hotel-address">
                    <i class="fas fa-map-marker-alt mr-2"></i>${
                        hotel.displayaddress
                    }
                </li>
                <li class="hotal-price">
                $ ${price}<sub> / per night</sub>

                </li>
                <li>`;
    if (!deletable)
        if (search_params != null) {
            //   html +=    `<a href="#" data-bs-toggle="modal" class="view-hotel-detail" data-id="${hotel.id}">View Details</a>`;
            html += `<a href="javascript:;"      class="edit-hotel-detail ml-2" data-params='${JSON.stringify(
                search_params
            )}'>Edit</a>`;
        }
    if (deletable) {
        html += `<a href="#" data-toggle="modal" class="delete_hotel ml-2 text-danger" data-params='${hotel.id}'>Remove</a>`;
    }
    html += `</li></ul>`;

    if (hotel.id === hotel.hotel_id) {
        html += `<div class="select___hotal">
                    <button type="button" class="mystyle-btn-3" data-hotel-id="${hotel.id}" id="hotel-select">Select</button></div>`;
    }
    html += `</div>
        </div>
    </div>
    </div>`;

    return html;
}

$(document).on("click", ".delete_hotel", function () {
    var hotelId = "deletable-" + $(this).attr("data-params");
    // $(".divLoading").show();
    $.LoadingOverlay("show");
    // delete hotel here via ajax
    $.ajax({
        type: "POST",
        url: $("#route_remove_hotel").val(),
        data: {
            hotel_id: $(this).attr("data-params"),
            flight_id: $("#flight_id").length ? $("#flight_id").val() : null,
        },
        dataType: "JSON",
        success: function (data) {
            // console.log(data);
            $("." + hotelId).remove();
            let totalBookings = parseInt(
                $("#booked-hotels-container").children().length
            );
            // totalBookings--;
            if (totalBookings > 0) {
                $("#count-of-hotel").html(totalBookings + " Hotel(s) Booked");
            } else {
                $("#hotel-count").hide();
                if ($("#flight_id").length && $("#flight_id").val() !== "") {
                    $("#hotel-checkout").attr(
                        "href",
                        $("#checkout_flight_url").val()
                    );
                } else if (
                    $("#booked_id").length &&
                    $("#booked_id").val() !== ""
                ) {
                    $("#hotel-checkout").attr(
                        "href",
                        $("#hotel_current_url").val()
                    );
                }
            }
            $("#booking_count").val(totalBookings);
            if ($.trim($("#booked-hotels-container").text()) == "") {
                $("#label-booked-hotels")
                    .removeClass("d-block")
                    .addClass("d-none");
            }
            // $(".divLoading").hide();
            $.LoadingOverlay("hide");
        },
    });
});

$(document).on("click", ".view_summary", function (e) {
    e.preventDefault();
    let id = $(this).attr("data-id");
    let hotel = JSON.parse($("#" + id).val());
    showModal(hotel, true);
});

$(document).on("click", ".edit-hotel-detail", function () {
    let search_params = JSON.parse($(this).attr("data-params"));

    $("#destination").val(search_params.destination_city);
    $("#checkin_date")
        .val(search_params.checkin_date)
        .daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            showDropdowns: true,
            minDate: moment(search_params.checkin_date, "DD/MM/YYYY"),
            locale: {
                format: "DD/MM/YYYY",
            },
        });
    $("#checkout_date")
        .val(search_params.checkout_date)
        .daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: true,
            minDate: moment(search_params.checkin_date, "DD/MM/YYYY"),
            locale: {
                format: "DD/MM/YYYY",
            },
            // minDate: moment($('#checkout_date').val(), 'mm/dd/yyyy'),
        });
});




function suggestCities() {
    var el = $(".destination");
    let offset = el.offset();
    let w = el.width();
    let l = offset.left;
    let t = offset.top + el.outerHeight();
    let cont = el.closest("div").find(".pac-container");

    el.on("keyup", function (e) {
        $this = $(this);
        var arr_cities = [];
        if (e.which === 40 || e.which === 38) {
            return;
        }
        $.get(
            $("#cities_url").val(),
            "term=" + $this.val(),
            function (arr_cities) {
                cont.html("");
                cont.attr(
                    "style",
                    `position:absolute; display:block; width:${w}px; left: ${l}px; top:${t}px`
                );
                var item = "";
                $.map(arr_cities, function (arr_values, code) {
                    $.map(arr_values, function (value, index) {
                        item += `<div class="pac-item">
                                <span class="pac-icon pac-icon-marker"></span>
                                <span class="pac-item-query">
                                    <span class="pac-matched">${value}</span>
                                </span>
                            </div>`;
                    });
                });
                // console.log(item)
                $this.closest("div").find(".pac-container").append(item);
            }
        );
    });

    $(document).on(
        "click",
        ".pac-item,pac-item-query,pac-matched",
        function (e) {
            $(this)
                .closest(".hotel_New")
                .find(".destination")
                .val($.trim($(e.target).text()));
            $(this).closest(".hotel_New").find(".pac-container").hide();
        }
    );
    $(document).on("click", "body", function (evt) {
        //console.log(evt.target.className);

        if (
            evt.target.className != "pac-matched" &&
            evt.target.className != "pac-item" &&
            evt.target.className != "pac-item-query"
        ) {
            $(this).closest(".hotel_New").find(".pac-container").hide();
        }
    });
}

function templateTravellers(count) {
    count = count + 1;
    let radioId1 = randomIntFromInterval(1000, 2000);
    let radioId2 = randomIntFromInterval(3000, 4000);

    return (
        `<div class="row no-gutters">
<div class="col-md-12">
        <div class="form-group">
        <input type="radio" name="salutation` +
        count +
        `" value="Mr" id="` +
        radioId1 +
        `"
class="form-radio salutation" checked>
    <label for="` +
        radioId1 +
        `">Mr</label>
        <input type="radio" name="salutation` +
        count +
        `" value="Ms" class="form-radio salutation"
    id="` +
        radioId2 +
        `">
        <label for="` +
        radioId2 +
        `">Ms</label>
        </div>
        </div>
        <div class="col-sm-12 col-md-ho4 pr-2">
        <div class="form-group">
        <div class="input-group">
        <input name="first_name[]" type="text" class="form-control"
    placeholder="Full Name" required>
    </div>
    </div>
    </div>

</div>`
    );
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function showAlertForHotelError(title, text) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success ml-2",
            // cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
    });

    swalWithBootstrapButtons
        .fire({
            title: title,
            text: text,
            type: "error",
            showCancelButton: false,
            confirmButtonText: "Ok",
            // cancelButtonText: 'Checkout!',
            // cancelButtonColor: "#6059f6",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            }
        });
}

var trips;
var averagelat;
var averagelon;
let airportDetails;
let allDestinationAirports;
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

$(document).ready(function () {
    $(".select2-departure").niceSelect("destroy");
    $(".select2-destination").niceSelect("destroy");
    if (
        $("#can_make_revision_request").length &&
        $("#can_make_revision_request").val() == true
    ) {
        $(".select2-departure, .select2-destination").select2();
        $(".select2-selection__rendered").find("span").remove();
    } else {
        addSelect2(".select2-departure");
        addSelect2(".select2-destination");
    }
    $("#avoid_countries").select2({
        minimumResultsForSearch: -1,
        placeholder: function () {
            $(this).data("placeholder");
        },
    });
    $(document).on("click", ".rm-city", function () {
        $(this).parent().remove();
    });
     if ($("#flight-departure-date").length>0) {


        $("#flight-departure-date").daterangepicker(
            {
                singleDatePicker: true,

                autoApply: true,
                minDate: new Date(),
                locale: {
                    format: "DD/MM/YYYY",
                },
            },
        );
        $("#flight-return-date").daterangepicker({
            singleDatePicker: true,
            minDate:  moment( $("#flight-departure-date").val()??new Date(), "DD/MM/YYYY").add(1, "d"),
            autoApply: true,
            locale: {
                format: "DD/MM/YYYY",
            },
        });
        var picker = $("#flight-departure-date").daterangepicker({
            minDate: new Date(),
            autoApply: true,
            linkedCalendars: false,
            autoUpdateInput: false,
        });
        picker.on("apply.daterangepicker", function (ev, picker) {

            $(this).val(picker.startDate.format("DD/MM/YYYY"));

            $("#flight-return-date").daterangepicker({
                singleDatePicker: true,
                autoApply: true,
                minDate: moment( picker.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY").add(1, "d"),
                locale: {
                    format: "DD/MM/YYYY",
                },
            }).on("apply.daterangepicker", function (ev, pickers){
                $('#flight-departure-date').data('daterangepicker').setEndDate(moment( pickers.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY"));
            });
            $("#flight-return-date")
                .data("daterangepicker")
                .setStartDate(picker.endDate.format("DD/MM/YYYY"));
        });

        // $(".drp-calendar.right").hide();
        // $(".drp-calendar.left").addClass("single");
        // $(".calendar.table").on("DOMSubtreeModified", function () {
        //     var el = $(".prev.available").parent().children().last();
        //     if (el.hasClass("next available")) {
        //         return;
        //     }
        //     el.addClass("next available");
        //     el.append("<span></span>");
        // });


///end
//update date

$(".multiCityRecords .des-date:last").daterangepicker({
    singleDatePicker: true,
    autoApply: true,
     locale: {
        format: "DD/MM/YYYY",
    },function(start,enddate,lavel){
        $date = enddate;

        $dates = $(this).closest(".add-cities").next().find(".departDate1");
        startdate = moment($date).add(1, "days").format("DD/MM/YYYY");

        $($dates).daterangepicker({
            singleDatePicker: true,
            autoApply: true,

            minDate: startdate,
            locale: {
                format: "DD/MM/YYYY",
            },
        });
    }
})
//end dates

    } else {
        $("#flight-departure-date").daterangepicker(
            {
                //showDropdowns: true,
                autoApply: true,
                singleDatePicker: true,
                minDate: new Date(),
                locale: {
                    format: "DD/MM/YYYY",
                },
            },
            function (start, end, label) {
                $(document)
                    .find(".departDate1")
                    .eq(0)
                    .daterangepicker({
                        alwaysShowCalendars: true,
                        showCustomRangeLabel: true,
                        minDate: moment(end, "DD/MM/YYYY").add(1, "d"),
                        singleDatePicker: true,
                        // showDropdowns: true,
                        autoUpdateInput: true,
                        autoApply: true,
                        locale: {
                            format: "DD/MM/YYYY",
                        },
                    });
            }
        );

        $(".departDate1")
            .daterangepicker({
                singleDatePicker: true,
                autoApply: true,
                //  showDropdowns: true,
                // minDate: mindate,
                locale: {
                    format: "DD/MM/YYYY",
                },
            })
            .on("change", function () {
                $date = $(this).val();

                $dates = $(this)
                    .closest(".add-cities")
                    .nextAll()
                    .find(".departDate1");

                $($dates).daterangepicker({
                    alwaysShowCalendars: true,
                    showCustomRangeLabel: true,
                    minDate: moment($date, "DD/MM/YYYY").add(1, "d"),
                    singleDatePicker: true,
                    // showDropdowns: true,
                    autoUpdateInput: true,
                    autoApply: true,
                    locale: {
                        cancelLabel: "Clear",
                        format: "DD/MM/YYYY",
                    },
                });
            });
    }
    if (
        (getUrlParameter("origin_city") != undefined &&
            getUrlParameter("destination_city") != undefined) ||
        (getUrlParameter("booked_type") != undefined &&
            getUrlParameter("booked_type") == "1")
    ) {
        if (
            $("#can_make_revision_request").length &&
            $("#can_make_revision_request").val() == true
        ) {
            // $("#flight-search-btn").click();
        } else {
            $("#flight-search-btn").click();
        }
    }
    setMap(31.521559999999997, 74.40359000000001);
    var new_date = $("#flight-departure-date").data("daterangepicker").endDate;

    var dates = new Date(new_date);
    dates.setDate(dates.getDate() + 1);

    $("#flight-return-date").daterangepicker({
        singleDatePicker: true,
        minDate: dates,
        autoApply: true,
        locale: {
            format: "DD/MM/YYYY",
        },
    }).on("apply.daterangepicker", function (ev, pickers){
        $('#flight-departure-date').data('daterangepicker').setEndDate(moment( pickers.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY"));
    });
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split("&"),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split("=");

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined
                ? true
                : decodeURIComponent(sParameterName[1]);
        }
    }
};

function addSelect2(element) {
    $(element).select2({
        width: "100%",
        placeholder: "Enter City Name",
        allowClear: true,
        minimumInputLength: 3,
        delay: 300,
        language: {
            searching: function () {
                return "Loading...";
            },
        },
        ajax: {
            delay: 250,
            url: $("#airportlistdata").val(),
            dataType: "json",
            type: "GET",
            data: function (params) {
                let queryParameters = {
                    term: params.term,
                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text:
                                item.airport +
                                ", " +
                                item.iata +
                                " (" +
                                item.city +
                                ", " +
                                item.country +
                                " )",
                            id: item.iata,
                        };
                    }),
                };
            },
        },
    });
}

$("#exchange-fields").on("click", function (e) {
    var v1 = $("#departure-city").children("option:selected").val();
    var t1 = $("#departure-city").children("option:selected").text();
    var v2 = $("#destination-city").children("option:selected").val();
    var t2 = $("#destination-city").children("option:selected").text();
    $("#destination-city").append(
        '<option value="' + v1 + '" selected="selected">' + t1 + "</option>"
    );
    $("#departure-city").append(
        '<option value="' + v2 + '" selected="selected">' + t2 + "</option>"
    );
});
$("#flight-search").on("submit", function (e) {
    var searchFlightReq = null;
    var searchFLightReqInterval = null;
    e.preventDefault();
    trips = null;
    airportDetails = null;
    averagelat = null;
    averagelon = null;
    allDestinationAirports = null;
    var submitButton = $("#flight-search-btn");
    $("#route-tags").show();
    $("#no-result-errors").html("");
    customValidation();
    submitButton.prop("disabled", true);
    //
    form = $(this);
    data = form.serialize();
    data += "&flight_type=" + $("#flight_type").val();
    data +=
        "&origin_city_text=" +
        $("#departure-city").children("option:selected").text() +
        "&destination_city_text=" +
        $("#destination-city").children("option:selected").text();
    let origins = $(".origin1");
    let destinations = $(".destination1");
    let departureDates = $(".departDate1");
    for (let i = 0; i < origins.length; i++) {
        data +=
            "&additional_origin_texts" +
            i +
            "=" +
            $(origins[i]).children("option:selected").text();
        data +=
            "&additional_destination_texts" +
            i +
            "=" +
            $(destinations[i]).children("option:selected").text();
        data +=
            "&additional_departure_dates" +
            i +
            "=" +
            $(departureDates[i]).val();
    }
    $("#request_params").val(data);
    // console.log(decodeURIComponent(data));

    $homepage = form.find("#home_page").val();
$flightsearch= $("#flightsearchurl").val()
    if ($homepage === "home" || $homepage === "article.detail") {
        //new code on flight auto save
        $multiple = $("#flight_type").val();
        //if ($multiple != "multicity") {
            let tripSetData = $("#flight-select-data").val();
            let roundTripSetData = $("#roundTripData").val();
            customValidation();

            submitButton.prop("disabled", false);
            submitAutoSaveFlightData(tripSetData, roundTripSetData, 1);
        // } else {
        //     $.LoadingOverlay("show");
        //     window.location.replace($flightsearch+"?" + data) ;
        // }


        return false;
        //end
    }

    if (window.location.pathname === "/") {
        window.location.replace($flightsearch+"?" + data) ;
        // window.location.href = "flight?" + data;
    }
    url = form.attr("action");
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
    });
    searchFlightReq = $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "JSON",
        beforeSend: function () {
            searchFLightReqInterval = setTimeout(function () {
                if (searchFlightReq != null) {
                    searchFlightReq.abort();
                }
            }, 150000);
            $.LoadingOverlay("show");
            //    document.getElementById("result-set-display").scrollIntoView();
        },
        success: function (data) {
            clearTimeout(searchFLightReqInterval);
            document.getElementById("result-set-display").style.display = "";
            if (data.error === true) {
                submitButton.prop("disabled", false);
                // filghtError(data.message);
                $.LoadingOverlay("hide");
                showAlertForFlightError("Flight Error", data.message);
                setMap(31.521559999999997, 74.40359000000001);
                return;
            }
            if (data.tripSet.length === 0) {
                submitButton.prop("disabled", false);
                // noFlightFound();
                $.LoadingOverlay("hide");
                showAlertForFlightError("Flight Not Found", data.message);
                setMap(31.521559999999997, 74.40359000000001);
                return;
            }
            resetElements();
            trips = data.tripSet;
            airportDetails = data.airportDetails;
            resultSetHeadings();
            var calculateAverageLat = 0;
            var calculateAverageLong = 0;
            for (const key of Object.keys(airportDetails)) {
                if (
                    key === $(".select2-departure").val() ||
                    key === $(".select2-destination:last").val()
                ) {
                    calculateAverageLat += airportDetails[key].latitude;
                    calculateAverageLong += airportDetails[key].longitude;
                }
            }
            averagelat = calculateAverageLat / 2;
            averagelon = calculateAverageLong / 2;
            setMap(averagelat, averagelon);
            var obj = listFlights(data);
            // console.log(obj)
            fillAirlinesDropdown(obj.setAirline, data.airlines);
            fillAirlinesStopsDropdown(obj.setAirlineStops);
            $(
                "#flightDirectRoutes, #flightMoreResults, #flight-airline-listt"
            ).show();
            submitButton.prop("disabled", false);
            $.LoadingOverlay("hide");
            $(".asside-wrapper").animate(
                { scrollTop: $(".asside-wrapper").height() },
                1800
            );
            window.scrollTo(0, 100);
            $(".asside-left").animate(
                { scrollTop: $("#flightDirectRoutes").offset().top - 120 },
                1500
            );
            //  document.getElementById(".asside-wrapper").scrollIntoView();
            $.LoadingOverlay("hide");
        },
        error: function (data) {
            $.LoadingOverlay("hide");
            clearTimeout(searchFLightReqInterval);
            submitButton.prop("disabled", false);
            if (searchFlightReq != null) {
                showAlertForFlightError(
                    "Flight Not Found",
                    "There is no flight for this complete trip. Please change dates & search again."
                );
                return;
            }
            $("#validation-errors").html("");
            var errors = data.responseJSON;
            $.each(errors.error, function (key, value) {
                $("#validation-errors").append(
                    '<div class="alert alert-danger">' + errors.error + "</div>"
                );
            });
        },
    });
});

///auto save
function submitAutoSaveFlightData(tripSetData, roundTripSetData, Index) {
    $.LoadingOverlay("show");
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var data = {
        booked_id: $("#booked_id").val(),
        booked_type: $("#booked_type").val(),
        hotel_id: $("#hotel_id").val(),
        round_trip_set_data: roundTripSetData,
        tripSetData: tripSetData,
        selectedIndex: Index,
        request_params: $("#request_params").val(),
    };

    $.ajax({
        type: "POST",
        url:  $("#autosave_flight").val(),
        data: data,
        dataType: "JSON",
        success: function (data) {
            if (data.error == true) {
                Swal.fire({
                    title: "There is no flight",
                    text: data.message,
                    type: "error",
                    showCancelButton: false,
                });
                $.LoadingOverlay("hide");
                return false;
            }
            window.location.replace(data.route);
        },
        error: function (request, status, error) {
            json = $.parseJSON(request.responseText);
            $.each(json.errors, function (key, value) {});
            $.LoadingOverlay("hide");
        },
    });
}

//end data
function fillAirlinesDropdown(setAirline, airlines) {
    // console.log(setAirline, airlines);
    // console.log(setAirline.values())
    $("#flight-airlines").append(
        $("<option></option>").attr("value", "all").text("All Airlines")
    );
    $.each(airlines, function (key, value) {
        for (
            var it = setAirline.values(), val = null;
            (val = it.next().value);

        ) {
            // console.log($.trim(value.toLowerCase()))
            // console.log($.trim(val.toLowerCase()))
            if ($.trim(value.toLowerCase()) === $.trim(val.toLowerCase())) {
                $("#flight-airlines").append(
                    $("<option></option>").attr("value", key).text(value)
                );
            }
        }
    });
}

function fillAirlinesStopsDropdown(setAirlineStops) {
    $("#flight-airlines-stopovers").append(
        $("<option></option>").attr("value", "all").text("Stopovers")
    );
    setAirlineStops.forEach((value, valueAgain, setAirlineStops) => {
        $("#flight-airlines-stopovers").append(
            $("<option></option>").attr("value", value).text(value)
        );
    });
}

function setMap(lat, lon) {
    var myLatlng = new google.maps.LatLng(lat, lon);
    var mapOptions = {
        zoom: 3,
        center: myLatlng,
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
}

function resetElements() {
    $("#flight-airlines").niceSelect("destroy");
    $("#flight-airlines").empty();
    $("#flight-airlines-stopovers").niceSelect("destroy");
    $("#flight-airlines-stopovers").empty();
    $("#flight-images").empty();
}

function noFlightFound() {
    $("#flight-images").empty();
    $("#flight-airline-listt").hide();
    $("#flight-airline-listt-stopOvers").hide();
    $("#route-tags").hide();
    document.getElementById("flightDirectRoutes").style.display = "none";
    document.getElementsByClassName("result-cities")[0].style.display = "none";
    document.getElementsByClassName("result-cities-code")[0].style.display =
        "none";
    $("#no-result-test").append(
        '<div class="alert alert-danger"> No Flight Record is Found</div>'
    );
    $("#flightTimeDuration").html("");
    $("#no-result-errors").html("");
    $("#no-result-errors").append(
        '<div class="alert alert-danger"> No Flight Record is Found</div>'
    );
    $.LoadingOverlay("hide");
}

function filghtError(message) {
    $("#flight-images").empty();
    $("#flight-airline-listt").hide();
    $("#flight-airline-listt-stopOvers").hide();
    $("#route-tags").hide();
    document.getElementById("flightDirectRoutes").style.display = "none";
    document.getElementsByClassName("result-cities")[0].style.display = "none";
    document.getElementsByClassName("result-cities-code")[0].style.display =
        "none";
    $("#flightTimeDuration").html("");
    $("#no-result-errors").html("");
    // for (let i = 0; i < data.message.length; i++) {
    // $('#no-result-test').append('<div class="alert alert-danger">' + data.message + '</div>');
    $("#no-result-errors").append(
        '<div class="alert alert-danger">' + message + "</div>"
    );
    // $('#no-result-errors').append('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
    // }
    $.LoadingOverlay("hide");
}

function listFlights(data) {
    var tripset = data.tripSet;
    var airportDetails = data.airportDetails;
    var originalDestination = tripset[0][0].original_destination;
    var setAirline = new Set();
    var setAirlineStops = new Set();
    var lines = [];
    var directFlightsCounter = 0;
    var lineSymbol = {
        path: "M22.1,15.1c0,0-1.4-1.3-3-3l0-1.9c0-0.2-0.2-0.4-0.4-0.4l-0.5,0c-0.2,0-0.4,0.2-0.4,0.4l0,0.7c-0.5-0.5-1.1-1.1-1.6-1.6l0-1.5c0-0.2-0.2-0.4-0.4-0.4l-0.4,0c-0.2,0-0.4,0.2-0.4,0.4l0,0.3c-1-0.9-1.8-1.7-2-1.9c-0.3-0.2-0.5-0.3-0.6-0.4l-0.3-3.8c0-0.2-0.3-0.9-1.1-0.9c-0.8,0-1.1,0.8-1.1,0.9L9.7,6.1C9.5,6.2,9.4,6.3,9.2,6.4c-0.3,0.2-1,0.9-2,1.9l0-0.3c0-0.2-0.2-0.4-0.4-0.4l-0.4,0C6.2,7.5,6,7.7,6,7.9l0,1.5c-0.5,0.5-1.1,1-1.6,1.6l0-0.7c0-0.2-0.2-0.4-0.4-0.4l-0.5,0c-0.2,0-0.4,0.2-0.4,0.4l0,1.9c-1.7,1.6-3,3-3,3c0,0.1,0,1.2,0,1.2s0.2,0.4,0.5,0.4s4.6-4.4,7.8-4.7c0.7,0,1.1-0.1,1.4,0l0.3,5.8l-2.5,2.2c0,0-0.2,1.1,0,1.1c0.2,0.1,0.6,0,0.7-0.2c0.1-0.2,0.6-0.2,1.4-0.4c0.2,0,0.4-0.1,0.5-0.2c0.1,0.2,0.2,0.4,0.7,0.4c0.5,0,0.6-0.2,0.7-0.4c0.1,0.1,0.3,0.1,0.5,0.2c0.8,0.2,1.3,0.2,1.4,0.4c0.1,0.2,0.6,0.3,0.7,0.2c0.2-0.1,0-1.1,0-1.1l-2.5-2.2l0.3-5.7c0.3-0.3,0.7-0.1,1.6-0.1c3.3,0.3,7.6,4.7,7.8,4.7c0.3,0,0.5-0.4,0.5-0.4S22,15.3,22.1,15.1z",
        fillColor: "rgb(70,74,88)",
        fillOpacity: 1.5,
        scale: 0.8,
        anchor: new google.maps.Point(11, 11),
        strokeWeight: 0,
    };
    let stops = [];
    let arr_lines = [];
    let consumed_airports = [];

    for (let i = 0; i < tripset.length; i++) {
        stops = [];
        let sourceFlight = tripset[i][0];
        let destinationFlight = ""; //tripset[i][tripset[i].length - 1 ];
        for (let j = tripset[i].length - 1; j >= 0; j--) {
            if (
                tripset[i][j].destinationCode ==
                tripset[i][j].original_destination
            ) {
                destinationFlight = tripset[i][j];
            }
        }

        for (let m = 0; m < tripset[i].length; m++) {
            let d_code = tripset[i][m].destinationCode;
            let d_city = tripset[i][m].destinationCity;
            // console.log(d_code, originalDestination);
            if (tripset[i][m].is_final_stop) break;
            stops.push(d_city);
        }
        // console.log(stops)
        let detail = getFlightDetailInfoSection(
            i,
            sourceFlight,
            destinationFlight,
            stops
        );
        $("#flight-images").append(detail);

        var color = "#6400e4"; //getRandomColor();
        var latlng = [];
        for (let j = 0; j < tripset[i].length; j++) {
            // for no. of flights
            // console.log(tripset[i])
            setAirline.add(tripset[i][j].airlineName);
            setAirlineStops.add(tripset[i][j].maxStops);
            // consumed_airports.push(tripset[i][j].destinationCode);
            // consumed_airports.push(tripset[i][j].originCode);
            if (
                $.inArray(tripset[i][j].destinationCode, consumed_airports) ==
                -1
            ) {
                consumed_airports.push(tripset[i][j].destinationCode);
            }
            if ($.inArray(tripset[i][j].originCode, consumed_airports) == -1) {
                consumed_airports.push(tripset[i][j].originCode);
            }

            lat_lng_coords = {
                o_lat: tripset[i][j].originLat,
                o_lng: tripset[i][j].originLong,
                d_lat: tripset[i][j].destinationLat,
                d_lng: tripset[i][j].destinationLong,
            };

            var originLatLng = new google.maps.LatLng(
                lat_lng_coords.o_lat,
                lat_lng_coords.o_lng
            );
            var destinationLatLng = new google.maps.LatLng(
                lat_lng_coords.d_lat,
                lat_lng_coords.d_lng
            );

            if (!animationExists(arr_lines, lat_lng_coords)) {
                arr_lines.push(lat_lng_coords);
                line = new google.maps.Polyline({
                    path: [originLatLng, destinationLatLng],
                    strokeOpacity: 0.8,
                    strokeWeight: 4,
                    strokeColor: color,
                    geodesic: true,
                    icons: [
                        {
                            icon: lineSymbol,
                            offset: "100%",
                            repeat: "170px",
                        },
                    ],
                });

                line.setMap(map);

                //add label to the route
                var myLabel = new Label();
                // lets add an event listener, if you click the line, i'll tell you the coordinates you clicked
                line.addListener("mouseover", function (e) {
                    labelMarker.setPosition(e.latLng);
                    myLabel.bindTo("position", labelMarker, "position");
                    myLabel.set("text", tripset[i][j].airlineName);
                    myLabel.setMap(map);
                });

                lines.push(line);
                animate(lines);
            }

            latlng.push(originLatLng, destinationLatLng);
        }

        var latlngbounds = new google.maps.LatLngBounds();
        for (var k = 0; k < latlng.length; k++) {
            latlngbounds.extend(latlng[k]);
        }

        map.fitBounds(latlngbounds);

        if (sourceFlight.maxStops === 0) {
            directFlightsCounter++;
        }
        flightTimeDuration = tripset[0][0].duration;
    }

    for (const key of Object.keys(airportDetails)) {
        if (consumed_airports.includes(key)) {
            let icons = "assets/img/icons8-circled-o-30.png";
            if (key === $(".select2-departure").val()) {
                icons = "assets/img/icons8-airplane-take-off-30 (1).png";
            }
            if (key === $(".select2-destination:last").val()) {
                icons = "assets/img/icons8-airplane-landing-30 (1).png";
            }
            var myMarker = new google.maps.Marker({
                position: new google.maps.LatLng(
                    airportDetails[key].latitude,
                    airportDetails[key].longitude
                ),
                map: map,
                icon: icons,
                title: data.airportDetails[key].name,
            });
            // create an invisible marker
            labelMarker = new google.maps.Marker({
                position: new google.maps.LatLng(
                    airportDetails[key].latitude,
                    airportDetails[key].longitude
                ),
                map: map,
                visible: false,
            });
        }
    }

    $("#directFlights").html(directFlightsCounter + " direct routes found");
    // let duration = data.tripSet[0][0].duration;
    // var hours = Math.floor(duration / 60);
    // var minutes = duration % 60;
    // var durationInHours = hours + ":" + minutes + " Hrs";
    // $('#flightTimeDuration').html(durationInHours);
    return { setAirline: setAirline, setAirlineStops: setAirlineStops };
}

function animationExists(lines, coords) {
    for (let i = 0; i < lines.length; i++) {
        if (
            lines[i].o_lat == coords.o_lat &&
            lines[i].d_lat == coords.d_lat &&
            lines[i].o_lng == coords.o_lng &&
            lines[i].d_lng == coords.d_lng
        ) {
            return true;
        }
    }
    return false;
}

// Define the overlay, derived from google.maps.OverlayView
function Label(opt_options) {
    // Initialization
    this.setValues(opt_options);

    // Label specific
    var span = (this.span_ = document.createElement("span"));
    span.style.cssText =
        "position: relative; left: -50%; top: -8px; " +
        "white-space: nowrap; border: 1px solid blue; " +
        "padding: 2px; background-color: white";

    var div = (this.div_ = document.createElement("div"));
    div.appendChild(span);
    div.style.cssText = "position: absolute; display: none";
}

Label.prototype = new google.maps.OverlayView();

// Implement onAdd
Label.prototype.onAdd = function () {
    var pane = this.getPanes().floatPane;
    pane.appendChild(this.div_);

    // Ensures the label is redrawn if the text or position is changed.
    var me = this;
    this.listeners_ = [
        google.maps.event.addListener(this, "position_changed", function () {
            me.draw();
        }),
        google.maps.event.addListener(this, "text_changed", function () {
            me.draw();
        }),
    ];
};

// Implement onRemove
Label.prototype.onRemove = function () {
    var i, I;
    this.div_.parentNode.removeChild(this.div_);

    // Label is removed from the map, stop updating its position/text.
    for (i = 0, I = this.listeners_.length; i < I; ++i) {
        google.maps.event.removeListener(this.listeners_[i]);
    }
};

// Implement draw
Label.prototype.draw = function () {
    var projection = this.getProjection();
    var position = projection.fromLatLngToDivPixel(this.get("position"));

    var div = this.div_;
    div.style.left = position.x + "px";
    div.style.top = position.y + "px";
    div.style.display = "block";

    this.span_.innerHTML = this.get("text").toString();
};

//
function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function multiCity(input) {
    $("#flight-return-date").closest(".col").hide();
    var name = document.getElementById("primary-search");
    if (name.className == "col-md-6") {
        document.getElementById("flight-return-date").style.display = "none";
        $("#primary-search").addClass("col-md-6");
    }
    document.getElementById("multiCityActionLink").style.display = "";
    document.getElementById("multiCityRecords").style.display = "";
    document.getElementById("addcity").style.display = "block";
    $("#flight-departure-date").daterangepicker(
        {
            singleDatePicker: true,
            autoApply: true,
            //  showDropdowns: true,
            minDate: new Date(),
            locale: {
                format: "DD/MM/YYYY",
            },
        },
        function (start, end, label) {
            $(document)
                .find(".departDate1")
                .daterangepicker({
                    alwaysShowCalendars: true,
                    showCustomRangeLabel: true,
                    minDate: moment(end, "DD/MM/YYYY").add(1, "d"),
                    singleDatePicker: true,
                    // showDropdowns: true,
                    autoUpdateInput: true,
                    autoApply: true,
                    locale: {
                        format: "DD/MM/YYYY",
                    },
                });
        }
    );
    $("#flight_type").val("multicity");
}

function oneWay(input) {
    $("#addcity").hide();
    $("#flight-return-date").closest(".col").hide();
    // $('#primary-search').removeClass('col-md-6').addClass('col-md-6');
    // document.getElementById('flight-return-date').style.display = "none";
    document.getElementById("multiCityActionLink").style.display = "none";
    document.getElementById("multiCityRecords").style.display = "none";
    $("#flight-departure-date").daterangepicker({
        singleDatePicker: true,
        autoApply: true,
        // showDropdowns: true,
        minDate: new Date(),
        locale: {
            format: "DD/MM/YYYY",
        },
    });
    $("#flight_type").val("oneway");
}

function roundWay(input) {
    $("#addcity").hide();
    document.getElementById("multiCityActionLink").style.display = "none";
    document.getElementById("multiCityRecords").style.display = "none";

    $("#flight-return-date").closest(".col").show();


    var date3 = new Date(
        $("#flight-departure-date").data("daterangepicker").endDate
    );
    date3.setDate(date3.getDate() + 1);
    $("#flight-return-date").data("daterangepicker").setStartDate(date3);

    var picker = $("#flight-departure-date").daterangepicker({
        minDate: new Date(),
        autoApply: true,
        linkedCalendars: false,
        autoUpdateInput: false,
    });
    picker.on("apply.daterangepicker", function (ev, picker) {

        $(this).val(picker.startDate.format("DD/MM/YYYY"));

        $("#flight-return-date").daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            minDate: moment( picker.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY").add(1, "d"),
            locale: {
                format: "DD/MM/YYYY",
            },
        }).on("apply.daterangepicker", function (ev, pickers){
            $('#flight-departure-date').data('daterangepicker').setEndDate(moment( pickers.startDate.format("DD/MM/YYYY"), "DD/MM/YYYY"));
        });
        $("#flight-return-date")
            .data("daterangepicker")
            .setStartDate(picker.endDate.format("DD/MM/YYYY"));
    });

    // $(".drp-calendar.right").hide();
    // $(".drp-calendar.left").addClass("single");
    // $(".calendar.table").on("DOMSubtreeModified", function () {
    //     var el = $(".prev.available").parent().children().last();
    //     if (el.hasClass("next available")) {
    //         return;
    //     }
    //     el.addClass("next available");
    //     el.append("<span></span>");
    // });
    // var date1 = new Date();
    // date1.setDate(date1.getDate() + 1);

    // $("#flight-departure-date").daterangepicker(
    //     {
    //         singleDatePicker: true,
    //         minDate: date1,
    //         autoApply: true,
    //         locale: {
    //             format: "DD/MM/YYYY",
    //         },
    //     },
    //     function (start, end, label) {
    //         $("#flight-departure-date").val(start.format("DD-MM-YYYY"));
    //         // $("#flight-return-date").val(end.format("DD-MM-YYYY"));

    //         var date = new Date(end);

    //         // add a day
    //         date.setDate(date.getDate() + 1);

    //         $("#flight-return-date").daterangepicker({
    //             singleDatePicker: true,
    //             minDate: date,

    //             autoApply: true,
    //             locale: {
    //                 format: "DD/MM/YYYY",
    //             },
    //         });
    //     }
    // );
    // var date3 = new Date(
    //     $("#flight-departure-date").data("daterangepicker").endDate
    // );
    // date3.setDate(date3.getDate() + 1);
    // $("#flight-return-date").data("daterangepicker").setStartDate(date3);



    $("#flight_type").val("roundway");
}

function addmore() {
    if ($(".select2-destination").length > 5) {
        document.getElementById("validation-errors").innerHTML = "";
        document.getElementById("validation-errors").style.display = "";
        $("#validation-errors").append(
            '<div class="alert alert-danger"> Max 6 trips are allowed</div>'
        );
        $("#addMore").off("click");
        return;
    }
    let arrayVal = [];
    let arrayTxt = [];
    $(".select2-destination option:selected").each(function () {
        arrayVal.push($(this).val());
        arrayTxt.push($(this).text());
    });
    let lastVal = arrayVal[arrayVal.length - 1];
    let lastTxt = arrayTxt[arrayTxt.length - 1];
    let dateArr = [];
    $(".des-date").each(function () {
        dateArr.push($(this).val());
    });
    let dateVal = dateArr[dateArr.length - 1];
    var datearray = dateVal.split("/");
    var newdate = datearray[1] + "/" + datearray[0] + "/" + datearray[2];

    var html = `<div class='row add-cities'>
                    <div class="col-md-8 add-cities-field">
                        <div class="form-group" >
                            <select name="additional_origins[]" class="select2-departure origin1 form-control">
                                <option value='' disabled="" selected=""> Enter City Name </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 add-cities-field" id="primary-search">
                        <div class="form-group" >
                            <div class="input-group">
                                <input placeholder="Departure Date" id="flight-departure-date" class="form-control departDate1 des-date" type="text" name="additional_departure_dates[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 add-cities-field" >
                        <div class="form-group" >
                            <select name="additional_destinations[]" class="select2-destination destination1 form-control">
                                <option value="disabled" disabled="" selected="">Enter Destination
                                    City
                                </option>
                            </select>
                        </div>
                    </div>
                    <a href='javascript:void(0)' class='rm-city' style='color: red; margin-left: 20px;'>- Remove the entry</a>
                    <div class='clearfix'></div>
                </div>`;
    $("#order").append(html);
    $(".select2-departure").niceSelect("destroy");
    addSelect2(".select2-departure");
    $(".select2-departure").niceSelect("destroy");
    addSelect2(".select2-destination");
    $(".select2-departure:last").append(
        '<option value="' +
            lastVal +
            '" selected="selected">' +
            lastTxt +
            "</option>"
    );
    let tomorrow = new Date(newdate);
    tomorrow.setDate(tomorrow.getDate() + 1);
    $(".des-date:last")
        .daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            // showDropdowns: true,
            minDate: new Date(tomorrow),
            locale: {
                format: "DD/MM/YYYY",
            },
        })
        .on("change", function () {
            //hemant mandeliya
            $date = $(this).val();

            $dates = $(this).closest(".add-cities").next().find(".departDate1");

            let dateVal = $date;
            var datearray = dateVal.split("/");
            var newdate =
                datearray[1] + "/" + datearray[0] + "/" + datearray[2];

            let tomorrow = new Date(newdate);
            startdate = moment(tomorrow).add(1, "days").format("DD/MM/YYYY");

            $($dates).daterangepicker({
                singleDatePicker: true,
                autoApply: true,
                //  showDropdowns: true,
                minDate: startdate,
                locale: {
                    format: "DD/MM/YYYY",
                },
            });
        });
}

function getDetailsTraveller(input) {
    var numberTraveller = input.value;
    if (numberTraveller > 1) {
        let html = "";
        for (let c = 1; c < numberTraveller; c++) {
            html += `<div class="extra_travellers">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">Full Name</label>
                        <div class="input-wrapper-ico">
                            <i class="far fa-user"></i>
                            <input type="text" name="additional_first_name[]" class="form-control" required>
                        </div>
                    </div>

                </div>`;
        }
        $(document).find(".general-form  .extra_travellers").remove();
        $(html).insertAfter(".travellers_row");
    } else {
        $(document).find(".general-form  .extra_travellers").remove();
    }
}

$("#flightdetail").on("hidden.bs.modal", function (e) {
    var ul = document.getElementById("flight-modal-list");
    ul.innerHTML = "";
    $(this).removeAttr().removeData();
});

function tripSet(element) {
    let index = $(element).attr("data-trip");
    let trip = trips[index];
    let departureDateString = $(element).find("span.deprtureDate").html();
    $("#tripSetData").val(JSON.stringify(trip));
    $("#flight-select-data").val(JSON.stringify(trip));
    let modal = $("#fligh_detail");
    // let stops = flight[0]['maxStops'];
    let duration = trip[0]["duration"];
    var hours = Math.floor(duration / 60);
    var minutes = duration % 60;
    var duration1 = hours + ":" + minutes + " Hrs";
    let flightType = $("#flight_type").val();
    // modal.find("#flight-modal-stops").html(stops);
    // modal.find("#flight-modal-duration").html(duration1);
    // let counter = 1;
    let sourceCode1 = trip[0].originCode;
    let sourceCity1 = trip[0].originCity;
    let destinationCode1 = trip[trip.length - 1].destinationCode;
    let destinationCity1 = trip[trip.length - 1].destinationCity;
    let destinationString =
        sourceCity1 +
        " (" +
        sourceCode1 +
        ") to " +
        destinationCity1 +
        " (" +
        destinationCode1 +
        ")";
    let tripMiddle = trip.length / 2;
    let returnHtml = "";
    if (flightType === "roundway") {
        destinationString =
            trip[0].original_source_city +
            " (" +
            trip[0].original_source +
            ") to " +
            trip[0].original_destination_city +
            " (" +
            trip[0].original_destination +
            ")";
        let returnRoundTrip =
            trip[0].original_destination_city +
            " (" +
            trip[0].original_destination +
            ") to " +
            trip[0].original_source_city +
            " (" +
            trip[0].original_source +
            ")";
        let returnDepartureDateTime = moment(trip[tripMiddle].leaveTimeAirport);
        let returnDepartureDate =
            returnDepartureDateTime.format("dddd, DD MMM YYYY");
        returnHtml +=
            "<p style='color: black; font-family: Karla-bold;     width: 65%;\n" +
            "    display: block;\n" +
            "    margin: 20px auto;'>" +
            "<span style='font-family: Karla-regular; display: block'>" +
            returnDepartureDate +
            "</span>" +
            returnRoundTrip +
            "</p>";
    }
    let detail = "";
    for (let i = 0; i < trip.length; i++) {
        let flight = trip[i];
        // console.log(flight);
        // let arrivalDateTime = new Date(flight[i]['arrivalTimeUTC']);
        // let departureDateTime = new Date(flight[i]['leaveTimeAirport']);
        let departureDateTime = moment(flight.leaveTimeAirport);
        let arrivalDateTime = moment(flight.arrivalTimeUTC);
        // let deprtureDate = departureDateTime.format('dddd, DD MMM YYYY');
        let departureTime = departureDateTime.format("HH:mm");
        let arrivalTime = arrivalDateTime.format("HH:mm");
        let durationString = flight.tripDuration;
        let sourceCode = flight.originCode;
        // let sourceCity = flight.originCity;
        let destinationCode = flight.destinationCode;
        // let destinationCity = flight.destinationCity;
        let flightNumber = flight.airlineCode + flight.flightNumber;
        let logo = flight.airlineLogo;
        // let hours = Math.floor(duration / 60);
        // let minutes = duration % 60;
        // let durationString = hours + " hrs " + minutes + " mins";
        if (flightType === "roundway" && tripMiddle === i) {
            detail += returnHtml;
        }
        detail += `<li><a href="JavaScript:Void(0)"><div class='row'>`;
        detail += getFlightNumberInfoSection(logo, flightNumber);
        detail += getFlightPlaceTimeInfoSection(sourceCode, departureTime);
        detail += getFlightDurationInfoSection(
            durationString,
            $("#connect_icon").val()
        );
        detail += getFlightPlaceTimeInfoSection(destinationCode, arrivalTime);
        detail += `</div></a></li>`;
    }
    modal
        .find(".search-result")
        .html(
            "<p style='color: black; font-family: Karla-bold;     width: 65%;\n" +
                "    display: block;\n" +
                "    margin: 20px auto;'>" +
                "<span style='font-family: Karla-regular; display: block'>" +
                departureDateString +
                "</span>" +
                destinationString +
                "</p><ul>" +
                detail +
                "</ul>"
        );
    modal.modal("show");
}

$("#flight-select").on("click", function (e) {
    e.preventDefault();
    let tripSetData = $("#flight-select-data").val();
    let roundTripSetData = $("#roundTripData").val();
    customValidation();
    submitFlightData(tripSetData, roundTripSetData, 1);
});

function getFlightDetailInfoSection(index, sourceFlight, lastFlight, stops) {
    let departureDateTime = moment(sourceFlight.leaveTimeAirport);
    let arrivalDateTime = moment(lastFlight.arrivalTimeUTC);
    let deprtureDate = departureDateTime.format("dddd, DD MMM YYYY");
    let departureTime = departureDateTime.format("HH:mm");
    let arrivalTime = arrivalDateTime.format("HH:mm");
    let durationString = sourceFlight.duration;
    let sourceCode = sourceFlight.originCode;
    let sourceCity = sourceFlight.originCity;
    let destinationCode = lastFlight.destinationCode;
    let destinationCity = lastFlight.destinationCity;
    let flightNumber = sourceFlight.airlineCode + sourceFlight.flightNumber;
    let logo = sourceFlight.airlineLogo;
    // var hours = Math.floor(duration / 60);
    // var minutes = duration % 60;
    // var durationString = hours + " hrs " + minutes + " mins";
    var total_stops = sourceFlight.maxStops;
    var className = "";
    if (total_stops === 0) {
        className = "direct-flight-bg-color";
    }
    var detail = `<li class='${className}'>
                <a data-toggle='modal' href='#' data-trip='${index}' onclick='tripSet(this)'>
                    <div class='result-head'>
                        <p>
                            <span class='deprtureDate'>${deprtureDate}</span>${sourceCity} (${sourceCode}) to ${destinationCity} (${destinationCode})
                        </p>
                        <button class="mystyle-btn" data-trip='${index}' onclick="selectFlight(this)">Select</button>
                    </div>
                    <div class='row get__div'>`;
    detail += getFlightNumberInfoSection(logo, flightNumber);
    detail += getFlightPlaceTimeInfoSection(sourceCode, departureTime);
    detail += getFlightDurationInfoSection(
        durationString,
        $("#connect_icon").val(),
        stops
    );
    detail += getFlightPlaceTimeInfoSection(destinationCode, arrivalTime);
    // detail += `</div><div class="text-center select__btn_handle"><button class="mystyle-btn-2">Select</button></div></a></li>`;
    return detail;
}

function getFlightPlaceTimeInfoSection(place, time) {
    return `<div class='col-2 mb-4 padding-flights'>
                <div class='flight-from'>
                    <p><span>${place}</span>${time}</p>
                </div>
            </div>`;
}

function getFlightNumberInfoSection(logo, flightNumber) {
    return `<div class='col-md-12'>
                <div class='flight-number'>
                    <img src='${logo}'>
                        <p><span>Flight Number</span>${flightNumber}</p>
                </div>
            </div>`;
}

function getFlightDurationInfoSection(duration, icon, stops = []) {
    let html = `<div class='col-8 mb-4 text-center'>
                <div class='flight-connect'>
                    <span>${duration}</span>
                    <div class="flight-connector">
                                    <img src="${icon}" class="img-fluid">
                                    <ul>`;
    if (stops.length) {
        for (let i = 0; i < stops.length; i++) {
            html += `<li><span class="circle" data-toggle="tooltip" data-placement="top" title="${stops[i]}"></span></li>`;
        }
    }

    html += `</ul>
                                </div>
                                <span>${stops.length} Stop(s)</span>
                            </div>
                        </div>`;
    return html;
}

function showAlertForFlightError(title, text) {
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

function submitFlightData(tripSetData, roundTripSetData, Index) {
    $.LoadingOverlay("show");
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var data = {
        booked_id: $("#booked_id").val(),
        booked_type: $("#booked_type").val(),
        hotel_id: $("#hotel_id").val(),
        round_trip_set_data: roundTripSetData,
        tripSetData: tripSetData,
        selectedIndex: Index,
        request_params: $("#request_params").val(),
    };

    $.ajax({
        type: "POST",
        url: "book-flight",
        data: data,
        dataType: "JSON",
        success: function (data) {
            window.location.replace(data.route);
        },
        error: function (request, status, error) {
            json = $.parseJSON(request.responseText);
            $.each(json.errors, function (key, value) {});
            $.LoadingOverlay("hide");
        },
    });
}

function selectFlight(element) {
    event.preventDefault();
    event.stopPropagation();
    let index = $(element).attr("data-trip");
    let trip = trips[index];
    $("#flight-select-data").val(JSON.stringify(trip));
    let tripSetData = $("#flight-select-data").val();
    let roundTripSetData = $("#roundTripData").val();
    customValidation();

    submitFlightData(tripSetData, roundTripSetData, index);
}

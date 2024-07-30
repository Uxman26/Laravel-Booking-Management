function getAirlinesAndStopvers() {
    let valueOfAirline = $("#flight-airlines").val();
    let valueOfAirlineStopOver = $("#flight-airlines-stopovers").val();
    customValidation();
    $(".divLoading").show();
    $('#flight-images').empty();
    var line;
    var lines = [];

    var myLatlng = new google.maps.LatLng(averagelat, averagelon);
    var mapOptions = {
        zoom: 3,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        opacity: 0.2,
        styles: styles,
        mapTypeControl: false,
        streetViewControl: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        },
        fullscreenControl: false
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var lineSymbol = {
        path: 'M22.1,15.1c0,0-1.4-1.3-3-3l0-1.9c0-0.2-0.2-0.4-0.4-0.4l-0.5,0c-0.2,0-0.4,0.2-0.4,0.4l0,0.7c-0.5-0.5-1.1-1.1-1.6-1.6l0-1.5c0-0.2-0.2-0.4-0.4-0.4l-0.4,0c-0.2,0-0.4,0.2-0.4,0.4l0,0.3c-1-0.9-1.8-1.7-2-1.9c-0.3-0.2-0.5-0.3-0.6-0.4l-0.3-3.8c0-0.2-0.3-0.9-1.1-0.9c-0.8,0-1.1,0.8-1.1,0.9L9.7,6.1C9.5,6.2,9.4,6.3,9.2,6.4c-0.3,0.2-1,0.9-2,1.9l0-0.3c0-0.2-0.2-0.4-0.4-0.4l-0.4,0C6.2,7.5,6,7.7,6,7.9l0,1.5c-0.5,0.5-1.1,1-1.6,1.6l0-0.7c0-0.2-0.2-0.4-0.4-0.4l-0.5,0c-0.2,0-0.4,0.2-0.4,0.4l0,1.9c-1.7,1.6-3,3-3,3c0,0.1,0,1.2,0,1.2s0.2,0.4,0.5,0.4s4.6-4.4,7.8-4.7c0.7,0,1.1-0.1,1.4,0l0.3,5.8l-2.5,2.2c0,0-0.2,1.1,0,1.1c0.2,0.1,0.6,0,0.7-0.2c0.1-0.2,0.6-0.2,1.4-0.4c0.2,0,0.4-0.1,0.5-0.2c0.1,0.2,0.2,0.4,0.7,0.4c0.5,0,0.6-0.2,0.7-0.4c0.1,0.1,0.3,0.1,0.5,0.2c0.8,0.2,1.3,0.2,1.4,0.4c0.1,0.2,0.6,0.3,0.7,0.2c0.2-0.1,0-1.1,0-1.1l-2.5-2.2l0.3-5.7c0.3-0.3,0.7-0.1,1.6-0.1c3.3,0.3,7.6,4.7,7.8,4.7c0.3,0,0.5-0.4,0.5-0.4S22,15.3,22.1,15.1z',
        fillColor: 'rgb(70,74,88)',
        fillOpacity: 1.5,
        scale: 0.8,
        anchor: new google.maps.Point(11, 11),
        strokeWeight: 0
    };
    var data = trips;
    var airlinesValues = [];
    var airlineStopOverValues = [];
    let flightCounter = 0;
    $('#directFlights').empty();
    let tripset = data;
    var originalDestination = tripset[0][0].original_destination;
    let consumed_airports  = [];
    let arr_lines = [];
    for (let i = 0; i < tripset.length; i++) {
        var color = '#6400e4';
        if (valueOfAirline == "all" && valueOfAirlineStopOver == "all") {
            stops = [];
            let sourceFlight = tripset[i][0];
            let destinationFlight = '' ; //tripset[i][tripset[i].length - 1 ];
            for(let j=tripset[i].length - 1; j>=0; j--){
                if(tripset[i][j].destinationCode == tripset[i][j].original_destination){
                    destinationFlight = tripset[i][j];
                }
            }
            for (let m = 0; m < tripset[i].length; m++) {
                let d_code = tripset[i][m].destinationCode;
                // console.log(d_code, originalDestination);
                if(tripset[i][m].is_final_stop) break;
                stops.push(d_code);
            }
            // console.log(stops)
            let detail = getFlightDetailInfoSection(i, sourceFlight, destinationFlight, stops)
            $('#flight-images').append(detail);
//             $('#flight-images').closest('ul').eq(0).find('.mystyle-btn').trigger('click');
// alert("helloo");
            var latlng = [];
            for (let j = 0; j < data[i].length; j++) {

                if($.inArray(data[i][j].destinationCode, consumed_airports) == -1){
                    consumed_airports.push(data[i][j].destinationCode);
                }
                if($.inArray(data[i][j].originCode, consumed_airports) == -1){
                    consumed_airports.push(data[i][j].originCode);
                }

                lat_lng_coords= {
                    o_lat : data[i][j].originLat,
                    o_lng : data[i][j].originLong,
                    d_lat : data[i][j].destinationLat,
                    d_lng : data[i][j].destinationLong,
                };

                var originLatLng = new google.maps.LatLng(lat_lng_coords.o_lat, lat_lng_coords.o_lng);
                var destinationLatLng = new google.maps.LatLng(lat_lng_coords.d_lat, lat_lng_coords.d_lng);

                if(!animationExists(arr_lines, lat_lng_coords)){
                    arr_lines.push(lat_lng_coords);
                    line = new google.maps.Polyline({
                        path: [originLatLng,destinationLatLng],
                        strokeOpacity: 0.8,
                        strokeWeight: 4,
                        strokeColor: color,
                        geodesic: true,
                        icons: [{
                            icon: lineSymbol,
                            offset: '100%',
                            repeat: '170px'
                        }]
                    });

                    line.setMap(map);

                    //add label to the route
                    var myLabel = new Label();
                    // lets add an event listener, if you click the line, i'll tell you the coordinates you clicked
                    line.addListener('mouseover', function (e) {
                        labelMarker.setPosition(e.latLng);
                        myLabel.bindTo('position', labelMarker, 'position');
                        myLabel.set('text', tripset[i][j].airlineName);
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


            airlinesValues.push(data[i][0].airlineCode);
            if (data[i][0].maxStops === 0) {
                flightCounter++;
            }
        } else if (valueOfAirline == "all" && valueOfAirlineStopOver != "all") {
            // console.log(data[i][0])
            if (valueOfAirlineStopOver == data[i][0].maxStops) {
                stops = [];
                let sourceFlight = tripset[i][0];
                let destinationFlight = '' ; //tripset[i][tripset[i].length - 1 ];
                for(let j=tripset[i].length - 1; j>=0; j--){
                    if(tripset[i][j].destinationCode == tripset[i][j].original_destination){
                        destinationFlight = tripset[i][j];
                    }
                }
                for (let m = 0; m < tripset[i].length; m++) {
                    let d_code = tripset[i][m].destinationCode;
                    // console.log(d_code, originalDestination);
                    if(tripset[i][m].is_final_stop) break;
                    stops.push(d_code);
                }
                // console.log(stops)
                let detail = getFlightDetailInfoSection(i, sourceFlight, destinationFlight, stops)
                $('#flight-images').append(detail);
                var latlng = [];
                for (let j = 0; j < data[i].length; j++) {
                    if($.inArray(data[i][j].destinationCode, consumed_airports) == -1){
                        consumed_airports.push(data[i][j].destinationCode);
                        // console.log(data[i][j]);
                    }
                    if($.inArray(data[i][j].originCode, consumed_airports) == -1){
                        consumed_airports.push(data[i][j].originCode);
                        // console.log(data[i][j]);

                    }
                    // console.log(consumed_airports);
                    lat_lng_coords= {
                        o_lat : data[i][j].originLat,
                        o_lng : data[i][j].originLong,
                        d_lat : data[i][j].destinationLat,
                        d_lng : data[i][j].destinationLong,
                    };

                    var originLatLng = new google.maps.LatLng(lat_lng_coords.o_lat, lat_lng_coords.o_lng);
                    var destinationLatLng = new google.maps.LatLng(lat_lng_coords.d_lat, lat_lng_coords.d_lng);

                    if(!animationExists(arr_lines, lat_lng_coords)){
                        arr_lines.push(lat_lng_coords);
                        line = new google.maps.Polyline({
                            path: [originLatLng,destinationLatLng],
                            strokeOpacity: 0.8,
                            strokeWeight: 4,
                            strokeColor: color,
                            geodesic: true,
                            icons: [{
                                icon: lineSymbol,
                                offset: '100%',
                                repeat: '170px'
                            }]
                        });

                        line.setMap(map);

                        //add label to the route
                        var myLabel = new Label();
                        // lets add an event listener, if you click the line, i'll tell you the coordinates you clicked
                        line.addListener('mouseover', function (e) {
                            labelMarker.setPosition(e.latLng);
                            myLabel.bindTo('position', labelMarker, 'position');
                            myLabel.set('text', tripset[i][j].airlineName);
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

            }
            airlinesValues.push(data[i][0].airlineCode);
            if (data[i][0].maxStops === 0) {
                flightCounter++;
            }
        } else if (valueOfAirline != "all" && valueOfAirlineStopOver == "all") {
            if (valueOfAirline == data[i][0].airlineCode) {
                stops = [];
            let sourceFlight = tripset[i][0];
            let destinationFlight = '' ; //tripset[i][tripset[i].length - 1 ];
            for(let j=tripset[i].length - 1; j>=0; j--){
                if(tripset[i][j].destinationCode == tripset[i][j].original_destination){
                    destinationFlight = tripset[i][j];
                }
            }
            for (let m = 0; m < tripset[i].length; m++) {
                let d_code = tripset[i][m].destinationCode;
                // console.log(d_code, originalDestination);
                if(tripset[i][m].is_final_stop) break;
                stops.push(d_code);
            }
            // console.log(stops)
            let detail = getFlightDetailInfoSection(i, sourceFlight, destinationFlight, stops)
            $('#flight-images').append(detail);
            var color = '#6400e4';
            var latlng = [];
            for (let j = 0; j < data[i].length; j++) {

                if($.inArray(data[i][j].destinationCode, consumed_airports) == -1){
                    consumed_airports.push(data[i][j].destinationCode);
                }
                if($.inArray(data[i][j].originCode, consumed_airports) == -1){
                    consumed_airports.push(data[i][j].originCode);
                }

                lat_lng_coords= {
                    o_lat : data[i][j].originLat,
                    o_lng : data[i][j].originLong,
                    d_lat : data[i][j].destinationLat,
                    d_lng : data[i][j].destinationLong,
                };

                var originLatLng = new google.maps.LatLng(lat_lng_coords.o_lat, lat_lng_coords.o_lng);
                var destinationLatLng = new google.maps.LatLng(lat_lng_coords.d_lat, lat_lng_coords.d_lng);

                if(!animationExists(arr_lines, lat_lng_coords)){
                    arr_lines.push(lat_lng_coords);
                    line = new google.maps.Polyline({
                        path: [originLatLng,destinationLatLng],
                        strokeOpacity: 0.8,
                        strokeWeight: 4,
                        strokeColor: color,
                        geodesic: true,
                        icons: [{
                            icon: lineSymbol,
                            offset: '100%',
                            repeat: '170px'
                        }]
                    });

                    line.setMap(map);

                    //add label to the route
                    var myLabel = new Label();
                    // lets add an event listener, if you click the line, i'll tell you the coordinates you clicked
                    line.addListener('mouseover', function (e) {
                        labelMarker.setPosition(e.latLng);
                        myLabel.bindTo('position', labelMarker, 'position');
                        myLabel.set('text', tripset[i][j].airlineName);
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

            }
            airlineStopOverValues.push(data[i][0].maxStops);
            if (data[i][0].maxStops === 0) {
                flightCounter++;
            }
        } else if (valueOfAirline != "all" && valueOfAirlineStopOver != "all") {
            if ((valueOfAirline == data[i][0].airlineCode) && (valueOfAirlineStopOver == data[i][0].maxStops)) {
                stops = [];
            let sourceFlight = tripset[i][0];
            let destinationFlight = '' ; //tripset[i][tripset[i].length - 1 ];
            for(let j=tripset[i].length - 1; j>=0; j--){
                if(tripset[i][j].destinationCode == tripset[i][j].original_destination){
                    destinationFlight = tripset[i][j];
                }
            }
            for (let m = 0; m < tripset[i].length; m++) {
                let d_code = tripset[i][m].destinationCode;
                // console.log(d_code, originalDestination);
                if(tripset[i][m].is_final_stop) break;
                stops.push(d_code);
            }
            // console.log(stops)
            let detail = getFlightDetailInfoSection(i, sourceFlight, destinationFlight, stops)
            $('#flight-images').append(detail);
            var latlng = [];
            for (let j = 0; j < data[i].length; j++) {

                if($.inArray(data[i][j].destinationCode, consumed_airports) == -1){
                    consumed_airports.push(data[i][j].destinationCode);
                }
                if($.inArray(data[i][j].originCode, consumed_airports) == -1){
                    consumed_airports.push(data[i][j].originCode);
                }

                lat_lng_coords= {
                    o_lat : data[i][j].originLat,
                    o_lng : data[i][j].originLong,
                    d_lat : data[i][j].destinationLat,
                    d_lng : data[i][j].destinationLong,
                };

                var originLatLng = new google.maps.LatLng(lat_lng_coords.o_lat, lat_lng_coords.o_lng);
                var destinationLatLng = new google.maps.LatLng(lat_lng_coords.d_lat, lat_lng_coords.d_lng);

                if(!animationExists(arr_lines, lat_lng_coords)){
                    arr_lines.push(lat_lng_coords);
                    line = new google.maps.Polyline({
                        path: [originLatLng,destinationLatLng],
                        strokeOpacity: 0.8,
                        strokeWeight: 4,
                        strokeColor: color,
                        geodesic: true,
                        icons: [{
                            icon: lineSymbol,
                            offset: '100%',
                            repeat: '170px'
                        }]
                    });

                    line.setMap(map);

                    //add label to the route
                    var myLabel = new Label();
                    // lets add an event listener, if you click the line, i'll tell you the coordinates you clicked
                    line.addListener('mouseover', function (e) {
                        labelMarker.setPosition(e.latLng);
                        myLabel.bindTo('position', labelMarker, 'position');
                        myLabel.set('text', tripset[i][j].airlineName);
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

            }
            if (data[i][0].maxStops === 0) {
                flightCounter++;
            }
        }
    }
    console.log(consumed_airports)
    console.log(airportDetails)
    for (const key of Object.keys(airportDetails)) {
        if (consumed_airports.includes(key)) {
            let icons = 'assets/img/icons8-circled-o-30.png';
            if (key === $('.select2-departure').val()) {
                icons = 'assets/img/icons8-airplane-take-off-30 (1).png';
            }
            if (key === $('.select2-destination:last').val()) {
                icons = 'assets/img/icons8-airplane-landing-30 (1).png';
            }
            var myMarker = new google.maps.Marker({
                position: new google.maps.LatLng(airportDetails[key].latitude, airportDetails[key].longitude),
                map: map,
                icon: icons,
                title: airportDetails[key].name
            });
            // create an invisible marker
            labelMarker = new google.maps.Marker({
                position: new google.maps.LatLng(airportDetails[key].latitude, airportDetails[key].longitude),
                map: map,
                visible: false
            });
        }
    }
    document.getElementById('flightDirectRoutes').style.display = '';
    $('#directFlights').html(flightCounter + " direct routes found");
    $(".divLoading").hide();
}


function updateMapAirportsAndFlights(){
    let consumed_airports = [];
    var latlng = [];
    for (let j = 0; j < data[i].length; j++) {
        line = new google.maps.Polyline({
            path: [new google.maps.LatLng(data[i][j].originLat, data[i][j].originLong),
                new google.maps.LatLng(data[i][j].destinationLat, data[i][j].destinationLong)],
            strokeOpacity: 0.8,
            strokeWeight: 5,
            strokeColor: color,

            geodesic: true,
            icons: [{
                icon: lineSymbol,
                offset: '100%',
                repeat: '170px'
            }]
        });
        line.setMap(map);
        lines.push(line);
        animate(lines);
        consumed_airports.push(data[i][j].destinationCode);
        consumed_airports.push(data[i][j].originCode);
        latlng.push(new google.maps.LatLng(data[i][j].originLat, data[i][j].originLong),
            new google.maps.LatLng(data[i][j].destinationLat, data[i][j].destinationLong));
        //add label to the route
        var myLabel = new Label();
        // lets add an event listener, if you click the line, i'll tell you the coordinates you clicked
        line.addListener('mouseover', function (e) {
            labelMarker.setPosition(e.latLng);
            myLabel.bindTo('position', labelMarker, 'position');
            myLabel.set('text', data[i][j].airlineName);
            myLabel.setMap(map);
        });
    }
    var latlngbounds = new google.maps.LatLngBounds();
    for (var k = 0; k < latlng.length; k++) {
        latlngbounds.extend(latlng[k]);
    }
    map.fitBounds(latlngbounds);
    for (const key of Object.keys(airportDetails)) {
        if (consumed_airports.includes(key)) {
            let icons = 'assets/img/icons8-circled-o-30.png';
            if (key === $('.select2-departure').val()) {
                icons = 'assets/img/icons8-airplane-take-off-30 (1).png';
            }
            if (key === $('.select2-destination:last').val()) {
                icons = 'assets/img/icons8-airplane-landing-30 (1).png';
            }
            var myMarker = new google.maps.Marker({
                position: new google.maps.LatLng(airportDetails[key].latitude, airportDetails[key].longitude),
                map: map,
                icon: icons,
                title: airportDetails[key].name
            });
            // create an invisible marker
            labelMarker = new google.maps.Marker({
                position: new google.maps.LatLng(airportDetails[key].latitude, airportDetails[key].longitude),
                map: map,
                visible: false
            });
        }
    }
}


function animate(lines) {
    var count = 0;
    offsetId = window.setInterval(function () {
        count = (count + 1) % 2000;
        for (var i = 0; i < lines.length; i++) {
            var icons = lines[i].get('icons');
            icons[0].offset = (count / 2) + '%';
            lines[i].set('icons', icons);
        }
    }, 200);
}

function customValidation() {
    $('#validation-errors').html('');
    var depart = $('.select2-departure').val();
    if (depart == null) {
        document.getElementById('validation-errors').style.display = "";
        $('#validation-errors').append('<div class="alert alert-danger"> Departure Location is Required </div>');
        $("#flight-images").empty();
        $('#route-tags').hide();
        $('#origin-tag').empty();
        $('#destination-tag').empty();
        submitButton.prop('disabled', false);
        return;
    }
    var destination = $('.select2-destination').val();
    if (destination == null) {
        document.getElementById('validation-errors').style.display = "";
        $('#validation-errors').append('<div class="alert alert-danger"> Destination Location is Required </div>');
        $("#flight-images").empty();
        $('#route-tags').hide();
        $('#origin-tag').empty();
        $('#destination-tag').empty();
        submitButton.prop('disabled', false);
        return;
    }
    var flightClass = $('#flight-class').val();
    if (flightClass == null) {
        document.getElementById('validation-errors').style.display = "";
        $('#validation-errors').append('<div class="alert alert-danger"> Flight Class is Required </div>');
        $("#flight-images").empty();
        $('#route-tags').hide();
        $('#origin-tag').empty();
        $('#destination-tag').empty();
        submitButton.prop('disabled', false);
        return;
    }
    var flightTraverCount = $('#flight-travllers-count').val();
    if (flightTraverCount == null) {
        document.getElementById('validation-errors').style.display = "";
        $('#validation-errors').append('<div class="alert alert-danger"> Select the number of travelers</div>');
        $("#flight-images").empty();
        $('#route-tags').hide();
        $('#origin-tag').empty();
        $('#destination-tag').empty();
        submitButton.prop('disabled', false);
        return;
    }
    // let first = $("#flight-travller-first-name").val();
    // if (first == null) {
    //     document.getElementById('validation-errors').style.display = "";
    //     $('#validation-errors').append('<div class="alert alert-danger"> Please Enter First Name</div>');
    //     $("#flight-images").empty();
    //     $('#route-tags').hide();
    //     $('#origin-tag').empty();
    //     $('#destination-tag').empty();
    //     submitButton.prop('disabled', false);
    //     return;
    // }
    // let last = $("#flight-travller-last-name").val();
    // if (last == null) {
    //     document.getElementById('validation-errors').style.display = "";
    //     $('#validation-errors').append('<div class="alert alert-danger"> Please Enter Last Name</div>');
    //     $("#flight-images").empty();
    //     $('#route-tags').hide();
    //     $('#origin-tag').empty();
    //     $('#destination-tag').empty();
    //     submitButton.prop('disabled', false);
    //     return;
    // }
}

function resultSetHeadings() {
    let source = $('.select2-departure').val();
    let dest = $('.select2-destination').val();
    let selectedVal = "";
    let selected = $("input[type='radio'][name='flightType']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }
    if (selectedVal === 'oneway') {
        let citiesTag = "<h4>\n" +
            "                                    <span >" + airportDetails[source].city + " </span>\n" +
            "                                    <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                    <span>" + airportDetails[dest].city + "</span>\n" +
            "                                </h4>";
        let citiesCodeTag = "<p>\n" +
            "                                            <span id=\"origin-tag\">" + airportDetails[source].city + " (" + source + ") </span>\n" +
            "                                            <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                            <span id=\"destination-tag\">" + airportDetails[dest].city + " (" + dest + ")</span>\n" +
            "                                        </p>\n" +
            "                                        <hr>";
        $('.result-cities').html(citiesTag);
        $('.result-cities-code').html(citiesCodeTag);
    } else if (selectedVal === 'roundway') {
        let citiesTag = "<h4>\n" +
            "                                    <span >" + airportDetails[source].city + " </span>\n" +
            "                                    <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                    <span>" + airportDetails[dest].city + "</span>\n" +
            "                                    <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                    <span>" + airportDetails[source].city + "</span>\n" +
            "                                </h4>";
        let citiesCodeTag = "<p>\n" +
            "                                            <span id=\"origin-tag\">" + airportDetails[source].city + " (" + source + ") </span>\n" +
            "                                            <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                            <span id=\"destination-tag\">" + airportDetails[dest].city + " (" + dest + ")</span>\n" +
            "                                            <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                            <span id=\"destination-tag\">" + airportDetails[source].city + " (" + source + ")</span>\n" +
            "                                        </p>\n" +
            "                                        <hr>";
        $('.result-cities').html(citiesTag);
        $('.result-cities-code').html(citiesCodeTag);
    } else if (selectedVal === 'multicity') {
        let multiDest = $('.select2-destination:last').val();
        let citiesTag = "<h4>\n" +
            "                                    <span >" + airportDetails[source].city + " </span>\n" +
            "                                    <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                    <span>" + airportDetails[multiDest].city + "</span>\n" +
            "                                </h4>";
        let citiesCodeTag = "<p>\n" +
            "                                            <span id=\"origin-tag\">" + airportDetails[source].city + " (" + source + ") </span>\n" +
            "                                            <i id=\"route-tags\" class=\"fas fa-long-arrow-alt-right\"></i>\n" +
            "                                            <span id=\"destination-tag\">" + airportDetails[multiDest].city + " (" + multiDest + ")</span>\n" +
            "                                        </p>\n" +
            "                                        <hr>";
        $('.result-cities').html(citiesTag);
        $('.result-cities-code').html(citiesCodeTag);
    }

}

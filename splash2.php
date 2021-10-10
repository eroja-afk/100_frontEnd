<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.min.css">
    	<script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.js"></script>
        <script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.min.js"></script>
        <script src="./resources/leaflet/leaflet.js"></script>
        <script src="./resources/jquery-3.6.0.min.js"></script>


        <link rel="stylesheet" href="./resources/leaflet/leaflet.css">
        <link rel="stylesheet" href="splash.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" type="text/css" href="DataTables\datatables.css">
        <link rel="stylesheet" type="text/css" href="DataTables\datatables.min.css">
        <script type="text/javascript" charset="utf8" src="DataTables\datatables.js"></script>
        <script type="text/javascript" charset="utf8" src="DataTables\datatables.min.js"></script>
        
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.5.0/dist/esri-leaflet.js"
    integrity="sha512-ucw7Grpc+iEQZa711gcjgMBnmd9qju1CICsRaryvX7HJklK0pGl/prxKvtHwpgm5ZHdvAil7YPxI1oWPOWK3UQ=="
    crossorigin=""></script>

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
    integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
    crossorigin=""></script>
        <title>
            Stat Map
        </title>
    </head>
    <body>
    	<nav class="navbar navbar-expand-xl navbar-dark bg-primary">
  			<div class="container-fluid">
    			<a class="navbar-brand" href="#" style="font-weight: bold" >RECAS</a>
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarNav">
      				<ul class="navbar-nav">
        				<li class="nav-item">
          					<a class="nav-link active" aria-current="page" href="#">Home</a>
        				</li>
        				<li class="nav-item">
        					<a class="nav-link disabled">Sign Out</a>
        				</li>
      				</ul>
    			</div>
  			</div>
		</nav>
        <div class = "container">
		<div>
            <form class="content">
           		<h4><b><i>Longitude and Latitude:</i></b></h4>
                <input id="lo" class="lo" type="text" name="longitude"placeholder="Longitude" disabled="">
                <input id="la" class="la" type="text" name="latitude" placeholder="Latitude" disabled="">
                <h4><b><i>Reporters Name:</i></b></h4>
                <input id="name" type="text" name="name" placeholder="Enter Name">
                <h4><b><i>Reporters Contact:</i></b></h4>
                <input id="contact" type="text" name="contact" placeholder="Enter Contact Details">
                <h4><b><i>Reporters Address:</i></b></h4>
                <input id="address" type="text" name="address" placeholder="Enter Address">
                <h4><b><i>Reporters Details:</i></b></h4>
                <textarea id="details" class="details" type="text" name="details" placeholder="Enter Details"></textarea>
                <h4><b><i>Crimes Against</i></b></h4>

                <select id="choice" onclick="showChoice(this.value)">
                    <option value=""></option>
                    <option value="Human">Against Human</option>
                    <option value="Property">Against Property</option>
                </select>

                <select id="fhuman" name="For Human">
                    <option value=""></option>
                    <option value="murder">Murder</option>
                    <option value="homi">Homicide</option>
                    <option value="pi">Physical Injuries</option>
                    <option value="rape">Rape</option>
                </select>

                <select id="fprop" name="For Property">
                    <option value=""></option>
                    <option value="robbery">Robbery</option>
                    <option value="theft">Theft</option>
                    <option value="carnap">Carnapping</option>
                </select>
            </form>
        </div>

            <div id="mapid"> </div>
            <div style="text-align:right">
                <input type="button" id="rmvmarker" value="Remove Marker" />
                <input type="button" id="showOnMap" value="Show on Map">
            </div>

            
            <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Crime Type</th>
                    <th>Date Reported</th>
                    <th>Reporter Name</th>
                    <th>Reporter Contact</th>
                    <th>Reporter Address</th>
                </tr>
            </thead>
            <tbody>
                
                </tbody>
            </table>
        
        </div>
    </body>

    </html>

<script>
$( document ).ready(function() { 

    var table = $('#table_id').DataTable();  
    var dataAll = [];

    var map = L.map('mapid').setView([10.3157, 123.8854], 14);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
    osm.addTo(map);
        
    var geocodeService = L.esri.Geocoding.geocodeService();
    var longitude;
    var latitude;
    var marker = null;

    map.on('click', function (e) {
        if(marker == null){
            geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
            if (error) {
                return;
            }

            alert(result.latlng)
            marker = L.marker(result.latlng,{draggable:"true"}).addTo(map).bindPopup(result.address.Match_addr).openPopup();
            });
        }
    });

    $("#rmvmarker").click(function(){
        deleteMarker();
    })

    $("#showOnMap").click(function(){
        showCrimes();
    })
    

    $("#fhuman").hide();
    $("#fprop").hide();
        
    function showChoice(choice){
        if(choice == "Human"){
            $("#fhuman").show();
            $("#fprop").hide();
        }else if(choice == "Property"){
            $("#fprop").show();
            $("#fhuman").hide();
        }else{
            $("#fhuman").hide();
            $("#fprop").hide();
        }
    }

    function deleteMarker(){
        map.removeLayer(marker);
        marker= null;
    }

    function makeMarker(data){
        L.marker([data.latitude,data.longitude],{draggable:"true"}).addTo(map).bindPopup(data);
    }

    function addTableRow(data){
         table.row.add([data.crimeType_id,data.datetime,data.reporter_name,data.reporter_contact,data.reporter_address]).draw(false);
        
    }

    
    function showCrimes(){
        var something;
        $.ajax({ 
            method: "GET", 
            url: "https://recas-api.vercel.app/getAllCrimes",
            dataType:"json"
            }).done(function( data ) { 
                //console.log(data)
                var tableData = data;
                //console.log("sdsdsds")
                //console.log(tableData)
                for(var i = 0 ; i < Object.keys(tableData.data).length ; i++){
                    //console.log(tableData.data[i])
                    something = tableData.data[i]
                    dataAll.push(tableData.data[i]);
                    makeMarker(tableData.data[i]);
                    addTableRow(something);


                }
                //console.log(markerData)
            });


    }

});

        
</script>


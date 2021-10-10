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
      				</ul>
                    <a href="logout.php" class="btn btn-danger">Sign Out</a>
    			</div>
  			</div>
		</nav><br>
        <div class = "container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card bg-light">
                        <div class="card-header bg-primary text-white">Report a Crime</div>
                    <div class="card-body">
                        <form class="content">
                            <div class="mb-3 row">
                                <label class="form-label">Longitude and Latitude</label>
                                <div class="col-sm-6">
                                    <input id="lo" class="lo form-control" type="text" name="longitude"placeholder="Longitude" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <input id="la" class="la form-control" type="text" name="latitude" placeholder="Latitude" disabled="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Reporters Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Reporters Contact</label>
                                <input class="form-control" id="contact" type="text" name="contact" placeholder="Enter Contact Details">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Reporters Address</label>
                                <input class="form-control" id="address" type="text" name="address" placeholder="Enter Address">
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Reporters Details</label>
                                <textarea class="form-control" id="details" class="details" type="text" name="details" placeholder="Enter Details"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Crimes Against</label>
                                <select class="form-control" id="choice" onclick="showChoice(this.value)">
                                <option value="0">Select Option</option>
                                <option value="Human">Against Human</option>
                                <option value="Property">Against Property</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" id="fhuman" name="For Human">
                                    <option value="0">Select Option</option>
                                    <option value="murder">Murder</option>
                                    <option value="homi">Homicide</option>
                                    <option value="pi">Physical Injuries</option>
                                    <option value="rape">Rape</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <select class="form-control" id="fprop" name="For Property">
                                    <option value="0">Select Option</option>
                                    <option value="robbery">Robbery</option>
                                    <option value="theft">Theft</option>
                                    <option value="carnap">Carnapping</option>
                                </select>
                            </div>
                            <button class="btn btn-success form-control" id="submitCrime">Report Crime</button>
                        </form>
                    </div>
                </div>
            </div>
                <div class="col-sm-8">
                    <div id="mapid"></div>
                </div>
            </div>
                <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                    </tbody>
                </table>
        
        </div>
    </body>

    </html>

<script>
    
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

$( document ).ready(function() { 

    var table = $('#table_id').DataTable();  
    var dataAll = [];
    var markersLayer = new L.LayerGroup();

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
            $("#lo").val(result.latlng.lng);
            $("#la").val(result.latlng.lat);

            alert(result.latlng)
            marker = L.marker(result.latlng,{draggable:"true"}).addTo(markersLayer).bindPopup(result.address.Match_addr).openPopup();

            markersLayer.addTo(map); 

            marker.on("dragend",function(e){

            var changedPos = e.target.getLatLng();
            //this.bindPopup(chagedPos.toString()).openPopup();
                $("#lo").val(changedPos.lng);
                $("#la").val(changedPos.lat);
            });
            });
        }
    });

    

    $("#rmvmarker").click(function(){
        deleteMarker();
    })

    $("#showOnMap").click(function(){
        showCrimes();
    })

    $("#rmvAllLarkers").click(function(){
        markersLayer.clearLayers();
        $("#lo").val(null);
        $("#la").val(null);
        marker = null;
    })
    

    $("#fhuman").hide();
    $("#fprop").hide();

    function deleteMarker(){
        map.removeLayer(marker);
        $("#lo").val(null);
        $("#la").val(null);
        marker= null;
    }

    function makeMarker(data){
        var tempMarker = L.marker([data.latitude,data.longitude]).addTo(markersLayer).bindPopup(data);
        markersLayer.addTo(map); 
    }

    function addTableRow(data){
         table.row.add([data.against,data.type,data.datetime,data.reporter_name,data.reporter_contact,data.reporter_address]).draw(false);
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
                dataAll = [];
                table.clear().draw()
                for(var i = 0 ; i < Object.keys(tableData.data).length ; i++){
                    //console.log(tableData.data[i])
                    something = tableData.data[i];
                    dataAll.push(tableData.data[i]);
                    makeMarker(tableData.data[i]);
                    addTableRow(something);


                }
                //console.log(markerData)
            });


    }

});

        
</script>


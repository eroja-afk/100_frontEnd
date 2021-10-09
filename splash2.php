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
        <link rel="stylesheet" type="text/css" href="datatables.css">
        <link rel="stylesheet" type="text/css" href="datatables.min.css">
        <script type="text/javascript" charset="utf8" src="datatables.js"></script>
        <script type="text/javascript" charset="utf8" src="datatables.min.js"></script>
        
        <title>
            Stat Map
        </title>
    </head>
    <body>
    	
    	<nav class="navbar navbar-expand-xl navbar-light bg-light">
  			<div class="container-fluid">
    			<a class="navbar-brand" href="#" style="font-weight: bold" >100</a>
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
		<div>
            <form class="content">
           		<h4><b><i>Longitude and Latitude:</i></b></h4>
                <input id="lo" class="lo" type="text" name="longitude"placeholder="Longitude">
                <input id="la" class="la" type="text" name="latitude" placeholder="Latitude">
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

        <div id="mapid"></div>
        
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
        
        
    </body>

    </html>

<script>

    var map = L.map('mapid').setView([10.3157, 123.8854], 14);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
    osm.addTo(map);
     

    if(!navigator.geolocation){
        console.log("Your browser doesn't support geolocation feature!");
    }else{
        setInterval(()=> {
            navigator.geolocation.getCurrentPosition(getPosition);
        }, 5000);
        
    }

    var marker, circle;

    function getPosition(position){
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        var accuracy = position.coords.accuracy;

        if(marker) {
            map.removeLayer(marker);
        }

        if(circle){
            map.removeLayer(circle);
        }

        marker = L.marker([lat, long]);
        circle = L.circle([lat, long], {radius: accuracy});

        var featureGroup = L.featureGroup([marker, circle]).addTo(map);

        map.fitBounds(featureGroup.getBounds());

        console.log("Your coordinate is: Lat:"+ lat +" Long: "+ long + " Accuracy: "+ accuracy);
    }

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



    $( document ).ready(function() {  
        $('#table_id').DataTable();  
    });

        
</script>


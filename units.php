<?php session_start(); ?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.min.css">
        <style>
        body {
          width: 100vw;
        }
        #mapid {
          margin: 10px 10px 10px 10px;
          height: 90vh;
          max-width: 100%;
        }

        #crimeInfo {
          margin-top: 20px;
          padding: 0px;
          height: 500px;
          overflow-y :scroll;
          max-width:90%;
        }
        #crimeInfo .card-header {
          position: sticky;
          top: 0px;
          color: white;
        }
        #crimeInfo li {
          list-style-type: none;
        }
        </style>
    	<script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.js"></script>
        <script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.min.js"></script>
        <script src="./resources/leaflet/leaflet.js"></script>
        <script src="./resources/jquery-3.6.0.min.js"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


        <link rel="stylesheet" href="./resources/leaflet/leaflet.css">
        <link rel="stylesheet" href="navbar.css">
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
          <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" id="userId">
    			<a class="navbar-brand" href="#" style="font-weight: bold" >RECAS</a>
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarNav">
      				<ul class="navbar-nav">
        				<li class="nav-item">
          					<a class="nav-link active" aria-current="page" href="#">Unit's View</a>
        				</li>
      				</ul>
              
                <a href="logout.php" class="btn btn-danger" >Sign Out</a>
              
    			</div>
  			</div>
		</nav>
        <div class="row">
          <div class="col-sm-8">
            <div id="mapid" style="margin:0px;height:88vh"></div>
          </div>
          <div class="col-sm-4" id="crimeInfo" style="margin:0px;height:88vh">
   
              <div id="info-body">
              <div class="position-relative">
                <div class="position-absolute top-50 start-50">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
           
            </div>
          </div>
      </div>
    </body>
</html>

<script>
  var map = L.map('mapid').setView([10.3157, 123.8854], 14);
  var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
    osm.addTo(map);
    
    var singleDatas = [];
    var crimeLayer = new L.LayerGroup();

    function makeCrimeMarker(data,usedLayer){
        //console.log(data.latitude)
        var tempMarker = L.marker([data.latitude,data.longitude]).addTo(usedLayer).on('click', goViewForMarker);
        usedLayer.addTo(map); 
        singleDatas.push({id:data.id,marker:tempMarker})
    }

    function goView(iden){   
      //weird but cool event
        setTimeout(function() {
        map.setView(L.latLng(map.getCenter()),16)

        }, 700);
        map.setView([iden.getAttribute("lat"),iden.getAttribute("lng")],14);
    }

    function goViewForMarker(e){   
      //weird but cool event
      
        map.setView(e.target.getLatLng(),16);
    }
$( document ).ready(function() {
  

    var crimeIcon = L.icon({ //add this new icon
      iconUrl: 'https://icon-library.com/images/gps-pin-icon/gps-pin-icon-3.jpg',
      shadowUrl: 'resources/leaflet/images/marker-shadow.png',
      iconSize:     [55, 50], // size of the icon
      shadowSize:   [50, 64], // size of the shadow
      iconAnchor:   [25, 50], // point of the icon which will correspond to marker's location
      shadowAnchor: [4, 62],  // the same for the shadow
      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

        
     setInterval(() =>{
         navigator.geolocation.getCurrentPosition(getPosition);
     }, 3000);

    //Pusher.logToConsole = true;

    var pusher = new Pusher('cb4b3192ce43653d8642', {
      cluster: 'ap1'
    });


    var marker = [];
    var crimeMarker = [];

    var circle;

    var markersLayer = new L.LayerGroup();
    var crimeMarkerLayer = new L.LayerGroup();

    function crimeMarker(data){
      var tempMarker = L.marker([data.lat, data.long], {icon: crimeIcon}).addTo(crimeMarkerLayer);
      crimeMarkerLayer.addTo(map);
      crimeMarker.push({marker:tempMarker});
    }

    function makeMarker(data){
      console.log("This is data"+data)
      var flag =0
      for(var i = 0; i < Object.keys(marker).length; i++){
        var found = marker[i].id;
        if(found === data.id){
          // map.removeLayer(marker[i].marker)
          // marker.splice({id: data.id});
          // markersLayer.clearLayers();
          flag= 1
        }
      }
      if(flag == 0){
        var tempMarker = L.marker([data.lat,data.long]).addTo(markersLayer);
        markersLayer.addTo(map);
        marker.push({id: data.id, marker:tempMarker});
      }else{

      }
      
    }


    function getPosition(position){
    // console.log(position)
    var id = $('#userId').val();
    

    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    var accuracy = position.coords.accuracy;

    // const found = marker.some(data => data.id === id)
    var flag = 0;
    for(var i = 0; i < Object.keys(marker).length; i++){
      var found = marker[i].id;
      if(found === id){
        // map.removeLayer(marker[i].marker)
        // marker.splice({id: id});
        flag = 1
      }
    }
    if(flag == 0){
      var tempMarker = L.marker([lat,long]).addTo(markersLayer);
      markersLayer.addTo(map);
      marker.push({id: id, marker:tempMarker});
    }
    L.marker([lat, long], {icon: crimeIcon}).addTo(map);
    

    // marker = L.marker([lat, long])
    // circle = L.circle([lat, long], {radius: accuracy})

    // markersLayer.clearLayers();
    // map.removeLayer(circle);

    // marker.addTo(markersLayer);
    // markersLayer.addTo(map);


    // var featureGroup = L.featureGroup([marker, circle]).addTo(map)

    // map.fitBounds(featureGroup.getBounds())

      // $.ajax({ //Process the form using $.ajax()
      //             type      : 'POST', //Method type
      //             url       : 'https://recas-api.vercel.app/getUnitLocation',
      //       headers: {
      //           'Access-Control-Allow-Headers': 'Content-Type',
      //           'Access-Control-Allow-Methods': '*',
      //           'Access-Control-Allow-Origin': '*'
      //       },
      //             data      : {
      //               lat: lat,
      //               long: long,
      //               accuracy: accuracy,
      //               userId : id
      //             }, //Forms name
      //             dataType  : 'json',
      //             success   : function(data) {
      //                 console.log(data);
      //             }
      //         });

  }

  var channel = pusher.subscribe('units');
    channel.bind('get-units', function(data) {
      console.log("This is data"+data)
      makeMarker(data);
    });

  // var channel = pusher.subscribe('crime');
  //   channel.bind('get-crime', function(data) {
  //     crimeMarker(data);
  //   });

  const getCrimes = () => {
    $.ajax({ //Process the form using $.ajax()
      type      : 'get', //Method type
      url       : 'https://recas-api.vercel.app/getAllCrimes',
            headers: {
                'Access-Control-Allow-Headers': 'Content-Type',
                'Access-Control-Allow-Methods': '*',
                'Access-Control-Allow-Origin': '*'
            },
      dataType  : 'json',
      success   : function(resp) {
        // console.log(resp);
        var dataContainer = $('#info-body');
        dataContainer.empty();
        var dataList = '';

        for(var i = 0; i < Object.keys(resp.data).length; i++){
          dataList += '<li>Reporter Name:'+resp.data[i].reporter_name+'</li>';
          dataList += '<li>Address:'+resp.data[i].reporter_address+'</li>';
          dataList += '<li>Latitude:'+resp.data[i].latitude+'</li>';
          dataList += '<li>Longitude:'+resp.data[i].longitude+'</li>';
          dataList += '<li>Contact:'+resp.data[i].reporter_contact+'</li>';
          dataList += '<li>Details:'+resp.data[i].reporter_details+'</li>';
          dataList += '<li>Status:'+resp.data[i].status+'</li>';
          dataList += '<li>Date:'+resp.data[i].datetime+'</li>';
          dataList += '<li><button id=marker"'+resp.data[i].id+'" lat="'+resp.data[i].latitude+'" lng="'+resp.data[i].longitude+'" onclick="goView(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></button></li>';
          dataList += '<hr>';
          makeCrimeMarker(resp.data[i],crimeLayer);
        }

        dataContainer.append(dataList);
      }
    });
  }

  getCrimes();

  // setInterval(() =>{
  //   getCrimes();
  // }, 5000);

});
</script>
<html>
    <head>
        <script src="./resources/jquery-3.6.0.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.min.css">
    	<script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.js"></script>
        <script type="text/javascript" charset="utf8" src="bootstrap-5.1.2-dist/js/bootstrap.min.js"></script>
        <script src="./resources/leaflet/leaflet.js"></script>
        <link rel="stylesheet" href="./resources/leaflet/leaflet.css">
        <link rel="stylesheet" href="splash.css">
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" type="text/css" href="DataTables\datatables.css">
        <link rel="stylesheet" type="text/css" href="DataTables\datatables.min.css">
        <script type="text/javascript" charset="utf8" src="DataTables\datatables.js"></script>
        <script type="text/javascript" charset="utf8" src="DataTables\datatables.min.js"></script>

        <link rel="stylesheet" type="text/css" href="jquery-ui\jquery-ui.css">
        <script type="text/javascript" charset="utf8" src="jquery-ui\jquery-ui.js"></script>

        
        
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
        <div class = "container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-header bg-primary text-white">Report a Crime</div>
                    <div class="card-body">
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
                                <label for="details" class="form-label">Report Details</label>
                                <textarea class="form-control" id="details" class="details" type="text" name="details" placeholder="Enter Details"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Crimes Against</label>
                                <select class="form-control" id="choice" onclick="showChoice(this.value)">
                                <option value="null">Select Option</option>
                                <option value="Human">Against Human</option>
                                <option value="Property">Against Property</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" id="fhuman" name="For Human">
                                    <option value="null">Select Option</option>
                                    <option value="1">Murder</option>
                                    <option value="2">Homicide</option>
                                    <option value="3">Physical Injuries</option>
                                    <option value="4">Rape</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <select class="form-control" id="fprop" name="For Property">
                                    <option value="null">Select Option</option>
                                    <option value="5">Robbery</option>
                                    <option value="6">Theft</option>
                                    <option value="7">Carnapping</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Crime Barangay</label>
                                <input class="form-control" id="barangay" type="text" name="contact" placeholder="Enter Barangay">
                            </div>
                            <button class="btn btn-success form-control" id="submitCrime">Report Crime</button>
                    </div>
                </div>
            </div>
                <div class="col-sm-6">
                    <div id="mapid"></div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="rmvmarker"type="button" class="btn btn-warning">Remove Current Marker</button>
                        <button id="rmvAllMarkers"type="button" class="btn btn-danger">Remove All Markers</button>
                       <button id="tableToMap"type="button" class="btn btn-primary">Show on map</button>
                    </div>
                </div>
                <div class="col-sm-3">
                <div class="card bg-light">
                    <div class="card-header bg-primary text-white">
                        Filter Options
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label for="searchchoice" class="form-label">Crimes Against</label>
                                <select class="form-control" id="searchchoice" onclick="showSearchChoice(this.value)">
                                <option value="">Select Option</option>
                                <option value="0">Against Human</option>
                                <option value="1">Against Property</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" id="searchFcase" >
                                    <option value="">Select Option</option>
                                    <option value="1">Murder</option>
                                    <option value="2">Homicide</option>
                                    <option value="3">Physical Injuries</option>
                                    <option value="4">Rape</option>
                                </select>
                                <select class="form-control" id="searchPcase" >
                                    <option value="">Select Option</option>
                                    <option value="5">Robbery</option>
                                    <option value="6">Theft</option>
                                    <option value="7">Carnapping</option>
                                </select>
                            </div>
                            <label for="searchstatus" class="form-label">Status</label>
                            <select class="form-control" id="searchstatus" >
                                <option value="">Select Option</option>
                                <option value="1">Ongoing</option>
                                <option value="2">Finished</option>
                            </select>
                            <label for="searchbarangay" class="form-label">Barangay</label>
                            <select class="form-control" id="searchbarangay">
                                <option value="">Select Option</option>
                                <option value="1">brgy1</option>
                                <option value="2">brgy2</option>
                                <option value="3">brgy3</option>
                                <option value="4">brgy4</option>
                            </select> 
                            <div class="mb-3">
                                <label for="searchcontact" class="form-label">Reporter Contact</label>
                                <input class="form-control" id="searchcontact" type="text" placeholder="Reporter Contact" value=""></input>
                            </div>
                            <div class="mb-3">
                                <label for="searchfrom" class="form-label">From</label>
                                <input type="date" class="form-control" id="searchfrom" class="datepicker" ></p>
                            </div>
                            <div class="mb-3">
                                <label for="searchto" class="form-label">To</label>
                                <input type="date" class="form-control" id="searchto" class="datepicker" ></p>
                            </div>
                            <input type="button" class="btn btn-success form-control" id="filterbtn" value="Filter"></input>
                    </div>
                </div>
                </div>
            </div>
            <div>
                <!-- <div class="card bg-light">
                    <div class="card-header">
                        Filter Options
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="searchchoice" class="form-label">Crimes Against</label>
                                <select class="form-control" id="searchchoice" onclick="showSearchChoice(this.value)">
                                <option value="">Select Option</option>
                                <option value="0">Against Human</option>
                                <option value="1">Against Property</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" id="searchFcase" >
                                    <option value="">Select Option</option>
                                    <option value="1">Murder</option>
                                    <option value="2">Homicide</option>
                                    <option value="3">Physical Injuries</option>
                                    <option value="4">Rape</option>
                                </select>
                                <select class="form-control" id="searchPcase" >
                                    <option value="">Select Option</option>
                                    <option value="5">Robbery</option>
                                    <option value="6">Theft</option>
                                    <option value="7">Carnapping</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <label for="searchstatus" class="form-label">Status</label>
                            <select class="form-control" id="searchstatus" >
                                <option value="">Select Option</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="finished">Finished</option>
                            </select>
                            <label for="searchbarangay" class="form-label">Barangay</label>
                            <select class="form-control" id="searchbarangay">
                                <option value="">Select Option</option>
                                <option value="1">brgy1</option>
                                <option value="2">brgy2</option>
                                <option value="3">brgy3</option>
                                <option value="4">brgy4</option>
                            </select> 
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Reporter Contact</label>
                                <input class="form-control" id="searchcontact" type="text" placeholder="Reporter Contact" value=""></input>
                                <p>From: <input type="date" class="form-control" id="searchfrom" class="datepicker" ></p>
                                <p>To: <input type="date" class="form-control" id="searchto" class="datepicker" ></p>
                                <input type="button" class="btn btn-primary form-control" id="filterbtn" value="Filter"></input>
                            </div>
                        </div>
                    </div>
                </div> -->
            
            </div><br/>
            <div class="container">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Crime Data
                </div>
                <div class="card-body">
                <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Crime On</th>
                        <th>Crime Type</th>
                        <th>Date</th>
                        <th>Reporter Name</th>
                        <th>Reporter Contact</th>
                        <th>Reporter Address</th>
                        <th>latitude</th>
                        <th>longitude</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </body>

    </html>

<script>
    var table = $('#table_id').DataTable();
    table.columns([6,7]).visible(false); 
    table.columns([0]).visible(false);   

    var dataAll = [];
    var filteredRows;
    var markersLayer = new L.LayerGroup();
    var singleDatas = [];

    var map = L.map('mapid').setView([10.3157, 123.8854], 14);
    $('.datepicker').datepicker();
    
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
    function removeMarker(e){
        singleDatas.forEach((data)=>{
            if("marker"+data.id == e.target.id){
                map.removeLayer(data.marker)
            }
        })
    }

function showSearchChoice(choice){
    if(choice == "0"){
        $("#searchFcase").show();
        $("#searchPcase").hide();
    }else if(choice == "1"){
        $("#searchPcase").show();
        $("#searchFcase").hide();
    }else{
        $("#searchFcase").hide();
        $("#searchPcase").hide();
    }
}

$( document ).ready(function() { 
    
    
    

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

    $("#filterbtn").click(function(){
        filterCrime();
    })

    $("#rmvmarker").click(function(){
        deleteMarker();
    })

    $("#tableToMap").click(function(){
        selectOnlyFiltered();
    })

    $("#rmvAllMarkers").click(function(){
        markersLayer.clearLayers();
        $("#lo").val(null);
        $("#la").val(null);
        marker = null;
    })

    $("#submitCrime").click(function(){

        if($('#fhuman').val() != 0 || $('#fprop').val() != 0){
            reportCrime();
        }else{
            alert("please fill out fields")
        }

    })
    

    $("#fhuman").hide();
    $("#fprop").hide();
    $("#searchFcase").hide();
    $("#searchPcase").hide();

    

    function selectOnlyFiltered(){
        var tempData= {
            id: 1000,
            latitude:  0,
            longitude:  0
        }

        filteredRows = table.rows({filter: 'applied'});
        //console.log(filteredRows.data()[0])
        for(var i = 0 ; i < filteredRows.data().length ; i ++){
            // console.log(filteredRows.data()[i][6])
            // console.log(filteredRows.data()[i][7])
            tempData.id = filteredRows.data()[i][0];
            tempData.latitude = filteredRows.data()[i][7];
            tempData.longitude = filteredRows.data()[i][8];
            makeMarker(tempData,markersLayer)
        }
        
    }

    function deleteMarker(){
        map.removeLayer(marker);
        $("#lo").val(null);
        $("#la").val(null);
        marker= null;
    }

    $(".markerRemove").click(function(){
        console.log(this.id)
        //console.log($(this).attr('id'))
    })
    

    function makeMarker(data,usedLayer){
        var html = "<button class='markerRemove' id='marker"+data.id+"' value='Remove' onclick='removeMarker(event)'>Remove</button>"
        var tempMarker = L.marker([data.latitude,data.longitude]).addTo(usedLayer).bindPopup(html);
        usedLayer.addTo(map); 
        singleDatas.push({id:data.id,marker:tempMarker})
    }

    

    function addTableRow(data){
        var btn = "<button id='marker'"+data.id+" value='Show' onclick='showMarker(event)>Show</button>"
        table.row.add([data.id,data.against,data.type,data.date,data.reporter_name,data.reporter_contact,data.reporter_address,data.latitude,data.longitude,data.status,"<button class='btn btn-primary' id='marker"+data.id+"' value='Show' onclick='showMarker(event)'>Show</button>"]).draw(false);
    } 
    
    

    
    showCrimes();
    
    function showCrimes(){
        var something;
        $.ajax({ 
            method: "GET", 
            url: "https://recas-api.vercel.app/getAllCrimes",
            dataType:"json"
            }).done(function( data ) { 
                var tableData = data;

                dataAll = [];
                table.clear().draw()
                for(var i = 0 ; i < Object.keys(tableData.data).length ; i++){
                    //console.log(tableData.data[i])
                    something = tableData.data[i];
                    dataAll.push(tableData.data[i]);
                    makeMarker(tableData.data[i],markersLayer);
                    addTableRow(something);
                }
                //console.log(markerData)
            });


    }



    function reportCrime(){

            var ctype;
            if($('#fhuman').val() == 'null'){
                ctype = $('#fprop').val()
            }else{
                ctype = $('#fhuman').val()
            }

            console.log($('#choice').val())
            console.log(ctype)

            var postForm = { //Fetch form data
                'reporter_name'     : $('#name').val(),
                'reporter_contact'     : $('#contact').val(),
                'reporter_address'     : $('#address').val(),
                'report_details'     : $('#details').val(),
                'latitude'     : $('#la').val(),
                'longitude'     : $('#lo').val(),
                'crimeType_id'     :ctype,
                'barangay' :        $("#barangay").val()
            };

            
        $.ajax({ //Process the form using $.ajax()
            method      : 'POST', //Method type
            // url       : 'https://recas-api.vercel.app/reportCrime',
            url       : 'localhost:3000/reportCrime', //Your form processing file URL
            data      : postForm, //Forms name
            dataType  : 'json',
            success   : function(data) {
                alert("Crime reported")
                
            }
            
        });
    }

    function filterCrime(){
        var contact ='null';
        //console.log(contact)

        var ctype;
            if($('#searchFcase').val() == ''){
                ctype = $('#searchPcase').val()
            }else{
                ctype = $('#searchFcase').val()
            }

        var postForm = { //Fetch form data
                'choice'     :          $("#searchchoice").val(),
                'crimecase'     :       ctype,
                'status'     :          $("#searchstatus").val(),
                'searchbarangay'     :  $("#searchbarangay").val(),
                'contact'     :         $("#searchcontact").val(),
                'from'     :            $("#searchfrom").val(),
                'to'     :              $("#searchto").val()
                // 'choice'     :          $("#searchchoice").val(),
                // 'crimecase'     :       null,
                // 'status'     :          null,
                // 'searchbarangay'     :  null,
                // 'contact'     :         null,
                // 'from'     :            $("#searchfrom").val(),
                // 'to'     :              $("#searchto").val()
            };
            console.log(postForm)

        $.ajax({ //Process the form using $.ajax()
            method      : 'POST', //Method type
            url       : 'https://recas-api.vercel.app/searchCrime',
            //url       : 'localhost:3000/reportCrime', //Your form processing file URL
            data      : postForm, //Forms name
            dataType  : 'json',
            success   : function(data) {
                for(var i = 0 ; i < Object.keys(data.data).length ; i++){
                    console.log(data)
                    makeMarker(data.data[i],markersLayer);
                }
            }
            
        });
    }
        
     
});

        
</script>


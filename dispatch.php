<html>
    <head>
        <script src="./resources/jquery-3.6.0.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.1.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <a class="nav-link active" aria-current="page" href="reporter.php">Home</a>
        				</li>
                        <a class="nav-link active" aria-current="page" href="dispatch.php">Dispatch</a>
      				</ul>
                        <a href="logout.php" id="signO" class="btn btn-danger">Sign Out</a>
    			</div>
  			</div>
		</nav><br>
        

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Dispatch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success" role="alert" style="visibility:hidden">
            </div>
            <div class="mb-3 row">
                <label class="form-label">Longitude and Latitude</label>
                <div class="col-sm-6">
                    <input type="hidden" id="edit_disp_id">
                    <input id="edit_long" class="lo form-control" type="text" name="longitude"placeholder="Longitude" disabled="">
                </div>
                <div class="col-sm-6">
                    <input id="edit_lat" class="la form-control" type="text" name="latitude" placeholder="Latitude" disabled="">
                </div>
            </div>
            <div class="mb-3">
                <label for="edit_unit" class="form-label">Unit No</label>
                <input class="form-control" id="edit_unit" type="text" name="unit" placeholder="Enter Unit No">
            </div>
            <div class="mb-3">
                <label for="edit_date" class="form-label">Date</label>
                <input class="form-control" id="edit_date" type="date" name="date"></input>
            </div>
            <div class="mb-3">
                <label for="edit_details" class="form-label">Details</label>
                <textarea class="form-control" id="edit_details" type="text" name="details" placeholder="Enter Details"></textarea>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit_dispatch">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <div class = "container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card bg-light">
                        <div class="card-header bg-primary text-white">Dispatch</div>
                    <div class="card-body">
                            <div class="mb-3 row">
                                <label class="form-label">Longitude and Latitude </label>
                                <div class="col-sm-6">
                                    <input id="lat" class="lo form-control" type="text" name="longitude"placeholder="Longitude" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <input id="long" class="la form-control" type="text" name="latitude" placeholder="Latitude" disabled="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit No</label>
                                <input class="form-control" id="unit" type="text" name="unit" placeholder="Enter Unit No">
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Date</label>
                                <input class="form-control" id="date" class="datepicker" type="date" name="date"></input>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Details</label>
                                <textarea class="form-control" id="details" class="details" type="text" name="details" placeholder="Enter Details"></textarea>
                            </div>
                            <button class="btn btn-success form-control" id="submit_dispatch">Submit</button>
                    </div>
                </div>
            </div>
                <div class="col-sm-6">
                    <div id="mapid"></div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="rmvmarker"type="button" class="btn btn-warning" style="margin:10px;"><i class="fa fa-close"></i> Current Marker</button>
                        <button id="rmvAllMarkers"type="button" class="btn btn-danger"><i class="fa fa-close"></i> All Markers</button>
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
                                <option value="0">Against Person</option>
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
                                <option value="brgy1">brgy1</option>
                                <option value="brgy2">brgy2</option>
                                <option value="brgy3">brgy3</option>
                                <option value="brgy4">brgy4</option>
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
            <br/>

            <div class="card">
                <div class="card-header bg-primary text-white" style="font-size:25px">
                    Dispatch
                    <button id="tableToMap"type="button" class="btn btn-secondary" style="float:right">Show all on map</button>
                </div>
                
                <div class="card-body">
                <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Dispatch ID</th>
                        <th>Unit #</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody> 
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>

    </html>

<script>
    var singleDatas = []

    function showMarker(iden){
        //console.log(iden.getAttribute("lat"))
        var data={
            id: iden.getAttribute("id"),
            latitude: iden.getAttribute("lat"),
            longitude: iden.getAttribute("long")
        }
        console.log(data)
        makeMarker(data,tableMarkerLayer)
        window.scrollTo(0, 80);

        setTimeout(function() {
            goView(data);

        }, 1000);
    }

    function makeMarker(data,usedLayer){
        //console.log(data.latitude)
        var flag = 0;
        console.log(data)

        singleDatas.forEach((elem)=>{
            if(elem.id == data.dispatch_id){
                console.log("naa?")
                flag = 1; 
                //break;
            }
            })
    
        if(flag == 0 ){
            var html = "<button class='markerRemove btn btn-danger' id='marker"+data.dispatch_id+"' value='Remove' onclick='removeMarker(event)'>Remove</button><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editCrimeModal'>Edit</button>";
            var tempMarker = L.circleMarker([data.latitude,data.longitude],{
          color: "red",
          fillColor: "#f03",
          fillOpacity: 0.5,
          radius: 15.0
      }).addTo(usedLayer).bindPopup(html);
            usedLayer.addTo(map); 
            singleDatas.push({id:data.dispatch_id,marker:tempMarker})
        }

        
    }

    var table = $('#table_id').DataTable();
    // table.columns([7,8]).visible(false); 
    // table.columns([0]).visible(false);   

    var dataAll = [];
    var filteredRows;
    var markersLayer = new L.LayerGroup();
    var tableMarkerLayer = new L.LayerGroup();

    var map = L.map('mapid').setView([10.3157, 123.8854], 14);
    
    function removeMarker(e){
        singleDatas.forEach((data,index)=>{
            if("marker"+data.id == e.target.id){
                map.removeLayer(data.marker)
                singleDatas.splice(index,1)
            }
        })
    }
    
    function goView(data){   
      //weird but cool event
      
      setTimeout(function() {
        map.setView(L.latLng(map.getCenter()),16)

        }, 700);

        map.setView([data.latitude,data.longitude],14);
        //map.setView([data.latitude,data.longitude],14);
    }

    function formatDate(date) {
     var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [year, month, day].join('-');
 }


    function getDispatchData(disp_id){

        var element = document.getElementsByClassName('alert');
        element[0].style.visibility = 'hidden';

        $.ajax({ 
            method: "post", 
            url: "http://localhost:3000/getDispatch",
            headers: {
                'Access-Control-Allow-Headers': 'Content-Type',
                'Access-Control-Allow-Methods': '*',
                'Access-Control-Allow-Origin': '*'
            },
            data: {
                disp_id : disp_id
            },
            dataType:"json"
            }).done(function( data ) { 
                // console.log(data.data[0].longitude);
                document.getElementById('edit_disp_id').value = data.data[0].dispatch_id;
                document.getElementById('edit_long').value = data.data[0].longitude;
                document.getElementById('edit_lat').value = data.data[0].latitude;
                document.getElementById('edit_unit').value = data.data[0].unit_no;
                document.getElementById('edit_date').value = formatDate(data.data[0].date);
                document.getElementById('edit_details').value = data.data[0].details;
            });
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
                $("#long").val(result.latlng.lng);
                $("#lat").val(result.latlng.lat);

                alert(result.latlng)
                marker = L.circleMarker(result.latlng,{
          color: "yellow",
          fillColor: "#ffd966",
          fillOpacity: 0.5,
          radius: 15.0
      }).addTo(markersLayer).bindPopup(result.address.Match_addr).openPopup();

                markersLayer.addTo(map); 

                marker.on("dragend",function(e){
                

                var changedPos = e.target.getLatLng();
                    geocodeService.reverse().latlng(changedPos).run(function (error, result) {
                        $("#long").val(changedPos.lng);
                        $("#lat").val(changedPos.lat);
                        e.target.setPopupContent(result.address.Match_addr).openPopup();
                    })
                });
            });
        }
    });

    // $("#filterbtn").click(function(){
    //     filterCrime();
    // })

    $("#rmvmarker").click(function(){
        deleteMarker();
    })

    $("#tableToMap").click(function(){
        selectOnlyFiltered();
    })

    $("#rmvAllMarkers").click(function(){
        markersLayer.clearLayers();
        tableMarkerLayer.clearLayers();
        $("#long").val(null);
        $("#lat").val(null);
        marker = null;
        singleDatas = [];
    })

    

    function selectOnlyFiltered(){
        var tempData= {
            dispatch_id: 1000,
            latitude:  0,
            longitude:  0
        }

        filteredRows = table.rows({filter: 'applied'});
        //console.log(filteredRows.data()[0])
        for(var i = 0 ; i < filteredRows.data().length ; i ++){
             //console.log(filteredRows.data()[i][0])
             //console.log(filteredRows.data()[i][7])
            tempData.dispatch_id = "marker"+filteredRows.data()[i][0];
            
            tempData.longitude = filteredRows.data()[i][4];
            tempData.latitude = filteredRows.data()[i][5];
            //console.log(filteredRows.data()[i][4]+"-"+filteredRows.data()[i][5]+"select filtered")
            makeMarker(tempData,markersLayer)
        }
        
    }

    function deleteMarker(){
        map.removeLayer(marker);
        $("#lo").val(null);
        $("#la").val(null);
        marker= null;

    }

    function addTableRow(data){
        //var btn = "<button id='marker'"+data.id+" value='Show' onclick='showMarker(event)>Show</button>"
        // console.log(data.date)
        table.row.add([data.dispatch_id,data.unit_no,formatDate(data.date),data.details,data.longitude,data.latitude,"<button class='btn btn-primary' long='"+data.longitude+"' lat='"+data.latitude+"' id='marker"+data.id+"' value='Show' onclick='showMarker(this)'>Show</button><a data-id="+data.dispatch_id+" class='btn btn-primary' data-bs-toggle='modal' id='edit-modal' data-bs-target='#editModal' onclick='getDispatchData("+data.dispatch_id+")'>Edit</a>"]).draw(false);
    } 


    function formatDate(date) {
     var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [year, month, day].join('-');
 }

    
    showDispatchData();
    
    function showDispatchData(){
        var something; 

        $.ajax({ 
            method: "GET", 
            url: "https://recas-api.vercel.app/showDispatch",
            headers: {
                'Access-Control-Allow-Headers': 'Content-Type',
                'Access-Control-Allow-Methods': '*',
                'Access-Control-Allow-Origin': '*'
            },
            dataType:"json"
            }).done(function( data ) { 
                //console.log("==="+data);
                var tableData = data;

               
                //table.clear().draw()
                for(var i = 0 ; i < Object.keys(tableData.data).length ; i++){
                    //console.log(tableData.data[i].longitude+"show dispatch"+tableData.data[i].latitude)
                    something = tableData.data[i];
                   
                    makeMarker(tableData.data[i],markersLayer);
                    addTableRow(something);
                }
            });
    }



    $('#submit_dispatch').on('click', function(){

            var postForm = { //Fetch form data
                'latitude'     : $('#lat').val(),
                'longitude' : $('#long').val(),
                'unit_no': $('#unit').val(),
                'date' : $('#date').val(),
                'details': $('#details').val()
            };

            
        $.ajax({ //Process the form using $.ajax()
            method      : 'POST', //Method type
            url       : 'https://recas-api.vercel.app/addDispatch',
            //url       : 'localhost:3000/reportCrime',
            headers: {
                'Access-Control-Allow-Headers': 'Content-Type',
                'Access-Control-Allow-Methods': '*',
                'Access-Control-Allow-Origin': '*'
            },
            data      : postForm, //Forms name
            dataType  : 'json',
            success   : function(data) {
                console.log(data);
                marker.setStyle({
                    color: "red",
          fillColor: "#f03",
          fillOpacity: 0.5,
          radius: 15.0
                })
            }
            
        });
    }); 

    $('#edit_dispatch').on('click', function(){

        var postForm = { //Fetch form data
            'disp_id': $('#edit_disp_id').val(),
            'latitude'     : $('#edit_lat').val(),
            'longitude' : $('#edit_long').val(),
            'unit_no': $('#edit_unit').val(),
            'date' : $('#edit_date').val(),
            'details': $('#edit_details').val()
        };


        $.ajax({ //Process the form using $.ajax()
        method      : 'POST', //Method type
        url       : 'https://recas-api.vercel.app/editDispatch',
        //url       : 'localhost:3000/reportCrime',
        headers: {
            'Access-Control-Allow-Headers': 'Content-Type',
            'Access-Control-Allow-Methods': '*',
            'Access-Control-Allow-Origin': '*'
        },
        data      : postForm, //Forms name
        dataType  : 'json',
        success   : function(data) {
            console.log(data);
            $('.alert').append('<span>'+data+'</span>');
            $('.alert').css('visibility', 'visible');
        }

        });
    }); 
     
});

        
</script>


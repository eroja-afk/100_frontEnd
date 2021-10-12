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

        <div class = "container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card bg-light">
                        <div class="card-header bg-primary text-white">Dispatch</div>
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
                            <button class="btn btn-success form-control" id="submitCrime">Submit</button>
                    </div>
                </div>
            </div>
                <div class="col-sm-8">
                    <div id="mapid"></div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="rmvmarker"type="button" class="btn btn-warning" style="margin:10px;"><i class="fa fa-close"></i> Current Marker</button>
                        <button id="rmvAllMarkers"type="button" class="btn btn-danger"><i class="fa fa-close"></i> All Markers</button>
                       
                    </div>
                </div>
            </div>

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
    var table = $('#table_id').DataTable();
    table.columns([7,8]).visible(false); 
    table.columns([0]).visible(false);   

//     var dataAll = [];
//     var filteredRows;
//     var markersLayer = new L.LayerGroup();
//     var tableMarkerLayer = new L.LayerGroup();
//     var singleDatas = [];

//     var map = L.map('mapid').setView([10.3157, 123.8854], 14);
//     $('.datepicker').datepicker();
    
// function showChoice(choice){
//     if(choice == "Human"){
//         $("#fhuman").show();
//         $("#fprop").hide();
//     }else if(choice == "Property"){
//         $("#fprop").show();
//         $("#fhuman").hide();
//     }else{
//         $("#fhuman").hide();
//         $("#fprop").hide();
//     }
// }
//     function removeMarker(e){
//         singleDatas.forEach((data)=>{
//             if("marker"+data.id == e.target.id){
//                 map.removeLayer(data.marker)
//             }
//         })
//     }
//     function showMarker(iden){
//         //console.log(iden.getAttribute("lat"))
//         var data={
//             id: iden.getAttribute("id"),
//             latitude: iden.getAttribute("lat"),
//             longitude: iden.getAttribute("lng")
//         }
        
//         makeMarker(data,tableMarkerLayer)
//         window.scrollTo(0, 80);

//         setTimeout(function() {
//             goView(data);

//         }, 1000);
//     }

//     function makeMarker(data,usedLayer){
//         //console.log(data.latitude)
//         var flag = 0;

//         singleDatas.forEach((elem)=>{
//             if(elem.id == data.id){
//                 flag = 1; 
//                 //break;
//             }
//         })

//         if(flag == 0 ){
//             var html = "<button class='markerRemove btn btn-danger' id='marker"+data.id+"' value='Remove' onclick='removeMarker(event)'>Remove</button><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editCrimeModal'>Edit</button>";
//             var tempMarker = L.marker([data.latitude,data.longitude]).addTo(usedLayer).bindPopup(html);
//             usedLayer.addTo(map); 
//             singleDatas.push({id:data.id,marker:tempMarker})
//         }

        
//     }
//     function goView(data){   
//       //weird but cool event
      
//       setTimeout(function() {
//         map.setView(L.latLng(map.getCenter()),16)

//         }, 700);

//         map.setView([data.latitude,data.longitude],14);
//         //map.setView([data.latitude,data.longitude],14);
//     }

// function showSearchChoice(choice){
//     if(choice == "0"){
//         $("#searchFcase").show();
//         $("#searchPcase").hide();
//     }else if(choice == "1"){
//         $("#searchPcase").show();
//         $("#searchFcase").hide();
//     }else{
//         $("#searchFcase").hide();
//         $("#searchPcase").hide();
//     }
// }

// $( document ).ready(function() { 
    
    
    

//     var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//         });
//     osm.addTo(map);
        
//     var geocodeService = L.esri.Geocoding.geocodeService();
//     var longitude;
//     var latitude;
//     var marker = null;


//     map.on('click', function (e) {
//         if(marker == null){
//             geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
//                 if (error) {
//                     return;
//                 }
//                 $("#lo").val(result.latlng.lng);
//                 $("#la").val(result.latlng.lat);

//                 alert(result.latlng)
//                 marker = L.marker(result.latlng,{draggable:"true"}).addTo(markersLayer).bindPopup(result.address.Match_addr).openPopup();

//                 markersLayer.addTo(map); 

//                 marker.on("dragend",function(e){
                

//                 var changedPos = e.target.getLatLng();
//                     geocodeService.reverse().latlng(changedPos).run(function (error, result) {
//                         $("#lo").val(changedPos.lng);
//                         $("#la").val(changedPos.lat);
//                         e.target.setPopupContent(result.address.Match_addr).openPopup();
//                     })
//                 });
//             });
//         }
//     });

//     $("#filterbtn").click(function(){
//         filterCrime();
//     })

//     $("#rmvmarker").click(function(){
//         deleteMarker();
//     })

//     $("#tableToMap").click(function(){
//         selectOnlyFiltered();
//     })

//     $("#rmvAllMarkers").click(function(){
//         markersLayer.clearLayers();
//         tableMarkerLayer.clearLayers();
//         $("#lo").val(null);
//         $("#la").val(null);
//         marker = null;
//         singleDatas = []
//     })

//     $("#submitCrime").click(function(){

//         if($('#name').val() != "" || $('#contact').val() != "" || $('#address').val() != "" || $('#details').val() != "" || $('#fhuman').val() != "" || $('#fprop').val() != ""){
//             reportCrime();
//         }else{
//             alert("please fill out fields")
//         }

//     })
    

//     $("#fhuman").hide();
//     $("#fprop").hide();
//     $("#searchFcase").hide();
//     $("#searchPcase").hide();

    

//     function selectOnlyFiltered(){
//         var tempData= {
//             id: 1000,
//             latitude:  0,
//             longitude:  0
//         }

//         filteredRows = table.rows({filter: 'applied'});
//         //console.log(filteredRows.data()[0])
//         for(var i = 0 ; i < filteredRows.data().length ; i ++){
//             // console.log(filteredRows.data()[i][6])
//             // console.log(filteredRows.data()[i][7])
//             tempData.id = filteredRows.data()[i][0];
//             tempData.latitude = filteredRows.data()[i][7];
//             tempData.longitude = filteredRows.data()[i][8];
//             makeMarker(tempData,markersLayer)
//         }
        
//     }

//     function deleteMarker(){
//         map.removeLayer(marker);
//         $("#lo").val(null);
//         $("#la").val(null);
//         marker= null;
        
//     }
    

    

    

//     function addTableRow(data){
//         //var btn = "<button id='marker'"+data.id+" value='Show' onclick='showMarker(event)>Show</button>"
//         console.log(data.date)
//         table.row.add([data.id,data.against,data.type,formatDate(data.date),data.reporter_name,data.reporter_contact,data.reporter_address,data.latitude,data.longitude,data.status,"<button class='btn btn-primary' lng='"+data.longitude+"' lat='"+data.latitude+"' id='marker"+data.id+"' value='Show' onclick='showMarker(this)'>Show</button>"]).draw(false);
//     } 
    
//     function formatDate(date) {
//      var d = new Date(date),
//          month = '' + (d.getMonth() + 1),
//          day = '' + d.getDate(),
//          year = d.getFullYear();

//      if (month.length < 2) month = '0' + month;
//      if (day.length < 2) day = '0' + day;

//      return [year, month, day].join('-');
//  }

    
    
    

    
//     showCrimes();
    
//     function showCrimes(){
//         var something;
//         $.ajax({ 
//             method: "GET", 
//             url: "https://recas-api.vercel.app/getAllCrimes",
//             headers: {
//                 'Access-Control-Allow-Headers': 'Content-Type',
//                 'Access-Control-Allow-Methods': '*',
//                 'Access-Control-Allow-Origin': '*'
//             },
//             dataType:"json"
//             }).done(function( data ) { 
//                 var tableData = data;

//                 dataAll = [];
//                 table.clear().draw()
//                 for(var i = 0 ; i < Object.keys(tableData.data).length ; i++){
//                     //console.log(tableData.data[i])
//                     something = tableData.data[i];
//                     dataAll.push(tableData.data[i]);
//                     makeMarker(tableData.data[i],markersLayer);
//                     addTableRow(something);
//                 }
//                 //console.log(markerData)
//             });


//     }



//     function reportCrime(){

//             var ctype;
//             if($('#fhuman').val() == 'null'){
//                 ctype = $('#fprop').val()
//             }else{
//                 ctype = $('#fhuman').val()
//             }

//             //console.log($('#choice').val())
//             //console.log(ctype)

//             var postForm = { //Fetch form data
//                 'reporter_name'     : $('#name').val(),
//                 'reporter_contact'     : $('#contact').val(),
//                 'reporter_address'     : $('#address').val(),
//                 'report_details'     : $('#details').val(),
//                 'latitude'     : $('#la').val(),
//                 'longitude'     : $('#lo').val(),
//                 'crimeType_id'     :ctype,
//                 'barangay' :        $("#barangay").val()
//             };

            
//         $.ajax({ //Process the form using $.ajax()
//             method      : 'POST', //Method type
//             url       : 'https://recas-api.vercel.app/reportCrime',
//             //url       : 'localhost:3000/reportCrime',
//             headers: {
//                 'Access-Control-Allow-Headers': 'Content-Type',
//                 'Access-Control-Allow-Methods': '*',
//                 'Access-Control-Allow-Origin': '*'
//             },
//             data      : postForm, //Forms name
//             dataType  : 'json',
//             success   : function(data) {
//                 alert("Crime reported")
                
//             }
            
//         });
//     }

//     function filterCrime(){
//         var contact ='null';
//         //console.log(contact)

//         var ctype;
//             if($('#searchFcase').val() == ''){
//                 ctype = $('#searchPcase').val()
//             }else{
//                 ctype = $('#searchFcase').val()
//             }

//         var postForm = { //Fetch form data
//                 'choice'     :          $("#searchchoice").val(),
//                 'crimecase'     :       ctype,
//                 'status'     :          $("#searchstatus").val(),
//                 'searchbarangay'     :  $("#searchbarangay").val(),
//                 'contact'     :         $("#searchcontact").val(),
//                 'from'     :            $("#searchfrom").val(),
//                 'to'     :              $("#searchto").val()
//                 // 'choice'     :          $("#searchchoice").val(),
//                 // 'crimecase'     :       null,
//                 // 'status'     :          null,
//                 // 'searchbarangay'     :  null,
//                 // 'contact'     :         null,
//                 // 'from'     :            $("#searchfrom").val(),
//                 // 'to'     :              $("#searchto").val()
//             };
//             //console.log(postForm)

//         $.ajax({ //Process the form using $.ajax()
//             method      : 'POST', //Method type
//             url       : 'https://recas-api.vercel.app/searchCrime',
//             headers: {
//                 'Access-Control-Allow-Headers': 'Content-Type',
//                 'Access-Control-Allow-Methods': '*',
//                 'Access-Control-Allow-Origin': '*'
//             },
//             //url       : 'localhost:3000/reportCrime', //Your form processing file URL
//             data      : postForm, //Forms name
//             dataType  : 'json',
//             success   : function(data) {
//                 for(var i = 0 ; i < Object.keys(data.data).length ; i++){
//                     //console.log(data)
//                     makeMarker(data.data[i],markersLayer);
//                 }
//             }
            
//         });
//     }
        
     
// });

        
</script>


<html>
    <head>
        <link rel="stylesheet" href="./resources/leaflet/leaflet.css" />
        <link rel="stylesheet" href="splash.css" />
        <script src="./resources/leaflet/leaflet.js"></script>
        <script src="./resources/jquery-3.6.0.min.js"></script>
        <title>
            Stat Map
        </title>
    </head>
    <body>
        <div id="mapid"></div>
        <div>
            <form >
                <span>Latitude</span>
                <input type="text" id="lat">
                <span>Longitude</span>
                <input type="text" id="long">

                <select name="category" id="cate">
                    <option value="crimes">Crimes</option>
                    <option value="events">Events</option>
                </select>

                </br>
                <span>Name</span>
                <input type="text" id="name">

                <select name="status" id="status">
                    <option value="ongoing">Ongoing</option>
                    <option value="finished">Finished</option>
                </select>

                <span>Description</span>
                <input type="text" id="desc">


                <input type="submit" id="markerbtn" value="Place Marker">
            </form>
        </div>
        <button id="clickme">Click ME!</button>
        <div id='appendhere'></div>
    </body>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        $( document ).ready(function() {
            var marker;
            var mymap;

        function makeMarker(lati,longi,name,stat,desc){
           
            console.log(lati+"dsd"+longi)
            marker = L.marker([lati, longi],{
                'name':name,
                'status':stat,
                'description':desc
            }).addTo(mymap);
        }

        function refreshMap(){
            
            //marker.clearLayers();
            var markerData;

            $.ajax({ 
            method: "GET", 
            url: "getMarkers.php"
            }).done(function( data ) { 
                markerData= $.parseJSON(data); 
                for(var i = 0 ; i < markerData.length ; i++){
                    makeMarker(markerData[i].latitude , markerData[i].longitude ,markerData[i].name , markerData[i].status , markerData[i].description);
                }
                //console.log(markerData)
            });

        }
        refreshMap();
        
        
        mymap = L.map('mapid').setView([7.7286, -236.9407], 14);
        var buugMap= L.tileLayer('Buug/{z}/{x}/{y}.png', {
            maxZoom: 16,
            tileSize: 256,
            id: 'maptile',
        }).addTo(mymap);

        $('#markerbtn').click(function(){
            var lat= $('#lat').val();
            var long= $('#long').val();

            var postForm = { //Fetch form data
            'name'     : $('#name').val(),
            'status'     : $('#status').val(),
            'description'     : $('#desc').val(),
            'latitude'     : $('#lat').val(),
            'longitude'     : $('#long').val()
            };

            $.ajax({ //Process the form using $.ajax()
                type      : 'POST', //Method type
                url       : 'marker.php', //Your form processing file URL
                data      : postForm, //Forms name
                dataType  : 'json',
                success   : function(data) {
                                if (data == 0) { //If fails
                                    //console.log("asd")
                                    alert("success"); 
                                }
                                else {
                                    alert("failed");
                                }
                            }
            });
            event.preventDefault(); //Prevent the default submit

           refreshMap();


        })

        $('#clickme').click(function(){
            var lat= $('#clickme').val();

            $.ajax({ //Process the form using $.ajax()
                type      : 'POST', //Method type
                url       : 'http://localhost:3000/pusher', //Your form processing file URL
                data      : lat, //Forms name
                dataType  : 'json',
                success   : function(data) {
                                console.log(data);
                            }
            });

        })

        Pusher.logToConsole = true;

        var pusher = new Pusher('cb4b3192ce43653d8642', {
        cluster: 'ap1'
        });


            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                $('#appendhere').append('<p>'+data.message+'Your coordinate is: Lat:'+ data.lat +'Long:'+ data.long +' Accuracy:'+ data.accuracy+'</p>');
            });

    });

        
    </script>
</html>

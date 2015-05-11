<!DOCTYPE html>

<html lang="es">

<head>
<!--// dibujar poligonos http://www.birdtheme.org/useful/v3tool.html-->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Georreferenciación Municipios de Caldas</title>

    <style type="text/css">
    
    #message
    {
        color: red;
        text-align: center;
    }
    
    #data
    {
        width: 600px;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-bottom: 10px;
        text-align: center;
        border: 2px solid orange;
    }
    
   #location
    {
        width: 400px;
    }
    
    #map
    {
        width: 600px; 
        height: 500px;
    }
    
    </style>


  <script type="text/javascript" src="lib/googleMaps.js?key=AIzaSyBY6UaYRhynH2rykKFYM_mLvKJ5kje5GxE&sensor=FALSE"></script> 
  <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>  -->
   <!--mapa de color  -->

  <!--<script type="text/javascript"
	  src="https://maps.googleapis.com/maps/api/js?libraries=visualization&sensor=true_or_false">
  </script>-->
  
 <!-- <script type="text/javascript" src="lib/heatMap.js"></script>  -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js" type="text/javascript"></script>
  <script type="text/javascript"> 
  
    
    /**
     * The Google Geocoding API: http://code.google.com/apis/maps/documentation/geocoding/index.html
     * Geocoding service: http://code.google.com/apis/maps/documentation/javascript/services.html#Geocoding
     */

    // Variables globales

    var map, geocoder;

    // Instancia del geocodificador

    geocoder = new google.maps.Geocoder();


    // Propiedades iniciales del mapa


    window.onload = function() {
        var options = {
            zoom: 5,
			//minZoom: 5,
			minZoom: 5,
            center: new google.maps.LatLng(4, -72),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };


  
        // Instancia del mapa

     map = new google.maps.Map(document.getElementById('map'), options);
     



		
		 
	//marcar a manizales
	/*
	var ubi= new google.maps.LatLng(5.067979999999999, -75.51738);
	var marker=new google.maps.Marker({
		position:ubi
		//  animation:google.maps.Animation.BOUNCE
	});
	marker.setMap(map);
	*/
	
	//popup de informacion de manizales
	/*var infowindow = new google.maps.InfoWindow({
	  content:"aqui esta Manizales"
	 });
	 */
	//al hacer click se abre
		
					
	//Funcion que escribe el input text
	function viewLatLng(lat,lng){
			var inpLat = document.getElementById("latitud");
			var inpLng = document.getElementById("longitud");
			
			inpLat.value= lat;
			inpLng.value= lng;
		}
	
		
	
	// mapa de colores
/*	
	for (var i=0; i<=((myCoordinates.length)-1); i++){
		var heatmap = new google.maps.visualization.HeatmapLayer({
		  data: myCoordinates[i]
		});
		heatmap.setMap(map);
	 }
*/
	///	
		
		
		//boton búsqueda}

        document.getElementById('search').onclick = function() {
            // Obtiene la ubicación (string) a georreferenciar
            
            var location = document.getElementById('location').value;

            // Inicia el proceso de georreferenciación (asíncrono)

            processGeocoding(location, addMarkers);

            // Detiene el procesamiento del evento

            return false;
        }        
    }

    /**
     * Georreferenciar una ubicación geográfica
     *
     * @param   location    Ubicación geográfica
     * @param   callback    Función a ejecutarse después de una georrefereciación exitosa
     */

    function processGeocoding(location, callback)
    {
        // Propiedades de la georreferenciación
        
        var request = {
            address: location
        }
        
        // Invocación a la georreferenciación (proceso asíncrono)
        
        geocoder.geocode(request, function(results, status) {
            
            /*
             * OK
             * ZERO_RESULTS
             * OVER_QUERY_LIMIT
             * REQUEST_DENIED
             * INVALID_REQUEST 
             */

            // Notifica al usuario el resultado obtenido

            document.getElementById('message').innerHTML = "Respuesta obtenida: " + status;

            // En caso de terminarse exitosamente el proyecto ...

            if(status == google.maps.GeocoderStatus.OK)
            {
                // Invoca la función de callback
                
                callback (results);
                
                // Retorna los resultados obtenidos
                
                return results;
            }
                
            // En caso de error retorna el estado
                
            return status;
        });
    }
    
    /**
     * Agregar las ubicaciones georreferenciadas al mapa (marcadores)
     *
     * @param   geocodes    Listado de ubicaciones georreferenciadas
     */

    function addMarkers(geocodes)
    {
        for(i=0; i<geocodes.length; i++)
        {
            // Centra el mapa en la nueva ubicación
            
            map.setCenter(geocodes[i].geometry.location);

            // Valores iniciales del marcador

            var marker = new google.maps.Marker({
                map: map,
                title: geocodes[i].formatted_address
            });
            
            // Establece la ubicación del marcador

            marker.setPosition(geocodes[i].geometry.location);
            
            // Establece el contenido de la ventana de información
            
            var infoWindow = new google.maps.InfoWindow();

            content = "Ubicación: " + geocodes[i].formatted_address + "<br />" +
                             "Tipo: " + geocodes[i].types + "<br />" +
                             "Latitud: " + geocodes[i].geometry.location.lat() + "<br />" +
                             "Longitud: " + geocodes[i].geometry.location.lng();
            
            infoWindow.setContent(content);

            // Asocia el evento de clic sobre el marcador con el despliegue
            // de la ventana de información

            google.maps.event.addListener(marker, 'click', function(event) {
                infoWindow.open(map, marker);
            });
		
            // infowindow.open(map, marker);
			
			//mostrar la longitud y latitud
			
			 
			
			
        }
    }
	
	var contador_municipio=-1;
	var municipio= new Array();
	var array_Caja= new Array();

	
	$(document).ready(function() {
		

		// The event listener for the file upload
		document.getElementById('txtFileUpload').addEventListener('change', upload, false);
		document.getElementById('txtFileUpload').addEventListener('click', function(){
		contador_municipio+=1;
					
	});


	// Method that checks that the browser supports the HTML5 File API
	function browserSupportFileUpload() {
		var isCompatible = false;
		if (window.File && window.FileReader && window.FileList && window.Blob) {
			isCompatible = true;
		}

		return isCompatible;
	};

		function upload(evt) {
			if (!browserSupportFileUpload()) {
				alert('The File APIs are not fully supported in this browser!');
			} else {
				var data = null;
				var file = evt.target.files[0];
				var reader = new FileReader();
				reader.readAsText(file);
				reader.onload = function(event) {
						var csvData = event.target.result;
						data = $.csv.toArrays(csvData);
						if (data && data.length > 0) {
							var concatena_Coordenadas_Mun="";
							vector_Coordenadas_Mun= new Array();
							vector_Coordenadas_lat= new Array();
							vector_Coordenadas_long= new Array();
					 
							
							  for (a=0; a<=((data.length)-1); a++){
								   
								  vector_Coordenadas_lat.push((((data[a][0]))));
								  vector_Coordenadas_long.push((((data[a][1]))));
								  if(a==0 || a==1 || a==2){
									 continue;
								 }
								  vector_Coordenadas_Mun.push(new google.maps.LatLng(vector_Coordenadas_lat[a], vector_Coordenadas_long[a]));
							
							  }
								
			
							municipio[contador_municipio]= vector_Coordenadas_Mun ;
							array_Caja.push( { contenido: data[2][0] } );
							var polyOptions = {
							path: municipio[contador_municipio],        //recibe un vector, en cada posicion hay un vector dentro de otro vector
							strokeColor: data[0][0],
							strokeOpacity: 0.1,
							strokeWeight: 1,
							fillColor: data[1][0],
							fillOpacity: 0.1,
							}
							var it = new google.maps.Polygon(polyOptions);
							it.setMap(map);
						
		
		

			 var infowindow = new google.maps.InfoWindow();
			for (var i=0; i<=((municipio.length)-1); i++){
				
				google.maps.event.addListener(it, 'click', function (evt) {
					infowindow.setContent("<h2>"+array_Caja[i-1].contenido+"</h2>");
					infowindow.open(map);
					infowindow.setPosition(evt.latLng);

				});
				}
		
						} else {
							alert('No data to import!');
						}
					};
					reader.onerror = function() {
						 alert('Unable to read ' + file.fileName);
					};
			};
		};
	});
	
    </script>
</head>

<body>

<h1>Georreferenciación Municipios de Caldas</h1>

<div id="data">

    <!-- Mensaje de estado -->

    <div id="message"></div>
    
    <!-- Ubicación a georreferenciarse -->
    
    <label for="location">Ubicación:</label>
    <input type="text" id="location" name="location" value="" size="40" />
    
    <!-- Botón para inciar la georreferenciación -->
    
    <input type="button" id="search" name="search" value="Buscar" />
</div>

<!-- Lugar de despliegue del mapa -->

<div id="map"></div>
Latitud: <input type="text" id="latitud" readonly/></br>
Longitud: <input type="text" id="longitud" readonly/>
<?php

?>
</body>
  <h1>Carga de Archivos</h1>
  <p>
	<div id="dvImportSegments" class="fileupload ">
            <fieldset>
                <legend>Select the CSV file to upload</legend>
                <input type="file" name="File Upload" id="txtFileUpload" accept=".csv" />
            </fieldset>
    </div>
  </p>
</html>


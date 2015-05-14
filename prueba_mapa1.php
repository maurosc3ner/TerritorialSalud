<!DOCTYPE html>

<html lang="es">

<head>
<!--// dibujar poligonos http://www.birdtheme.org/useful/v3tool.html
http://www.gadm.org/download
-->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Georreferenciación Municipios de Caldas</title>

    <style type="text/css">
    
	 #tabla_reporte_chikun
    {
       position:absolute;
 top:77px;
 left:644px;
 right:0;
    }
    
	
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


  <!--<script type="text/javascript" src="lib/googleMaps.js?key=AIzaSyBY6UaYRhynH2rykKFYM_mLvKJ5kje5GxE&sensor=FALSE&libraries=visualization"></script> -->
  <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>  -->
   <!--mapa de color  -->
<script type="text/javascript"
  src="lib/heatmaps.js?libraries=visualization&key=AIzaSyBY6UaYRhynH2rykKFYM_mLvKJ5kje5GxE&sensor=false"></script>
  
  
  <script src="lib/jquery.min.js" type="text/javascript"></script>
  <script src="lib/jquery.csv-0.71.min.js" type="text/javascript"></script>
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
	
		
		/*
	var prueba_punto=[
new google.maps.LatLng(5.059792,-75.491803),
new google.maps.LatLng(5.059894,-75.492613),
new google.maps.LatLng(5.059311,-75.493181),
new google.maps.LatLng(5.060124,-75.493171),
new google.maps.LatLng(5.059969,-75.493707),
new google.maps.LatLng(5.059477,-75.493621),
new google.maps.LatLng(5.059343,-75.493369),
new google.maps.LatLng(5.059210,-75.493240),
new google.maps.LatLng(5.059146,-75.493251),
new google.maps.LatLng(5.059215,-75.493396),
new google.maps.LatLng(5.059509,-75.494801),
new google.maps.LatLng(5.061096,-75.495708),
new google.maps.LatLng(5.060754,-75.496067),
new google.maps.LatLng(5.061759,-75.497591),
new google.maps.LatLng(5.069656,-75.522165),
new google.maps.LatLng(5.069710,-75.522160),
new google.maps.LatLng(5.069794,-75.522195),
new google.maps.LatLng(5.069696,-75.522320),
new google.maps.LatLng(5.069712,-75.522467),
new google.maps.LatLng(5.069791,-75.522569),
new google.maps.LatLng(5.069662,-75.522582),
new google.maps.LatLng(5.069712,-75.522781),
new google.maps.LatLng(5.069841,-75.522765),
new google.maps.LatLng(5.069992,-75.522604),
new google.maps.LatLng(5.069137,-75.522962),
new google.maps.LatLng(5.068859,-75.523646),
new google.maps.LatLng(5.069197,-75.524129),
new google.maps.LatLng(5.069293,-75.527444),
new google.maps.LatLng(5.067220,-75.527916),
new google.maps.LatLng(5.069720,-75.529740),
new google.maps.LatLng(5.071494,-75.528796)
	];
	// mapa de colores

	//for (var i=0; i<=((myCoordinates.length)-1); i++){
		var heatmap = new google.maps.visualization.HeatmapLayer({
		  data: prueba_punto
		});
		heatmap.setMap(map);
	 //}

	*/
		
		
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
        for(i=0; i<(geocodes.length)-1; i++)
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
	var array_chikungunya= new Array();
							var it= new Array();
							var objetoMunicipios= new Array();

	
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
								
			
							array_chikungunya.push( data[2][1] );   //contiene el número de casos con chikungunya
							var max=0; //indica el numero maximo sobre el cual se hará la medicion
							for(var i=0;i<=((array_chikungunya.length)-1);i++) {
								if(max < array_chikungunya[i]) 
									max = array_chikungunya[i];
							}
							var color="green";    //segun le numero se da el color
							var chikungunya_numero=((data[2][1])/max)*100;
							if(chikungunya_numero>=75){
								color="red";
							}
							if((chikungunya_numero>=50) && (chikungunya_numero< 75)){
								color="yellow";
							}
							
							if(chikungunya_numero<50){
								color="green";
							}
							
							

							municipio[contador_municipio]= vector_Coordenadas_Mun ;
							array_Caja.push( { contenido: data[2][0] } );
							var polyOptions = {
								path: municipio[contador_municipio],        //recibe un vector, en cada posicion hay un vector dentro de otro vector
								//strokeColor: data[0][0],
								strokeColor: 'black',
								strokeOpacity: 0.3,
								strokeWeight: 1,
								//fillColor: data[1][0],
								fillColor: color,
								fillOpacity: 0.6,
								valorChicungunya: (data[2][1]),
								nombre: (data[2][0])
							}

							it[contador_municipio] = new google.maps.Polygon(polyOptions);
							it[contador_municipio].setMap(map);

							
								for (var i=0; i<((contador_municipio)); i++){
									it[i].setMap(null);
								}
							/*	
								var body = document.getElementsByTagName("body")[0];
								var tabla   = document.createElement("table");
								var tblBody = document.createElement("tbody");
								var th = document.createElement("td");
										var textoCelda = document.createTextNode("Municipio");
										th.appendChild(textoCelda);
										var th = document.createElement("td");
										var textoCelda = document.createTextNode("Casos de Chikungunya");
										th.appendChild(textoCelda);
										
								for (var i=0; i<=((contador_municipio)); i++){
								       var hilera = document.createElement("tr");
									   	
										var celda = document.createElement("td");
										var textoCelda = document.createTextNode("celda en la hilera "+i);
									  
								if(((it[i].valorChicungunya/max)*100)>=75){
									
									it[i].fillColor="red";
								}
								if(((it[i].valorChicungunya/max)*100) && (((it[i].valorChicungunya/max)*100)< 75)){
									it[i].fillColor="yellow";
								}
							
								if(((it[i].valorChicungunya/max)*100)<50){
									it[i].fillColor="green";
								}

												
								it[i].setMap(map);
								     
									      celda.appendChild(textoCelda);
										hilera.appendChild(celda);
								}
				tblBody.appendChild(hilera);									
				tabla.appendChild(tblBody);
				body.appendChild(tabla);
				  tabla.setAttribute("border", "1");
				  */
				  var tabla="<table border='1'><tr><th>Municipios</th><th>Casos de Chikungunya</th><th>Riesgo</th></tr>";
				  for (var i=0; i<=((contador_municipio)); i++){
								      
									  
								if(((it[i].valorChicungunya/max)*100)>=75){
									
									it[i].fillColor="red";
								}
								if(((it[i].valorChicungunya/max)*100) && (((it[i].valorChicungunya/max)*100)< 75)){
									it[i].fillColor="yellow";
								}
							
								if(((it[i].valorChicungunya/max)*100)<50){
									it[i].fillColor="green";
								}

												
								it[i].setMap(map);
							tabla+=	 "<tr><td align='center'>"+it[i].nombre+"</td><td align='center'>"+it[i].valorChicungunya+"</td><td align='center' bgcolor="+"'"+it[i].fillColor+"'"+"</td><tr>";  
									    
								}
							tabla+="</table>";
							document.getElementById('tablas').innerHTML = tabla;
							
						var infowindow = new google.maps.InfoWindow();
						for (var i=0; i<=((municipio.length)-1); i++){
						
							google.maps.event.addListener(it[contador_municipio], 'click', function (evt) {
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
<?php

?>
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
<div id='tabla_reporte_chikun'>
<font id='tablas'></font>
</div>
</body>
  <h1>Carga de Archivos</h1>
  <p>
	<div id="dvImportSegments" class="fileupload ">
            <fieldset>
                <legend>Selecciona CSV a cargar</legend>
                <input type="file" name="File Upload" id="txtFileUpload" accept=".csv"/>
            </fieldset>
    </div>
  </p>
</html>


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


  
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es"></script>
   <!--mapa de color 
   <script type="text/javascript" src="lib/googleMaps.js?key=AIzaSyBY6UaYRhynH2rykKFYM_mLvKJ5kje5GxE&sensor=true&libraries=visualization"></script>
<script type="text/javascript"
  src="lib/heatmaps.js?libraries=visualization&key=AIzaSyBY6UaYRhynH2rykKFYM_mLvKJ5kje5GxE&sensor=false"></script> -->
  	<link rel="stylesheet" type="text/css" href="css/example.css"/>
	<script type="text/javascript" src="lib/sortable.js"></script>

  
  <script src="lib/jquery.min.js" type="text/javascript"></script>
  <script src="lib/jquery.csv-0.71.min.js" type="text/javascript"></script>
  <script type="text/javascript"> 
  function hexadec(yourNumber){
	 var dec=yourNumber.toString();
	    var sub1=dec.substr(0, 3);
		sub1=parseInt(sub1);
		
		//sub1.toString(16)
		
		var sub2=dec.substr(3, 3);
		sub2=parseInt(sub2);
		//sub2.toString(16)

		
		/*var sub3=dec.substr(6, 2);

		sub3=parseInt(sub3);*/
		
//sub3=dec.substring(0, dec.length-2);

		//sub2.toString(16)
//return yourNumber.toString(16);
var hex="#"+sub1.toString(16)+sub2.toString(16)+"00";
//hex=hex.substring(0, hex.length-2);
return 		hex;
//626152704
  }
  
    function decahex(yourNumber){
		hexString = yourNumber.toString(16);
	yourNumber1 = parseInt(hexString, 16);
return 		yourNumber1;
//626152704
  }
  function d2h(d) { return (+d).toString(16); }
  
  //alert(d2h(12523054));
/*
  	var colorhex=(((50-22)/(28)));
		//colorhex=colorhex.toFixed(2);							   	
										alert(colorhex);
colorhex=(colorhex*255);
										alert(colorhex);
*/
// alert ¡hola mundo
  //626152704
//alert(hexadec(25525500));
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
            //center: new google.maps.LatLng(4, -72),
			center: new google.maps.LatLng(5.1573603, -74.982409),

			
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
	
	var contador_municipio=-1;   //variable que indica cuantos municipios se han cargado
	var municipio= new Array(); //vector que contiene los municipios
	var array_Caja= new Array();  //almacena el nombre de los municipios
	var array_chikungunya= new Array();
	var it= new Array();  //contendra a un objeto con opciones para municipios

	
	$(document).ready(function() {

		// The event listener for the file upload

	document.getElementById('txtFileUpload').addEventListener('change', upload, false);

	

	
	

	// Method that checks that the browser supports the HTML5 File API
	function browserSupportFileUpload() {
		var isCompatible = false;
		if (window.File && window.FileReader && window.FileList && window.Blob) {
			isCompatible = true;
		}

		return isCompatible;
	};
			var ValidarExisteMunicipio= new Array();
			
		function upload(evt) {
			var validaExistemunicipio_flag=false;
			//alert(document.getElementById('txtFileUpload').value) ;
					

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
						var v
						for (i=0; i<ValidarExisteMunicipio.length; i++){
							if((data[2][0])==ValidarExisteMunicipio[i]){
							
								validaExistemunicipio_flag=true; //si es true quiere decir que ya existe por lo tanto se omite el resultado
							}
						}
						
					
						
						if (data && data.length > 0 && !validaExistemunicipio_flag ) {
								contador_municipio+=1;
													
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
							var min=0
							for(var i=0;i<=((array_chikungunya.length)-1);i++) {
								if(max < array_chikungunya[i]) 
									max = array_chikungunya[i];
							}
							
							var min=array_chikungunya[0];

							for(var i=0;i<=((array_chikungunya.length)-1);i++) {
								if(min > array_chikungunya[i]) 
									min = array_chikungunya[i];
							}
							
							

							municipio[contador_municipio]= vector_Coordenadas_Mun ; //cada posicion de este vector contien las coordenadas
							array_Caja.push( { contenido: data[2][0] } );
							var polyOptions = {
								path: municipio[contador_municipio],        //recibe un vector, en cada posicion hay un vector dentro de otro vector
								//strokeColor: data[0][0],
								strokeColor: 'black',
								strokeOpacity: 0.3,
								strokeWeight: 1,
								//fillColor: data[1][0],
								fillColor: "#FFFF00",
								fillOpacity: 0.6,
								valorChicungunya: (data[2][1]),
								nombre: (data[2][0])
							}
							ValidarExisteMunicipio.push((data[2][0]));  //Agrega elementos a un vector que tiene como funcion indicar si un municipio ya existe

							it[contador_municipio] = new google.maps.Polygon(polyOptions);
							//it[contador_municipio].setMap(null);

							
								for (var i=0; i<((contador_municipio)); i++){
									it[i].setMap(null);
								}
						
						var tabla="<table border='1' class='sortable' id='anyid' cellpadding='0' cellspacing='0'><tr><th>Municipios</th><th>Casos de Chikungunya</th><th>Riesgo</th><th class='unsortable'>Unsortable</th></tr>";
						for (var i=0; i<=((contador_municipio)); i++){
								      
								/*	   // alert(hexadec(626152704));
									   if(i==0){
									   
									   
											it[i].fillColor="#FF"+"00"+"00";
											
									   }*/
									   
									 //   else{
									   var denominador=max-min;
									   if(denominador==0){
										it[i].fillColor=="#FF"+"00"+"00";
																						//alert(it[i].fillColor);


									   }
									   else{
										  // var numerador=it[i].valorChicungunya-min; amarillo primero
										//var colorhex=parseInt((((numerador)/(denominador)))*255);
										var numerador=max-it[i].valorChicungunya;
										var colorhex=parseInt((((numerador)/(denominador)))*255);

									//	alert(((((it[i].valorChicungunya+"  -"+min)+"/"+(""+max+"-"+min)))+""+"*255"))
									   	
											colorhex=(d2h(colorhex));
											colorhex="#FF"+(colorhex==0?"00":colorhex)+"00";
									   		colorhex=colorhex.toUpperCase();

									   it[i].fillColor=colorhex;

									   }	
									 //  }
									   
																		   					//							alert(it[i].fillColor);

							it[i].setMap(map);
							tabla+=	 "<tr><td align='center'>"+it[i].nombre+"</td><td align='center'>"+it[i].valorChicungunya+"</td><td align='center' bgcolor="+"'"+it[i].fillColor+"'"+"</td><td>"+it[i].fillColor+"</td><tr>";  
									    
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
							/*
							google.maps.event.addListener(it[contador_municipio], 'mouseover', function (evt) {
								alert(it[contador_municipio].fillColor);
							it[contador_municipio].fillColor= 'white';
							it[contador_municipio].setMap(null);
							it[contador_municipio].setMap(map);
							});
							
							google.maps.event.addListener(it[contador_municipio], 'mouseout', function (evt) {
								alert(it[contador_municipio].fillColor);
							it[contador_municipio].fillColor= 'black';
							it[contador_municipio].setMap(null);
							it[contador_municipio].setMap(map);
							});
							*/
						}
		
						} else {
							//alert('No data to import!');
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
<div id='tabla_reporte_chikun'>
<font id='tablas'></font>
</div>

<table class='sortable' id='anyid' cellpadding='0' cellspacing='0'>
<tr>
	<th>Numbers</th>
	<th>Alphabet</th>
	<th>Dates</th>
	<th>Currency</th>
	<th class="unsortable">Unsortable</th>
</tr>
<tr>
	<td>1</td>
	<td>Z</td>
	<td>01-01-2006</td>
	<td>&euro; 5.00</td>
	<td>Unsortable</td>
</tr>
<tr>
	<td>2</td>
	<td>y</td>
	<td>04-13-2005</td>
	<td>&euro; 6.70</td>
	<td>Unsortable</td>
</tr>
<tr>
	<td>3</td>
	<td>X</td>
	<td>08-17-2006</td>
	<td>&euro; 6.50</td>
	<td>Unsortable</td>
</tr>
<tr>
	<td>4</td>
	<td>w</td>
	<td>01-01-2005</td>
	<td>&euro; 4.20</td>
	<td>Unsortable</td>
</tr>
<tr>
	<td>5</td>
	<td>V</td>
	<td>05-12-2006</td>
	<td>&euro; 7.15</td>
	<td>Unsortable</td>
</tr>
<tr class="sortbottom">
	<td>15</td>
	<td></td>
	<td></td>
	<td>&euro; 29.55</td>
	<td></td>
</tr>
</table>
		

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


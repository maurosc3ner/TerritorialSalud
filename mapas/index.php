<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIOS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">      
	<link href="css/main.css" rel="stylesheet">
	 <link href="css/responsive.css" rel="stylesheet">
	 <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
	
	<!--
	<!--// dibujar poligonos http://www.birdtheme.org/useful/v3tool.html
http://www.gadm.org/download
-->
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Georreferenciación Municipios de Caldas</title>

   

  
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
 
  
    
  function d2h(d) { return (+d).toString(16); }
  
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
           // center: new google.maps.LatLng(4, -72),
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
								fillOpacity: 0.9,
								valorChicungunya: (data[2][1]),
								nombre: (data[2][0])
							}
							ValidarExisteMunicipio.push((data[2][0]));  //Agrega elementos a un vector que tiene como funcion indicar si un municipio ya existe

							it[contador_municipio] = new google.maps.Polygon(polyOptions);
							//it[contador_municipio].setMap(null);

							
								for (var i=0; i<((contador_municipio)); i++){
									it[i].setMap(null);
								}
						
						var tabla="<table border='1' class='sortable' id='anyid2' cellpadding='0' cellspacing='0'><tr><th >Municipios</th><th>Casos de Chikungunya</th><th>Riesgo</th><th class='unsortable'>Color</th></tr>";

						for (var i=0; i<=((contador_municipio)); i++){
								
								
								
									   var denominador=max-min;
									   if(denominador==0){
										it[i].fillColor=="#FF"+"00"+"00";

									   }
									   else{
										// var numerador=it[i].valorChicungunya-min; amarillo primero
										//var colorhex=parseInt((((numerador)/(denominador)))*255);
										var numerador=max-it[i].valorChicungunya;
										var colorhex=parseInt((((numerador)/(denominador)))*255);
										colorhex=(d2h(colorhex));
										colorhex="#FF"+(colorhex.length==1?"0"+colorhex:colorhex)+"00";
									   	colorhex=colorhex.toUpperCase();
										it[i].fillColor=colorhex;

									   }	

									   
																		   				

							it[i].setMap(map);
							tabla+=	 "<tr><td align='center' style='height:1px;' bgcolor='white'>"+it[i].nombre+"</td><td align='center' bgcolor='white'>"+it[i].valorChicungunya+"</td><td align='center' bgcolor="+"'"+it[i].fillColor+"'"+"</td><td bgcolor='white'>"+it[i].fillColor+"</td></tr>";  
									    
						}
						tabla+="</table>";
												var tabla2="";

						tabla2+="<table>";

						for (var i=0; i<=255; i++){
							var colorhex=i;
							colorhex=(d2h(colorhex));
							colorhex="#FF"+(colorhex.length==1?"0"+colorhex:colorhex)+"00";
						//	alert(colorhex);
							tabla2+="<tr><td width='25' height='2' align='center' bgcolor="+"'"+colorhex+"'"+" </td></tr>";  
							
						}
												tabla2+="</table>";

						
						
						/*$.ajax({
						  type:"POST",
						  url: "ajaxserver.php",
						  data: { tabla: tabla}
						}).done(function(data) {
						  $("#tablas1").html(data);
						});
						*/
				 
						
						
						
						
						
						document.getElementById('tablas').innerHTML = tabla;
													document.getElementById('medidor').innerHTML = tabla2;

						var infowindow = new google.maps.InfoWindow();
						for (var i=0; i<=((municipio.length)-1); i++){
						
							google.maps.event.addListener(it[contador_municipio], 'click', function (evt) {
							infowindow.setContent("<center><h2>Municipio: "+array_Caja[i-1].contenido+"</h2></center><center>Casos registrados: "+it[i-1].valorChicungunya+"</center>");
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
  <body class="homepage">   
	<header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">BIOS </a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
					    <li class="active"><a href="index.php">Inicio</a></li> 
					    <li><a href="http://bios.co">BIOS</a></li>                        
						
						<!--<li><a href="index.html">Inicio</a></li>
                        <li><a href="about-us.html">Acerca de Nosotros</a></li>
                        <li><a href="blog.html">Blog</a></li> -->
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
	<!--	
	<div class="map">
		<iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
		</iframe>
	</div>
	-->
	<div class="map" >
	<div id='map'> 
		
		</div>
	</div>
	<section id="contact-page">
        <div class="container">
		
		<!-- Cuadro de búsqueda -->

		<div id="data"  style="display: none">

			<!-- Mensaje de estado -->

			<div id="message"></div>
			
			<!-- Ubicación a georreferenciarse -->
			
			<label for="location">Ubicación:</label>
			<input type="text" id="location" name="location" value="" size="40" />
			
			<!-- Botón para inciar la georreferenciación -->
			
			<input type="button" id="search" name="search" value="Buscar" />
		</div>


		<!-- Muestra cuadros de texto con latitud y longitud -->

		<div style="display: none">
			Latitud: <input type="text" id="latitud" readonly/></br>
			Longitud: <input type="text" id="longitud" readonly/>
		</div>
		
		<center>
			<div id='tabla_reporte_chikun'>
				<font id='tablas'></font>
			</div>
		</center>
		<center>
			<div id='tablas1'></div>
		</center>	
	<div id='tabla_medidor'>	
		<font id='medidor'></font>
	</div>

		<!--<table class='sortable' id='anyid' cellpadding='0' cellspacing='0'>
		<tr>
			<th>Numbers</th>
			<th>Alphabet</th>
			<th>Dates</th>
			<th>Currency</th>
		
		</tr>
		
		</table>
				-->
		 <p>
		<div id="dvImportSegments" class="fileupload ">
            <fieldset>
                <legend>Selecciona CSV a cargar</legend>
                <input type="file" name="File Upload" id="txtFileUpload" accept=".csv"/>
            </fieldset>
		</div>
		</p>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
           <!--<div class="center">        
                <h2>Drop Your Message</h2>
                <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
       </div>
    </section><!--/#contact-page-->

   <!-- <section id="bottom">
     <!-- <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">We are hiring</a></li>
                            <li><a href="#">Meet the team</a></li>
                            <li><a href="#">Copyright</a></li>                           
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

      <!--         <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Documentation</a></li>                          
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

       <!--        <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Developers</h3>
                        <ul>
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">SEO Marketing</a></li>
                            <li><a href="#">Theme</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

       <!--         <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>Our Partners</h3>
                        <ul>
                            <li><a href="#">Adipisicing Elit</a></li>
                            <li><a href="#">Eiusmod</a></li>
                            <li><a href="#">Tempor</a></li>
                            <li><a href="#">Veniam</a></li>                           
                        </ul>
                    </div>    
      <!--         </div><!--/.col-md-3-->
     <!--       </div>
     <!--    </div>  
    </section><!--/#bottom-->
	
	<div class="top-bar">
		<div class="container">
			<div class="row">
			    <div class="col-lg-12">
				   <div class="social">
						<ul class="social-share">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-skype"></i></a></li>
						</ul>
				   </div>
                </div>
			</div>
		</div><!--/.container-->
	</div><!--/.top-bar-->
	
	<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="http://bootstraptaste.com/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">bootstraptaste</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Contáctenos</a></li>
                        <li><a href="#">Bios</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="js/jquery.js"></script>-->
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>   
    <script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
  </body>
</html>
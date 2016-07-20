// CAPTAIN SLOG
// vim: set expandtab tabstop=4 shiftwidth=4 autoindent smartindent:
// File         : gmaps.js 
// System       : C3I
// Date         : June 19 2016
// Author       : Mark Addinall
// Synopsis     : Preliminary work on functions to be included
//                into a general mapping/map drawing object
//		          for the geographic mapping page in the system.
//
// -------------------------------



//------------------------
var c3iMAP = (function() {

//-----------------
function initMap() {
  // This example adds a UI control allowing users to remove the polyline from the
  // map.

  var assetPath;
  var map;

  map = new google.maps.Map(document.getElementById('asset_map'), {
    zoom: 3,
    center: {lat: 0, lng: -180},                                    // this will come from the CONTROL database ase HOME
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

  var assetPathCoordinates = [                                      // the asset co-ordinates are tacked in near real time
    {lat: 37.772, lng: -122.214},                                   // and served to the UI by the PHP backend
    {lat: 21.291, lng: -157.821},                                   // in this implementation.  Full Javascript
    {lat: -18.142, lng: 178.431},                                   // MONGO two way binding in the other implementations
    {lat: -27.467, lng: 153.027}                                    // of this app.
  ];

  assetPath = new google.maps.Polyline({
    path: assetPathCoordinates,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  addLine();
}


//------------------
function addLine() {

  assetPath.setMap(map);
}


//---------------------
function removeLine() {

  assetPath.setMap(null);
}


//------------------
function rectangle() {


  var map = new google.maps.Map(document.getElementById('asset_map'), {
    center: {lat: 44.5452, lng: -78.5389},
    zoom: 9
  });

  var bounds = {
    north: 44.599,
    south: 44.490,
    east: -78.443,
    west: -78.649
  };

  // Define a rectangle and set its editable property to true.

  var rectangle = new google.maps.Rectangle({
    bounds: bounds,
    editable: true
  });



//------------------
function animateAsset() {

// This example adds an animated symbol to a polyline.
//
  var map = new google.maps.Map(document.getElementById('asset_map'), {
    center: {lat: 20.291, lng: 153.027},
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

  // Define the symbol, using one of the predefined paths ('CIRCLE')
  // supplied by the Google Maps JavaScript API.
  var lineSymbol = {
    path: google.maps.SymbolPath.CIRCLE,
    scale: 8,
    strokeColor: '#393'
  };

  // Create the polyline and add the symbol to it via the 'icons' property.
  var line = new google.maps.Polyline({
    path: [{lat: 22.291, lng: 153.027}, {lat: 18.291, lng: 153.027}],
    icons: [{
      icon: lineSymbol,
      offset: '100%'
    }],
    map: map
  });

  animateCircle(line);
}


//----------------------------
function animateCircle(line) {
// Use the DOM setInterval() function to change the offset of the symbol
// at fixed intervals.
    var count = 0;
    window.setInterval(function() {
      count = (count + 1) % 200;

      var icons = line.get('icons');
      icons[0].offset = (count / 2) + '%';
      line.set('icons', icons);
  }, 20);
} 

//---------------------
 rectangle.setMap(map);
}


	return {                                    // this is the API as presented to the application
		initMAP : initMAP,
		draw_line : draw_line,
		remove_line : remove_line
	}
	})();




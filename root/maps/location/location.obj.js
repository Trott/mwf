mwf.ext.standard.location = new function()
{
    this.map = [];

    this.buildMap = function(elementID, options)
    {
        this.map[elementID] = new function()
        {
            this.element = elementID;
            this.map = null;
            this.info = null;
            this.locations = [];
            var mapOptions = typeof options == 'object' ? options : {};
            if (! ('zoom' in mapOptions)) mapOptions.zoom = 16;
            if (! ('mapTypeId' in mapOptions)) mapOptions.mapTypeId = google.maps.MapTypeId.ROADMAP;

            this.init = function(elementID)
            {
                this.element = elementID;
                this.map = new google.maps.Map(document.getElementById(this.element), mapOptions);
                this.info = new google.maps.InfoWindow();
                return this;
            };

            this.addLocations = function(arr)
            {
                if(this.map == null)
                    return false;
                for(var i = 0; i < arr.length; i++)
                    this.addLocation(arr[i].name, arr[i].lat, arr[i].lon);
                return true;
            };

            this.addLocation = function(name, lat, lon)
            {
                if(this.map == null)
                    return false;
                var i = this.locations.length;
                this.locations[i] = new google.maps.Marker({position: new google.maps.LatLng(lat, lon), map: this.map, title: this.element+'||'+name });
                google.maps.event.addListener(this.locations[i], 'click', function(){
                    mwf.ext.standard.location.map[this.getTitle().split('||')[0]].showInfo(i);});
                return true;
            };

            this.setCenter = function(lat, lon)
            {
                return this.map.setCenter(new google.maps.LatLng(lat, lon));
            };
            
            this.setZoom = function(zoom) {
            	return this.map.setZoom(zoom);
            };
            
            /**
             * @method setColors
             * @param {Object} colorOptions Property list with elements of format featureType: { hue: saturation: lightness: [elementType: ]}
             * @param {String} mapTypeId Optional name to pass to the Google Maps API as the MapTypeId.  Defaults to 'mwfCustomMap'.
             */
            
            this.setColors = function(colorOptions,mapTypeId) {
                mapTypeId = mapTypeId ? mapTypeId : 'mwfCustomMap';
                var mapStyle = [];
                for ( var featureType in colorOptions) {
                    var theseOptions = colorOptions[featureType];
                    elementType = theseOptions["elementType"] ? theseOptions["elementType"] : "all";
                    mapStyle.push( {
                        featureType : featureType,
                        elementType : elementType,
                        stylers : [ {
                            hue : theseOptions['hue']
                        }, {
                            saturation : theseOptions['saturation']
                        }, {
                            lightness : theseOptions['lightness']
                        } ]
                    });
                }
                var styledMap = new google.maps.StyledMapType(mapStyle);
                this.map.mapTypes.set(mapTypeId, styledMap);
                this.map.setMapTypeId(mapTypeId);
            };
  
            this.showInfo = function(i)
            {
                if(this.info == null)
                    return false;
                this.info.setPosition(this.locations[i].getPosition());
                this.info.setContent(this.locations[i].getTitle().split('||')[1]);
                this.info.open(this.map);
                return true;
            };

            this.hideInfo = function()
            {
                if(this.info == null)
                    return false;
                this.info.close();
                return true;
            };

            this.addOverlay = function(imageOverlayUrl,lat1,long1,lat2,long2) {
            	var imageBounds = new google.maps.LatLngBounds(new google.maps.LatLng(lat1,long1),new google.maps.LatLng(lat2,long2));                
                return new google.maps.GroundOverlay(imageOverlayUrl, imageBounds, {map:this.map});
            };
            
            this.addListener = function(event, callback) {
                return google.maps.event.addListener(this.map, event, callback);
            };
            
            this.addListenerOnce = function(event,callback) {
                return google.maps.event.addListenerOnce(this.map,event,callback);
            };
        };
        return this.map[elementID].init(elementID);
    };
};

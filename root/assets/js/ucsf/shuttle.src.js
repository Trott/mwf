/* globals: Modernizr:true */
ucsf.shuttle = (function () {
	var me = {};
    var elem;

	if(Modernizr.localstorage){
        if (localStorage.shuttle_start) {
            elem = document.getElementById('starting_from');
            if (elem !== null) {
                elem.selectedIndex = parseInt(localStorage.shuttle_start, 10);
            }
        }
        if (localStorage.shuttle_end) {
            elem = document.getElementById('ending_at');
            if (elem !== null) {
                elem.selectedIndex = parseInt(localStorage.shuttle_end, 10);
            }
        }
    }

    me.save = function() {
		if(Modernizr.localstorage){
            localStorage.shuttle_start = document.getElementById("starting_from").selectedIndex;
            localStorage.shuttle_end = document.getElementById("ending_at").selectedIndex;
        }
	};

	me.swap = function () {
        if(Modernizr.localstorage){
            var temp = localStorage.shuttle_start;
            localStorage.shuttle_start = localStorage.shuttle_end;
            localStorage.shuttle_end = temp;
        }    
    };

	return me;
} ());

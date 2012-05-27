mwf.redirect = function(loc){
    
    if(mwf.site.mobile.maxHeight > screen.height
            && mwf.site.mobile.maxWidth  > screen.width){
        window.location = loc;
    }
    
};

/*
 *  App
 */

define(["jquery"], function() {
    var palette = [];
    
    var e = function(c){
        return "<div class='"+c+"'></div>";
    }
    
    palette.push( e("bg") );
    //palette.push( e("moleMound") );
    
    return palette;
});

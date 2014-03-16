/*
 *  Settings
 */
require.config({
    /*shim: {
     gmap: {
     exports: 'google'
     },
     validate: {
     deps: ['validate_core']
     },
     stickyfloat: {
     deps: ['app/core','jquery']
     }
     },*/
    paths: {
        backbone: "libs/backbone.js/backbone",
        jquery: "libs/jquery/jquery",
        underscore: "libs/underscore.js/underscore"
    },
    i18n: {
        locale: 'pl'
    }
});


/*
 *  App
 */

require(["modules/camera", "jquery"], function(map, palette, waitInterval) {
    $(function() {
        
    });
});

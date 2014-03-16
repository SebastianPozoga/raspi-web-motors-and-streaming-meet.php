
/*
 *  App
 */

define(["app/config", "jquery"], function(config) {
    var module = {};


    /*Stream*/
    var activeStream = true;

    module.startStream = function() {
        activeStream = true;
        var promise = module.serverStartStream();
        promise.done(module.streamLoop);
    };

    module.stopStream = function() {
        activeStream = false;
        module.serverStopStream();
    };

    module.serverStartStream = function() {
        return $.ajax({
            url: config.apiUrl + "/camera/Start.php",
            method: "post"
        });
    };

    module.serverStopStream = function() {
        return $.ajax({
            url: config.apiUrl + "/camera/Stop.php",
            method: "post"
        });
    };

    module.streamLoop = function() {
        if (!activeStream)
            return;
        module.updatePicture();
        setTimeout(module.streamLoop, 300);
    };

    module.updatePicture = function(selector) {
        var now = new Date();
        var pictureUrl = config.apiUrl + "/image.jpg" + "?r=" + now.getTime()
        $(selector).attr("src", pictureUrl);
        $(selector).css("background-image", pictureUrl);
    };

    return module;
});

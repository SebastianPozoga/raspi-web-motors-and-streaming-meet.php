
/*
 * Stream Video
 */

$(function() {
    var isStream = false,
            streamTime = 5000,
            streamUrl = 'api/stream.jpg',
            apiUrl = 'http://192.168.1.108/Raspi-Web/index.php/api';

    var refreshStreamImage = function() {
        var currentTime = new Date();
        if (!isStream) {
            return false;
        }
        $("#stream-image").attr("src", streamUrl + "?r=" + currentTime.getTime());
        return true;
    };

    var startStream = function() {
        if (isStream)
            return;
        $(".startStream").hide();
        $(".stopStream").show();
        isStream = true;
        return $.ajax({
            type: 'POST',
            url: apiUrl + '/stream/start',
            data: {}
        }).done(function(json) {
            var data = JSON.parse(json);
            streamTime = data.timelapse;
            if (streamTime < 300) {
                streamTime = 300;
            }
            refreshStreamImage();
        });
    };

    var stopStream = function() {
        if (!isStream)
            return;
        $(".startStream").show();
        $(".stopStream").hide();
        isStream = false;
        return $.ajax({
            type: 'POST',
            url: apiUrl + '/stream/stop',
            data: {}
        });
    };

    //Actions
    $("#stream-image").on("load error", function() {
        refreshStreamImage();
    });

    $(document).on("click", ".startStream", function(e) {
        e.preventDefault();
        var $this = $(this);
        startStream();
    });

    $(document).on("click", ".stopStream", function(e) {
        e.preventDefault();
        var $this = $(this);
        stopStream();
    });

    //Motors
    $(document).on("click", ".goLeft", function(e) {
        return $.ajax({
            type: 'POST',
            url: apiUrl + '/go/left',
            data: {}
        });
    });

    $(document).on("click", ".goRight", function(e) {
        return $.ajax({
            type: 'POST',
            url: apiUrl + '/go/right',
            data: {}
        });
    });

    $(document).on("click", ".goAhead", function(e) {
        return $.ajax({
            type: 'POST',
            url: apiUrl + '/go/ahead',
            data: {}
        });
    });


    startStream();
});

define(function() {

    var fn = function(fn, time, wait) {
        setTimeout(function() {
            setInterval(fn, time);
        }, wait);
    };

    return fn;
});

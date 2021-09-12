if ("geolocation" in navigator) {
    /* la geolocalización está disponible */
    if (!navigator.geolocation) {
        console.log("<p>Geolocation is not supported by your browser</p>");
    }

    function success(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        console.log('<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>');

        // var img = new Image();
        // img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

        // output.appendChild(img);
    };

    function error() {
        console.log("Unable to retrieve your location");
    };

    //console.log("<p>Locating…</p>");

    navigator.geolocation.getCurrentPosition(success, error);
} else {
    /* la geolocalización NO está disponible */
}

var getBrowserInfo = function() {
    var ua = navigator.userAgent,
        tem,
        M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE ' + (tem[1] || '');
    }
    if (M[1] === 'Chrome') {
        tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
        if (tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
    return M.join(' ');
};

console.log(getBrowserInfo());

$.getJSON('http://ip-api.com/json?callback=?', function(data) {
    console.log(JSON.stringify(data, null, 2));
});


var url = document.createElement('a');
url.href = 'https://solobinary.cl';
console.log(url.href); // https://developer.mozilla.org:8080/en-US/search?q=URL#search-results-close-container
console.log(url.protocol); // https:
console.log(url.host); // developer.mozilla.org:8080
console.log(url.hostname); // developer.mozilla.org
console.log(url.port); // 8080
console.log(url.pathname); // /en-US/search
console.log(url.search); // ?q=URL
console.log(url.hash); // #search-results-close-container
console.log(url.origin); // https://developer.mozilla.org:8080
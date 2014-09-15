// Hides mobile browser's address bar when page is done loading.
window.addEventListener('load', function(e) {
    setTimeout(function() { window.scrollTo(0, 1); }, 1);
}, false);

var snapper = new Snap({
    element: document.getElementById('wrap'),
    maxPosition: 311,
    minPosition: -266,
});

var addEvent = function addEvent(element, eventName, func) {
    if (element.addEventListener) {
        return element.addEventListener(eventName, func, false);
    } else if (element.attachEvent) {
        return element.attachEvent("on" + eventName, func);
    }
};

addEvent(document.getElementById('open-left'), 'click', function(){
    var data = snapper.state();

    if(data.state == 'closed')
        snapper.open('left');
    else
        snapper.close();
});

addEvent(document.getElementById('open-right'), 'click', function(){
    var data = snapper.state();

    if(data.state == 'closed')
        snapper.open('right');
    else
        snapper.close();
});




// Hides mobile browser's address bar when page is done loading.
//window.addEventListener('load', function(e) {
//    console.info('ciao');
//    setTimeout(function() { window.scrollTo(0, 1); }, 1);
//}, false);


//$('#snap-content').scroll(function (event) {
//    var scroll = $('#snap-content').scrollTop();
//    var maxScroll = $('#snap-content')[0].scrollHeight;
//    var winHeight = $(window).height();
//    var snapHeight = $('#snap-content').height();
//    var bodyHeight = $('body').height();
//
//    $('body').css('min-height', maxScroll-winHeight+60);
//
////    setTimeout(function() { window.scrollTo(0, 200); }, 1);
//    console.info('scroll #snap-content', maxScroll, scroll, winHeight, snapHeight, bodyHeight);
//});
//
//$('#wrap').scroll(function (event) {
//    console.info('scroll #wrap');
//});



//$(document).ready(function() {
//    var snapHeight = $('#snap-content').height();
//    var scroll = $(window).scrollTop();
//    var maxScroll = $('#snap-content')[0].scrollHeight;
//    var winHeight = $(window).height();
//    var snapHeight = $('#snap-content').height();
//    var bodyHeight = $('body').height();
//
////    console.info('pre body height', bodyHeight);
//    $('body').css('min-height', winHeight+100);
////    console.info('post body height', $('body').height());
//
//    setTimeout(function() { window.scrollTo(0, 1); console.info('ciao') }, 1);
////    console.info('scroll window', maxScroll, scroll, winHeight, snapHeight, bodyHeight);
//});




/* Prevent Safari opening links when viewing as a Mobile App */
(function (a, b, c) {
    if(c in b && b[c]) {
        var d, e = a.location,
            f = /^(a|html)$/i;
        a.addEventListener("click", function (a) {
            d = a.target;
            while(!f.test(d.nodeName)) d = d.parentNode;
            "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d.href)
        }, !1)
    }
})(document, window.navigator, "standalone");
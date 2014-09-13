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



//$('#snap-content').scroll(function (event) {
//    var scroll = $('#snap-content').scrollTop();
//    var winHeight = $(window).height();
//    var barHeight = $('.bottombar').height();
//
//    console.info( $('.bottombar').position());
//    console.info('scroll event detected', scroll, winHeight);
//
//        $('.bottombar').css('top', scroll + winHeight - barHeight);
//});




//// gestisco gli eventi allo scorrimento della pagina (o meglio del div#snap-content)
//addEvent(document.getElementById('snap-content'), 'scroll', function(){
//    var bodyRect = document.body.getBoundingClientRect(),
//        elemRect = this.getBoundingClientRect(),
//        offset   = elemRect.top - bodyRect.top;
//
//
//    console.info("scroll event detected!", $('#snap-content').offset());
//
////    $('.bottombar').css('border', '1px solid red');
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
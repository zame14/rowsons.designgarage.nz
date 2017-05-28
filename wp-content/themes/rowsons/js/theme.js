jQuery(function($) {
    var $ = jQuery;
    $(".gallery-wrapper .grid").masonry({
       itemSelector: '.grid-item',
        gutter: 20,
        columnWidth: 50
    });
    var waypoint = new Waypoint({
        element: document.getElementById('header'),
        handler: function() {
            $("#header .logo").addClass('ani-show');
        },
        offset: -10
    })
    $(".menu-toggle").click(function() {
       $("#rk-menu-wrapper").toggleClass('open-menu');
        $(this).toggleClass('close-btn');
    });

});
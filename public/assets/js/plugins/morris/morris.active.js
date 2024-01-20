(function ($) {
    "use strict";

    /*Example Morris Line*/
    var exampleMorrisLine = new Morris.Line({
        element: 'example-morris-line',
        data: [
            { year: 'Jan', value: 20 },
            { year: 'Feb', value: 10 },
            { year: 'Mar', value: 5 },
            { year: 'Apr', value: 5 },
            { year: 'May', value: 20 },
            { year: 'Jun', value: 20 },
            { year: 'Jul', value: 5 },
            { year: 'Aug', value: 25 },
            { year: 'Sep', value: 10 },
            { year: 'Oct', value: 25 },
            { year: 'Nov', value: 5 },
            { year: 'Dec', value: 20 }, 
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Total Amount'],
    });

    /*Example Morris Bar*/
    var exampleMorrisBar = new Morris.Bar({
        element: 'example-morris-bar',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B']
    });

    /*Example Morris Area*/
    var exampleMorrisArea = new Morris.Area({
        element: 'example-morris-area',
        data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B']
    });

    /*Example Morris Donuts*/
    var exampleMorrisDonuts = new Morris.Donut({
        element: 'example-morris-donuts',
        data: [
            {label: "Download Sales", value: 12},
            {label: "In-Store Sales", value: 30},
            {label: "Mail-Order Sales", value: 20}
        ]
    });


    $(function () {
        // Chart Resize function
        function chartResize() {
            setTimeout(function() {
                
                exampleMorrisLine.redraw();
                exampleMorrisBar.redraw();
                exampleMorrisArea.redraw();
                exampleMorrisDonuts.redraw();
                
            }, 200);
        }
        // Resize Window Resize
        $(window).on('resize', function(){
            chartResize();
        });
        // Resize on Side Header Toggle
        $('.side-header-toggle').on('click', function(){
            chartResize();
        });
    });
    
})(jQuery);
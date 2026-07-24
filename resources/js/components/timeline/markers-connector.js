(function ($) {
    $.fn.connectMarkers = function () {
        const markers = $('.timeline-event-marker');
        const groups = {};

        markers.each(function () {
            const marker = $(this);
            const document = marker.data('document');
            if (!groups[document]) {
                groups[document] = [];
            }
            groups[document].push(marker);
        });

        const svg = $('#connection-svg');

        Object.values(groups).forEach((group, index) => {
            const offsetX = (index % 2 === 0) ? -55 : 50;

            $.drawLine(group[0], group[1], svg, offsetX);
        });
    }
})(jQuery);

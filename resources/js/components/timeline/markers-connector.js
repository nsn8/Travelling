(function ($) {
    $.fn.connectMarkers = function () {
        const markers = $('.timeline-event-marker').filter(function () {
            return $(this).data('document') !== 'date_separator';
        });
        let groups = {};

        markers.each(function () {
            const marker = $(this);
            const document = marker.data('document');
            if (!groups[document]) {
                groups[document] = [];
            }
            groups[document].push(marker);
        });

        const svg = $('#connection-svg');

        const groupEntries = Object.values(groups).filter(group => group.length === 2);

        groupEntries.forEach((group, index) => {
            const offsetX = (index % 2 === 0) ? -55 : 50;

            $.drawLine(group[0], group[1], svg, offsetX);
        });
    }
})(jQuery);

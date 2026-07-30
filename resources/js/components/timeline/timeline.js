(function ($) {
    $.fn.initTimeline = function (timelineEvents) {
        const container = $(this);
        container.addClass('timeline-container');
        container.children().not('#connection-svg').remove();

        Object.values(timelineEvents).forEach((event) => {
            const eventElement = $.createEvent(event);
            const eventMarker = $.createMarker(event);

            container.append(eventMarker);
            container.append(eventElement);

            if (eventElement.data('document') !== 'date_separator') {
                eventElement.handleHovering();
                eventMarker.handleHovering();
            } else {
                eventElement.handleDateHovering();
                eventMarker.handleDateHovering();
            }
        });

        if ($('.timeline-event').length > 0) {
            container.connectMarkers();
        }
    }
})(jQuery);

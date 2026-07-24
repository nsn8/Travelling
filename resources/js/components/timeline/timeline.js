(function ($) {
    $.fn.initTimeline = function (timelineEvents) {
        const container = $(this);
        container.addClass('timeline-container');

        Object.values(timelineEvents).forEach((event) => {
            const eventElement = $.createEvent(event);
            const eventMarker = $.createMarker(event);

            container.append(eventMarker);
            container.append(eventElement);

            eventElement.handleHovering();
            eventMarker.handleHovering();
        });

        container.connectMarkers();
    }
})(jQuery);

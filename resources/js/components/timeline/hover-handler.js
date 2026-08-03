(function ($) {
    $.fn.handleHovering = function () {
        $(this).on('mouseenter', function () {
            let document = $(this).data('document');

            let eventsFromDocument = $('.timeline-event').filter(function() {
                return $(this).data('document') === document;
            });

            let markersFromDocument = $('.timeline-event-marker').filter(function() {
                return $(this).data('document') === document;
            });

            eventsFromDocument.addClass('timeline-event-hover');
            markersFromDocument.addClass('timeline-event-marker-hover');
        });

        $(this).on('mouseleave', function () {
            let document = $(this).data('document');

            let markersFromDocument = $('.timeline-event-marker').filter(function() {
                return $(this).data('document') === document;
            });

            let eventsFromDocument = $('.timeline-event').filter(function() {
                return $(this).data('document') === document;
            });

            eventsFromDocument.removeClass('timeline-event-hover');
            markersFromDocument.removeClass('timeline-event-marker-hover');
        });
    }
})(jQuery);

(function ($) {
    $.fn.handleDateHovering = function () {
        $(this).on('mouseenter', function () {
            let date = $(this).data('date');

            let eventsFromDate = $('.timeline-event').filter(function() {
                return $(this).data('date') === date;
            });

            let markersFromDate = $('.timeline-event-marker').filter(function() {
                return $(this).data('date') === date;
            });

            eventsFromDate.addClass('date-event-hover');
            markersFromDate.addClass('date-event-marker-hover');
        });

        $(this).on('mouseleave', function () {
            let date = $(this).data('date');

            let eventsFromDate = $('.timeline-event').filter(function() {
                return $(this).data('date') === date;
            });

            let markersFromDate = $('.timeline-event-marker').filter(function() {
                return $(this).data('date') === date;
            });

            eventsFromDate.removeClass('date-event-hover');
            markersFromDate.removeClass('date-event-marker-hover');
        });
    }
})(jQuery);

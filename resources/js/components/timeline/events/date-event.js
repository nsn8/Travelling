(function ($) {
    $.fn.initDateSeparator = function (event) {
        const element = $(this);

        const eventUpperRow = $('<div>', {class: 'timeline-event-upper-row'});

        const eventHeader = $('<h2>', {class: 'timeline-event-header'});
        eventHeader.html(event.name);

        eventUpperRow.append(eventHeader);

        element.append(eventUpperRow);
    }
})(jQuery);

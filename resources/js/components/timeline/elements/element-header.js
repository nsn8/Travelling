(function ($) {
    $.buildElementHeader = function (headerCaption, eventName) {
        const eventUpperRow = $('<div>', {class: 'timeline-event-upper-row'});

        const eventHeader = $('<h4>', {class: 'timeline-event-header'});
        eventHeader.html(`${headerCaption}: ${eventName}`);

        eventUpperRow.append(eventHeader);

        return eventUpperRow;
    }
})(jQuery);

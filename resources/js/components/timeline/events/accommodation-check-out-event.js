(function ($) {
    $.fn.initCheckOut = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Выселение',
            event.name
        );

        const accommodationNameContainer = $.buildLabel('Название места размещения', [event.accommodation_name]);

        const datesContainer = $.buildDatesContainer(
            'Дата выселения',
            'Выселение до',
            event.date,
            event.time
        );

        element.append(eventUpperRow);
        element.append(accommodationNameContainer);
        element.append(datesContainer);
    }
})(jQuery);

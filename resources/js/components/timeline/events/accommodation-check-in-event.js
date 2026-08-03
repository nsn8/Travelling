(function ($) {
    $.fn.initCheckIn = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Заселение',
            event.name
        );

        const accommodationNameContainer = $.buildLabel('Название места размещения', [event.accommodation_name]);

        const datesContainer = $.buildDatesContainer(
            'Дата заселения',
            'Время начала заселения',
            event.date,
            event.time
        );

        const accommodationLocationContainer = $.buildLabel(
            'Место размещения',
            [event.accommodation_address, event.accommodation_city, event.accommodation_country]
        );

        element.append(eventUpperRow);
        element.append(accommodationNameContainer);
        element.append(datesContainer);
        element.append(accommodationLocationContainer);
    }
})(jQuery);

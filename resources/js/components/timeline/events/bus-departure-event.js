(function ($) {
    $.fn.initBusDeparture = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Отправление автобуса',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата отправления',
            'Время отправления',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Место отправления',
            [event.departure_station, event.departure_city, event.departure_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

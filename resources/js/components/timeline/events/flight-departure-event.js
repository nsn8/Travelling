(function ($) {
    $.fn.initFlightDeparture = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Вылет рейса',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата вылета',
            'Время вылета',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Аэропорт вылета',
            [event.departure_airport, event.departure_city, event.departure_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

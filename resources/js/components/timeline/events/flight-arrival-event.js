(function ($) {
    $.fn.initFlightArrival = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Прибытие рейса',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата прибытия',
            'Время прибытия',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Аэропорт прибытия',
            [event.arrival_airport, event.arrival_city, event.arrival_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

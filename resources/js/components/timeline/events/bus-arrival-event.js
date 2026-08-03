(function ($) {
    $.fn.initBusArrival = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Прибытие автобуса',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата прибытия',
            'Время прибытия',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Место прибытия',
            [event.arrival_station, event.arrival_city, event.arrival_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

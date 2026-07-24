(function ($) {
    $.fn.initShipArrival = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Прибытие корабля',
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
            [event.arrival_port, event.arrival_city, event.arrival_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

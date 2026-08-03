(function ($) {
    $.fn.initShipDeparture = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Отбытие корабля',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата отбытия',
            'Время отбытия',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Место отбытия',
            [event.departure_port, event.departure_city, event.departure_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

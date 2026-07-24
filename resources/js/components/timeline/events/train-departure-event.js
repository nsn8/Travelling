(function ($) {
    $.fn.initTrainDeparture = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Отправление поезда',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата отправления',
            'Время отправления',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Вокзал отправления',
            [event.departure_railway_station, event.departure_city, event.departure_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

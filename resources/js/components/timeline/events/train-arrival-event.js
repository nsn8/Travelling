(function ($) {
    $.fn.initTrainArrival = function (event) {
        const element = $(this);

        const eventUpperRow = $.buildElementHeader(
            'Прибытие поезда',
            event.name
        );

        const datesContainer = $.buildDatesContainer(
            'Дата прибытия',
            'Время прибытия',
            event.date,
            event.time
        );

        const departureLocationContainer = $.buildLabel(
            'Вокзал прибытия',
            [event.arrival_railway_station, event.arrival_city, event.arrival_country]
        );

        element.append(eventUpperRow);
        element.append(datesContainer);
        element.append(departureLocationContainer);
    }
})(jQuery);

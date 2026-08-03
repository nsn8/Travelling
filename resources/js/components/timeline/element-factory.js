(function ($) {
    $.createEvent = function (event) {
        let eventElement = $('<div>', {class: 'timeline-event'});
        eventElement.data('document', event.document);
        eventElement.data('date', event.date);

        switch (event.type) {
            case 'bus_departure':
                eventElement.initBusDeparture(event);
                break;
            case 'bus_arrival':
                eventElement.initBusArrival(event);
                break;
            case 'flight_departure':
                eventElement.initFlightDeparture(event);
                break;
            case 'flight_arrival':
                eventElement.initFlightArrival(event);
                break;
            case 'train_departure':
                eventElement.initTrainDeparture(event);
                break;
            case 'train_arrival':
                eventElement.initTrainArrival(event);
                break;
            case 'ship_departure':
                eventElement.initShipDeparture(event);
                break;
            case 'ship_arrival':
                eventElement.initShipArrival(event);
                break;
            case 'accommodation_check_in':
                eventElement.initCheckIn(event);
                break;
            case 'accommodation_check_out':
                eventElement.initCheckOut(event);
                break;
            default:
                eventElement.initDateSeparator(event);
                break;
        }

        return eventElement;
    }
})(jQuery);

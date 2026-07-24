(function ($) {
    $.createMarker = function (event) {
        let eventMarker = $('<div>', {class: 'timeline-event-marker'});
        eventMarker.data('document', event.document);

        switch (event.type) {
            case 'bus_departure':
                eventMarker.initBusDepartureMarker();
                break;
            case 'bus_arrival':
                eventMarker.initBusArrivalMarker();
                break;
            case 'flight_departure':
                eventMarker.initFlightDepartureMarker();
                break;
            case 'flight_arrival':
                eventMarker.initFlightArrivalMarker();
                break;
            case 'train_departure':
                eventMarker.initTrainDepartureMarker();
                break;
            case 'train_arrival':
                eventMarker.initTrainArrivalMarker();
                break;
            case 'ship_departure':
                eventMarker.initShipDepartureMarker();
                break;
            case 'ship_arrival':
                eventMarker.initShipArrivalMarker();
                break;
            case 'accommodation_check_in':
                eventMarker.initAccommodationCheckInMarker();
                break;
            case 'accommodation_check_out':
                eventMarker.initAccommodationCheckOutMarker();
                break;
            default:
                break;
        }

        return eventMarker;
    }
})(jQuery);

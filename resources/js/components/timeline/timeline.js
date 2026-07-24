(function ($) {
    $.fn.initTimeline = function (timelineEvents) {
        const container = $(this);
        container.addClass('timeline-container');

        Object.values(timelineEvents).forEach((event) => {
            let eventElement = $('<div>', {class: 'timeline-event'});
            eventElement.data('document', event.document);

            let eventMarker = $('<div>', {class: 'timeline-event-marker'});
            eventMarker.data('document', event.document);

            switch (event.type) {
                case 'bus_departure':
                    eventElement.initBusDeparture(event);
                    eventMarker.initBusDepartureMarker();
                    break;
                case 'bus_arrival':
                    eventElement.initBusArrival(event);
                    eventMarker.initBusArrivalMarker();
                    break;
                case 'flight_departure':
                    eventElement.initFlightDeparture(event);
                    eventMarker.initFlightDepartureMarker();
                    break;
                case 'flight_arrival':
                    eventElement.initFlightArrival(event);
                    eventMarker.initFlightArrivalMarker();
                    break;
                case 'train_departure':
                    eventElement.initTrainDeparture(event);
                    eventMarker.initTrainDepartureMarker();
                    break;
                case 'train_arrival':
                    eventElement.initTrainArrival(event);
                    eventMarker.initTrainArrivalMarker();
                    break;
                case 'ship_departure':
                    eventElement.initShipDeparture(event);
                    eventMarker.initShipDepartureMarker();
                    break;
                case 'ship_arrival':
                    eventElement.initShipArrival(event);
                    eventMarker.initShipArrivalMarker();
                    break;
                case 'accommodation_check_in':
                    eventElement.initCheckIn(event);
                    eventMarker.initAccommodationCheckInMarker();
                    break;
                case 'accommodation_check_out':
                    eventElement.initCheckOut(event);
                    eventMarker.initAccommodationCheckOutMarker();
                    break;
                default:
                    eventElement.html(event.type);
                    break;
            }

            container.append(eventMarker);
            container.append(eventElement);

            eventElement.on('mouseenter', function () {
                let document = $(this).data('document');

                let eventsFromDocument = $('.timeline-event').filter(function() {
                    return $(this).data('document') === document;
                });

                let markersFromDocument = $('.timeline-event-marker').filter(function() {
                    return $(this).data('document') === document;
                });

                eventsFromDocument.addClass('timeline-event-hover');
                markersFromDocument.addClass('timeline-event-marker-hover');
            });

            eventMarker.on('mouseenter', function () {
                let document = $(this).data('document');

                let markersFromDocument = $('.timeline-event-marker').filter(function() {
                    return $(this).data('document') === document;
                });

                let eventsFromDocument = $('.timeline-event').filter(function() {
                    return $(this).data('document') === document;
                });

                eventsFromDocument.addClass('timeline-event-hover');
                markersFromDocument.addClass('timeline-event-marker-hover');
            });

            eventElement.on('mouseleave', function () {
                let document = $(this).data('document');

                let markersFromDocument = $('.timeline-event-marker').filter(function() {
                    return $(this).data('document') === document;
                });

                let eventsFromDocument = $('.timeline-event').filter(function() {
                    return $(this).data('document') === document;
                });

                eventsFromDocument.removeClass('timeline-event-hover');
                markersFromDocument.removeClass('timeline-event-marker-hover');
            });

            eventMarker.on('mouseleave', function () {
                let document = $(this).data('document');

                let markersFromDocument = $('.timeline-event-marker').filter(function() {
                    return $(this).data('document') === document;
                });

                let eventsFromDocument = $('.timeline-event').filter(function() {
                    return $(this).data('document') === document;
                });

                eventsFromDocument.removeClass('timeline-event-hover');
                markersFromDocument.removeClass('timeline-event-marker-hover');
            });
        });

        const markers = $('.timeline-event-marker');
        const groups = {};

        markers.each(function () {
            const marker = $(this);
            const document = marker.data('document');
            if (!groups[document]) {
                groups[document] = [];
            }
            groups[document].push(marker);
        });

        const svg = $('#connection-svg');

        Object.values(groups).forEach((group, index) => {
            const offsetX = (index % 2 === 0) ? -55 : 50;

            drawLineBetween(group[0], group[1], svg, container, offsetX);
        });

        function drawLineBetween($from, $to, $svg, $grid, offsetX) {
            const fromPos = $from.position();
            const toPos = $to.position();

            const fromWidth = $from.outerWidth();
            const fromHeight = $from.outerHeight();
            const toWidth = $to.outerWidth();
            const toHeight = $to.outerHeight();

            const fromX = fromPos.left + fromWidth / 2 + offsetX;
            const fromY = fromPos.top + fromHeight / 2;
            const toX = toPos.left + toWidth / 2 + offsetX;
            const toY = toPos.top + toHeight / 2;

            const $line = $(document.createElementNS('http://www.w3.org/2000/svg', 'line'));
            $line.attr({
                x1: fromX,
                y1: fromY,
                x2: toX,
                y2: toY,
                stroke: '#d1d1d6',
                'stroke-width': 1,
                'stroke-linecap': 'round',
            });
            $svg.append($line);
        }
    }
})(jQuery);

function initTimelineElement(eventElement, eventMarker) {

}

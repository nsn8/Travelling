(function ($) {
    $.fn.initTimeline = function (timelineEvents) {
        const container = $(this);
        container.addClass('timeline-container');

        const verticalTimeline = $('<div>', {class: 'vertical-timeline'})
        const timelineContent = $('<div>', {class: 'timeline-content'})

        Object.values(timelineEvents).forEach((event) => {
            let eventElement = $('<div>', {class: 'timeline-event'});
            eventElement.data('document', event.document);

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
                    eventElement.html(event.type);
                    break;
            }

            timelineContent.append(eventElement);

            eventElement.on('mouseenter', function () {
                let document = $(this).data('document');

                let eventsFromDocument = $('.timeline-event').filter(function() {
                    return $(this).data('document') === document;
                });

                eventsFromDocument.addClass('timeline-event-hover');
            });

            eventElement.on('mouseleave', function () {
                let document = $(this).data('document');

                let eventsFromDocument = $('.timeline-event').filter(function() {
                    return $(this).data('document') === document;
                });

                eventsFromDocument.removeClass('timeline-event-hover');
            });
        });

        container.append(verticalTimeline);
        container.append(timelineContent);
    }
})(jQuery);

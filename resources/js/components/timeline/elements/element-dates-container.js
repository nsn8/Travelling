(function ($) {
    $.buildDatesContainer = function (dateCaption, timeCaption, date, time) {
        const datesContainer = $('<div>', {class: 'timeline-event-dates-container'})

        const eventDate = $('<label>', {class: 'timeline-event-label'});
        eventDate.html(`${dateCaption}: ${date}`);
        const eventTime = $('<label>', {class: 'timeline-event-label'});
        eventTime.html(`${timeCaption}: ${time}`);

        datesContainer.append(eventDate);
        datesContainer.append(eventTime);

        return datesContainer;
    }
})(jQuery);

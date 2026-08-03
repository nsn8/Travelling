(function ($) {
    $.buildLabel = function (labelCaption, captions) {
        const labelContainer = $('<div>', {class: 'timeline-event-info-container'});

        const label = $('<label>', {class: 'timeline-event-label'});

        captions = captions.join(', ');

        label.html(`${labelCaption}: ${captions}`);

        labelContainer.append(label);

        return labelContainer;
    }
})(jQuery);

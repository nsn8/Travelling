(function ($) {
    $.fn.initTrainDepartureMarker = function () {
        const trainIcon = $('<i>', {class: 'fa-solid fa-train'});
        $(this).append(trainIcon);
        const departureArrowIcon = $('<i>', {class: 'fa-solid fa-sign-out-alt'});
        $(this).append(departureArrowIcon);
    }
})(jQuery);

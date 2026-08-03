(function ($) {
    $.fn.initTrainArrivalMarker = function () {
        const trainIcon = $('<i>', {class: 'fa-solid fa-train'});
        $(this).append(trainIcon);
        const departureArrowIcon = $('<i>', {class: 'fa-solid fa-sign-in-alt'});
        $(this).append(departureArrowIcon);
    }
})(jQuery);

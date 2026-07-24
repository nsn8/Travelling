(function ($) {
    $.fn.initBusArrivalMarker = function () {
        const busIcon = $('<i>', {class: 'fa-solid fa-bus'});
        $(this).append(busIcon);
        const departureArrowIcon = $('<i>', {class: 'fa-solid fa-sign-in-alt'});
        $(this).append(departureArrowIcon);
    }
})(jQuery);

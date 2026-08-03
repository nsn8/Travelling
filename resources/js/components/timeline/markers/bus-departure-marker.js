(function ($) {
    $.fn.initBusDepartureMarker = function () {
        const busIcon = $('<i>', {class: 'fa-solid fa-bus'});
        $(this).append(busIcon);
        const departureArrowIcon = $('<i>', {class: 'fa-solid fa-sign-out-alt'});
        $(this).append(departureArrowIcon);
    }
})(jQuery);

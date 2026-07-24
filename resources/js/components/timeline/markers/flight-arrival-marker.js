(function ($) {
    $.fn.initFlightArrivalMarker = function () {
        const flightArrivalIcon = $('<i>', {class: 'fa-solid fa-plane-arrival'});
        $(this).append(flightArrivalIcon);
    }
})(jQuery);

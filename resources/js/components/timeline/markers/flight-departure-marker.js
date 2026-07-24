(function ($) {
    $.fn.initFlightDepartureMarker = function () {
        const flightDepartureIcon = $('<i>', {class: 'fa-solid fa-plane-departure'});
        $(this).append(flightDepartureIcon);
    }
})(jQuery);

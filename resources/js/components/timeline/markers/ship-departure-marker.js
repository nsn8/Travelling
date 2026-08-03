(function ($) {
    $.fn.initShipDepartureMarker = function () {
        const shipIcon = $('<i>', {class: 'fa-solid fa-ship'});
        $(this).append(shipIcon);
        const departureArrowIcon = $('<i>', {class: 'fa-solid fa-sign-out-alt'});
        $(this).append(departureArrowIcon);
    }
})(jQuery);

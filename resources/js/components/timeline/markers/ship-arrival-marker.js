(function ($) {
    $.fn.initShipArrivalMarker = function () {
        const shipIcon = $('<i>', {class: 'fa-solid fa-ship'});
        $(this).append(shipIcon);
        const departureArrowIcon = $('<i>', {class: 'fa-solid fa-sign-in-alt'});
        $(this).append(departureArrowIcon);
    }
})(jQuery);

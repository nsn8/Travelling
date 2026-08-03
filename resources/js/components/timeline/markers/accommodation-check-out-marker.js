(function ($) {
    $.fn.initAccommodationCheckOutMarker = function () {
        const houseIcon = $('<i>', {class: 'fa-solid fa-house-user'});
        $(this).append(houseIcon);
        const checkOutArrowIcon = $('<i>', {class: 'fa-solid fa-sign-out-alt'});
        $(this).append(checkOutArrowIcon);
    }
})(jQuery);

(function ($) {
    $.fn.initAccommodationCheckInMarker = function () {
        const CheckInIcon = $('<i>', {class: 'fa-solid fa-sign-in-alt'});
        $(this).append(CheckInIcon);
        const houseIcon = $('<i>', {class: 'fa-solid fa-house-user'});
        $(this).append(houseIcon);
    }
})(jQuery);

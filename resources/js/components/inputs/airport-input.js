(function ($) {
    $.fn.initAirportInput = function (countryElement, cityElement) {
        let name = $(this).attr('id');

        /// Todo: локализация
        $(this).initInputSelect(name, '/data/airports', 'Введите для поиска');

        const searchInput = $(`[name="${name}"]`);

        searchInput.on('change', function () {
            if (!searchInput.data('code')) {
                return;
            }

            cityElement.val(searchInput.data('city'));
            countryElement.val(searchInput.data('country'));
        });
    }
})(jQuery);

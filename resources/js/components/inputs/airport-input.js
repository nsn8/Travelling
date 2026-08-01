(function ($) {
    $.fn.initAirportInput = function (countryElement, cityElement) {
        let name = $(this).attr('id');

        const fillFunction = function (response, container, input) {
            Object.values(response).forEach((city) => {
                ///Todo: раскомменить и сделать сепараторы, когда будет нормальный csv
                // const citySeparator = $('<div>', {class: 'input-select-separator'});
                // citySeparator.html(city.caption);
                // container.append(citySeparator);

                Object.values(city.airports).forEach((airport) => {
                    const option = $('<div>', {class: 'input-select-option'});
                    option.html(airport.caption);

                    option.on('click', function () {
                        input.data('code', airport.iata_code);
                        input.data('city', airport.city);
                        input.data('country', airport.country);
                        input.val(airport.caption).trigger('change');
                    });

                    container.append(option);
                });
            });
        }

        /// Todo: локализация
        $(this).initInputSelect(name, '/data/airports', 'Введите для поиска', fillFunction);

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

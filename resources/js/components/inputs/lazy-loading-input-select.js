import debounce from 'lodash/debounce';

(function ($) {
    $.fn.initInputSelect = function (inputName, endpoint, inputPlaceholder = '') {
        const container = $('<div>', {class: 'input-select'});

        const searchInput = $('<input>', {type: 'text', name: inputName, placeholder: inputPlaceholder});

        const optionsContainer = $('<div>', {class: 'input-select-options-container'});
        optionsContainer.css('display', 'none');

        searchInput.on('click', async function () {
            let search = searchInput.data('code') ?? '';

            await load(search, endpoint, optionsContainer, searchInput);
        });

        $(document).on('click', function (event) {
            if ($(event.target).is(searchInput)) {
                return;
            }

            optionsContainer.hide();
        });

        searchInput.on('input', debounce(async function () {
            let search = searchInput.val();

            await load(search, endpoint, optionsContainer, searchInput);
        }, 300));

        container.append(searchInput);
        container.append(optionsContainer);

        $(this).append(container);
    }
})(jQuery);

async function load(search, endpoint, container, input) {
    $.ajax({
        url: endpoint,
        type: 'GET',
        data: {
            search: search
        },
        success: function (response) {
            container.empty();
            container.show();

            Object.values(response).forEach((airport) => {
                const option = $('<div>', {class: 'input-select-option'});
                option.html(airport.caption);
                option.data('city', airport.city);
                option.data('country', airport.country);
                option.data('code', airport.iata_code);

                option.on('click', function () {
                    input.data('code', airport.iata_code);
                    input.data('city', airport.city);
                    input.data('country', airport.country);
                    input.val(airport.caption).trigger('change');
                });

                container.append(option);
            });
        }
    });
}

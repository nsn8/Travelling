import debounce from 'lodash/debounce';

(function ($) {
    $.fn.initInputSelect = function (inputName, endpoint, inputPlaceholder = '', fillFunction) {
        const container = $('<div>', {class: 'input-select'});

        const searchInput = $('<input>', {type: 'text', name: inputName, placeholder: inputPlaceholder, autocomplete: 'off'});

        const optionsContainer = $('<div>', {class: 'input-select-options-container'});
        optionsContainer.css('display', 'none');

        searchInput.on('click', async function () {
            let search = searchInput.data('code') ?? '';

            await load(search, endpoint, optionsContainer, searchInput, fillFunction);
        });

        $(document).on('click', function (event) {
            if ($(event.target).is(searchInput)) {
                return;
            }

            optionsContainer.hide();
        });

        searchInput.on('input', debounce(async function () {
            let search = searchInput.val();
            if (!search) {
                searchInput.data('code', '');
            }

            await load(search, endpoint, optionsContainer, searchInput, fillFunction);
        }, 300));

        container.append(searchInput);
        container.append(optionsContainer);

        $(this).append(container);
    }
})(jQuery);

async function load(search, endpoint, container, input, fillFunction) {
    $.ajax({
        url: endpoint,
        type: 'GET',
        data: {
            search: search
        },
        success: function (response) {
            container.empty();
            container.show();

            fillFunction(response, container, input);
        }
    });
}

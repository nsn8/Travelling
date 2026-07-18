(function ($) {
    $.fn.initFlightElement = function (documentData) {
        const element = $(this);

        element.data('name', documentData.name);
        element.data('arrival_city', documentData.arrival_city);
        element.data('arrival_country', documentData.arrival_country);
        element.data('arrival_date', documentData.arrival_date);
        element.data('arrival_airport', documentData.arrival_airport);
        element.data('departure_city', documentData.departure_city);
        element.data('departure_country', documentData.departure_country);
        element.data('departure_date', documentData.departure_date);
        element.data('departure_airport', documentData.departure_airport);
        element.data('luggage_included', documentData.luggage_included);
        element.data('luggage_max_weight', documentData.luggage_max_weight);
        element.data('luggage_height', documentData.luggage_height);
        element.data('luggage_length', documentData.luggage_length);
        element.data('luggage_width', documentData.luggage_width);
        element.data('transport_name', documentData.transport_name);
        element.data('id', documentData.id);

        const documentUpperRow = $('<div>', {class: 'document-upper-row'});

        const elementType = $('<h4>', {class: 'document-type'});
        elementType.html('Полет');
        documentUpperRow.append(elementType);

        const deleteIconContainer = $('<div>', {class: 'delete-document-icon-container'})
        const deleteIcon = $('<i>', {class: 'fa-solid fa-trash trash-icon'})
        deleteIconContainer.append(deleteIcon);

        deleteIcon.on('click', function () {
            let modal = $('#deleteDocumentModal');

            modal.find('[name="id"]').val(element.data('id'));
            modal.find('[name="name"]').val(element.data('name'));
            modal.find('[name="document_type"]').val('transport');
            modal.find('[name="transport_type"]').val('flight');

            modal.find('#deleted-name').html(element.data('name'));

            modal.addClass('show');
            $('body').css('overflow', 'hidden');
        })

        documentUpperRow.append(deleteIconContainer);

        element.append(documentUpperRow);

        const elementName = $('<h4>', {class: 'document-name'});
        elementName.html(documentData.name);
        element.append(elementName);

        element.on('click', function (event) {
            if ($(event.target).is(deleteIcon)) {
                return;
            }

            let modal = $('#documentModal');

            modal.find('#accommodation-info').hide();
            modal.find('#transport-info').show();
            modal.find('#bus-info').hide();
            modal.find('#flight-info').show();
            modal.find('#train-info').hide();
            modal.find('#ship-info').hide();

            modal.find('[name="name"]').val(element.data('name'));
            modal.find('[name="document_type"]').val('transport');
            modal.find('[name="transport_type"]').val('flight');
            modal.find('[name="arrival_city"]').val(element.data('arrival_city'));
            modal.find('[name="arrival_country"]').val(element.data('arrival_country'));
            modal.find('[name="arrival_date"]').val(element.data('arrival_date'));
            modal.find('[name="arrival_airport"]').val(element.data('arrival_airport'));
            modal.find('[name="departure_city"]').val(element.data('departure_city'));
            modal.find('[name="departure_country"]').val(element.data('departure_country'));
            modal.find('[name="departure_date"]').val(element.data('departure_date'));
            modal.find('[name="departure_airport"]').val(element.data('departure_airport'));
            modal.find('[name="luggage_included"]').prop('checked', element.data('luggage_included'));
            modal.find('[name="luggage_max_weight"]').val(element.data('luggage_max_weight'));
            modal.find('[name="luggage_height"]').val(element.data('luggage_height'));
            modal.find('[name="luggage_length"]').val(element.data('luggage_length'));
            modal.find('[name="luggage_width"]').val(element.data('luggage_width'));
            modal.find('[name="transport_name"]').val(element.data('transport_name'));
            modal.find('[name="id"]').val(element.data('id'));

            modal.addClass('show');
            $('body').css('overflow', 'hidden');
        })
    }
})(jQuery);

(function ($) {
    $.fn.initShipElement = function (documentData) {
        const element = $(this);

        element.data('name', documentData.name);
        element.data('arrival_city', documentData.arrival_city);
        element.data('arrival_country', documentData.arrival_country);
        element.data('arrival_date', documentData.arrival_date);
        element.data('arrival_port', documentData.arrival_port);
        element.data('departure_city', documentData.departure_city);
        element.data('departure_country', documentData.departure_country);
        element.data('departure_date', documentData.departure_date);
        element.data('departure_port', documentData.departure_port);
        element.data('deck_number', documentData.deck_number);
        element.data('cabin_number', documentData.cabin_number);
        element.data('place_number', documentData.place_number);
        element.data('transport_name', documentData.transport_name);
        element.data('id', documentData.id);

        const documentUpperRow = $('<div>', {class: 'document-upper-row'});

        const elementType = $('<h4>', {class: 'document-type'});
        elementType.html('Корабль');
        documentUpperRow.append(elementType);

        const deleteIconContainer = $('<div>', {class: 'delete-document-icon-container'})
        const deleteIcon = $('<i>', {class: 'fa-solid fa-trash trash-icon'})
        deleteIconContainer.append(deleteIcon);

        deleteIcon.on('click', function () {
            let modal = $('#deleteDocumentModal');

            modal.find('[name="id"]').val(element.data('id'));
            modal.find('[name="name"]').val(element.data('name'));
            modal.find('[name="document_type"]').val('transport');
            modal.find('[name="transport_type"]').val('ship');

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
            modal.find('#flight-info').hide();
            modal.find('#train-info').hide();
            modal.find('#ship-info').show();

            modal.find('[name="name"]').val(element.data('name'));
            modal.find('[name="arrival_city"]').val(element.data('arrival_city'));
            modal.find('[name="arrival_country"]').val(element.data('arrival_country'));
            modal.find('[name="arrival_date"]').val(element.data('arrival_date'));
            modal.find('[name="arrival_port"]').val(element.data('arrival_port'));
            modal.find('[name="departure_city"]').val(element.data('departure_city'));
            modal.find('[name="departure_country"]').val(element.data('departure_country'));
            modal.find('[name="departure_date"]').val(element.data('departure_date'));
            modal.find('[name="departure_port"]').val(element.data('departure_port'));
            modal.find('[name="deck_number"]').val(element.data('deck_number'));
            modal.find('[name="cabin_number"]').val(element.data('cabin_number'));
            modal.find('[name="place_number"]').val(element.data('place_number'));
            modal.find('[name="transport_name"]').val(element.data('transport_name'));
            modal.find('[name="id"]').val(element.data('id'));
            modal.find('[name="transport_type"]').val('ship');

            modal.addClass('show');
            $('body').css('overflow', 'hidden');
        })
    }
})(jQuery);

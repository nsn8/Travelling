(function ($) {
    $.fn.initDocumentElement = function (documentData) {
        const element = $(this);

        element.data('name', documentData.name);
        element.data('accommodation_name', documentData.accommodation_name);
        element.data('accommodation_country', documentData.accommodation_country);
        element.data('accommodation_city', documentData.accommodation_city);
        element.data('accommodation_address', documentData.accommodation_address);
        element.data('check_in_date', documentData.check_in_date);
        element.data('check_out_date', documentData.check_out_date);

        const elementType = $('<h4>', {class: 'document-type'});
        elementType.html(documentData.type ?? 'Проживание');
        element.append(elementType);

        const elementName = $('<h4>', {class: 'document-name'});
        elementName.html(documentData.name);
        element.append(elementName);

        element.on('click', function (event) {
            let modal = $('#documentModal');

            modal.find('[name="name"]').val(element.data('name'));
            ///@TODO: выбор нужной опции в типе
            //modal.find('[name="document_type"]').val(element.data('name'));
            modal.find('[name="accommodation_name"]').val(element.data('accommodation_name'));
            modal.find('[name="accommodation_country"]').val(element.data('accommodation_country'));
            modal.find('[name="accommodation_city"]').val(element.data('accommodation_city'));
            modal.find('[name="accommodation_address"]').val(element.data('accommodation_address'));
            modal.find('[name="check_in_date"]').val(element.data('check_in_date'));
            modal.find('[name="check_out_date"]').val(element.data('check_out_date'));

            modal.addClass('show');
            $('body').css('overflow', 'hidden');
        })
    }
})(jQuery);

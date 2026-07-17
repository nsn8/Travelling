(function ($) {
    $.fn.initTravelElement = function (travelData) {
        const element = $(this);

        element.data('id', travelData.id)
        element.data('is_deleted', travelData.is_deleted)
        element.data('travel-name', travelData.name)
        element.data('start-date', travelData.start_date)
        element.data('end-date', travelData.end_date)

        if (element.data('is_deleted')) {
            element.addClass('readonly')
        }

        const travelUpperRow = $('<div>', {class: 'travel-upper-row'})

        const title = $('<h4>', {class: 'travel-name'});
        title.html(travelData.name);

        travelUpperRow.append(title);

        const deleteIconContainer = $('<div>', {class: 'delete-travel-icon-container'});
        const deleteIcon = $('<i>', {class: 'fa-solid fa-trash trash-icon'});
        deleteIconContainer.append(deleteIcon);

        deleteIcon.on('click', function () {
            let modal = $('#deleteTravelModal');

            modal.find('[name="travel_id"]').val(element.data('id'));
            modal.find('[name="is_deleted"]').val(1);
            modal.find('[name="travel_name"]').val(element.data('travel-name'));

            modal.find('#deleted-name').html(element.data('travel-name'));

            modal.addClass('show');
            $('body').css('overflow', 'hidden');
        });

        if (element.data('is_deleted')) {
            deleteIconContainer.css('display', 'none');
        }

        const editIconContainer = $('<div>', {class: 'edit-travel-icon-container'});
        const editIcon = $('<i>', {class: 'fa-solid fa-edit trash-icon'});
        editIconContainer.append(editIcon);

        editIcon.on('click', function () {
            let modal = $('#travelModal');

            modal.find('[name="travel_id"]').val(element.data('id'));
            modal.find('[name="is_deleted"]').val(element.data('is_deleted'));
            modal.find('[name="travel_name"]').val(element.data('travel-name'));
            modal.find('[name="start_date"]').val(element.data('start-date'));
            modal.find('[name="end_date"]').val(element.data('end-date'));

            modal.addClass('show');
            $('body').css('overflow', 'hidden');
        });

        travelUpperRow.append(editIconContainer);
        travelUpperRow.append(deleteIconContainer);

        element.append(travelUpperRow);

        const startDate = $('<label>', {class: 'date-label'});
        startDate.html(`Дата начала: ${travelData.start_date}`);

        const endDate = $('<label>', {class: 'date-label'});
        endDate.html(`Дата окончания: ${travelData.end_date}`);

        element.append(startDate);
        element.append(endDate);

        element.on('click', function (event) {
            if (element.data('is_deleted') || $(event.target).is(deleteIcon) || $(event.target).is(editIcon)) {
                return;
            }

            let id = element.data('id');

            window.location.href = `travels/${id}`;
        })
    }
})(jQuery);

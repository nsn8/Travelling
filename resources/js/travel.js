$(document).ready(async () => {
    let list = await fetchDocumentsList();

    renderDocumentsList(list);
});

$('#filters-bar').on('click', async function (event) {
    const target = $(event.target);

    if (!target.hasClass('document-filter')) {
        return;
    }

    if (target.hasClass('document-filter-active') && $('.document-filter-active').length !== 1) {
        target.removeClass('document-filter-active');
    } else {
        target.addClass('document-filter-active');
    }

    await refreshDocumentsList();
});

$('[name="search"]').on('input', async function () {
    await refreshDocumentsList();
})

async function refreshDocumentsList() {
    let activeFilters = [];
    let activeFilterElements = $('.document-filter-active');

    activeFilterElements.each(function () {
        activeFilters.push($(this).data('filter'));
    });

    let search = $('[name="search"]').val();

    let list = await fetchDocumentsList(activeFilters, search);

    renderDocumentsList(list);
}

async function fetchDocumentsList(activeFilters = ['accommodation', 'bus', 'train', 'flight', 'ship'], search = '')
{
    let travelId = $('[name="travel_id"]').val();

    return await $.ajax({
        url: '/documents/list',
        type: 'GET',
        data: {
            travel_id: travelId,
            active_filters: activeFilters,
            search: search
        },
        success: function (response) {
            return response;
        }
    });
}

function renderDocumentsList(list)
{
    $('.document-element').remove();

    let container = $('#documents-list');

    Object.values(list).forEach((documentData) => {
        const documentElement = $('<div>', {class: 'document-element'})

        switch (documentData.type) {
            case 'accommodation':
                documentElement.initAccommodationElement(documentData);
                break;
            case 'bus':
                documentElement.initBusElement(documentData);
                break;
            case 'train':
                documentElement.initTrainElement(documentData);
                break;
            case 'flight':
                documentElement.initFlightElement(documentData);
                break;
            case 'ship':
                documentElement.initShipElement(documentData);
                break;
        }

        container.append(documentElement);
    });
}

$('#add-document-button').on('click', function () {
    let modal = $('#documentModal');
    clearModal(modal);

    modal.addClass('show');
    $('body').css('overflow', 'hidden');
});

function clearModal(modal)
{
    modal.find('#accommodation-info').show();
    modal.find('#transport-info').hide();
    modal.find('#bus-info').hide();
    modal.find('#flight-info').hide();
    modal.find('#train-info').hide();

    modal.find('[name="id"]').val('');
    modal.find('[name="name"]').val('');
    modal.find('[name="document_type"]').val('accommodation');
    modal.find('[name="accommodation_name"]').val('');
    modal.find('[name="accommodation_country"]').val('');
    modal.find('[name="accommodation_city"]').val('');
    modal.find('[name="accommodation_address"]').val('');
    modal.find('[name="check_in_date"]').val('');
    modal.find('[name="check_out_date"]').val('');

    modal.find('[name="transport_type"]').val('bus');
    modal.find('[name="arrival_city"]').val('');
    modal.find('[name="arrival_country"]').val('');
    modal.find('[name="arrival_date"]').val('');
    modal.find('[name="arrival_station"]').val('');
    modal.find('[name="bus_number"]').val('');
    modal.find('[name="departure_city"]').val('');
    modal.find('[name="departure_country"]').val('');
    modal.find('[name="departure_date"]').val('');
    modal.find('[name="departure_station"]').val('');
    modal.find('[name="seat_number"]').val('');
    modal.find('[name="transport_name"]').val('');

    modal.find('[name="arrival_railway_station"]').val('');
    modal.find('[name="cart_number"]').val('');
    modal.find('[name="departure_railway_station"]').val('');
    modal.find('[name="place_number"]').val('');

    modal.find('[name="arrival_airport"]').val('');
    modal.find('[name="departure_airport"]').val('');
    modal.find('[name="luggage_max_weight"]').val('');
    modal.find('[name="luggage_height"]').val('');
    modal.find('[name="luggage_length"]').val('');
    modal.find('[name="luggage_width"]').val('');
    modal.find('[name="transport_name"]').val('');
    modal.find('[name="luggage_included"]').prop('checked', false);

    modal.find('[name="arrival_port"]').val('');
    modal.find('[name="departure_port"]').val('');
    modal.find('[name="deck_number"]').val('');
    modal.find('[name="cabin_number"]').val('');
    modal.find('[name="place_number"]').val('');
}

$('#save-document-button').on('click', async function () {
    let formData = new FormData(document.querySelector(('#document-form')));
    formData.append('travel_id', $('[name="travel_id"]').val());

    await $.ajax({
        url: '/documents/save',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
    })

    let modal = $('#documentModal');

    closeModal(modal);

    let list = await fetchDocumentsList();

    renderDocumentsList(list);
});

$('#delete-document-button').on('click', async function() {
    let formData = new FormData(document.querySelector('#delete-document-form'));

    await deleteDocument(formData);

    let modal = $('#deleteDocumentModal');

    closeModal(modal);

    let list = await fetchDocumentsList();

    renderDocumentsList(list);
})

async function deleteDocument(data) {
    return await $.ajax({
        url: '/documents/delete',
        method: 'POST',
        data: data,
        processData: false,
        contentType: false,
    });
}

$('[name="document_type"]').on('change', function () {
    let type = $(this).val();

    $('.document-info').hide();
    $(`#${type}-info`).toggle();

    if (type === 'transport') {
        $('#bus-info').show();
    }
})

$('[name="transport_type"]').on('change', function () {
    let type = $(this).val();

    $('.transport-type-info').hide();
    $(`#${type}-info`).show();
})

function closeModal(modal) {
    modal.addClass('hiding');

    $('body').css('overflow', '');

    modal.one('transitionend', function() {
        modal.removeClass('show hiding');
    });
}

$('.return-button-container').on('click', function () {
    window.location.href = '/';
})

$(document).ready(async () => {
    let list = await fetchTravelsList();

    renderTravelsList(list);
});

$('#filters-bar').on('click', async function (event) {
    const target = $(event.target);

    if (!target.hasClass('travel-filter') || target.hasClass('travel-filter-active')) {
        return;
    }

    $('.travel-filter-active').removeClass('travel-filter-active');
    $(event.target).addClass('travel-filter-active');

    let filter = target.data('filter');

    let list = await fetchTravelsList(filter);

    renderTravelsList(list);
})

$('#add-travel-button').on('click', function () {
    let modal = $('#travelModal');

    modal.find('[name="travel_id"]').val('');
    modal.find('[name="travel_name"]').val('');
    modal.find('[name="start_date"]').val('');
    modal.find('[name="end_date"]').val('');

    modal.addClass('show');
    $('body').css('overflow', 'hidden');
})

$('#save-travel-button').on('click', async function () {
    let formData = new FormData(document.querySelector('#travel-form'));

    try {
        await saveTravel(formData);
    } catch (error) {
        toastr.error(error.message);
    }

    let modal = $('#travelModal');

    closeModal(modal);

    let filter = $('.travel-filter-active').data('filter');

    let list = await fetchTravelsList(filter);

    renderTravelsList(list);
})

$('#delete-travel-button').on('click', async function() {
    let formData = new FormData(document.querySelector('#delete-travel-form'));

    await deleteTravel(formData);

    let modal = $('#deleteTravelModal');

    closeModal(modal);

    await refreshTravelsList();
})

$('[name="search"]').on('input', async function () {
    await refreshTravelsList();
})

$('.sorting').on('change', async function() {
    await refreshTravelsList();
})

async function refreshTravelsList() {
    let search = $('[name="search"]').val();

    let filter = $('.travel-filter-active').data('filter');

    let sortingField = $('#sorting-field').val();

    let sortingDirection = $('#sorting-direction').val();

    let list = await fetchTravelsList(filter, search, sortingField, sortingDirection);

    renderTravelsList(list);
}

async function deleteTravel(data) {
    return await $.ajax({
        url: '/travels/delete',
        method: 'POST',
        data: data,
        processData: false,
        contentType: false,
    });
}

async function fetchTravelsList(filter = 'all', search = '', sorting_field = 'start_date', sorting_direction = 'asc') {
    return await $.ajax({
        url: '/travels/list',
        method: 'GET',
        data: {
            filter: filter,
            search: search,
            sorting_field: sorting_field,
            sorting_direction: sorting_direction
        },
        success: (response) => {
            return response;
        }
    });
}

async function saveTravel(data) {
    try {
        return await $.ajax({
            url: '/travels/save',
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
        });
    } catch (jqXHR) {
        let errorMessage = 'Произошла ошибка';

        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
            errorMessage = jqXHR.responseJSON.message;
        } else if (jqXHR.responseText) {
            try {
                const json = JSON.parse(jqXHR.responseText);
                if (json.message) {
                    errorMessage = json.message;
                }
            } catch (e) {

            }
        }

        const error = new Error(errorMessage);
        error.code = jqXHR.status;

        throw error;
    }
}

function renderTravelsList(list) {
    $('.travels-element:not(#add-travel-button)').remove();

    let lastInsertedElement = $('#add-travel-button');

    Object.values(list).forEach((travelData) => {
        const travelElement = $('<div>', {class: 'travels-element'})

        travelElement.initTravelElement(travelData);

        lastInsertedElement.after(travelElement);

        lastInsertedElement = travelElement;
    });
}

function closeModal(modal) {
    modal.addClass('hiding');

    $('body').css('overflow', '');

    modal.one('transitionend', function() {
        modal.removeClass('show hiding');
    });
}

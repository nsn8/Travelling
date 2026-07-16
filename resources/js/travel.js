$(document).ready(async () => {
    let list = await fetchDocumentsList();

    renderDocumentsList(list);
});

async function fetchDocumentsList()
{
    let travelId = $('[name="travel_id"]').val();

    return await $.ajax({
        url: '/documents/list',
        type: 'GET',
        data: {
            travel_id: travelId
        },
        success: function (response) {
            return response;
        }
    });
}

function renderDocumentsList(list)
{
    $('.document-element').remove();

    let lastInsertedElement = $('#add-document-button');

    Object.values(list).forEach((documentData) => {
        const documentElement = $('<div>', {class: 'document-element'})

        documentElement.initDocumentElement(documentData);

        lastInsertedElement.after(documentElement);

        lastInsertedElement = documentElement;
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
    modal.find('[name="name"]').val('');
    ///@TODO: подставить проживание по-умолчанию
    //modal.find('[name="document_type"]').val(element.data('name'));
    modal.find('[name="accommodation_name"]').val('');
    modal.find('[name="accommodation_country"]').val('');
    modal.find('[name="accommodation_city"]').val('');
    modal.find('[name="accommodation_address"]').val('');
    modal.find('[name="check_in_date"]').val('');
    modal.find('[name="check_out_date"]').val('');
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

    closeModal(modal)

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
})

$('[name="transport_type"]').on('change', function () {
    let type = $(this).val();

    $('.transport-type-info').hide();
    $(`#${type}-info`).toggle();
})

function closeModal(modal) {
    modal.addClass('hiding');

    $('body').css('overflow', '');

    modal.one('transitionend', function() {
        modal.removeClass('show hiding');
    });
}

$(document).ready(() => {

});

$('#add-document-button').on('click', function () {
    let modal = $('#documentModal');

    modal.addClass('show');
    $('body').css('overflow', 'hidden');
});

$('#save-document-button').on('click', async function () {
    let formData = new FormData(document.querySelector(('#document-form')));
    formData.append('travel_id', $('[name="travel_id"]'));

    await $.ajax({
        url: '/documents/save',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
    })
});

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

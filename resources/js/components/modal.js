$('.modal-close').on('click', function() {
    closeModal($(this).parents('.modal-overlay'));
});

$('.cancel-modal').on('click', function () {
    closeModal($(this).parents('.modal-overlay'))
})

$('.modal-overlay').on('click', function(e) {
    if (e.target === this) {
        closeModal($(this));
    }
});

function closeModal(modalElement) {
    modalElement.addClass('hiding');

    $('body').css('overflow', '');

    modalElement.one('transitionend', function() {
        modalElement.removeClass('show hiding');
    });
}

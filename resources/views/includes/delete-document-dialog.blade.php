<div id="deleteDocumentModal" class="modal-overlay">
    <div class="modal-window">
        <button id="closeModal" class="modal-close">&times;</button>
        <form id="delete-document-form">
            <label>
                Вы действительно хотите удалить документ <b><span id="deleted-name"></span></b>?
            </label>
            @csrf
            <input type="hidden" name="id">
            <input type="hidden" name="name">
            <input type="hidden" name="document_type">
            <div class="modal-button-block">
                <div class="modal-button cancel-modal" id="cancel-button">Отмена</div>
                <div class="modal-button" id="delete-document-button">Подтвердить</div>
            </div>
        </form>
    </div>
</div>

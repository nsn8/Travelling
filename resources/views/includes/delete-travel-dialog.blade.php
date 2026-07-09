<div id="deleteTravelModal" class="modal-overlay">
    <div class="modal-window">
        <button id="closeModal" class="modal-close">&times;</button>
        <form id="delete-travel-form">
            <label>
                Вы действительно хотите удалить путешествие <b><span id="deleted-name"></span></b>?
            </label>
            @csrf
            <input type="hidden" name="travel_id">
            <input type="hidden" name="travel_name">
            <input type="hidden" name="is_deleted">
            <div class="modal-button-block">
                <div class="modal-button cancel-modal" id="cancel-button">Отмена</div>
                <div class="modal-button" id="delete-travel-button">Подтвердить</div>
            </div>
        </form>
    </div>
</div>

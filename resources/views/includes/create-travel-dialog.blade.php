<div id="travelModal" class="modal-overlay">
    <div class="modal-window">
        <button id="closeModal" class="modal-close">&times;</button>
        <h2>Путешествие</h2>
        <form id="travel-form">
            @csrf
            <input type="hidden" name="travel_id">
            <input type="hidden" name="is_deleted">
            <div class="modal-block">
                <label>Название</label>
                <input type="text" name="travel_name" />
            </div>
            <div class="modal-block">
                <label>Дата начала</label>
                <input type="date" name="start_date" />
            </div>
            <div class="modal-block">
                <label>Дата окончания</label>
                <input type="date" name="end_date" />
            </div>
            <div class="modal-button-block">
                <div class="modal-button cancel-modal" id="cancel-button">Отмена</div>
                <div class="modal-button" id="save-travel-button">Сохранить</div>
            </div>
        </form>
    </div>
</div>

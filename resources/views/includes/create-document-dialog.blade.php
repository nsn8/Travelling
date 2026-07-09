<div id="documentModal" class="modal-overlay">
    <div class="modal-window">
        <button id="closeModal" class="modal-close">&times;</button>
        <h2>Документ</h2>
        <form id="document-form">
            @csrf
            <input type="hidden" name="id">
            <div class="modal-block">
                <label>Название</label>
                <input type="text" name="name" />
            </div>
            <div class="modal-block">
                <label>Тип документа</label>
                <select name="document_type">
                    <option value="accommodation">Проживание</option>
                    <option value="transport">Транспорт</option>
                </select>
            </div>
            @include('includes.documents.accommodation-info')
            @include('includes.documents.transport-info')
            <div class="modal-button-block">
                <div class="modal-button cancel-modal" id="cancel-button">Отмена</div>
                <div class="modal-button" id="save-document-button">Сохранить</div>
            </div>
        </form>
    </div>
</div>

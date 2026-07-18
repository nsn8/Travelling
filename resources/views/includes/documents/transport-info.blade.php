<div class="document-info" id="transport-info" style="display: none">
    <div class="modal-block">
        <label>Способ перемещения</label>
        <select name="transport_type">
            <option value="bus">Автобус</option>
            <option value="flight">Самолет</option>
            <option value="train">Поезд</option>
            <option value="ship">Корабль</option>
        </select>
    </div>
    <div class="modal-block">
        <label>Номер рейса</label>
        <input type="text" name="transport_name" />
    </div>
    <div class="modal-block">
        <label>Страна отправления</label>
        <input type="text" name="departure_country" />
    </div>
    <div class="modal-block">
        <label>Город отправления</label>
        <input type="text" name="departure_city" />
    </div>
    <div class="modal-block">
        <label>Страна прибытия</label>
        <input type="text" name="arrival_country" />
    </div>
    <div class="modal-block">
        <label>Город прибытия</label>
        <input type="text" name="arrival_city" />
    </div>
    <div class="modal-block">
        <label>Дата и время отправления</label>
        <input type="datetime-local" name="departure_date" />
    </div>
    <div class="modal-block">
        <label>Дата и время прибытия</label>
        <input type="datetime-local" name="arrival_date" />
    </div>
    @include('includes.documents.transports.flight-info')
    @include('includes.documents.transports.train-info')
    @include('includes.documents.transports.bus-info')
    @include('includes.documents.transports.ship-info')
</div>

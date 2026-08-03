<div class="transport-type-info" id="flight-info" style="display: none">
    <div class="modal-block">
        <label>Аэропорт вылета</label>
        <input type="text" name="departure_airport" />
    </div>
    <div class="modal-block">
        <label>Аэропорт прилета</label>
        <input type="text" name="arrival_airport" />
    </div>
    <div class="modal-block">
        <label>
            Багаж
            <input type="checkbox" name="luggage_included" />
        </label>
    </div>
    <div class="modal-block" id="luggage_info">
        <label>Максимальный вес багажа</label>
        <div>
            <input type="number" name="luggage_max_weight">
            <label>кг</label>
        </div>
        <label>Габариты багажа</label>
        <div>
            <input type="number" name="luggage_width" style="width: 30px">
            <label>x</label>
            <input type="number" name="luggage_height" style="width: 30px">
            <label>x</label>
            <input type="number" name="luggage_length" style="width: 30px">
        </div>
    </div>
</div>

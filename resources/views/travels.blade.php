@extends('app')

@section('title', 'Мои путешествия')

@section('content')
    <h1>Мои путешествия</h1>
    <div id="filters-bar">
        <div class="travel-filter travel-filter-active" data-filter="all">Все</div>
        <div class="travel-filter" data-filter="current">Текущие</div>
        <div class="travel-filter" data-filter="future">Предстоящие</div>
        <div class="travel-filter" data-filter="past">Прошедшие</div>
        <div class="travel-filter" data-filter="deleted">Удаленные</div>
        <input type="text" class="travel-search" name="search" placeholder="поиск">
        <div id="sorting-container">
            <label>Сортировать</label>
            <select class="travel-search sorting" id="sorting-field">
                <option value="start_date" selected>по дате начала</option>
                <option value="end_date">по дате окончания</option>
            </select>
            <label>по</label>
            <select class="travel-search sorting" id="sorting-direction">
                <option value="asc" selected>возрастанию</option>
                <option value="desc">убыванию</option>
            </select>
        </div>
    </div>
    <div id="travels-list">
        <div class="travels-element" id="add-travel-button">+ Добавить новое</div>
    </div>
    @include('includes.create-travel-dialog')
    @include('includes.delete-travel-dialog')
@endsection

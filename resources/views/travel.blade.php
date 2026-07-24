@extends('app')

@section('title', $name)

@section('content')
    <div class="return-button-container">
        <div class="button">Вернуться к путешествиям</div>
    </div>
    <div id="travel-info">
        <input type="hidden" name="travel_id" value="{{ $id }}">
        <input type="hidden" name="is_deleted" value="{{ $is_deleted }}">
        <div class="travel-info-block">
            <h2>Название</h2>
            <input class="travel-info-input" type="text" name="travel_name" value="{{ $name }}"/>
        </div>
        <div class="travel-info-block">
            <h2>Дата начала</h2>
            <input class="travel-info-input" type="date" name="start_date" value="{{ $start_date }}"/>
        </div>
        <div class="travel-info-block">
            <h2>Дата окончания</h2>
            <input class="travel-info-input" type="date" name="end_date" value="{{ $end_date }}"/>
        </div>
    </div>
    <div id="route-container">
        <h2>Маршрут</h2>
        <div class="button" id="compile-route-button">Построить маршрут</div>
        <div id="route-timeline">
            <svg id="connection-svg"></svg>
        </div>
    </div>
    <div id="documents-list-container">
        <div id="documents-list-upper-row">
            <h2>Документы</h2>
            <div class="button" id="add-document-button">+ Добавить новый документ</div>
            <div id="filters-bar">
                <div class="document-filter document-filter-active" data-filter="accommodation">Проживания</div>
                <div class="document-filter document-filter-active" data-filter="bus">Автобусы</div>
                <div class="document-filter document-filter-active" data-filter="train">Поезда</div>
                <div class="document-filter document-filter-active" data-filter="flight">Перелеты</div>
                <div class="document-filter document-filter-active" data-filter="ship">Корабли</div>
                <input type="text" class="document-search" name="search" placeholder="поиск">
            </div>
            <div id="documents-list"></div>
        </div>
    </div>
    @include('includes.create-document-dialog')
    @include('includes.delete-document-dialog')
@endsection

@section('scripts')
    @parent
    @vite(['resources/js/components/document/accommodation-element.js'])
    @vite(['resources/js/components/document/bus-element.js'])
    @vite(['resources/js/components/document/train-element.js'])
    @vite(['resources/js/components/document/flight-element.js'])
    @vite(['resources/js/components/document/ship-element.js'])
    @vite(['resources/js/travel.js'])
    @vite(['resources/js/components/timeline/timeline.js'])
    @vite(['resources/js/components/timeline/events/bus-departure-event.js'])
    @vite(['resources/js/components/timeline/events/bus-arrival-event.js'])
    @vite(['resources/js/components/timeline/events/flight-departure-event.js'])
    @vite(['resources/js/components/timeline/events/flight-arrival-event.js'])
    @vite(['resources/js/components/timeline/events/train-departure-event.js'])
    @vite(['resources/js/components/timeline/events/train-arrival-event.js'])
    @vite(['resources/js/components/timeline/events/ship-departure-event.js'])
    @vite(['resources/js/components/timeline/events/ship-arrival-event.js'])
    @vite(['resources/js/components/timeline/events/accommodation-check-in-event.js'])
    @vite(['resources/js/components/timeline/events/accommodation-check-out-event.js'])
    @vite(['resources/js/components/timeline/elements/element-header.js'])
    @vite(['resources/js/components/timeline/elements/element-dates-container.js'])
    @vite(['resources/js/components/timeline/elements/element-label.js'])
    @vite(['resources/js/components/timeline/markers/flight-departure-marker.js'])
    @vite(['resources/js/components/timeline/markers/flight-arrival-marker.js'])
    @vite(['resources/js/components/timeline/markers/bus-departure-marker.js'])
    @vite(['resources/js/components/timeline/markers/bus-arrival-marker.js'])
    @vite(['resources/js/components/timeline/markers/train-departure-marker.js'])
    @vite(['resources/js/components/timeline/markers/train-arrival-marker.js'])
    @vite(['resources/js/components/timeline/markers/ship-departure-marker.js'])
    @vite(['resources/js/components/timeline/markers/ship-arrival-marker.js'])
    @vite(['resources/js/components/timeline/markers/accommodation-check-in-marker.js'])
    @vite(['resources/js/components/timeline/markers/accommodation-check-out-marker.js'])
    @vite(['resources/js/components/timeline/element-factory.js'])
    @vite(['resources/js/components/timeline/marker-factory.js'])
    @vite(['resources/js/components/timeline/hover-handler.js'])
    @vite(['resources/js/components/timeline/markers-connector.js'])
    @vite(['resources/js/components/timeline/line-drawer.js'])
@endsection

@section('styles')
    @parent
    @vite(['resources/css/components/document/document-element.css'])
    @vite(['resources/css/travel.css'])
    @vite(['resources/css/components/timeline/timeline.css'])
@endsection

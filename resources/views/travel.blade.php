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
    <div id="route">
        <h2>Маршрут</h2>
    </div>
    <div id="documents-list">
        <div id="documents-list-upper-row">
            <h2>Документы</h2>
            <div class="button" id="add-document-button">+ Добавить новый документ</div>
        </div>
    </div>
    @include('includes.create-document-dialog')
    @include('includes.delete-document-dialog')
@endsection

@section('scripts')
    @parent
    @vite(['resources/js/components/document-element.js'])
    @vite(['resources/js/travel.js'])
@endsection

@section('styles')
    @parent
    @vite(['resources/css/components/document-element.css'])
    @vite(['resources/css/travel.css'])
@endsection

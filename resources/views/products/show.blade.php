@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">Просмотр товара</h1>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">ID:</div>
                    <div class="col-md-8">{{ $product->id }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Название:</div>
                    <div class="col-md-8">{{ $product->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Категория:</div>
                    <div class="col-md-8">{{ $product->category->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Цена:</div>
                    <div class="col-md-8">{{ number_format($product->price, 2) }} ₽</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Описание:</div>
                    <div class="col-md-8">{{ $product->description ?? 'Нет описания' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Дата создания:</div>
                    <div class="col-md-8">{{ $product->created_at->format('d.m.Y H:i') }}</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Редактировать
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Назад к списку
                </a>
            </div>
        </div>
    </div>
@endsection

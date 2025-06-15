@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">Заказ #{{ $order->id }}</h1>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Статус:</div>
                    <div class="col-md-8">
                        @if($order->status == 'new')
                            <span class="badge bg-primary">Новый</span>
                        @else
                            <span class="badge bg-success">Выполнен</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">ФИО покупателя:</div>
                    <div class="col-md-8">{{ $order->customer_name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Дата создания:</div>
                    <div class="col-md-8">{{ $order->formatted_created_at }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Товар:</div>
                    <div class="col-md-8">
                        <a href="{{ route('products.show', $order->product_id) }}">
                            {{ $order->product->name }}
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Количество:</div>
                    <div class="col-md-8">{{ $order->quantity }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Цена за единицу:</div>
                    <div class="col-md-8">{{ number_format($order->product->price, 2) }} ₽</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Итоговая цена:</div>
                    <div class="col-md-8">{{ $order->formatted_total_price }} ₽</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Комментарий:</div>
                    <div class="col-md-8">{{ $order->comment ?? 'Нет комментария' }}</div>
                </div>
            </div>
            <div class="card-footer">
                @if($order->status == 'new')
                    <form action="{{ route('orders.complete', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Отметить как выполненный
                        </button>
                    </form>
                @endif
                <a href="{{ route('orders.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Назад к списку
                </a>
            </div>
        </div>
    </div>
@endsection

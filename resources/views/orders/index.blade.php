@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Управление заказами</h1>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('orders.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Создать заказ
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>Покупатель</th>
                <th>Статус</th>
                <th>Итоговая цена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->formatted_created_at }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        @if($order->status == 'new')
                            <span class="badge bg-primary">Новый</span>
                        @else
                            <span class="badge bg-success">Выполнен</span>
                        @endif
                    </td>
                    <td>{{ $order->formatted_total_price }} ₽</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить заказ?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection

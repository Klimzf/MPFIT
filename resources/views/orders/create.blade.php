@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Создать новый заказ</h1>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="customer_name" class="form-label">ФИО покупателя *</label>
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                       id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                @error('customer_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_id" class="form-label">Товар *</label>
                <select class="form-select @error('product_id') is-invalid @enderror"
                        id="product_id" name="product_id" required>
                    <option value="">Выберите товар</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} ({{ number_format($product->price, 2) }} ₽)
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Количество *</label>
                <input type="number" min="1" value="{{ old('quantity', 1) }}"
                       class="form-control @error('quantity') is-invalid @enderror"
                       id="quantity" name="quantity" required>
                @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий покупателя</label>
                <textarea class="form-control @error('comment') is-invalid @enderror"
                          id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
                @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать заказ</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection

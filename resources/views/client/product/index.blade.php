@extends('client.master')
@section('content')
    @php
    $string = request()->path();
    $string = explode('/', $string);
    $cateId = array_pop($string);
    @endphp
    @foreach ($products as $product)
        <a href="{{ route('cate.product.detail', ['id' => $cateId, 'product_id' => $product->id]) }}"
            class="category-link col c-3">
            <div class="product-column product-into-cart" style="margin-top: 50px; padding:10px">
                <img src="{{ $product->image->path }}" alt="" class="product-img">
                <p class="product-name">{{ $product->name }}</p>
                <p class="product-price">{{ number_format($product->price, 0, '', '.') }}đ</p>
                <div class="product-trend">Yêu thích</div>
            </div>
        </a>
    @endforeach
@endsection

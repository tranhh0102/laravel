@extends('admin.layouts.app')
@section('title', 'Show Products')
@section('content')
    <div class="card">
        <h1>Show Products</h1>

        <div>

            <div class="row">
               

                <div class="4">
                    <p>Name : {{ $products->name }}</p>

                </div>

                <div class="">
                    <p>Price: {{ $products->price }}</p>

                </div>

                <div class="">
                    <p>Sale: {{ $products->sale }}</p>

                </div>

                <div class="form-group">
                    <p>Description</p>
                    <div class="row w-100 h-100">
                        {!! $products->description !!}
                    </div>
                </div>
                <div class="">
                    <p>Size: {{ $products->size }}</p>

                </div>

            </div>
            <div>
                <p>Category</p>
                @foreach ($products->categories as $item)
                    <p>{{ $item->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection

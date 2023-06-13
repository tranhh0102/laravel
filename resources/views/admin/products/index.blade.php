@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')
    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif


        <h1>
            Products list
        </h1>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>

        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>

                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>

                        <td>{{ $item->price }}</td>

                        <td>{{ $item->sale }}</td>
                        <td>{{$item->size}}</td>
                        <td>
                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                     
                            <a href="{{ route('products.show', $item->id) }}" class="btn btn-warning">Show</a>
                   
                     
                            <form action="{{ route('products.destroy', $item->id) }}" id="form-delete{{ $item->id }}"
                                method="post">
                                @csrf
                                @method('delete')

                            </form>

                            <button class="btn btn-delete btn-danger" data-id="{{ $item->id }}">Delete</button>
                     
                </tr>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>

</div>

@endsection

@section('script')


@endsection

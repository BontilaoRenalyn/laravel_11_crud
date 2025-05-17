@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
        @endsession

        <!-- User Profile Section -->
        <div class="card mb-4">
            <div class="card-body d-flex align-items-center">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 24px;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="ms-3">
                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Product List</div>
            <div class="card-body">
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2">
                    <i class="bi bi-plus-circle"></i> Add New Product
                </a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                @if($product->image)
                                    <div style="width: 100px; height: 100px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa; border-radius: 4px;">
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                             alt="Product Image" 
                                             style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @else
                                    <div style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa; border-radius: 4px;">
                                        <span class="text-muted">No image</span>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="7">
                            <span class="text-danger">
                                <strong>No Product Found!</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>



 
@endsection
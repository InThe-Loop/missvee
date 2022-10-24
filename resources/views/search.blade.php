@extends('layouts.app')
@section('title', 'Search')
@section('content')

<div class="container p-3">
    <a class="go-back" href="#">
        <div class="arrow pb-2"> Back</div>
    </a>
    <h3 class="lead text-dark">Showing {{ $products->count() }} results for "{{ $query }}" out of {{ $products->total() }}</h3>
    @if ($products->total() == 0)
        <div class="alert alert-primary">
            No products found for your search
        </div>
    @else
        <table class="table table-bordered table-responsive w-100">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">details</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="col w-25"><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></td>
                        <td class="col w-25">R{{ format($product->price) }}</td>
                        <td class="col w-25">{{ $product->details }}</td>
                        <td class="col w-25">{!! str_limit($product->description, 70) !!}</td>
                        <td class="col"><a href="{{ route('shop.show', $product->slug) }}"><img class="search-img" src="{{ productImage($product->image) }}" alt="..."></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">details</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                </tr>
            </tfoot>
        </table>
    @endif
    <div class="col-md-12 text-center">
        {{ $products->links() }}
    </div>
</div>

@endsection
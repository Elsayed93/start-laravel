@extends('offers.nav')

@section('title', 'products list')

@section('content')
<div class="container">
    {{-- All products --}}
    <div class="row mt-5">
        <div class="col-sm-12">
            <h1>{{ __('products.all-products') }}</h1>
        </div>
    </div>

    {{-- Add product Button --}}
    <div class="row mt-5">
        <div class="col-sm-12">
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg">{{ __('products.add-product') }}</a>
        </div>
    </div>

    @if (session()->has('DeleteMessage'))
    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="alert alert-success" role="alert">{{ session()->get('DeleteMessage') }}</div>
        </div>
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-sm-12">
            <table class="table table-striped">

                <thead class="table-primary">
                    <tr>
                        <th>Id</th>
                        <th> {{ __('products.product-name') }}</th>
                        <th>{{ __('products.product-details') }}</th>
                        <th>{{ __('products.product-price') }}</th>
                        <th>{{ __('products.product-actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @isset($products)
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->details }}</td>
                        <td>{{ $product->price }}</td>
                        <td style="display: flex;">
                            {{-- edit offer --}}
                            <a style="margin: 0 5px;" href="{{ url('offers/edit/' . $product->id) }}"
                                class="editAction">{{ __('index-offers.offer-edit') }}</a>
                            {{-- delete offer --}}
                            <form action="{{ route('offer.delete', $product->id) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="deleteAction">{{ __('index-offers.offer-delete') }}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endisset

                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
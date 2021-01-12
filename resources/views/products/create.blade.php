@extends('offers.nav')
{{-- title --}}
@section('title',  __('products.add-product'))

@section('content')

    {{-- {{dd($errors->all())}} --}}

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                {{-- Add new product --}}
                <h1>{{ __('products.add-product') }}</h1>

            </div>
        </div>

        @isset($successAdded)
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="alert alert-success" role="alert">
                        {{-- offer added successfully --}}
                        {{ isset($successAdded) ? $successAdded : '' }}
                    </div>
                </div>
            </div>
        @endisset

    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        {{-- product name --}}
                        <label for="name" class="form-label">{{ __('products.product-name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            aria-describedby="emailHelp" value="{{ old('name') }}"
                            placeholder="{{ __('products.product-name') }}">
                        @error('name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- offer price --}}
                        <label for="price" class="form-label">{{ __('products.product-price') }}</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            aria-describedby="emailHelp" value="{{ old('price') }}"
                            placeholder="{{ __('products.product-price') }}">
                        @error('price')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- product details --}}
                        <label for="details" class="form-label"> {{ __('products.product-details') }}</label>
                        <textarea name="details" id="details" cols="10" rows="5"
                            class="form-control @error('details') is-invalid @enderror"
                            placeholder="{{ __('products.product-details') }}">{{ old('details') }}</textarea>
                        @error('details')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="font-size: 12px; width:fit-content; padding:15px 20px;"> {{ __('products.product-save') }}</button>
                </form>

            </div>
        </div>

    </div>
@endsection

@extends('offers.nav')

@section('title', 'create offer')
    
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1>{{ __('create-offer.add-offer') }}</h1>

            </div>
        </div>

        @isset($successAdded)
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="alert alert-success" role="alert">
                        {{ isset($successAdded) ? $successAdded : '' }}
                    </div>
                </div>
            </div>
        @endisset

    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('offers.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="Name" class="form-label">{{ __('create-offer.offer-name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="Name" name="name"
                            aria-describedby="emailHelp" value="{{ old('name') }}"
                            placeholder="{{ __('create-offer.offer-name') }}">
                        @error('name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('create-offer.offer-price') }}</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            value="{{ old('price') }}" placeholder="{{ __('create-offer.offer-price') }}">
                        @error('price')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label"> {{ __('create-offer.offer-details') }}</label>
                        <textarea name="details" id="details" cols="10" rows="5"
                            class="form-control @error('details') is-invalid @enderror"
                            placeholder="{{ __('create-offer.offer-details') }}">{{ old('details') }}</textarea>
                        @error('details')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('create-offer.save-offer') }}</button>
                </form>

            </div>
        </div>

    </div>
@endsection

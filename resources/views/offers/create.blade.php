@extends('offers.nav')

@section('title',  __('create-offer.add-offer'))

@section('content')

    {{-- {{dd($errors->all())}} --}}

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                {{-- Add new offer --}}
                <h1>{{ __('create-offer.add-offer') }}</h1>

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
                <form method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        {{-- offer name_ar --}}
                        <label for="name_ar" class="form-label">{{ __('create-offer.offer-name_ar') }}</label>
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar"
                            aria-describedby="emailHelp" value="{{ old('name_ar') }}"
                            placeholder="{{ __('create-offer.offer-name_ar') }}">
                        @error('name_ar')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- offer name_en --}}
                        <label for="name_en" class="form-label">{{ __('create-offer.offer-name_en') }}</label>
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en"
                            aria-describedby="emailHelp" value="{{ old('name_en') }}"
                            placeholder="{{ __('create-offer.offer-name_en') }}">
                        @error('name_en')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- offer price --}}
                        <label for="price" class="form-label">{{ __('create-offer.offer-price') }}</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            aria-describedby="emailHelp" value="{{ old('price') }}"
                            placeholder="{{ __('create-offer.offer-price') }}">
                        @error('price')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- offer details arabic--}}
                        <label for="details_ar" class="form-label"> {{ __('create-offer.offer-details_ar') }}</label>
                        <textarea name="details_ar" id="details_ar" cols="10" rows="5"
                            class="form-control @error('details_ar') is-invalid @enderror"
                            placeholder="{{ __('create-offer.offer-details_ar') }}">{{ old('details_ar') }}</textarea>
                        @error('details_ar')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- offer details english--}}
                        <label for="details_en" class="form-label"> {{ __('create-offer.offer-details_en') }}</label>
                        <textarea name="details_en" id="details_en" cols="10" rows="5"
                            class="form-control @error('details_en') is-invalid @enderror"
                            placeholder="{{ __('create-offer.offer-details_en') }}">{{ old('details_en') }}</textarea>
                        @error('details_en')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        {{-- offer image --}}
                        <label for="image" class="form-label">{{ __('create-offer.offer-image') }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                            value="{{ old('image') }}" placeholder="{{ __('create-offer.offer-image') }}">
                        @error('image')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="font-size: 12px; width:fit-content; padding:15px 20px;"> {{ __('create-offer.save-offer') }}</button>
                </form>

            </div>
        </div>

    </div>
@endsection

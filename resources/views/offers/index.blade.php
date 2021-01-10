@extends('offers.nav')

@section('title', 'offers list')

@section('content')
    <div class="container">
        {{-- All Offers --}}
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1>{{ __('index-offers.all-offers') }}</h1>
            </div>
        </div>

        @if (session()->has('updateMessage'))
            <div class="row mt-3">
                <div class="col-sm-6">
                    <div class="alert alert-success alert-dismissable">{{ session()->get('updateMessage') }}</div>
                </div>
            </div>
        @endif

        {{-- Add Offer Button --}}
        <div class="row mt-5">
            <div class="col-sm-12">
                <a href="{{ route('offers.create') }}" class="btn btn-primary btn-lg">{{ __('index-offers.add-offer') }}</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12">
                <table class="table table-striped">

                    <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th> {{ __('index-offers.offer-name') }}</th>
                            <th>{{ __('index-offers.offer-details') }}</th>
                            <th>{{ __('index-offers.offer-price') }}</th>
                            <th>{{ __('index-offers.offer-actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @isset($offers)
                            @foreach ($offers as $offer)
                                <tr>
                                    <td>{{ $offer->id }}</td>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->details }}</td>
                                    <td>{{ $offer->price }}</td>
                                    <td style="display: flex;">
                                        {{-- edit offer --}}
                                        <a style="margin: 0 5px;" href="{{ url('offers/edit/' . $offer->id) }}"
                                            class="editAction">{{ __('index-offers.offer-edit') }}</a>
                                        {{-- delete offer --}}
                                        <a style="margin: 0 5px;" href=""
                                            class="deleteAction">{{ __('index-offers.offer-delete') }}</a>
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

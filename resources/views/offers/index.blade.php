@extends('offers.nav')

@section('title', 'offers list')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1>{{ __('index-offers.all-offers') }}</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12">
                <a href="{{route('offers.create')}}" class="btn btn-primary btn-lg">{{ __('index-offers.add-offer') }}</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12">
                <table class="table table-striped">

                    <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th>Offer Name</th>
                            <th>Price</th>
                            <th>Details</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->details }}</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection

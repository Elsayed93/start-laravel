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


    <div class="row mt-5">
      <div class="col-sm-12">
        <table class="table table-striped">

          <thead class="table-primary">
            <tr>
              <th>Id</th>
              <th> {{ __('products.product-name') }}</th>
              <th>{{ __('products.product-details') }}</th>
              <th>{{ __('products.product-price') }}</th>
              <th>{{ __('products.product-image') }}</th>
              <th>{{ __('products.product-actions') }}</th>
            </tr>
          </thead>

          <tbody>
            @isset($products)
              @foreach ($products as $product)
                <tr style="vertical-align: middle">
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->details }}</td>
                  <td>{{ $product->price }}</td>
                  <td> <img src="{{ asset('images/products/' . $product->image) }}" alt="" width="200px"></td>
                  <td style="display: flex">
                    {{-- edit offer --}}
                    {{-- <a href="" class="editAction" prod_id="{{ $product->id }}">Edit</a>
                    --}}

                    {{-- delete offer --}}
                    <a href="" class="deleteAction" prod_id="{{ $product->id }}">Delete</a>
                    {{-- <button prod_id="{{ $product->id }}" class="deleteAction">
                      Delete</button> --}}
                    {{-- <form action="{{ route('offer.delete', $product->id) }}"
                      method="post">
                      @csrf
                      <button type="submit" class="deleteAction">{{ __('index-offers.offer-delete') }}</button>
                    </form> --}}
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

@section('script')
  <script>
    $(document).ready(function() {
      $('.deleteAction').click(function(e) {
        var _tr = $(this).parent().parent()
        e.preventDefault();
        var prod_id = $(this).attr('prod_id');
        console.log(prod_id);
        $.ajax({

          url: "{{ route('products.delete') }}",
          type: 'POST',

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          data: {
            'id': prod_id,
          },

          success: function(data) {
            _tr.addClass('d-none');



          },

          reject: function(reject) {

          }
        });
      });
    });

  </script>
@endsection

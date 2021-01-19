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

    {{-- create Message --}}
    <div class="col-sm-6 mt-3">
      <div class="alert alert-success" role="alert" style="display: none" id="deleteMessage">

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
                <tr class="productRow{{ $product->id }}">
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->details }}</td>
                  <td>{{ $product->price }}</td>
                  <td> <img src="{{ asset('images/products/' . $product->image) }}" alt="" width="200px"></td>
                  <td style="display: flex">
                    {{-- edit offer --}}
                    <a href="{{ route('products.edit', $product->id) }}" class="editAction">Edit</a>
                    {{-- delete offer --}}
                    <a href="" class="deleteAction" prod_id="{{ $product->id }}">Delete</a>
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
      // ----------- delete Button  ------------ //
      $('.deleteAction').click(function(e) {
        // var _tr = $(this).parent().parent();
        e.preventDefault();
        var prod_id = $(this).attr('prod_id');
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
            console.log(data);
            $('#deleteMessage').show().html(data.message);
            $(`.productRow${data.id}`).remove();
            console.log(`.productRow${data.id}`);
            alert(data.message);
          },

          reject: function(reject) {
            console.log(reject);
            // alert(reject.message);
          }
        });
      });
    });

  </script>
@endsection

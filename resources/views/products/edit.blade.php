@extends('offers.nav')
{{-- title --}}
@section('title', __('products.add-product'))

@section('content')

  {{-- {{ dd($errors->all()) }} --}}

  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-12">
        {{-- Update product --}}
        <h1>{{ __('products.product-update') }}</h1>

      </div>
    </div>


    {{-- update Message --}}
    <div class="col-sm-6 mt-3">
      <div class="alert alert-success" role="alert" style="display: none" id="updateMessage">

      </div>
    </div>

  </div>
  <div class="container">
    <div class="row my-5">
      <div class="col-sm-12">
        <form method="" action="" id="updateForm">
          @csrf

          <div class="mb-3" style="display: none">
            {{-- product id --}}
            <label for="id" class="form-label">{{ __('products.product-id') }}</label>
            <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id"
              aria-describedby="emailHelp" value="{{ $product->id }}" placeholder="{{ __('products.product-id') }}">
            @error('id')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            {{-- product name --}}
            <label for="name" class="form-label">{{ __('products.product-name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              aria-describedby="emailHelp" value="{{ $product->name }}" placeholder="{{ __('products.product-name') }}">
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
              aria-describedby="emailHelp" value="{{ $product->price }}" placeholder="{{ __('products.product-price') }}">
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
              placeholder="{{ __('products.product-details') }}">{{ $product->details }}</textarea>
            @error('details')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            {{-- product image --}}
            <label for="image" class="form-label"> {{ __('products.product-image') }}</label>

            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
              aria-describedby="emailHelp" value="{{ $product->image }}" placeholder="{{ __('products.product-image') }}">

            @error('image')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <button prod_id="{{ $product->id }}" id="updateBtn" class="btn btn-primary"
            style="font-size: 12px; width:fit-content; padding:15px 20px;">
            {{ __('products.product-update') }}</button>
        </form>

      </div>
    </div>

  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('#updateBtn').click(function(e) {
        e.preventDefault();
        var form = new FormData($('#updateForm')[0]);
        // console.log(form);
        $.ajax({

          type: 'POST',
          enctype: "multipart/form-data",
          url: "{{ route('products.update') }}",

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          data: form,
          cache: false,
          contentType: false,
          processData: false,

          success: function(data) {
            console.log(data);
            $('#updateMessage').show().html(data.message);
            // alert(data.message);
          },
          error: function(reject) {
            console.log(reject);
            alert(reject.message);
          },
        });
      });
    });

  </script>
@endsection

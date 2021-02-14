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
        <form id="updateForm">
          @csrf

          <div class="mb-3" style="display: none">
            {{-- product id --}}
            <label for="id" class="form-label">{{ __('products.product-id') }}</label>
            <input type="text" class="form-control " id="id" name="id" aria-describedby="emailHelp"
              value="{{ $product->id }}" placeholder="{{ __('products.product-id') }}">
          </div>

          <div class="mb-3">
            {{-- product name --}}
            <label for="name" class="form-label">{{ __('products.product-name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              aria-describedby="emailHelp" value="{{ $product->name }}"
              placeholder="{{ __('products.product-name') }}">
            <div id="name-error" class="form-text text-danger">

            </div>
          </div>

          <div class="mb-3">
            {{-- offer price --}}
            <label for="price" class="form-label">{{ __('products.product-price') }}</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
              aria-describedby="emailHelp" value="{{ $product->price }}"
              placeholder="{{ __('products.product-price') }}">
            <div id="price-error" class="form-text text-danger">

            </div>
          </div>

          <div class="mb-3">
            {{-- product details --}}
            <label for="details" class="form-label"> {{ __('products.product-details') }}</label>
            <textarea name="details" id="details" cols="10" rows="5"
              class="form-control @error('details') is-invalid @enderror"
              placeholder="{{ __('products.product-details') }}">{{ $product->details }}</textarea>
            <div id="details-error" class="form-text text-danger">

            </div>
          </div>

          <div class="mb-3">
            {{-- product image --}}
            <label for="image" class="form-label"> {{ __('products.product-image') }}</label>

            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
              aria-describedby="emailHelp" value="{{ $product->image }}"
              placeholder="{{ __('products.product-image') }}">

            <div id="image-error" class="form-text text-danger">

            </div>
          </div>

          <button id="updateBtn" data-url="{{ route('products.update', $product->id) }}" class="btn btn-primary"
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

        var url = $(this).attr('data-url');
        console.log(url);
        $('#name-error').text('');
        $('#price-error').text('');
        $('#details-error').text('');
        $('#image-error').text('');

        var form = new FormData($('#updateForm')[0]);

        console.log(form);
        $.ajax({

          type: 'PATCH',
          enctype: "multipart/form-data",
          url: url,

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          data: $('#updateForm').serialize(),
          cache: false,
          // contentType: false,
          processData: false,

          success: function(data) {

            console.log(data);
            console.log('success');
            // var obj = JSON.parse(data.responseJSON);
            // console.log(obj);
            $('#updateMessage').show().html(data.message);
            alert(data.message);
          },
          error: function(reject) {
            console.log('not success');
            // console.log(reject.responseJSON);
            for (const key in reject.responseJSON.errors) {
              let error = reject.responseJSON.errors[key];
              // if (Object.hasOwnProperty.call(reject.responseJSON, key)) {
              //   const element = reject.responseJSON[key];
              // }
              console.log(key);
              $('#' + key + '-error').text(error[0]);
            }
            alert('failed to update');
          },
        });
      });
    });

  </script>
@endsection

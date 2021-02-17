<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>

  <style>
    table th,
    td {
      text-align: center;
    }

  </style>
</head>

<body>

  {{-- @isset($successfullyDeleted)
    <div class="alert alert-success" role="alert">
      Deleted successfully 
    </div>
  @endisset --}}

  <div class="container">
    <div class="row mt-5">
      @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if (session()->has('not-success'))
        <div class="alert alert-danger">
          {{ session('not-success') }}
        </div>
      @endif

    </div>
    
    <div class="row mt-5">

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @isset($hospitals)
            @foreach ($hospitals as $hospital)
              <tr>
                <td>{{ $hospital->id }}</td>
                <td>{{ $hospital->name }}</td>
                <td>{{ $hospital->address }}</td>
                <td>
                  <a href="{{ route('doctors', $hospital->id) }}" class="btn btn-primary btn-sm">SHOW All Doctors</a>
                  <form action="{{ route('hospital.delete', $hospital->id) }}" method="post" style="display: contents;">
                    @csrf
                    <button class="btn btn-danger btn-sm">Delete</button>

                  </form>
                </td>
              </tr>
            @endforeach
          @endisset
        </tbody>
      </table>

    </div>
  </div>

</body>

</html>

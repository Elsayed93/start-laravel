



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<div class="container">
  <div class="row mt-5">

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">specialist</th>
          <th scope="col">is_consult</th>
          <th scope="col">hospital</th>
        </tr>
      </thead>
      <tbody>
        @isset($doctors)
          @foreach ($doctors as $doctor)
            <tr>
              <td>{{ $doctor->id }}</td>
              <td>{{ $doctor->name }}</td>
              <td>{{ $doctor->specialist }}</td>
              <td>{{ $doctor->is_consult }}</td>
              <td>{{ $doctorHospital }}</td>
            </tr>
          @endforeach
        @endisset
      </tbody>
    </table>

  </div>
</div>

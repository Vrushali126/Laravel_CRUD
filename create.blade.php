<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="bg-danger py-3">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <img src="{{ asset('images/rcb_logo.png') }}" alt="RCB Logo" width="60">
          </div>
          <div class="col-6 text-center">
            <h2 class="text-white">Royal Challengers Bangalore</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    <div class="row justify-content-center mt-4 ml-10">
        <div>
          <a href="{{ route('players.index')}}" class="btn btn-dark">Back</a>
        </div>

      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
              <h3 class="text-white">Create player</h3>
            </div>

            <form enctype="multipart/form-data" action="{{ route('players.store') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="mb-3">
                  <label for="" class="form-label h5">Name</label>
                  <input value="{{ old('name') }}"
                  type="text" class="@error('name') is-invalid @enderror
                  form-control form-control-lg" placeholder="Name" name="name">
                  @error('name')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="form-label h5">Category</label>
                  <input value="{{ old('category') }}"
                  type="text" class="
                  @error('category') is-invalid @enderror
                  form-control form-control-lg" placeholder="category" name="category">
                  @error('category')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="form-label h5">Tournament</label>
                  <input value="{{ old('tournament') }}"
                  type="text" class="@error('tournament') is-invalid @enderror
                  form-control form-control-lg" placeholder="tournament" name="tournament">
                  @error('tournament')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="form-label h5">Strike Rate</label>
                  <input value="{{ old('strike_rate') }}"
                  type="text" class="
                  @error('strike_rate') is-invalid @enderror
                  form-control form-control-lg" placeholder="strike_rate" name="strike_rate">
                  @error('strike_rate')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="form-label h5">Image</label>
                  <input type="file" class="
                  form-control form-control-lg" placeholder="image" name="image">
                  
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary">Submit</button>
                </div>

            </div>
            </form>
            
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
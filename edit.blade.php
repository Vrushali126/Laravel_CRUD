<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
    <h2 class="text-white text-center">Royal Challengers banglore</h2>
    </div>
    <div class="container">
    <div class="row justify-content-center mt-4">
        <div>
          <a href="{{ route('players.index')}}" class="btn btn-dark">Back</a>
        </div>

      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
              <h3 class="text-white">Edit Player Information</h3>
            </div>

            <form enctype="multipart/form-data" action="{{ route('players.update', $player->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="card-body">
        <div class="mb-3">
            <label for="" class="form-label h5">Name</label>
            <input value="{{ old('name', $player->name) }}"
                type="text" class="form-control form-control-lg" placeholder="Name" name="name">
        </div>

        <div class="mb-3">
            <label for="" class="form-label h5">Category</label>
            <input value="{{ old('category', $player->category) }}"
                type="text" class="form-control form-control-lg" placeholder="Category" name="category">
        </div>

        <div class="mb-3">
            <label for="" class="form-label h5">Tournament</label>
            <input value="{{ old('tournament', $player->tournament) }}"
                type="text" class="form-control form-control-lg" placeholder="Tournament" name="tournament">
        </div>

        <div class="mb-3">
            <label for="" class="form-label h5">Strike Rate</label>
            <input value="{{ old('strike_rate', $player->strike_rate) }}"
                type="text" class="form-control form-control-lg" placeholder="Strike Rate" name="strike_rate">
        </div>

        <div class="mb-3">
            <label for="" class="form-label h5">Image</label>
            <input type="file" class="form-control form-control-lg" placeholder="Image" name="image">
        </div>

        <div class="d-grid">
            <button class="btn btn-lg btn-primary">Update</button>
        </div>
    </div>
</form>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
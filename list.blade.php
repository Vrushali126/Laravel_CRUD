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
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Royal_Challengers_Bangalore_logo.svg" alt="" width="60">

          </div>
          <div class="col-6 text-center">
            <h2 class="text-white">Royal Challengers Bangalore</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="row mt-4"> 
        <div class="col-10 ms-6">
          <a href="{{ route('players.create')}}" class="btn btn-dark">Create</a>
        </div>
      </div>

      <div class="row d-flex justify-content-center">
        @if(Session::has('success'))  
        <div class="col-md-10 mt-4">
          <div class="alert alert-success" role="alert">
            {{  Session::get('success') }}
          </div>
        </div>
        @endif

        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
              <h3 class="text-white">Players</h3>
            </div> 
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Tournament</th>
                    <th>Strike Rate</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($players->isNotEmpty())
                    <!-- @foreach($players as $player) -->
                    <tr>
                      <td>{{ $player->id }}</td>
                      <td>
                        
                        @if($player->image != "")  
                          <img width="80" src="{{ asset('uploads/players/' . $player->image) }}" alt="">
                        @else
                          <img width="80" src="{{ asset('images/default.png') }}" alt="Default Image"> 
                        @endif
                      </td>
                      <!-- <td>{{ $player->image }}</td> -->
                      <td>{{ $player->name }}</td>
                      <td>{{ $player->category }}</td>
                      <td>{{ $player->tournament }}</td>
                      <td>{{ $player->strike_rate }}</td>  
                      <td>{{ \Carbon\Carbon::parse($player->created_at)->format('D, M Y') }}</td>  
                      <td>
                      <div class="d-inline">
                          <a href="{{ route('players.edit', $player->id) }}" class="btn btn-dark me-2">Edit</a>  
                          <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>  
                          </form>
                        </div>

                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="7" class="text-center">No players found</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

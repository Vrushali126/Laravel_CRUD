<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Player;
class TeamController extends Controller
{
    //
    public function index(){
        $players = Player::orderBy('created_at','DESC')->get();
        return view('players.list',[
            'players' => $players
        ]);
    }

    public function create(){
        return view('players.create');
    }

    public function store(Request $request){
        $rules =[
            'name' => 'required|min:5',
            'category' => 'required|min:5'
        ];
        if($request->image != ""){
            $rules['image']='image';
        }
        


        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('players.create')->withInput()->withErrors($validator);
        }

        $player = new Player();
        $player->name = $request->name;
        $player->category = $request->category;
        $player->tournament = $request->category;
        $player->strike_rate= $request->strike_rate;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
    
            $image->move(public_path('uploads/players'), $imageName);
    
            $player->image = $imageName;
        }
       
        $player->save();

        

        
       

        return redirect()->route('players.index')->with('sucess','Player added to the team');



    }
    public function edit($id){
        $player = Player::findOrFail($id);

        return view('players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:10',
            'category' => 'required|min:20',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->route('players.edit', $id)->withInput()->withErrors($validator);
        }
    
        $player = Player::findOrFail($id);
        $player->name = $request->name;
        $player->category = $request->category;
        $player->tournament = $request->tournament;
        $player->strike_rate = $request->strike_rate;
    
        if ($request->hasFile('image')) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('uploads/players'), $imageName);
            $player->image = $imageName;
        }
    
        $player->save();
    
        return redirect()->route('players.index')->with('success', 'Player updated successfully');
    }
    


    public function destroy($id)
{
    $player = Player::findOrFail($id);

    if ($player->image) {
        $imagePath = public_path('uploads/players/' . $player->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $player->delete();

    return redirect()->route('players.index')->with('success', 'Player deleted successfully');
}

}

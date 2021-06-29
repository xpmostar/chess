<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Tags;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
use App\Models\Partija;


class PlayersController extends Controller
{
    //
    public function index () {

        $players = Player::all();
        
        return view ('players', compact('players'));

    }

    public function addPlayer(Request $request) {

        Player::insert([
            'ime' => $request->ime,
            'slikica' => $request->slikica,
        ]);

        return Redirect()->back();

    }

    public function showPlayer (Request $request, $id) {

        $player = Player::find($id);

        $partija = Partija::where('igrac1', $id)->orWhere('igrac2', $id)->get();

        return view ('editPlayer')->with(compact('player', 'partija'));

    }
}

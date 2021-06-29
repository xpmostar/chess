<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;
use App\Models\Tags;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partija;
use Illuminate\Http\Request;
use App\Models\Player;

class PartijaController extends Controller
{
    //
    public function index () {
        $partije = Partija::all();
        $data = Player::orderBy('brojPobjeda', 'DESC')->get();
        return view ('partija')->with(compact('partije', 'data'));
    }


    public function addPartija (Request $request) {

        Partija::insert([
            'igrac1' => $request->igrac1,
            'igrac2' => $request->igrac2,
            'pobjednik' => $request->pobjednik,
            'created_at' => Carbon::now()
        ]);

        Player::find($request->igrac1)->update([
            'brojOdigranih'=> DB::raw('brojOdigranih+1'), 
        ]);

        Player::find($request->igrac2)->update([
            'brojOdigranih'=> DB::raw('brojOdigranih+1'), 
        ]);

        if($request->pobjednik == 1) {
        Player::find($request->igrac1)->update([
            'brojPobjeda'=> DB::raw('brojPobjeda+1'), 
        ]);
        }

        if($request->pobjednik == 2) {
            Player::find($request->igrac2)->update([
                'brojPobjeda'=> DB::raw('brojPobjeda+1'),                 
            ]);
        }

        return Redirect()->back()->with('success', 'Partija dodana u bazu');

    }

    public function deletePartija($id) {
        $partija = Partija::find($id);

        Player::find($partija->igrac1)->update([
            'brojOdigranih' => DB::raw('brojOdigranih-1'),
        ]);

        Player::find($partija->igrac2)->update([
            'brojOdigranih' => DB::raw('brojOdigranih-1'),
        ]);

        if($partija->pobjednik==1) {
            Player::find($partija->igrac1)->update([
                'brojPobjeda' => DB::raw('brojPobjeda-1'),
            ]);
        }
        else if($partija->pobjednik==1) {
            Player::find($partija->igrac2)->update([
                'brojPobjeda' => DB::raw('brojPobjeda-1'),
            ]);
        }

        $partija->delete();

        return Redirect()->back()->with('success', 'Partija uklonjena iz baze');
    }

}

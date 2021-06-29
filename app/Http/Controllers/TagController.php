<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class TagController extends Controller
{
    //
    public function index() {
        
        //$tags = DB::Table('tags')->get();
        $tags = Tags::all();
        return view ('admin.tag.index', compact('tags'));

    }

    public function addTag(Request $request) {
        Tags::insert([
            'tag_name' => $request->tag_name,
            'user_id' => Auth::user() -> id,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Tag Added Successfully');
    }

    public function editTag($id) {
        
        $tags = Tags::find($id);

        return view ('admin.tag.edit', compact('tags'));


    }

    public function updateTag(Request $request, $id) {

        $update = Tags::find($id)->update([
            
            'tag_name' => $request->tag_name,
            'user_id' => Auth::user()->id

        ]);

    }
}

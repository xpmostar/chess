<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class CategoryController extends Controller
{
    //
    public function AllCat() {

        return view('admin.category.index');
    }

    public function AddCat(Request $request) {

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user() -> id,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Category Added Successfully');
        
    }

}


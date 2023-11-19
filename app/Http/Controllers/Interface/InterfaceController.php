<?php

namespace App\Http\Controllers\Interface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InterfaceController extends Controller
{
    //
    public function index()
    {
        return view('interface.index');
    }
    public function about()
    {
        return view('interface.about');
    }
    public function blog()
    {
        return view('interface.blog');
    }
    public function contact()
    {
        return view('interface.contact');
    }
    public function shop(Request $request)
    {
        $books = DB::table('books')->get();
        return view('interface.shop', compact('books'));
    }
    public function bookDetail(Request $request, $id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return view('interface.book_detail', compact('book'));
    }
}

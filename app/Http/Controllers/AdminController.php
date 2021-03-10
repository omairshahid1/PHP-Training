<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class AdminController extends Controller
{

    public function show(){
            $books = Book::withCount(['readData' => function ($query) { $query->where('is_read', '>', '0'); }])->orderBy('read_data_count','DESC')->get(); 

            // $books = Book::with('readtotal')->get(); 
            // dd($books);
            return view('admin.index',['books' => $books]); 
    }  
    public function addbook(){
        return view('admin.add');   
    }

    public function create(Request $request){
          $book  = [
            'name' => $request->name,
            'category' => $request->category,
            'author' => $request->author, 
          ]; 
          Book::create($book); 
          return redirect('/admin');
    }

    public function edit(Request $request){

        $book = Book::where(['id' => $request->id])->get();
        return view('admin.edit',['book' => $book]);  
    }

    public function delete(Request $request){

        $book = Book::where(['id' => $request->id])->delete();
        return redirect('/admin');
    }
    public function update(Request $request){
        $book  = [
            'name' => $request->name,
            'category' => $request->category,
            'author' => $request->author, 
          ]; 
          Book::where('id', $request->id)->update($book); 
          return redirect('/admin');
    }
}

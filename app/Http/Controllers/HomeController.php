<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\UserBook;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::with('readData')->get(); 
        return view('home',['books' => $books]);   
    }

    public function markread(Request $request){
          $id = Auth::user()->id;
          $check  = [
            'user_id' => $id,
            'book_id' => $request->id  
          ];  
          $book  = [
            'user_id' => $id,
            'book_id' => $request->id,
            'is_read' => $request->read,     
          ];  
          $rec = UserBook::where($check)->get(); 
          if(count($rec) == 0){
            UserBook::create($book);  
            return "Added";
          }else{
            UserBook::where('id', $rec[0]['id'])->update($book); 
            return "updated";
          }
    }


    public function markfav(Request $request){
        $id = Auth::user()->id;
        $check  = [
          'user_id' => $id,
          'book_id' => $request->id  
        ];  
        $book  = [ 
          'user_id' => $id,
          'book_id' => $request->id,
          'is_fav' => $request->fav,      
        ];  
        $rec = UserBook::where($check)->get(); 
        if(count($rec) == 0){
          UserBook::create($book);  
          return "Added";
        }else{
          UserBook::where('id', $rec[0]['id'])->update($book); 
          return "updated";
        }
  }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employ;
class EmployeController extends Controller
{
    public function add(Request $request){ 
      $data  = [
        'name' => $request->fname,
        'email' => $request->email,
        'dob' => $request->dob, 
      ]; 
      Employ::create($data); 

    }
}

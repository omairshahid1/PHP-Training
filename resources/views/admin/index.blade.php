@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
         <h3>Books</h3>
        </div>
        <div class="col-md-6 text-right">
        <button class="btn btn-info export-read" type="button">Export by Read</button>
         <a class="btn btn-success" href="/lara_test/admin/addbook">Add Book</a>
        </div>
    </div>
<hr>
    <div class="row justify-content-center">
    <div class="col-md-12" id="dvData"> 
    <table class="table">
    <tr>
        <th>Name</th>
        <th>Catrgory</th>
        <th>Author</th>
        <th>Action</th>

    </tr>
    @foreach($books as $book)
    <tr>
    <td>{{$book->name}}</td>
    <td>{{$book->category}}</td>
    <td>{{$book->author}} </td> 
    <td>
    <a class="btn btn-info" href="/lara_test/admin/book/edit/{{$book->id}}">Edit</a>
    <a class="btn btn-danger" href="/lara_test/admin/book/delete/{{$book->id}}">Delete</a> 

    </td>

    </tr>
      @endforeach
    </table>
    </div>

    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="/lara_test/admin/update">
                     @csrf 
                     <input type="hidden" name="id" value="{{$book[0]['id']}}">
                        <div class="form-group">
                            <label>Name</label> 
                            <input class="form-control" type="text" required name="name" value="{{$book[0]['name']}}"> 
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" required name="category">
                            <option @if($book[0]['category'] === "School") selected="selected" @endif value="School">School</option>
                            <option @if($book[0]['category'] === "College") selected="selected" @endif value="College">College</option>
                            <option @if($book[0]['category'] === "University") selected="selected" @endif value="University">University</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input class="form-control" type="text" required name="author" value="{{$book[0]['author']}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Edit Book</button>  
                        </div>
                     </form>
        </div>
    </div>
</div>
@endsection

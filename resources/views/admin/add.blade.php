@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="/lara_test/admin/create">
                     @csrf 
                        <div class="form-group">
                            <label>Name</label> 
                            <input class="form-control" type="text" required name="name"> 
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" required name="category">
                            <option value="School">School</option>
                            <option value="College">College</option>
                            <option value="College">University</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input class="form-control" type="text" required name="author">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Add Book</button>  
                        </div>
                     </form>
        </div>
    </div>
</div>
@endsection

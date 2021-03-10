@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form method="POST" action="/lara_test/groups/store">
                     @csrf 
                        <div class="form-group">
                            <label>Name</label>  
                            <input class="form-control" type="text" required name="name"> 
                        </div>
                        <div class="form-group">
                            <label>Users</label> 
                            <select class="form-control" required name="users[]" multiple="multiple"> 
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option> 
                            @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Add Group</button>  
                        </div>
                     </form>
        </div>
    </div>
</div>
@endsection

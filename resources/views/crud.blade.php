@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CRUD</div>

                <div class="card-body">
                     <form method="POST" action="/add">
                     @csrf
                        <div class="form-group">
                            <label>Name</label> 
                            <input class="form-control" type="text" required name="fname"> 
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" required name="email">
                        </div>
                        <div class="form-group">
                            <label>DOB</label>
                            <input class="form-control" type="date" required name="dob">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">Submit</button> 
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
        </div>

</div>
@endsection

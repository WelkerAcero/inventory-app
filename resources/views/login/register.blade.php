@extends('layouts.template')

@section('title', 'Register')

@section('content')

    <div class="container">
        <h1>Create account</h1>
        <div class="form-group">
            <form action="" method="post" id="createUserForm">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="button" id="createButton" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection


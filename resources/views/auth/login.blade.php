<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Offside&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Zikor</title>
    
</head>
@extends('master')

@section('content')
<body>

<div class="container">
    <div class="formContainer">
    
        <form method="POST" action="{{ route('login') }}" class="form" id="loginForm">
            @csrf
            <!-- Step 1 form fields here -->
            <div id="step1Section">
                <div class="logoPicture">
                    <img src="{{ asset('images/zikor-logo.png') }}" alt="Logo" />
                </div>
                <p class="registration-link">New Business? <a href="{{ route('register') }}">Register Here</a></p>
               
                <br />
                <label class="label">
                    Email:
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="inputField"
                    />
                </label>
                <br />
               
                <label class="label">
                    Password:
                    <input
                        type="password"
                        name="password"
                        required
                        class="inputField"
                    />
                </label>

                <br />
                @if ($errors->any())
                    <div class="errorContainer">
                        @foreach ($errors->all() as $error)
                            <p class="errorMessage">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                
                <button type="submit" class="submitButton" id="loginButton">Login</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
        $('#loginForm').on('submit', function() {
           
            $('#loadingSpinner').show();
        });


        $('#loginButton').on('click', function() {
            $('#loadingSpinner').hide();
        });
    </script>
</body>
@endsection
</html>

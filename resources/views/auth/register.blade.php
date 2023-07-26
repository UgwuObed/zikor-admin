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
    
    
    <script>
       window.addEventListener('load', function () {
            const registrationForm = document.getElementById('registrationForm');
            const step1Section = document.getElementById('step1Section');
            const step2Section = document.getElementById('step2Section');
            const nextButtonStep1 = document.getElementById('nextButtonStep1');
            const backButtonStep2 = document.getElementById('backButtonStep2');

            nextButtonStep1.addEventListener('click', () => {
                step1Section.style.display = 'none';
                step2Section.style.display = 'block';
            });

            backButtonStep2.addEventListener('click', () => {
                step2Section.style.display = 'none';
                step1Section.style.display = 'block';
            });

            registrationForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission

                // Play the video for 30 seconds
                const video = document.getElementById('logoVideo');
                video.play();

                // Submit the form after 30 seconds
                setTimeout(function () {
                    registrationForm.submit();
                }, 30000);
            });

            // Play the video when the page is fully loaded
            const video = document.getElementById('logoVideo');
            video.play();
        });
    </script>
</head>
<body>

<div class="container">
    <div class="formContainer">
    
        <form method="POST" action="{{ route('register') }}" class="form" id="registrationForm">
            @csrf
            <!-- Step 1 form fields here -->
            <div id="step1Section">
                <div class="logoPicture">
                    <img src="{{ asset('images/zikor-logo.png') }}" alt="Logo" />
                </div>
                <p class="registration-link">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                <p class="signUp">Sign Up (Step 1)</p>
                <label class="label">
                    First Name:
                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        required
                        class="inputField"
                    />
                </label>
                <br />
                <label class="label">
                    Last Name:
                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        required
                        class="inputField"
                    />
                </label>
                <br />
                <label class="label">
                    Business Name:
                    <input
                        type="text"
                        name="business_name"
                        value="{{ old('business_name') }}"
                        required
                        class="inputField"
                    />
                </label>
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
                    Phone:
                    <input
                        type="tel"
                        name="phone"
                        value="{{ old('phone') }}"
                        required
                        class="inputField"
                    />
                </label>
                <br />
                <button type="button" id="nextButtonStep1" class="nextButton">Next</button>
            </div>

            <!-- Step 2 form fields here -->
            <div id="step2Section" style="display: none;">
                <div class="logoPicture">
                    <img src="{{ asset('images/zikor-logo.png') }}" alt="Logo" />
                </div>
                <p class="signUp">Sign Up (Step 2)</p>
                      <button type="button" id="backButtonStep2" class="backButton">
                    <i class="fas fa-arrow-left"></i>
                  </button>

                <label class="label">
                    Country:
                    <input
                        type="text"
                        name="country"
                        value="{{ old('country') }}"
                        required
                        class="inputField"
                    />
                </label>
                <br />
                <label class="label">
                    State:
                    <input
                        type="text"
                        name="state"
                        value="{{ old('state') }}"
                        required
                        class="inputField"
                    />
                </label>
                <br />
                <label class="label">
                    City:
                    <input
                        type="text"
                        name="city"
                        value="{{ old('city') }}"
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
                <label class="label">
                    Confirm Password:
                    <input
                        type="password"
                        name="password_confirmation"
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
                
                <button type="submit" class="submitButton">Register</button>
            </div>
        </form>
    </div>
</div>
<video id="logoVideo" style="display: none;">
        <source src="{{ asset('videos/logo.mp4') }}" type="video/mp4">
    </video>
</body>
</html>

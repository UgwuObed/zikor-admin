<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Styles for the loading spinner */
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999; 
        }

        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.3);
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading spinner container -->
    <div class="loading-spinner" id="loadingSpinner">
        <div class="spinner"></div>
    </div>

    <!-- Your page's content here -->
    @yield('content')

    <script>
        // Hide the loading spinner after the page loads
        window.addEventListener('load', function() {
            const loadingSpinner = document.getElementById('loadingSpinner');
            loadingSpinner.style.display = 'none';
        });
    </script>
</body>
</html>

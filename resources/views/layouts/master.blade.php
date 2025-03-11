<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'College Management')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1055;
        }
        /* General toast styling */
        .toast {
            min-width: 400px;
            font-size: 1.2rem;
            text-align: center;
        }
        /* Toast for success */
        .toast-success {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            border: 1px solid #c3e6cb;
        }
        /* Toast for updated */
        .toast-updated {
            background-color: #cce5ff; /* Light blue background */
            color: #004085; /* Dark blue text */
            border: 1px solid #b8daff;
        }
        /* Toast for deleted */
        .toast-deleted {
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>

    <div class="toast-container">
        <!-- Success message -->
        @if(session('success'))
            <div class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="toast-body font-weight-bold">
                    ✅ {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Updated message -->
        @if(session('updated'))
            <div class="toast toast-updated" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="toast-body font-weight-bold">
                    ✏️ {{ session('updated') }}
                </div>
            </div>
        @endif

        <!-- Deleted message -->
        @if(session('deleted'))
            <div class="toast toast-deleted" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="toast-body font-weight-bold">
                    ❌ {{ session('deleted') }}
                </div>
            </div>
        @endif
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show toast messages
            $('.toast').toast('show');
        });
    </script>
</body>
</html>

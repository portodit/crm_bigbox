<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <!-- Vite resources for CSS -->
    @vite('resources/css/app.css')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom CSS for layout -->
    <style>
        .container {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            margin-left: 50px;
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>

    <!-- ApexCharts CSS -->
    <link rel="stylesheet" href="./node_modules/apexcharts/dist/apexcharts.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            @include('partials.sidebar')
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Lodash Library -->
    <script src="./node_modules/lodash/lodash.min.js"></script>

    <!-- ApexCharts JS -->
    <script src="./node_modules/apexcharts/dist/apexcharts.min.js"></script>

    <script>
        function showPopup() {
            document.getElementById('leadFormPopup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('leadFormPopup').classList.add('hidden');
        }
    </script>


</body>

</html>

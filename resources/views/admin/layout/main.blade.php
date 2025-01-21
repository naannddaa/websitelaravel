<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @include('admin.layout.style')
</head>
<body>
    
    <!-- Navbar -->
    @include('admin.layout.navbar')

   <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('admin.layout.sidebar')

            <!-- Main Content -->
            <div class="content-wrapper">
                @yield('konten')
            </div>
    </div>
    </div>

    </body>
</html>

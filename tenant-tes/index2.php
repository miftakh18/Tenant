<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="plugin/fontawesome6/css/all.min.css">
    <link rel="stylesheet" href="plugin/bootstrap-523/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark px-3">
        <button class="btn btn-outline-light me-2" id="toggleSidebar">
            <i class="bi bi-list"></i>
        </button>
        <span class="navbar-brand">Navbar</span>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div id="sidebar" class="col-md-3 col-lg-2 bg-light border p-3 vh-100">
                <h5>Sidebar</h5>
                <!-- Isi sidebar -->
            </div>

            <!-- Konten -->
            <div id="mainContent" class="col p-4">
                <h1>Konten Utama</h1>
                <p>Isi konten...</p>
            </div>
        </div>
    </div>


    <script src="plugin/bootstrap-523/js/bootstrap.min.js"></script>
    <script src="plugin/fontawesome6/js/fontawesome.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('d-none');
        });
    </script>
</body>

</html>
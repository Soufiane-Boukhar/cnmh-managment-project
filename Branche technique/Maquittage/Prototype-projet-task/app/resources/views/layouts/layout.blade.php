<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    @vite('resources/css/app.css')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#mytextarea'
    });

    tinymce.init({
        selector: '#descriptionTask'
    });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @yield('nav')
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">Projet</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

    </div>



    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
    <script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
    <script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/3c520e368e.js" crossorigin="anonymous"></script>

    <script>
    document.getElementById('chooseFileButtonImporter').addEventListener('click', function() {
        document.getElementById('fileInputImporter').click();
    });

    document.getElementById('fileInputImporter').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('importForm').submit();
        }
    });
    </script>
</body>

</html>
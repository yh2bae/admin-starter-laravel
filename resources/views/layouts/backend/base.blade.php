<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Yudha Harsanto">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('backend/images/ico/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/vendors.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/charts/apexcharts.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/summernote/summernote-lite.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/pages/dashboard-ecommerce.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/plugins/charts/chart-apex.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <!-- END: Page CSS-->
    @stack('mycss')

</head>

@if (Auth::user()->theme == 1)
    <style>
        .vertical-layout.vertical-menu-modern.menu-collapsed .main-menu:not(.expanded) .navigation li.active a {
            background-color: #161d31;
             !important;
        }

        .main-menu.menu-light .navigation>li.open:not(.menu-item-closing)>a,
        .main-menu.menu-light .navigation>li.sidebar-group-active>a {
            background-color: #161d31;
             !important;
        }

        .note-editor.note-airframe,
        .note-editor.note-frame {
            border: #404656 1px solid
        }

        .note-toolbar {
            background-color: #7367f0;
        }


        .note-editing-area .note-editable {
            /* background-color: #fff !important; */
        }

        .note-frame {
            color: #9a9ea7 !important;
        }

        .note-editor.note-airframe .note-statusbar,
        .note-editor.note-frame .note-statusbar {
            background-color: #7367f0;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            border-top: none;
        }
    </style>
@endif
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern {{ Auth::user()->theme == 1 ? 'dark-layout' : '' }}  navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Header-->
    @include('layouts.backend.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.backend.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            @if (Route::is('admin.dashboard'))
                {{--  --}}
            @else
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
            @endif
            <div class="content-body">
                @yield('content')
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy;
                {{ date('Y') }}<a class="ms-25" href="https://yh2bae.com" target="_blank"></a><span
                    class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
                class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('backend/vendors/js/charts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('backend/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend/js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backend/js/core/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/1.9.46/autoNumeric.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{ asset('backend/js/scripts/pages/dashboard-ecommerce.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/scripts/tables/table-datatables-advanced.js') }}"></script> --}}
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        $("#datatable").DataTable();

        @if ($message = Session::get('success'))
            Swal.fire({
                title: 'Success',
                text: "<?php echo $message; ?>",
                icon: 'success',
            })
        @endif

        @if ($message = Session::get('error'))
            Swal.fire({
                title: 'Opsss...',
                text: "<?php echo $message; ?>",
                icon: 'error',
            });
        @endif
    </script>

    @stack('javascript')
</body>
<!-- END: Body-->

</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{url('public/backend/assets')}}/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link href="{{url('public/backend/assets')}}/vendor/fonts/montserrat/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/libs/css/style.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
    <!-- <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="{{url('public/backend/assets')}}/vendor/fonts/flag-icon-css/flag-icon.min.css"> -->
    @yield('css')
    <script type="text/javascript">
        var base_url = function() {
            return "{{url('')}}";
        }
        var akey = function() {
            return "iwGeh4J5XFdIc4MVpG5M20BFejSGEw3bJeqpi3Vgm8w";
        }
    </script>
    <title> @yield('title')</title>
</head>

<body>
    <?php
    $user = Auth::user();
    ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{route('admin.index')}}">NOGNIC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="pr-2 navbar-toggler-icon"><i style="color: #0E0C28;" class="fas fa-user-shield"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('public/backend/assets')}}/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"></h5>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>{{Auth::user()->name}}</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <?php
                            $menu = config('menu');
                            ?>
                            @foreach($menu as $m)
                            <?php
                            $class = !empty($m['items']) ? 'nav-link' : '';
                            $collapse = !empty($m['items']) ? 'collapse' : '';
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route::has($m['route']) ? route($m['route']) : '#'}}" data-toggle="{{$collapse}}" aria-expanded="false" data-target="#{{$m['id']}}" aria-controls="{{$m['id']}}"><i class="{{$m['icon']}}"></i>{{$m['name']}}</a>
                                @if(!empty($m['items']))
                                <div id="{{$m['id']}}" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        @foreach($m['items'] as $mc)
                                        @if($user->can($mc['route']))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{Route::has($mc['route']) ? route($mc['route']) : '#'}}"><i class="{{$mc['icon']}}"></i>{{$mc['name']}}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper" style="min-height:none">
            <div class="dashboard-ecommerce">
                <div class="container dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin:0 auto;">
                            <div class="page-header">
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"> @yield('title')</li>
                                        </ol>
                                    </nav>
                                </div>
                                @if(Session::has('yes'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Success!</strong> {{Session::get('yes')}}
                                </div>
                                @endif
                                @if(Session::has('no'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>False!</strong> {{Session::get('no')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="container">
                            @yield('main')
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{url('public/backend/assets')}}/vendor/jquery/jquery-3.4.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="{{url('public/backend/assets')}}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{url('public/backend/assets')}}/vendor/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script src="{{url('public')}}/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{url('public')}}/tinymce/config.js" referrerpolicy="origin"></script>

    @yield('js')
    @include('sweetalert::alert')

</body>

</html>

<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <base href="/">
    {{-- favicon --}}
    <link rel="shortcut icon" href="/backend/dist/img/logo-favicon/logo_fav.png" type="image/x-icon">
    <link href="/backend/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="/backend/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="/backend/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="/backend/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    {{-- 1 --}}
    <link rel="stylesheet" href="/backend/dist/libs/ijabo/ijabo.min.css">
    {{-- 2 --}}
    <link rel="stylesheet" href="/backend/dist/libs/ijaboCropTool/ijaboCropTool.min.css">
    {{-- add tags --}}
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css">
    
    @stack('stylesheets')
    @livewireStyles
    <link href="/backend/dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body >
    <div class="wrapper">
      @include('backend.layouts.inc.header')
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          @yield('pageHeader')
        </div>
        <div class="page-body">
          <div class="container-xl">
            @yield('content')
          </div>
        </div>
        @include('backend.layouts.inc.footer')
      </div>
    </div>

    <!-- Libs JS -->
    {{-- 1 --}}
    <script src="/backend/dist/libs/jquery/jquery-3.6.3.min.js"></script>
    <script src="/backend/dist/libs/ijabo/ijabo.min.js"></script>
    {{-- 2 --}}
    <script src="/backend/dist/libs/ijaboCropTool/ijaboCropTool.min.js"></script>
    {{-- 3 --}}
    <script src="/backend/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js"></script>
    {{-- add tags --}}
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <script src="/backend/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <!-- Tabler Core -->
    <script src="/backend/dist/js/tabler.min.js"></script>
    @stack('scripts')
    @livewireScripts
    {{-- show showToastr message --}}
    <script>

      $('input[name="post_tags"]').amsifySuggestags();

      window.addEventListener('showToastr', function(event) {
        toastr.remove();
        if (event.detail.type === 'info') {
          toastr.info(event.detail.message);
        }else if (event.detail.type === 'success') {
          toastr.success(event.detail.message);
        }else if (event.detail.type === 'error') {
          toastr.error(event.detail.message);
        }else if (event.detail.type === 'warning') {
          toastr.warning(event.detail.message);
        } else {
          return false;
        }
      });
    </script>
    <script src="/backend/dist/js/demo.min.js"></script>
    
  </body>
</html>
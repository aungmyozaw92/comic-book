<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('images') }}/logo-icon.svg">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- unpkg : use the latest version of Video.js -->
    <link href="https://unpkg.com/video.js/dist/video-js.min.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">    
    <link href="{{ asset('css') }}/fonts.css" rel="stylesheet" />
    <!-- CSS Files -->    
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- Custom CSS -->       
    <link href="{{ asset('css') }}/reset.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/color.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/utilities.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/main.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/select2.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/custom.css" rel="stylesheet" />
    <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />    
</head>

<body class="{{ $class ?? '' }}">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    <!-- <input type="hidden" name="_token" value="NKN81BvuQSzEbJlULUVrTDRewUlcAIJhPbOwli18">  -->
  </form>
  <div class="wrapper ">
    <!-- Navbar -->
    @include('admin.layout.partials.header')
    @include('admin.layout.partials.sidebar')
    <div class="main-panel">      
      @yield('content')
      @include('admin.layout.partials.footer')
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
  <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
   <!-- Select2 Plugin -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  
  <!-- Datatable,  -->
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="{{ asset('material') }}/demo/demo.js"></script> -->
  <script src="{{ asset('material') }}/js/settings.js"></script>
  <!--  Form Submit for Upload     -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <script>
    // $('.datepicker').datetimepicker({
    //   format: 'YYYY-MM-DD'
    // });

    // <!-- javascript for init -->
    $('.datepicker').datetimepicker({
      format: 'YYYY-MM-DD',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });

    var dateNow = new Date();
    $('.timepicker').datetimepicker({
      format: 'HH:mm:ss',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      },
      defaultDate:moment(dateNow).hours(0).minutes(0).seconds(0).milliseconds(0)  
    })
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '//connect.facebook.net/en_US/fbevents.js');
    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");
    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    $(document).ready(function(){
      var status = "{{session('status')}}";
      if(status){
        $.notify({
          message: status
        }, {
          type: "success",
          background:"green",
          timer: 3000,
          placement: {
            from: "top",
            align: "right"
          }
        })
      }

      /* Video */
      // var video = document.getElementById('video');
      // var videoSrc = $('#video').data('src');
      // //console.log(videoSrc);
      // //
      // // First check for native browser HLS support
      // //
      // if (video.canPlayType('application/vnd.apple.mpegurl')) {
      //   video.src = videoSrc;
      //   video.addEventListener('loadedmetadata', function() {
      //     video.play();
      //   });
      // //
      // // If no native HLS support, check if hls.js is supported
      // //
      // } else if (Hls.isSupported()) {
      //   var hls = new Hls();
      //   hls.loadSource(videoSrc);
      //   hls.attachMedia(video);
      //   hls.on(Hls.Events.MANIFEST_PARSED, function() {
      //     video.play();
      //   });
      // }

      // var player = videojs('vid1');
      // player.play();
    });

    $(document).on('click','#destroy_btn',function(){
      swal({
        title: "Are you sure?",
        text: "Your will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      }).then((willDelete) => {
          if (willDelete.value==true) {
            var form_id = $(this).attr('data-origin');
            $('#'+form_id).submit();
          }
      });
    });
    
    function confirmDelete(item_id) 
    {
      swal({
        title: "Are you sure?",
        text: "Your will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      }).then((willDelete) => {
          if (willDelete.value==true) {
            $('#'+item_id).submit();
          }
      });
    }
  </script>
  @stack('js')
</body>

</html>
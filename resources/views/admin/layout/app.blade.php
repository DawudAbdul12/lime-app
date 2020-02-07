<!DOCTYPE html>
<!--[if IE 9]>         
<html class="ie9 no-focus"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus"> 
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
         <title> Admin</title>
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicons/favicon.png') }}">

        <link rel="icon" type="image/png" href="{{ asset('assets/img /favicons/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-160x160.png') }}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicons/favicon-192x192.png') }}" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicons/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicons/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicons/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicons/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicons/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicons/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon-180x180.png') }}">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick/slick-theme.min.css') }}">

         <!-- Page JS Plugins CSS -->
       <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.css') }}">
          <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datetimepicker/jquery.datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzonejs/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote-bs3.min.css') }}">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/custom_.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />


            <!-- UPLOAD IMAGES CSS -->
        <style type="text/css">
            .thumbimage {
                float:left;
                width:100px;
                position:relative;
                padding:5px;
                margin-right:3px;
                border:1px solid #ebeff2;
            }
            .tableimage{
                width:40px;
                height:40px;
            }
        </style>

        
    </head>
    <body>
       
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
         
             <!-- SIDE BAR -->
            @include('admin.includes.side_bar')
                <!-- CONTENT -->
                @yield('content')
             <!-- FOOTER -->
             @include('admin.includes.footer')
            
        </div>
         <!-- END Page Container -->
 
         <!-- Apps Modal -->
         <!-- Opens from the button in the header -->
         {{-- <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
             <div class="modal-sm modal-dialog modal-dialog-top">
                 <div class="modal-content">
                     <!-- Apps Block -->
                     <div class="block block-themed block-transparent">
                         <div class="block-header bg-primary-dark">
                             <ul class="block-options">
                                 <li>
                                     <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                 </li>
                             </ul>
                             <h3 class="block-title">All Shop(s)</h3>
                         </div>
                         <div class="block-content">
                             <div class="row text-center">

                             
                                  {{-- @foreach ($allShops as $shop)
                                    
                                    <div class="col-xs-6"  >
                                        <a class="block block-rounded" href="/admin/change/shop/{{ $shop->id }}">
                                            <div class="block-content text-white bg-modern">
                                                <i class="si si-rocket fa-1x"></i>
                                            <div class="font-w600 push-15-t push-15">{{ $shop->shop_name }}</div>
                                            </div>
                                        </a>
                                    </div>

                                 @endforeach
                          

                            
                             </div>
                         </div>
                     </div>
                     <!-- END Apps Block -->
                 </div>
             </div>
         </div> --}}
         <!-- END Apps Modal -->
 
         <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
         {{-- <script type="text/javascript" src="{{ asset('lazyjs/jquery.lazy.min.js')}}"></script> --}}
         <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.slimscroll.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.scrollLock.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.countTo.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/jquery.placeholder.min.js') }}"></script>
         <script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>
         <script src="{{ asset('assets/js/app.js') }}"></script>
 
         <!-- Page JS Plugins -->
         <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
         <!-- Page JS Plugins -->
         <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('assets/js/pages/base_tables_datatables.js') }}"></script>

         <script src="{{ asset('assets/js/plugins/summernote/summernote.min.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
         <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker/jquery.datetimepicker.js') }}"></script>

         {{-- <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
  {{-- <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> --}}
  <script type="text/javascript" src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
  {{-- <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" /> --}}

       


         <script>
             $(function () {
                 // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
         App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs','appear','summernote']);
             });
               
         
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm',
                     //minDate: dateToday
                 });
            });

            $(function () {
                $('#start_time').datetimepicker({
                    format: 'HH:mm',
                     //minDate: dateToday
                 });
            });

            $(function () {
                $('#end_time').datetimepicker({
                    format: 'HH:mm',
                     //minDate: dateToday
                 });
            });
       
            //  $(function() {
            //    $('#lazy').Lazy();
            //  });
         </script>

          <!-- FOR NOTIFICATION-->
          {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> --}}
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- FOR NOTIFICATION-->

         
          {{-- <script>
                $(function () {
                  App.initHelpers(['tags-inputs','summernote', 'select2', 'masked-inputs']);
                });
            </script> --}}

            
 <script>
     $(document).ready(function() {
         $('#myTable').dataTable({
             "aoColumnDefs": [{
                 "bSortable": false,
                 "aTargets": ["sorting_disabled"]
             }],
             "bDestroy": true
         });
 
         // $('#myTable').DataTable( {
         //     "order": [[ 0, "desc" ]] // "0" means First column and "desc" is order type; 
         // } );
     });
 </script>

    
    <!-- UPLOAD IMAGES JAVASCRIPT CODE -->
    <script type="text/javascript">
    $("#imageupload").on('change', function () {

 //Get count of selected files
 var countFiles = $(this)[0].files.length;

 var imgPath = $(this)[0].value;
 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
 var image_holder = $("#preview-image");
 image_holder.empty();

 if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
     if (typeof (FileReader) != "undefined") {

         //loop for each file selected for uploaded.
         for (var i = 0; i < countFiles; i++) {

             var reader = new FileReader();
             reader.onload = function (e) {
                 $("<img />", {
                     "src": e.target.result,
                         "class": "thumbimage"
                 }).appendTo(image_holder);
             }

             image_holder.show();
             reader.readAsDataURL($(this)[0].files[i]);
         }

     } else {
         alert("This browser does not support FileReader.");
     }
 } else {
     alert("Pls select only images");
 }
});
</script>
<!-- UPLOAD IMAGES JAVASCRIPT CODE -->
 
<script>
        function deleteImage(z){
        
            var r = confirm("Are you sure You want to Delete");
             if (r == true) {
               
                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
        
                        var formData = new FormData();
                        formData.append('id',z);
        
                        $.ajax({
                            method: 'POST',
                            url: '/admin/project/delete/gallery',
                            data:formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                setTimeout(function(){  
                                 $('#img'+z).fadeOut("Slow");  
                                 }, 300);  
                            },
                           // error: console.error
                });
            }
        
        }
        
        </script>

<script>
        function deleteImageGallery(z){
        
            var r = confirm("Are you sure You want to Delete");
             if (r == true) {
               
                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
        
                        var formData = new FormData();
                        formData.append('id',z);
        
                        $.ajax({
                            method: 'POST',
                            url: '/admin/album/delete/gallery',
                            data:formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                setTimeout(function(){  
                                 $('#img'+z).fadeOut("Slow");  
                                 }, 300);  
                            },
                           // error: console.error
                });
            }
        
        }
        
        </script>

     
     </body>
 </html>
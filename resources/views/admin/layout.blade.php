<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{ asset('public/dashboard/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-J1094H4R78"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-J1094H4R78');
    </script> --}}
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/vertical-layout-light/style.css?v='.time()) }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('public/dashboard/images/sotagroup.png')}}" />
</head>

<body class="sidebar-light">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.inc.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('admin.inc.header')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.inc.sliebar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.inc.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="https://cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('public/dashboard/js/ckfinder.js') }}"></script>
    <script src="{{ asset('public/dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/dashboard/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('public/dashboard/js/off-canvas.js?v=' . time()) }}"></script>
    <script src="{{ asset('public/dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/template.js?v=' . time()) }}"></script>
    <script src="{{ asset('public/dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('public/dashboard/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/form-validation.js?v=' . time()) }}"></script>
    <script src="{{ asset('public/dashboard/js/bt-maxLength.js') }}"></script>

    <!-- Custom js for this page-->
    <script src="{{ asset('public/dashboard/js/file-upload.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/iCheck.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/typeahead.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/select2.js') }}"></script>
    <!-- End custom js for this page-->
    {{-- charjs --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {{-- <script src="{{ asset('dashboard/js/chart.js?v='.time()) }}"></script> --}}
    <!---- databale -->
    <script src="{{ asset('public/dashboard/js/data-table.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        var _token = "{{ csrf_token() }}";

        function checkDelBoxes(pForm, boxName, parent) {
            for (var i = 0; i < pForm.elements.length; i++) {
                if (pForm.elements[i].name == boxName) {
                    pForm.elements[i].checked = parent;
                }
            }
            if (!parent) {
                $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/[{}]");
            } else {
                deleteAllList($("input[name='check[]']"));
            }
        }

        function deleteAllList(control) {
            var listid = control.map(function(index, data) {
                return $(data).val();
            });
            var dataJson = "[",
                sumb = ",";
            $(listid).each(function(index, value) {
                dataJson += (index > 0 ? sumb : "") + '{"id":' + value + "}";
            });
            dataJson += "]";
            $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/" + dataJson);
        }


        $("input[name='check[]']").click(function() {
            var dataJson = "[",
                sumb = ",";
            var listid = $("input[name='check[]']:checked").map(function(index, data) {
                return $(data).val();
            });
            console.log(listid);
            $(listid).each(function(index, value) {
                dataJson += (index > 0 ? sumb : "") + '{"id":' + value + "}";
            });
            dataJson += "]";
            $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/" + dataJson);
        });

        // $("input[name='checkAll']").click(function() {
        //     var check = document.getElementById('checkAll').checked;
        //     var checkboxs = document.getElementsByName('checkDel[]');
        //     if (check == true) {
        //         for (var i = 0; i < checkboxs.length; i++) {
        //             checkboxs[i].checked = true;
        //         }
        //     } else {
        //         for (var i = 0; i < checkboxs.length; i++) {
        //             checkboxs[i].checked = false;
        //         }
        //     }
        // })

        // $("input[name='checkDel[]']").click(function() {
        //     var dataJson = "[",
        //         sumb = ",";
        //     var listid = $("input[name='checkDel[]']:checked").map(function(index, data) {
        //         return $(data).val();
        //     });
        //     console.log(listid);
        //     $(listid).each(function(index, value) {
        //         dataJson += (index > 0 ? sumb : "") + '{"id":' + value + "}";
        //     });
        //     dataJson += "]";
        //     $("[delete-all]").attr("href", $("[delete-all]").attr("url") + "/" + dataJson);
        // });

        function changeToString() {
            var slug;
            slug = document.getElementById('slug').value;
            slug = slug.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
            slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
            slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
            slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
            slug = slug.replace(/??|???|???|???|???/gi, 'y');
            slug = slug.replace(/??/gi, 'd');
            //X??a c??c k?? t??? ?????t bi???t
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
            slug = slug.replace(/ /gi, "-");
            //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
            //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox c?? id ???slug???
            document.getElementById('convert_slug').value = slug;
        }
        $("div.alert").delay(8000).slideUp();
    </script>
    @stack('script')
    <!---- end databale -->
</body>

</html>

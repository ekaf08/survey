<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTMS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="shortcut icon" href="{{ URL::to('/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::to('/assets/css/app.css') }}">
    @yield('custom-stylesheet')
    {{-- @livewireStyles --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div id="app">
        @include('layouts.partials.sidebar')
        <div id="topnav">
            @include('layouts.partials.navbar')
        </div>
        <div id="main">
            <div class="right_col">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                <div class="page-heading">
                    {{-- <h3>{{ $title }}</h3> --}}
                </div>
                <div class="page-content">
                    @yield('main-content')
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-end">
                        <p>DTMS</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>

    <script src="/assets/js/mazer.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="/assets/vendors/jquery/jquery.min.js"></script>

    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        function resize() {
            $('.right_col').css('min-height', $(window).height() - $('.right_col').offset().top - 40);
        }
        // $('window').on('load', resize());
        $('window').on('resize', resize());
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->








    <script type="text/javascript">

        function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var chkYesn = document.getElementById("chkYesn");
        var dvData = document.getElementById("dvShow");
        var dvDatan = document.getElementById("dvShown");
        dvData.style.display = chkYes.checked ? "block" : "none";
        dvDatan.style.display = chkYesn.checked ? "block" : "none";
    }

        function handleChange1() {
            $('#div_jenis_pendidikan').slideDown();
            $('#div_pendidikan_saatini').slideDown();
            $('#div_ijazah_tertinggi').slideDown();
            $('#div_kehamilan').slideDown();
           
        }

        function handleChange2() {
            $('#div_jenis_pendidikan').slideUp();
            $('#div_pendidikan_saatini').slideUp();
            $('#div_ijazah_tertinggi').slideUp();
            $('#div_kehamilan').slideUp();

        }

        function handlepekerjaan1(){
            $('#div_bekerja').slideDown();
        }

        
        function handlepekerjaan2(){
            $('#div_bekerja').slideUp();
        }

    
    function ShowHideDiv2() {
        var chkYes2 = document.getElementById("chkYes2");
        var dvData2 = document.getElementById("dvShow2");
        dvData2.style.display = chkYes2.checked ? "block" : "none";
    }
    function ShowHideDiv3() {
        var l1 = document.getElementById("l1");
        var dvData3 = document.getElementById("dvShow3");
        dvData3.style.display = l1.checked ? "block" : "none";
    }
    function ShowHideDiv5() {
        var j1 = document.getElementById("j1");
        // var j2 = document.getElementById("j2");
        // var j3 = document.getElementById("j3");
        var dvData4 = document.getElementById("dvShow4");
        dvData4.style.display = j1.checked ? "block" : "none";
        //dvData4.style.display = j2.checked ? "block" : "none";
        // dvData4.style.display = j3.checked ? "block" : "none";
    }

   
    function img(x){
    if(x==0){
      document.getElementById('dvShow4').style.display='block';
    }
    else{
      document.getElementById('dvShow4').style.display='none';
    }
    return;
    }

    function img1(x){
    if(x==0){
      document.getElementById('dvShow5').style.display='block';
    }
    else{
      document.getElementById('dvShow5').style.display='none';
    }
    return;
    }

    function img2(x){
    if(x==0){
      document.getElementById('dvShow6').style.display='block';
    }
    else{
      document.getElementById('dvShow6').style.display='none';
    }
    return;
    }

    function img3(x){
    if(x==0){
      document.getElementById('dvShow7').style.display='block';
    }
    else{
      document.getElementById('dvShow7').style.display='none';
    }
    return;
    }

    function img4(x){
    if(x==0){
      document.getElementById('dvShow8').style.display='block';
    }
    else{
      document.getElementById('dvShow8').style.display='none';
    }
    return;
    }

    function img5(x){
    if(x==0){
      document.getElementById('dvShow9').style.display='block';
    }
    else{
      document.getElementById('dvShow9').style.display='none';
    }
    return;
    }

    function img6(x){
    if(x==0){
      document.getElementById('dvShow10').style.display='block';
    }
    else{
      document.getElementById('dvShow10').style.display='none';
    }
    return;
    }
    function img7(x){
    if(x==0){
      document.getElementById('dvShow11').style.display='block';
    }
    else{
      document.getElementById('dvShow11').style.display='none';
    }
    return;
    }
    function img8(x){
    if(x==0){
      document.getElementById('dvShow12').style.display='block';
    }
    else{
      document.getElementById('dvShow12').style.display='none';
    }
    return;
    }
    function img9(x){
    if(x==0){
      document.getElementById('dvShow13').style.display='block';
    }
    else{
      document.getElementById('dvShow13').style.display='none';
    }
    return;
    }
    function img10(x){
    if(x==0){
      document.getElementById('dvShow14').style.display='block';
      document.getElementById('dvShow15').style.display='none';
    }
    else{
      document.getElementById('dvShow15').style.display='block';
      document.getElementById('dvShow14').style.display='none';
    }
    return;
    }



    // function ShowHideDiv4() {
    //     var chkYes3 = document.getElementById("3");
    //     var dvData4 = document.getElementById("dvShow4");
    //     dvData4.style.display = chkYes3.checked ? "block" : "none";
    // }

    
    // function showHideDiv3 (divId)
    //     {
    //       var div = document.getElementById (divId);
    //       var divs = document.getElementById("dvShow3");

    //       for (var i in divs) 
    //       {
    //         divs [i].className = "hidden";
    //       }
    //       div.className = "shown";
    //     }

    </script>
<!--     <style>
        .hidden
        {
            dvShow3.style."display:none;"
        }
        .shown
        {
            dvShow3.style."display:block;"
        }
    </style> -->
    <script>
        function resize() {
            $('.right_col').css('min-height', $(window).height() - $('.right_col').offset().top - 40);
        }
        // $('window').on('load', resize());
        $('window').on('resize', resize());
    </script>


@if (session('success'))
        <script>
            Swal.fire(
                'Selamat!',
                "{{ session('success') }}",
                'success'
            )
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire(
                'Oops!',
                "{{ session('error') }}",
                'error'
            )
        </script>
    @endif

    @yield('custom-script')
</body>



</html>
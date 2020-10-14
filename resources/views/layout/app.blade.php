<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIRAT</title>

  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" href="{{ asset('logo.png') }}">
  <link href="{{url('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="{{url('sbadmin/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link href="{{url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{url('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('layout.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('layout.header')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @include('layout.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="{{url('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- bootstrap datepicker -->
  <script src="{{url('sbadmin/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('sbadmin/js/demo/datatables-demo.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{url('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('sbadmin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('sbadmin/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('sbadmin/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{url('sbadmin/js/demo/chart-pie-demo.js')}}"></script>

<script type="text/javascript">
 $(function(){
  $("#datepicker1").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#data thead tr').clone(true).appendTo( '#data thead' );
    $('#data thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
        $('#masuk').on('click', function () {
          table.columns(3).search("Surat Masuk" ).draw();
        });
        $('#keluar').on('click', function () {
          table.columns(3).search("Surat Keluar" ).draw();
        });
        $('#reset').on('click', function () {
          table.columns(3).search("Surat" ).draw();
        });

    } );
 
    var table = $('#data').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );

</script>
<script>
  $(document).ready( function () {
      $('#tabel1').DataTable();
  } );
</script>

@yield('chart')

</body>

</html>

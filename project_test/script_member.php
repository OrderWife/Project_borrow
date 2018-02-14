    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "ordering": false,
            "lengthMenu": [[5, 10, 15, -1], [5, 15, 15, "All"]],
            "scrollY":        "200px",
        "scrollCollapse": true,

        });
    });
    </script>

    <style> 
    @font-face {
        font-family: Microsoft Sans Serif;
        src: url(../font/Microsoft Sans Serif.ttf);
    }
    body {
        font-family: Microsoft Sans Serif;
    }
    </style>
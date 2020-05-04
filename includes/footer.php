        
        <?php include "politica-privacidad.php" ?>
        <?php include "terminos-y-condiciones.php" ?>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Constructora Yama 2020</div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#politica-privacidad">Política de Privacidad</a>
                                &middot;
                                <a href="#" data-toggle="modal" data-target="#terminos-y-condiciones">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        
        <!-- Libreria dateTable js -->
        <script type="text/javascript" src="lib/dataTable/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="lib/dataTable/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="lib/dataTable/dataTables.responsive.min.js"></script>

        <script type="text/javascript" src="lib/dataTable/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="lib/dataTable/jszip.min.js"></script>
        <script type="text/javascript" src="lib/dataTable/pdfmake.min.js"></script>
        <script type="text/javascript" src="lib/dataTable/vfs_fonts.js"></script>
        <script type="text/javascript" src="lib/dataTable/buttons.html5.min.js"></script>
        <script type="text/javascript" src="lib/dataTable/buttons.print.min.js"></script>
        

    </body>

    <script>
        $(document).ready(function() {
            $('#tablaInventario').DataTable(
            {
                order: [[ 0, "desc" ]],
                dom: 'Bfrtip',
                buttons: [
                    {
                        "extend": 'copyHtml5',
                        "text": '<span class="btn btn-light text-dark"><i class="fas fa-copy"></i> copiar</span>',
                        "titleAttr": 'Copiar datos'
                    },
                    {
                        "extend": 'csvHtml5',
                        "text": '<span class="btn btn-light text-dark"><i class="fas fa-file-csv"></i> csv</span>',
                        "titleAttr": 'Descargar archivo'
                    },
                    {
                        "extend": 'excelHtml5',
                        "text": '<span class="btn btn-light text-dark"><i class="fas fa-file-excel"></i> excel</span>',
                        "titleAttr": 'Descargar archivo'
                    },
                    {
                        "extend": 'pdfHtml5',
                        "text": '<span class="btn btn-light text-dark"><i class="fas fa-file-pdf"></i> pdf</span>',
                        "titleAttr": 'Descargar archivo'
                    },
                    {
                        "extend": 'print',
                        "text": '<span class="btn btn-light text-dark"><i class="fas fa-print"></i> imprimir</span>',
                        "titleAttr": 'Imprimir archivo'
                    }
                ],
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                paging:   true,
                ordering: true,
                info:     true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
            });
        } );
    </script>

</html>

<?php 
// Valida si despues de 30 min el usuario deja de tener actividad y cierra la sesión
if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)){
    session_unset();
    session_destroy();   
    echo "<script>
        Swal.fire({
            icon: 'info',
            title: 'Sessión expirada',
            text: 'Redirigiendo al login...',
            footer: '<strong>Cerrando sesión..</strong>',
            showConfirmButton: false,
            timer: 3000,
            }).then((result) => {
                window.location.href = 'login.php';
            })
        </script>";
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // actualizar la marca de tiempo de la última actividad
?>
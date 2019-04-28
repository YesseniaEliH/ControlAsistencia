<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <title>Reportes</title>
    <!--CSS-->
    <link rel="stylesheet" href="..\dist\css\sb-admin-2.css">
    <link rel="stylesheet" href="media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="media/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Lobster" rel="stylesheet">
    <!--Javascript-->
    <script src="media/js/jquery-1.10.2.js"></script>
    <script src="media/js/jquery.dataTables.min.js"></script>
    <script src="media/js/dataTables.bootstrap.min.js"></script>
    <script src="media/js/bootstrap.js"></script>
   <!--<script src="media/js/lenguajeusuario.js"></script>-->
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

   <!-- Para exportar en excel y pdf -->
   <script src="//code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
   <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
   <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

</head>
<body>

  <script>
  $(document).ready(function () {
    $('#example').DataTable( {
                dom: 'Bfrtip',
                pageLength: 12,
                buttons: [
                     'excel', 'pdf', 'print'
                ],
                searching: true,
                language: {
                 "decimal": "",
                 "emptyTable": "No hay información",
                 "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                 "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                 "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                 "infoPostFix": "",
                 "thousands": ",",
                 "lengthMenu": "Mostrar _MENU_ Entradas",
                 "loadingRecords": "Cargando...",
                 "processing": "Procesando...",
                 "search": "Buscar:",
                 "zeroRecords": "Sin resultados encontrados",
                 "paginate": {
                     "first": "Primero",
                     "last": "Ultimo",
                     "next": "Siguiente",
                     "previous": "Anterior"
                    }
                 },
            });
          var table = $('#example').DataTable();

          $('#container').css( 'display', 'block' );
          table.columns.adjust().draw();

          $('#entradafilter').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
          $('.contenidobusqueda tr').hide();
          $('.contenidobusqueda tr').filter(function () {
              return rex.test($(this).text());
          }).show();

          })
  });
  </script>


  <?php
      $result=$conn->query("SELECT *, employees.employee_id AS empid, attendance.id AS attid, CONCAT(`firstname`,' ',`lastname`)AS nombre FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC ");
  ?>
  <div class="col-md-12 col-md-offset-0">

  		<?php
  		if($result->num_rows > 0){
  		?>
    <div class="table-responsive">
  		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                   <th> Fecha </th>
                   <th> ID de empleado </th>
                   <th> Nombre </th>
                   <th> Entrada </th>
                   <th> Tiempo de espera </th>
                </thead>
                <tbody>
                <?php
                  while($row = $result->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['nombre']."</td>
                          <td>".date('h:i A', strtotime($row['time_in']))."</td>
                          <td>".date('h:i A', strtotime($row['time_out']))."</td>
                        </tr>
                      ";
                    };
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <?php

        		}

        	?>


</body>
</html>

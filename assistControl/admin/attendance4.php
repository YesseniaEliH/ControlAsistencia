<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte por mes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Asistencia</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        include('includes/database_connection.php');

        $empleado = '';
        $query = "SELECT DISTINCT `attendance`.`employee_id`, CONCAT(`firstname`, ' ', `lastname`) AS con FROM `attendance` INNER JOIN `employees`ON `attendance`.`employee_id`= `employees`.`id`";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        $empleado .= '<option value="'.$row['employee_id'].'">'.$row['con'].'</option>';
        }
      ?>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
         <div class="form-group">
          <select name="filter_mes" id="filter_mes" class="form-control" required>
           <option value="">Seleccionar mes</option>
           <option value="enero">Enero</option>
           <option value="febrero">Febrero</option>
           <option value="marzo">Marzo</option>
           <option value="abril">Abril</option>
           <option value="mayo">Mayo</option>
           <option value="junio">Junio</option>
           <option value="julio">Julio</option>
           <option value="agosto">Agosto</option>
           <option value="setiembre">Setiembre</option>
           <option value="octubre">Octubre</option>
           <option value="noviembre">Noviembre</option>
           <option value="diciembre">Diciembre</option>
          </select>
         </div>
         <div class="form-group">
          <select name="filter_employee" id="filter_employee" class="form-control" required>
           <option value="">Seleccionar empleado</option>
           <?php echo $empleado; ?>
          </select>
         </div>
         <div class="form-group" align="center">
          <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
         </div>
      </div>
      <div class="col-md-4"></div>
     </div>
     <div class="table-responsive">
    <table id="attendance_data" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th> Mes </th>
        <th> Fecha </th>
        <th> ID de empleado </th>
        <th> Nombre </th>
        <th> Entrada </th>
        <th> Salida </th>
      </tr>
     </thead>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>
  <?php include 'includes/scripts.php'; ?>
</body>
</html>
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  fill_datatable();

  function fill_datatable(filter_mes = '', filter_employee = '')
  {
   var dataTable = $('#attendance_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"includes/fetch.php",
     type:"POST",
     data:{
      filter_mes:filter_mes, filter_employee:filter_employee
     }
    }
   });
  }

  $('#filter').click(function(){
   var filter_mes = $('#filter_mes').val();
   var filter_employee = $('#filter_employee').val();
   if(filter_mes != '' && filter_employee != '')
   {
    $('#attendance_data').DataTable().destroy();
    fill_datatable(filter_mes, filter_employee);
   }
   else
   {
    alert('Select Both filter option');
    $('#attendance_data').DataTable().destroy();
    fill_datatable();
   }
  });


 });

</script>

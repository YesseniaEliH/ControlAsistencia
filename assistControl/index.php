<?php session_start(); ?>
<?php include 'header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<p id="date"></p>
      <p id="time" class="bold"></p>
  	</div>

  	<div class="login-box-body">
      <center><h2><p>EMPRESA</p></h2></center>
    	<h4 class="login-box-msg">Ingrese la identificación del empleado</h4>

    	<form id="attendance">
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="in">Hora de entrada</option>
              <option value="out">Hora de salida</option>
            </select>
          </div>
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control input-lg" id="employee" name="employee" required>
        		<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary" name="signin"><i class="fa fa-sign-in"></i> REGISTRAR</button>
        		</div>
      		</div>
    	</form>
  	</div>
		<div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
		<div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>

</div>
<!-- Trigger the modal with a button -->
<center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Presentar Justificación</button></center>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subir Justificación</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="justificacion.php" method="POST" id="create_justi" enctype="multipart/form-data">
        <div class="modal-body">


          <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Fecha</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="date" name="date" placeholder="Fecha de justificación">
            </div>
          </div>
          <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Empleado ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id_emp" name="id_emp" placeholder="ID Empleado">
            </div>
          </div>

        <div class="form-group">
          <label for="archivo" class="col-sm-2 control-label">Link Documento</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="archivo" id="archivo"/>
          </div>
        </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
$("#create_justi").ajaxSubmit({url: 'justificacion.php', type: 'post'})
});
</script>
</body>
</html>

<?php
if($_POST) {
  include 'conn.php';
  include 'timezone.php';
  $date = $_POST['date'];
  $id_emp = $_POST['id_emp'];
  $archivo = $_POST['archivo'];
  $date_now = date('Y-m-d');

$sql = "UPDATE falta SET justificacion_date ='$date_now', justificacion_file = '$archivo' WHERE date = '$date' AND employee_id = '$id_emp'";
$query = $conn->query($sql);

if($query === TRUE) {
  echo "<script>alert('Agregado Exitosamente')</script>";
  echo  '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=index.php">';
} else {
   $validator['success'] = false;
   $validator['message_create_documentos'] = "Error mientras agrega la información".$date_now.$archivo.$date.$id_emp;
}

$conn->close();

}
?>

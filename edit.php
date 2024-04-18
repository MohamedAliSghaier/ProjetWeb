<?php

$id = $_GET['id'];
$reservation = resC::getbyid($id);

if (!$reservation) {
  header('Location: index.php');
  exit;
}

?>

<h1>Edit Reservation</h1>
<form method="post" action="update.php" onsubmit="return validateForm()"> 
<input type="number" name="id_client" id="id_client" value="<?= $reservation['id_client'] ?>" required>
  <div>
    <label for="id_client">Client ID:</label>
    <input type="number" name="id_client" id="id_client" value="<?= $reservation['id_client'] ?>" required>
  </div>
  <div>
    <label for="statut">Status:</label>
    <input type="text" name="statut" id="statut" value="<?= $reservation['statut'] ?>" required>
  </div>
  <div>
    <button type="submit">Update</button>
  </div>
</form>

<script>
function validateForm() {
  // Basic validation
  var id_client = document.getElementById('id_client').value;
  var statut = document.getElementById('statut').value;

  if (isNaN(id_client)) {
    alert("Client ID must be a number");
    return false;
  }

  if (statut.trim() === "") {
    alert("Status cannot be empty");
    return false;
  }

  return true; // Allow form submission if validation passes
}
</script>

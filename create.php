
<h1>Create Reservation</h1>
<form method="post" action="add.php" onsubmit="return validateForm()"> <div>
    <label for="id_client">Client ID:</label>
    <input type="number" name="id_client" id="id_client" required>
  </div>
  <div>
    <label for="statut">Status:</label>
    <input type="text" name="statut" id="statut" required>
  </div>
  <div>
  <a href="create.php">Add New Reservation</a><table>
  </table>
    <button type="submit">Create</button>
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



//require_once '../config.php'; // Assuming config.php is needed here

$id = $_GET['id'];

if (isset($_GET['confirm'])) { // Check for confirmation flag in URL
  resC::deleteres($id);
  header('Location: index.php');
  exit;
} else {
  // Display confirmation message and link
  $reservation = resC::getbyid($id); // Assuming getbyid retrieves reservation by ID

  if (!$reservation) {
    header('Location: index.php');
    exit;
  }

  echo "Are you sure you want to delete reservation " . $reservation['id_res'] . "? <a href='?confirm=true'>Yes</a> / <a href='index.php'>No</a>";
}

?>*/

<?php if (isset($reservations)): ?>
  <?php foreach ($reservations as $reservation): ?>
    <tr>
      <td><?= $reservation['id_res'] ?></td>
      <td><?= $reservation['id_client'] ?></td>
      <td><?= $reservation['statut'] ?></td>
      <td>
        <a href="edit.php?id=<?= $reservation['id_res'] ?>">Edit</a>
        <a href="delete.php?id=<?= $reservation['id_res'] ?>" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
<?php else: ?>
  <tr>
    <td colspan="4">No reservations found</td>
  </tr>
<?php endif; ?>

<?php

require_once '../config.php'; // Assuming config.php is needed here
require_once '../controller/resC.php';

// Controller logic to fetch reservations
$reservations = resC::listres();

?>

<table>
  <tbody>
  <?php if (isset($reservations)): ?>
    <?php foreach ($reservations as $reservation): ?>
      <tr>
        <td>
          <button data-action="create">Create New</button>  <button data-action="edit" data-id="<?= $reservation['id_res'] ?>">Edit</button>  <button data-action="delete" data-id="<?= $reservation['id_res'] ?>" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="4">No reservations found</td>
    </tr>
  <?php endif; ?>
  </tbody>
</table>

<script>
  // Add click event listener to all buttons
  document.querySelectorAll('button').forEach(button => {
    button.addEventListener('click', (event) => {
      const action = event.target.dataset.action;
      const id = event.target.dataset.id;

      // Handle button clicks based on data-action attribute
      if (action === 'create') {
        window.location.href = "controller/create.php";  // Redirect to create controller
      } else if (action === 'edit') {
        window.location.href = `controller/edit.php?id=${id}`;  // Redirect to edit controller with ID
      } else if (action === 'delete') {
        // Handle delete confirmation and potentially use AJAX for deletion
      }
    });
  });
</script>

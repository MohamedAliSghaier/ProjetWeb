<?php
   include("dashbSides.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Document</title>
</head>
<body>
<!-- Main Content -->
<main>
            <h1>Dashboard</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Sales</h3>
                            <h1>$65,024</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Site Visit</h3>
                            <h1>24,981</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                    <div class="user">
                        <img src="images/profile-2.jpg">
                        <h2>Jack</h2>
                        <p>54 Min Ago</p>
                    </div>
                    <div class="user">
                        <img src="images/profile-3.jpg">
                        <h2>Amir</h2>
                        <p>3 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="images/profile-4.jpg">
                        <h2>Ember</h2>
                        <p>6 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="images/plus.png">
                        <h2>More</h2>
                        <p>New User</p>
                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="#">Show All</a>
            </div>
            <!-- End of Recent Orders -->

                <div class="add-booking-form">
                    <h2>Add Booking</h2>
                    <form id="bookingForm" action="../controller/bookingController.php" method="post" enctype="multipart/form-data">

                        <label for="name">Name:</label>
                        <input  type="text" id="name" name="name" required><br><br>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea><br><br>
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" required><br><br>
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" required><br><br>
                        <label for="number">Number:</label> <!-- New input field for number -->
                        <input type="number" id="number" name="number" required><br><br>
                        <label for="photo">Photo:</label>
                        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>
                        <input type="submit" value="Submit">
                    </form>
              </div>
    <!-- End of Add Booking Form -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Reza</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../logo.png">
                    <h2>Zaytuna</h2>
                    <p>Fullstack Web Developer</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminder</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Break</h3>
                            <small class="text_muted">
                                12:00 PM - 13:30 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

           

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Booking</h3>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add to Shop</h3>
                    </div>
                </div>

            </div>

        </div>


    </div>
          

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bookingForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '../controller/bookingController.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Booking added successfully!');
                    alert('Booking added successfully!');
                    $('.add-booking-form').hide(); // Hide the form after successful submission
                },
                error: function(xhr, status, error) {
                    alert('Failed to add booking.');
                    console.log('ajax failed');
                }
            });
        });
    });
</script>





    <script src="../assets/js/admin.js"></script>
    <script>
    
    document.addEventListener("DOMContentLoaded", function() {
    const addBookingButton = document.querySelector(".add-reminder");
    const addBookingForm = document.querySelector(".add-booking-form");

    addBookingButton.addEventListener("click", function() {
        if (addBookingForm.style.display === "none") {
            addBookingForm.style.display = "block"; // Display the form
        } else {
            addBookingForm.style.display = "none"; // Hide the form
        }
    });
});
   </script>
</body>
</html>
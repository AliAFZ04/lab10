<?php
session_start();
require_once "settings.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<h2>Welcome, <?php echo $row['username']; ?></h2>
<p>Email: <?php echo $row['email']; ?></p>

<h3>Edit Email</h3>
<form method="post" action="update_profile.php">
  <label>New Email:</label>
  <input type="email" name="new_email" value="<?php echo $row['email']; ?>" required>
  <input type="submit" value="Update">
</form>

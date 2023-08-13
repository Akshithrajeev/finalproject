session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$sql = "SELECT id, username, email, image_path FROM users";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row["username"] . " - " . $row["email"];
    echo "<a href='update_user.php?id=".$row["id"]."'>Update</a> | <a href='delete_user.php?id=".$row["id"]."'>Delete</a><br>";
}

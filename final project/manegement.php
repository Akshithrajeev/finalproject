$sql = "SELECT id, title, body FROM content";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<h2>" . $row["title"] . "</h2>";
    echo "<p>" . $row["body"] . "</p>";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        echo "<a href='update_content.php?id=".$row["id"]."'>Update</a> | <a href='delete_content.php?id=".$row["id"]."'>Delete</a>";
    }
    echo "<hr>";
}

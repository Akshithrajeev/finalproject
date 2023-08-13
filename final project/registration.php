<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Input validation
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = strip_tags($_POST['username']);
    $password = $_POST['password'];

    // Check for unique email
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Image upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);

        // Insert into DB
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, image_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $target_file);
        $stmt->execute();
        echo "User registered successfully!";
    }

    $stmt->close();
            
}

?>


<?php include 'assets/header.php'; ?>
<?php include 'connection.php'; ?>

<?php
// Define your SQL query
$sql = "SELECT title, content FROM blog";

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<section class="blog-posts">';
            echo '<div id="postsContainer">';
            echo '<h3>' . htmlspecialchars($row["title"]) .'</h3>';
            echo '<p class="para_event">' . htmlspecialchars($row["content"]) .'</p>';
            echo '</div>';
            echo '<br>';
            echo '<hr>';
        echo '</section>';
    }
} 
// Close the connection
$conn->close();
?>

<?php include 'assets/footer.php'; ?>
<?php include 'assets/header.php'; ?>

<?php
// Define your SQL query
$sql = "SELECT title, content FROM blog";

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Convert newlines to <p> tags
        $content = '<p>' . str_replace("\n", '</p><p>', $row["content"]) . '</p>';

        echo '<section class="blog-posts">';
            echo '<div id="postsContainer">';
            echo '<h3>' . htmlspecialchars($row["title"]) .'</h3>';
            echo '<div class="para_event">' . $content .'</div>';
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
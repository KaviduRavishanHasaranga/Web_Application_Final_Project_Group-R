<?php include 'assets/header.php'; ?>

<?php
// Define your SQL query
$sql = "SELECT title, content FROM blog";

// Execute the query
$result = $conn->query($sql);

echo '<section class="blog-posts-dummy">';
            echo '<div id="postsContainer">';
            echo '<h2 class="blogH3">Gemstone Chronicles: Unveiling the Beauty, Trends, and Ethics of Gems</h2>';
            echo '<p>Welcome to ROYAL GEMSTONE PRADIZE, where we celebrate the captivating world of gemstones. In this blog, we’ll explore the rich history and allure of gems, from their ancient origins to their modern-day significance. Discover the fascinating journey of gemstones through the ages, and how they’ve been cherished across cultures and traditions. We’ll also dive into the essential aspects of gemstone quality, including the 4 Cs—Cut, Color, Clarity, and Carat weight—so you can make informed decisions when selecting or evaluating your precious stones.</p><br>';
            echo '<p>Stay up-to-date with the latest trends in gemstone jewelry, whether it’s bold statement pieces or elegant accents. We’ll provide insights on popular gemstones like diamonds, emeralds, sapphires, and rubies, offering tips on how to choose the perfect gem for your style and preferences. Additionally, learn practical advice on caring for your gemstone jewelry to keep it looking stunning for years to come.</p><br>';
            echo '<p>Ethical considerations are also crucial in the gemstone industry. We’ll explore the importance of responsible sourcing and ethical practices in mining, helping you make conscious choices when purchasing gemstones. Join us as we delve into these sparkling treasures, and don’t forget to subscribe to our newsletter for the latest updates, offers, and more fascinating content about the world of gems.</p><br>';
            echo '</div>';
echo '</section>';
echo '<br>';

// Check if there are any results
if ($result->num_rows > 0) {

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Convert newlines to <p> tags
        $content = '<p>' . str_replace("\n", '<br></p><p>', $row["content"]) . '</p>';

        echo '<section class="blog-posts">';
            echo '<div id="postsContainer">';
            echo '<h2 class="blogH3">' . htmlspecialchars($row["title"]) .'</h2>';
            echo '<div class="para_event">' . $content .'</div>';
            echo '</div>';
        echo '</section>';
        echo '<br>';
    }
} 
// Close the connection
$conn->close();
?>

<?php include 'assets/footer.php'; ?>
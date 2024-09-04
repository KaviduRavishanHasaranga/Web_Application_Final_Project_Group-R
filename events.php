<?php include 'assets/header.php'; ?>
<?php include 'connection.php' ?>

<?php
//Define SQL query to get stored in the database
$sql = "SELECT event_title, event_images, event_content, created_at FROM events";

// Execute the query
$result = $conn->query($sql);

    echo '<div class="event-container">';
    echo '<div class="event-title">';
    echo '<h1>Events & News</h1>'.'<br>'; 
    echo '</div>';
    echo '<div class="event-post post2">';
            echo '<h3>HONG KONG JEWELRY & GEM FAIR 2023 18TH-22ND SEPTEMBER BOOTH NUMBER AWE 2N09</h3>';
            echo '<h4>Posted on: 2024-08-22</h4>';
            echo '<br>';
            echo '<div class="event-img img2">';
                echo '<img src="Images/event_post2.jpg">';
            echo '</div>';
            echo '<br>';
            echo '<p>World’s Number One Fine Jewellery Event Returns In 2023!Jewellery & Gem WORLD Hong Kong (JGW), popularly known as the September Hong Kong Jewel...</p>';
            echo '<br>';
            echo '<span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>';
            echo '<br><br>';
            echo '<a href="#"><button class="read-more">Read More</button></a>';
        echo '</div>';

// Check if there are any results
if ($result->num_rows > 0){

    // Output data of each row
    while ($row = $result->fetch_assoc()){
        echo '<div class="event-post post1">'; 
        echo '<h3>'.htmlspecialchars($row["event_title"]).'</h3>';
        echo '<h4>Posted on: '.date('Y-m-d', strtotime($row["created_at"])).'</h4>';; //display date that stored data in database
            echo '<br>';
            echo '<div class="event-img img1">';
            if ($row["event_images"]) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["event_images"]) . '" alt="Event Image" />'; //display event post image
            } else {
                echo '<p>No image available</p>';
            }
            echo '</div>';
            echo '<br>';
            echo '<p>'.htmlspecialchars($row["event_content"]).'</p>'; //display event content
            echo '<br>';
            echo '<span> Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>';
            echo '<br><br>';
            echo '<a href="#"><button class="read-more">Read More</button></a>';
        echo '</div>';
        echo '<br>'; 
    }
}
// Close the connection
$conn->close();
?>

        <!-- <div class="event-post post3">   thrid event post -->
            <!-- <h3>68TH BANGKOK GEMS & JEWELRY FAIR 2023-BOOTH NUMBER T34</h3>
            <h4>by Randeesh Weerasinghe &nbsp; April 15,2024</h4>
            <br>
            <div class="event-img img3">
                <img src="Images/event_post3.jpg">
            </div>
            <br>
            <p>Bangkok Gems & Jewelry Fair (BGJF) is one of the world’s most renowned and longest-celebrated gems and jewelry trade fair in the industry. Orga...</p>
            <br>
            <span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>
            <br><br>
            <a href="#"><button class="read-more" height="100px">Read More</button></a>
        </div>
        <br> -->
        
<?php include 'assets/footer.php'; ?>
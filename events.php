<?php include 'assets/header.php'; ?>
<?php include 'connection.php' ?>

<?php
//Define SQL query to get stored in the database
$sql = "SELECT event_title, event_images, event_content FROM events";

// Execute the query
$result = $conn->query($sql);

echo '<div class="event-container">'; 
    echo '<div class="event-title">';
    echo '<h1>Events & News</h1>'.'<br>'; 
    echo '</div>';

// Check if there are any results
if ($result->num_rows > 0){

    // Output data of each row
    while ($row = $result->fetch_assoc()){
        echo '<div class="event-post post1">'; 
        echo '<h3>'.htmlspecialchars($row["event_title"]).'</h3>';
        echo '<h4>'.date('Y-m-d H:i:s').'</h4>';
            echo '<br>';
            echo '<div class="event-img img1">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($event_images) . '" alt="Event Image" />';
            echo '</div>';
            echo '<br>';
            echo '<p>'.(htmlspecialchars($row["event_content"])).'</p>';
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

    
        <!-- <div class="event-post post2">   second event post -->
            <!-- <h3>HONG KONG JEWELRY & GEM FAIR 2023 18TH-22ND SEPTEMBER BOOTH NUMBER AWE 2N09</h3>
            <h4>by Sangeeth Thisaranga &nbsp; June 07,2024</h4>
            <br>
            <div class="event-img img2">
                <img src="Images/event_post2.jpg">
            </div>
            <br>
            <p>World’s Number One Fine Jewellery Event Returns In 2023!Jewellery & Gem WORLD Hong Kong (JGW), popularly known as the September Hong Kong Jewel...</p>
            <br>
            <span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>
            <br><br>
            <a href="#"><button class="read-more">Read More</button></a>
        </div>
        <br> -->
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
        <!-- <div class="event-post post4">   fourth event post -->
            <!-- <h3>FACETS'24 SRI LANKA INTERNATIONAL GEM & JEWELLERY</h3>
            <h4>by Mithum Lahiru &nbsp; December 20,2023</h4>
            <br>
            <div class="event-img img4">
                <img src="Images/facets.jpg">
            </div>
            <br>
            <p id="eventCont">For thirty years, FACETS has showcased the best of the gem and jewellery industry of Sri Lanka, a country labeled by ancient travelers as Ratnadveepa, or the Island of Gems.The Sri Lanka Gem & Jewellery Association hosts FACETS SRI LANKA 2024 – THE PREMIER EDITION From the 6th to 8th January 2024 At Cinnamon Grand Colombo, Sri Lanka...</p>
            <br>
            <span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>
            <br><br>
            <a href="#"><button class="read-more">Read More</button></a>
        </div>
        <br> -->
        <!-- <div class="event-post post5">   fifth event post -->
            <!-- <h3>PREMIER INTERNATIONAL GEM SHOW 2024 IN SRI LANKA</h3>
            <h4>by Kamal Perera &nbsp; January 01,2024</h4>
            <br>
            <div class="event-img img5">
                <img src="Images/gem_event.jpg">
            </div>
            <br>
            <p id="eventCont">
                Sri Lanka, known as the ‘Island of Gems’, is set to host a spectacular event that will illuminate the world of gemstones – Gem Sri Lanka 2024. Organized by the Chinafort Gem and Jewellery Traders Association (CGJTA), this premier event aims to unveil a myriad of radiant treasures from around the globe, establishing Sri Lanka as a significant hub in the international gemstone trade.
            </p>
            <br>
            <span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>
            <br><br>
            <a href="#"><button class="read-more">Read More</button></a>
        </div>
        <br>
    </div> -->

<?php include 'assets/footer.php'; ?>
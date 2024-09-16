<?php include 'assets/header.php'; ?>

<!--     
    <div class="event-container">
        <div class="event-title">
            <h1>Events & News</h1><br>
        </div>

        <div class="event-post post1">
            <h3 name="eventName">Facets 2023: A Global Invitation to the Most Fabulous Gem Show in Sri Lanka</h3>
            <h4>by Kavidu Hasaranga &nbsp; June 28,2024</h4>
            <br>
            <div class="event-img img1">
                <img src="Images/event_post1.jpg">
            </div>
            <br>
            <p>In the heart of the Indian Ocean, where the allure of gemstones meets the enchanting landscapes of Sri Lanka, the stage is set for the ...</p>
            <br>
            <span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>
            <br><br>
            <a href="#"><button class="read-more">Read More</button></a>
        </div>
        <br>
        <div class="event-post post2">
            <h3>Hong Kong jewelry & Gem Fair 2023 18th-22nd September Booth Number AWE 2N09</h3>
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
        <div class="event-post post3">
            <h3>68th Bangkok Gems & Jewelry Fair 2023-BOOTH NUMBER T34</h3>
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
            <a href="#"><button class="read-more">Read More</button></a>
        </div>
    </div> -->

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
            echo '<h3>HONG KONG JEWELRY & GEM FAIR 2023</h3>';
            echo '<h4>Posted on: 2024-08-22</h4>';
            echo '<br>';
            echo '<div class="event-img img2">';
                echo '<img src="Images/event_post2.jpg">';
            echo '</div>';
            echo '<br>';
            echo '<p>World’s Number One Fine Jewellery Event Returns In 2023! Jewellery & Gem WORLD Hong Kong (JGW), popularly known as the September Hong Kong Jewellery & Gem Fair, is building up for its full return in 2023. With the further easing of Hong Kong’s pandemic restrictions, the industry’s No. 1 fine jewellery event is set to return to its original two-venue, product category-specific format.</p><br>';
            echo '<p>The jewellery materials section of JGW will be hosted at the AsiaWorld-Expo (AWE) from 18 to 22 September 2023 while categories spanning finished jewellery, packaging solutions, tools & equipment, and jewellery industry-related technologies will be presented at the Hong Kong Convention and Exhibition Centre (HKCEC) from 20 to 24 September 2023.</p>';
            echo '<br>';
            echo '<span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>';
            echo '<br><br>';
            echo '<a href="#"><button class="read-more">Read More</button></a>';
        echo '</div>';
        echo '<br>';

    echo '<div class="event-post post2">';
        echo '<h3>PREMIER INTERNATIONAL GEM SHOW 2024 IN SRI LANKA</h3>';
        echo '<h4>Posted on: 2024-08-22</h4>';
        echo '<br>';
        echo '<div class="event-img img2">';
            echo '<img src="Images/premier.jpg">';
        echo '</div>';
        echo '<br>';
        echo '<p>Sri Lanka, known as the ‘Island of Gems’, is set to host a spectacular event that will illuminate the world of gemstones – Gem Sri Lanka 2024. Organized by the Chinafort Gem and Jewellery Traders Association (CGJTA), this premier event aims to unveil a myriad of radiant treasures from around the globe, establishing Sri Lanka as a significant hub in the international gemstone trade.</p><br>';
        echo '<p>Scheduled to unfold from January 11-13, 2024, at the idyllic Cinnamon Bentota Beach Resort, Gem Sri Lanka 2024 is more than just an exhibition. It’s vibrant platform that brings together a diverse array of gemstones from every corner of the world, celebrating the beauty, rarity, and allure of these natural wonders.</p><br>';
        echo '<p>Endorsed by the National Gem and Jewellery Authority (NGJA) and the Export Development Board (EDB), Gem Sri Lanka 2024 is set to attract gem enthusiasts, traders, and connoisseurs from across the globe. The event offers a unique opportunity for participants to explore, appreciate, and acquire a wide variety of gemstones, each with its unique characteristics and charm.</p><br>';
        echo '<p>Visitors to Gem Sri Lanka Fair 2024 will be treated to a visual feast of gemstones, showcasing the diversity and uniqueness that the world has to offer. From the vibrant hues of sapphires and rubies to the subtle elegance of moonstones and garnets, the exhibition promises an immersive and enlightening experience for all.</p><br>';
        echo '<p>Gem Sri Lanka 2024 marks a significant milestone in introducing a world of gemstones to a global audience. The event stands as a testament to the diversity, beauty, and allure of gemstones from around the world, with Sri Lanka serving as the splendid backdrop for this international affair. For those intrigued by the sparkle and allure of gemstones, Gem Sri Lanka 2024 offers a unique opportunity to explore, learn, and be enchanted by the world’s gemstone grandeur.</p><br>';
        echo '<span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>';
        echo '<br><br>';
        echo '<a href="#"><button class="read-more">Read More</button></a>';
    echo '</div>';
    echo '<br>';

    echo '<div class="event-post post2">';
        echo '<h3>PREMIER INTERNATIONAL GEM SHOW 2024 IN SRI LANKA</h3>';
        echo '<h4>Posted on: 2024-08-22</h4>';
        echo '<br>';
        echo '<div class="event-img img2">';
            echo '<img src="Images/facets24.jpg">';
        echo '</div>';
        echo '<br>';
        echo '<p>The Sri Lanka Gem and Jewellery Association (SLGJA) in partnership with the National Gem and Jewellery Authority (NGJA) and the Export Development Board (EDB) is delighted to announce that FACETS Sri Lanka, Asia`s premier gem and jewellery exhibition will be held at the Atrium Lobby of the Cinnamon Grand from January 6 to 8, 2024. The SLGJA, formed in 2002, is the apex body for the gem and jewellery industry in Sri Lanka and represents all subsectors of the trade. Over the years FACETS Sri Lanka has become an important event in the international gem and jewellery calendar and this year too, it will serve as a much looked-forward to meeting point for the global gem and jewellery sector, attracting prominent traders, gemstone and jewellery wholesalers, exporters, manufacturers, lapidarists, retailers, and collectors from across the globe.</p><br>';
        echo '<p>Sri Lanka has earned worldwide recognition as a veritable treasure trove of gemstones, renowned for producing some of the finest specimens in the world. As the oldest source country for coloured gemstones, Sri Lanka boasts a unique and vibrant selection of gemstones, complemented by exquisitely crafted jewellery that seamlessly blends international trends with elements of local culture.</p><br>';
        echo '<p>Since its inception in 1991, FACETS Sri Lanka has thrived for 30 years, solidifying Sri Lanka`s reputation on the global stage as a premier destination for precious gems and jewellery. This exhibition consistently draws numerous international exhibitors and buyers and is a highly recommended destination for anyone in the Gem and Jewellery Industry. FACETS Sri Lanka 2024 will focus on the emotional resonance of design and craftsmanship and their evolution throughout history. Furthermore, it will offer insights into the future growth trajectory of the industry, emerging trends in jewellery design, and its anticipated appeal to a global audience in the years to come.</p><br>';
        echo '<span>Posted in <a href="#">Blue sapphire</a>, <a href="#">Events</a>, <a href="#">Gem Exhibition</a>, <a href="#">gemstone</a>, <a href="#">sustainability</a></span>';
        echo '<br><br>';
        echo '<a href="#"><button class="read-more">Read More</button></a>';
    echo '</div>';
    echo '<br>';

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
            // Convert newlines to <p> tags
            $content = '<p>' . str_replace("\n", '<br></p><p>', $row["event_content"]) . '</p>';
            echo '<div>' . $content . '</div>'; //display event content
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

<?php include 'assets/footer.php'; ?>
<?php include 'assets/header.php'; ?>
<div class="container">
        <h1>Buy Now</h1>
       
        <form action="process_purchase.php" method="post" id="purchaseForm" center>
            <table board="0">
                
            
                <tr>
               <td><label for="fullName">Full Name:</label></td>
               <td><input type="text" id="fullName" name="fullName" required></td>
               </tr>
            

                <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="email" id="email" name="email" required></td>
</tr>
<tr>
<td><label for="phone">Phone Number:</label></td>
<td><input type="text" id="phone" name="phone" required></td>
                </tr>
                <tr>
                <td><label for="address">Shipping Address:</label></td>
                <td><input type="text" id="address" name="address" required></td>
                </tr>
                <tr>
                <td><label for="city">City:</label></td>
                <td><input type="text" id="city" name="city" required></td>
                </tr>
                <tr>
                <td><label for="state">State/Province:</label></td>
                <td><input type="text" id="state" name="state" required></td>
                </tr>
                <tr>
                <td><label for="zipcode">Zip/Postal Code:</label></td>
                <td><input type="text" id="zipcode" name="zipcode" required></td>
                </tr>
                <tr>
                <td> <label for="gemType">Gem Type:</label>
              
              <td>  <select id="gemType" name="gemType" required>
                
                <option value="Yellow Sapphire">Yellow Sapphire</option>
                 <option value="Blue Sapphire">Blue Sapphire</option>
                <option value="Ruby">Ruby</option>
                 <option value="Yellow Sapphire">Yellow Sapphire</option>
                 <option value="Pink Sapphire">Pink Sapphire</option>
                 <option value="Garnet">Garnet</option>
                 <option value="Tourmaline">Tourmaline</option>
                </select></td>
                </tr>
                <tr>
                <td><label for="quantity">Quantity:</label></td>
                <td><input type="number" id="quantity" name="quantity" min="1" required></td>
                </tr>
                <tr>
                <td><label for="paymentMethod">Payment Method:</label></td>
                <td><select id="paymentMethod" name="paymentMethod" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select></td>
                </tr>
                <tr>
                <td><button type="submit" class="btn">Purchase</button></td>
            </tr>
</table>
        </form>




<?php include 'assets/footer.php'; ?>
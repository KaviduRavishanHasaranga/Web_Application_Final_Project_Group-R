<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

    <link rel="stylesheet" href="css\subpages.css">

    <style>
        .container {
            margin-top: 200px;
            justify-content: center;
            align-items: center;
        }

        .succes-img {
            display: block;
            width: 200px;
            height: auto;
            margin: auto;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            margin-top: 40px;
            color: green;
        }
        .btn{
            display: block;
            margin: auto;
            margin-top: 40px;
            padding: 10px 20px;
            background-color: lightgray;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn a{
            text-decoration: none;
            color: black;
            font-size: 18px;
            
        }
    </style>

</head>

<body>
    <div class="container">
        <image src="Images\greentick.png" class="succes-img">
            <h1>Payment Sucessfull</h1>

            <button class="btn"><a href="contact.php">Return to the form</a></button>
    </div>
</body>

</html>
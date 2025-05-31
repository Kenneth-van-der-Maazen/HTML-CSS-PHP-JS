<?php
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beroepsproject 2</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php include 'inc/NavBar.php'; ?>

    <div class="container">
        <div class="site-banner">
            <h1 class="heading">Contact</h1>
        </div>
        <div class="footer">
            <div class="footer-column">
                <!-- <img class="map-image" src="img/map.png" alt="map" /> -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19512.036503533527!2d4.910491074316416!3d52.3159197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60b91697d8729%3A0xb5cf33c91399403c!2sMBO%20College%20Zuidoost%20-%20ROC%20van%20Amsterdam!5e0!3m2!1snl!2snl!4v1735723537760!5m2!1snl!2snl" 
                    width="500" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    class="map-image"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="footer-column">
                <div class="tile-content">
                    <h1>Informatie</h1>
                    <div class="contact-row">
                        <i class="fa fa-male"><span class="tile-field"> Kenneth</span></i>
                    </div>
                    <div class="contact-row">
                        <i class="fa fa-address-card"><span class="tile-field"> Straatnaam 32</span></i>
                    </div>
                    <div class="contact-row">
                        <i class="fa fa-phone"><span class="tile-field"> +31 6 123 456 78</span></i>
                    </div>
                    <div class="contact-row">
                        <i class="fa fa-envelope"><span class="tile-field"> Beroepsproject@rocva.nl</span></i>
                    </div>
                </div>
            </div>
            <div class="footer-column contact-form-container">
                <div class="tile-content">
                    <form method="POST">
                        <h1>Contact formulier</h1>
                        <div class="contact-row">
                            <input type="text" class="form-field" placeholder="Naam">
                        </div>
                        <div class="contact-row">
                            <textarea rows="5" class="form-field" placeholder="Bericht"></textarea>
                        </div>
                        <button class="button">Verstuur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
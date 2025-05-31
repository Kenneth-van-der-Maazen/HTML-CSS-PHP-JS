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
    <title>Blog | FAQ</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/faq.css">
</head>
<body>
    <?php
        include 'inc/NavBar.php';
    ?>
    <div class="wrapper">
        <p>Beroepsprojet 2 - Blog - Periode 4</p>
        <h1 class="faq-title">Frequently Asked Questions</h1>

        <div class="faq">
            <button class="accordion">
                Wat is dit voor website?
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up" style="display: none;"></i>
            </button>
            <div class="pannel">
                <p>
                Dit was ooit een goedwerkende blog maar sinds ik het project aan een domein gekoppeld heb werkt hij niet helemaal goed meer.
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                Wie is de autheur hiervan?
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up" style="display: none;"></i>
            </button>
            <div class="pannel">
                <p>
                Kenneth van der Maazen.
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                Waarom een blog?
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up" style="display: none;"></i>
            </button>
            <div class="pannel">
                <p>
                Ik had eerst een portofolio gemaakt met een heel mooi ontwerp alleen heel weinig portofolio dingen, een blog kan ik on te spot aanpasssen door een post te maken. 
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                Wat is wat?
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up" style="display: none;"></i>
            </button>
            <div class="pannel">
                <p>
                Weet ik veel?
                </p>
            </div>
        </div>
    </div>

    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");

          // Pak beide icoontjes in de huidige accordion-button
          var chevronDown = this.querySelector(".fa-chevron-down");
          var chevronUp = this.querySelector(".fa-chevron-up");

          // Toggle de display van de chevrons
          if (chevronDown.style.display === "none") {
            chevronDown.style.display = "inline-block";
            chevronUp.style.display = "none";
          } else {
            chevronDown.style.display = "none";
            chevronUp.style.display = "inline-block";
          }

          // De pannel open- en of dichtklappen
          var pannel = this.nextElementSibling;
          if (pannel.style.display === "block") {
            pannel.style.display = "none";
          } else {
            pannel.style.display = "block";
          }
        });
      }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
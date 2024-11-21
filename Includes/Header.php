<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WonderMeals</title>
    <link rel="stylesheet" href="../Assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="customer-support">
                    <i class="fa-solid fa-headset"></i>
                    <div class="content-customer-support">
                        <span class="text">Customer Support</span>
                        <span class="number">Woodlands (832)463-0846<br>Katy (281)645-0980</span>
                    </div>
                </div>
                <div class="container-logo">
                    <img src="images/ISOTIPO NEGATIVO.png" width="30" height="30" alt="Logo">
                    <h1 class="logo"><a href="/">WonderMeals</a></h1>
                </div>
            </div>
        </div>
        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars" id="open-menu"></i>
                <ul class="menu hide" id="menu">
                    <li><a href="index.php">Menu</a></li>
                    <li><a href="orderonline.php">Order Online</a></li>
                    <li><a href="experience.php">Experience</a></li>
                    <li><a href="locateus.php">Locate us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <script>
        // JavaScript para alternar el menú de navegación
        document.getElementById('open-menu').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('hide');
        });
    </script>
</body>
</html>

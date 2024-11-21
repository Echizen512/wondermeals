<?php
include './Config/BD.php';

$stmt_featured = $pdo->query("SELECT * FROM products WHERE type = 'Featured'");
$featured_products = $stmt_featured->fetchAll(PDO::FETCH_ASSOC);

$stmt_special = $pdo->query("SELECT * FROM products WHERE type = 'Special'");
$special_products = $stmt_special->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <link rel="stylesheet" href="./Assets/css/Card.css">
    <link rel="stylesheet" href="./Assets/css/Hover.css">
    <link rel="stylesheet" href="./Assets/css/styles.css">
    <?php include './Includes/Header.php'; ?>

<style>

.container-products {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start; /* Alinea los elementos al inicio */
    gap: 40px; /* Espaciado entre tarjetas */
    padding: 10px;
}

    .card-product {
    width: 350px;
    height: 400px;
    display: inline-block;
    text-align: center;
    overflow: hidden;
    box-sizing: border-box;
}

.card-product img {
    object-fit: cover;
    width: 100%;
    height: 70%;
}

</style>

    <section class="banner">
        <div class="content-banner">
            <img src="images/bannerweb.jpg">
        </div>
    </section>
    <main class="main-content">
        <section class="container container-features">
            <div class="card-feature">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="60" viewBox="0 0 24 24"><path fill="#FF3008" d="M23.071 8.409a6.09 6.09 0 0 0-5.396-3.228H.584A.589.589 0 0 0 .17 6.184L3.894 9.93a1.75 1.75 0 0 0 1.242.516h12.049a1.554 1.554 0 1 1 .031 3.108H8.91a.589.589 0 0 0-.415 1.003l3.725 3.747a1.75 1.75 0 0 0 1.242.516h3.757c4.887 0 8.584-5.225 5.852-10.413"/></svg>
            <div class="feature-content">
                    <span>Doordash</span>
                </div>
            </div>
            <div class="card-feature">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="60" viewBox="0 0 48 48">
						<path fill="#37474f" d="M13.083,42h21.834C38.829,42,42,38.829,42,34.917V13.083C42,9.171,38.829,6,34.917,6H13.083	C9.171,6,6,9.171,6,13.083v21.834C6,38.829,9.171,42,13.083,42z"></path><path fill="#fff" d="M35.517,18.162c-0.757,0-1.294,0.593-1.294,1.502V23h-1.156v-5.873h1.142v0.717	c0.287-0.484,0.814-0.774,1.376-0.759H36v1.076L35.517,18.162z M32.268,20.064c0-1.751-1.246-3.061-2.932-3.061	c-1.669,0.011-3.013,1.374-3.002,3.043c0,0.006,0,0.012,0,0.018c0,1.75,1.35,3.073,3.111,3.073c0.998,0.019,1.943-0.449,2.533-1.254	l-0.839-0.615c-0.391,0.545-1.024,0.864-1.695,0.854c-0.972-0.005-1.796-0.719-1.938-1.681h4.764L32.268,20.064z M27.532,19.525	c0.206-0.896,0.922-1.502,1.79-1.502s1.582,0.606,1.776,1.502H27.532z M22.672,17.003c-0.78,0.001-1.528,0.313-2.077,0.868V15H19.44	v8h1.142v-0.745c0.553,0.56,1.306,0.877,2.093,0.882c1.694,0.036,3.096-1.308,3.132-3.002c0.036-1.694-1.308-3.096-3.002-3.132	c-0.043-0.001-0.087-0.001-0.13,0H22.672z M22.589,22.104c-1.123,0.005-2.038-0.901-2.043-2.024	c-0.005-1.123,0.901-2.038,2.024-2.043c1.123-0.005,2.038,0.901,2.043,2.024c0,0.006,0,0.011,0,0.017	c0.002,1.115-0.901,2.02-2.016,2.021c-0.003,0-0.006,0-0.008,0V22.104z M15.183,22.049c1.116,0,1.982-0.856,1.982-2.138V15h1.198v8	h-1.184v-0.763c-0.559,0.578-1.33,0.901-2.133,0.896c-1.721,0-3.046-1.254-3.046-3.156V15h1.22v4.918	C13.22,21.207,14.05,22.049,15.183,22.049z"></path><path fill="#66bb6a" d="M12.126,25h5.608v1.372h-4.093v1.949h3.979v1.326h-3.979v1.981h4.093V33h-5.608V25z M33.177,33.124	c1.714,0,2.68-0.821,2.68-1.948c0-0.803-0.572-1.402-1.769-1.662l-1.266-0.259c-0.735-0.137-0.966-0.274-0.966-0.547	c0-0.354,0.354-0.572,1.007-0.572c0.707,0,1.231,0.19,1.368,0.844h1.483c-0.081-1.231-0.966-2.044-2.761-2.044	c-1.551,0-2.64,0.64-2.64,1.881c0,0.858,0.599,1.416,1.892,1.688l1.415,0.327c0.558,0.109,0.707,0.26,0.707,0.491	c0,0.368-0.421,0.599-1.103,0.599c-0.856,0-1.346-0.19-1.536-0.844h-1.491C30.414,32.308,31.326,33.124,33.177,33.124z M29.766,31.667h-1.115c-0.341,0-0.558-0.15-0.558-0.464v-2.779h1.673V27.09h-1.673v-1.676h-1.491v1.676h-1.134v1.335h1.129v3.161	c0,0.791,0.558,1.417,1.565,1.417h1.605L29.766,31.667z M24.823,27.09V33h-1.487v-0.56c-0.525,0.444-1.191,0.687-1.878,0.684	c-0.043,0.001-0.087,0.001-0.13,0c-1.708-0.036-3.064-1.45-3.028-3.158c0.036-1.708,1.45-3.064,3.158-3.028	c0.688-0.002,1.353,0.24,1.878,0.684V27.09L24.823,27.09z M21.578,31.83c0.006,0,0.013,0,0.019,0	c0.982-0.009,1.771-0.813,1.762-1.795c0-0.007,0-0.015,0-0.022c-0.011-0.994-0.826-1.79-1.819-1.778	c-0.994,0.011-1.79,0.826-1.778,1.819c0.011,0.994,0.826,1.79,1.819,1.778L21.578,31.83z"></path>
						</svg>
                <div class="feature-content">
                    <span>Uber Eats</span>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-location-dot"></i>
                <div class="feature-content">
                    <span>Locate us</span>
                    <p>Katy & Woodlands</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="fa-solid fa-headset"></i>
                <div class="feature-content">
                    <span>Customer Service</span>
                    <p>7:00 to 19:00</p>
                </div>
            </div>
        </section>
        <br>
        
        <section class="container top-categories">
            <h1 class="heading-1">Categories</h1>
            <div class="container-categories">
                <?php foreach ($categories as $category): ?>
                <div class="card-category" style="background-color: #7f0000;" data-category="<?php echo htmlspecialchars($category['name']); ?>">
                    <p><?php echo htmlspecialchars($category['name']); ?></p>
                    <span>Filter</span>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="container top-products">
            <h1 class="heading-1">Featured</h1>

            <div class="container-products" id="featured-products">
                <?php foreach ($featured_products as $product): ?>
                <div class="card-product" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                    <div class="container-img">
                        <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                        <div class="button-group">
                            <span class="view-product" data-name="<?php echo htmlspecialchars($product['name']); ?>" data-image="images/<?php echo htmlspecialchars($product['image']); ?>" data-price="<?php echo htmlspecialchars(number_format($product['price'], 2)); ?>" data-description="<?php echo htmlspecialchars($product['description']); ?>"><i class="fa-regular fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <i class="<?php echo ($i < $product['rating']) ? 'fa-solid' : 'fa-regular'; ?> fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="price"><?php echo htmlspecialchars(number_format($product['price'], 2)); ?> USD</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="container top-products">
            <h1 class="heading-1">Special</h1>

            <div class="container-products" id="special-products">
                <?php foreach ($special_products as $product): ?>
                <div class="card-product" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                    <div class="container-img">
                        <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                        <div class="button-group">
                            <span class="view-product" data-name="<?php echo htmlspecialchars($product['name']); ?>" data-image="images/<?php echo htmlspecialchars($product['image']); ?>" data-price="<?php echo htmlspecialchars(number_format($product['price'], 2)); ?>" data-description="<?php echo htmlspecialchars($product['description']); ?>"><i class="fa-regular fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <i class="<?php echo ($i < $product['rating']) ? 'fa-solid' : 'fa-regular'; ?> fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="price"><?php echo htmlspecialchars(number_format($product['price'], 2)); ?> USD</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="gallery">
            <img src="images/imag1 (1).jpg" alt="imag1" class="gallery-img-1" />
            <img src="images/imag2.jpg" alt="imag2" class="gallery-img-2" />
            <img src="images/imagen central.png" alt="imagen central" class="gallery-img-3" />
            <img src="images/imag3.jpg" alt="imag3" class="gallery-img-4" />
            <img src="images/imag4.jpg" alt="imag4" class="gallery-img-5" />
        </section>
        <?php include './Includes/Footer.php'; ?>
    </main>
    
        <div id="productModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                    <img id="modalImage" src="" alt="Product Image" style="height: 350px; width: 100%;"> <br>
                    <br>
                    <h2 id="modalName" style="text-align: center; font-size: 16px;"></h2>
                    <p id="modalDescription" style="font-size: 12px"></p>
                    <p id="modalPrice" style="font-size: 12px"></p>
            </div>
        </div>

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <script src="./Assets/js/jquery-3.7.0.min.js"></script>
    <script src="./Assets/js/index.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const viewProductButtons = document.querySelectorAll(".view-product");
    const modal = document.createElement("div");
    modal.classList.add("modal");
    document.body.appendChild(modal);

    viewProductButtons.forEach(button => {
        button.addEventListener("click", function() {
            const name = this.getAttribute("data-name");
            const image = this.getAttribute("data-image");
            const price = this.getAttribute("data-price");
            const description = this.getAttribute("data-description");

            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close-modal">&times;</span>
                    <h2 style="font-size: 18px;">${name}</h2>
                    <img src="${image}" alt="${name}" style="width: 100%; max-height: 300px; object-fit: cover;">
                    <br> <br>
                    <p style="font-size: 18px"><strong>Price:</strong> $${price}</p>
                    <br>
                    <p style="font-size: 14px">${description}</p>
                </div>
            `;
            modal.style.display = "block";

            document.querySelector(".close-modal").addEventListener("click", function() {
                modal.style.display = "none";
            });
        });
    });

    const categoryCards = document.querySelectorAll(".card-category");
    const products = document.querySelectorAll(".card-product");

    categoryCards.forEach(card => {
        card.addEventListener("click", function() {
            const selectedCategory = this.getAttribute("data-category");

            products.forEach(product => {
                if (product.getAttribute("data-category") === selectedCategory || selectedCategory === "All") {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        });
    });
});

</script>

<style>
    .close-modal {
    color: #aaa;
    float: right;
    font-size: 30px; 
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease;
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>

</body>


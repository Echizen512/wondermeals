<?php
include './Config/BD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if (isset($_POST['stars']) && isset($_POST['comment'])) {
        $stars = $_POST['stars'];
        $comment = $_POST['comment'];
        
        if ($stars >= 3) {
            $stmt = $pdo->prepare("INSERT INTO comments (name, email, stars, comment) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $stars, $comment]);
        }
    } elseif (isset($_POST['complaint'])) {
        $complaint = $_POST['complaint'];
        
        $stmt = $pdo->prepare("INSERT INTO complaints (name, email, complaint) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $complaint]);
        
        echo "<script>
                alert('Thank you. We will contact you.');
                window.location.href = 'experience.php';
            </script>";
        exit;
    } else {
        echo "<script>
                alert('Error: Please fill out all required fields.');
                window.location.href = 'experience.php';
            </script>";
        exit;
    }
}
$stmt = $pdo->query("SELECT * FROM comments WHERE stars >= 3 ORDER BY id DESC");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/Card.css">
    <link rel="stylesheet" href="./Assets/css/Hover.css">
    <link rel="stylesheet" href="./Assets/css/styles.css">
    <link rel="stylesheet" href="./Assets/css/star.css">
    <?php include './Includes/Header.php'; ?>
		<section class="banner">
			<div class="content-banner">
				<img src="images/BANNER EXPERIENCE.jpg" alt="">
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

    <section class="container my-5">
        <h2 class="text-center mb-4">Reviews</h2>
        <?php foreach ($comments as $comment): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title"><?php echo htmlspecialchars($comment['name']); ?></h3>
                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($comment['email']); ?></p>
                <p class="card-text">
                    <strong>Rating:</strong> 
                    <?php echo str_repeat('<span class="text-warning">&#9733;</span>', $comment['stars']); ?>
                </p>
                <p class="card-text"><strong>Comment:</strong> <?php echo htmlspecialchars($comment['comment']); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
</section>

    <section class="container my-5">
        <h2 class="text-center mb-4" style="font-size: 1.5rem;">Leave Your Comment</h2>
        <div class="card">
            <div class="card-body">
                <form id="commentForm" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-size: 1.2rem;">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required style="font-size: 1.1rem;">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-size: 1.2rem;">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required style="font-size: 1.1rem;">
                    </div>
                    
                    <div class="mb-3">
                        <label for="stars" class="form-label" style="font-size: 1.2rem;">Rating:</label>
                        <div class="star-rating d-flex justify-content-end align-items-center">
                            <input type="radio" id="star5" name="stars" value="5" class="form-check-input">
                            <label for="star5" title="5 stars" class="form-check-label mx-1">&#9733;</label>
                            
                            <input type="radio" id="star4" name="stars" value="4" class="form-check-input">
                            <label for="star4" title="4 stars" class="form-check-label mx-1">&#9733;</label>
                            
                            <input type="radio" id="star3" name="stars" value="3" class="form-check-input">
                            <label for="star3" title="3 stars" class="form-check-label mx-1">&#9733;</label>
                            
                            <input type="radio" id="star2" name="stars" value="2" class="form-check-input">
                            <label for="star2" title="2 stars" class="form-check-label mx-1">&#9733;</label>

                            <input type="radio" id="star1" name="stars" value="1" class="form-check-input">
                            <label for="star1" title="1 star" class="form-check-label mx-1">&#9733;</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label" style="font-size: 1.2rem;">Comment:</label>
                        <textarea class="form-control" id="comment" name="comment" rows="4" required style="font-size: 1.1rem;"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-40" style="font-size: 1.2rem;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

			<section class="gallery">
				<img
					src="images/imag1 (1).jpg"
					alt="imag1"
					class="gallery-img-1"
				/><img
					src="images/imag2.jpg"
					alt="imag2"
					class="gallery-img-2"
				/><img
					src="images/imagen central.png"
					alt="imagen central"
					class="gallery-img-3"
				/><img
					src="images/imag3.jpg"
					alt="imag3"
					class="gallery-img-4"
				/><img
					src="images/imag4.jpg"
					alt="imag4"
					class="gallery-img-5"
				/>
			</section>

    <div id="complaintModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Please, tell us more about your experience.</h2>
            <form id="complaintForm" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" value="">
                <label for="email">Email:</label>
                <input type="text" name="email" value="">
                <label for="complaint" style="font-size: 12px">Your Experience:</label>
                <textarea class="form-control" id="complaint" name="complaint" required></textarea> <br>
                <div class="text-center">
                <button type="submit" class="btn btn-success" style="width: 60px; height: 30px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php include './Includes/Footer.php';?>
	</main>
		
<script src="./Assets/js/experience.js"></script>
		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
	</body>

</html>
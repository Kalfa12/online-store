<?php
session_start();
require_once 'db.php';

// Fetch products from the database
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Project</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<!-- Header Section -->
<header class="header">
    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Grocery </a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">features</a>
        <a href="#products">products</a>
        <a href="#categories">categories</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
    </nav>
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>
    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>
    <div class="shopping-cart"></div>
    <form action="login.php" method="POST" class="login-form">
        <h3>login now</h3>
        <input type="email" name="email" placeholder="your email" class="box" required>
        <input type="password" name="password" placeholder="your password" class="box" required>
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="register.php">create now</a></p>
        <input type="submit" value="login now" class="btn">
    </form>
</header>

<!-- Home Section -->
<section class="home" id="home">
    <div class="content">
        <h3>fresh and <span>organic</span> products for your</h3>
        <p>Organica is where early adopters and innovation seekers find lively, imaginative tech before it hits the mainstream.</p>
        <a href="#" class="btn">shop now</a>
    </div>
</section>

<!-- Features Section -->
<section class="features" id="features">
    <h1 class="heading"> our <span>features</span> </h1>
    <div class="box-container">
        <div class="box">
            <img src="image/feature-img-1.png" alt="">
            <h3>fresh and organic</h3>
            <p>Fresh vegetables and fruits in cheap price.</p>
            <a href="#" class="btn">read more</a>
        </div>
        <div class="box">
            <img src="image/feature-img-2.png" alt="">
            <h3>free delivery</h3>
            <p>We always do fast delivery on our customers.</p>
            <a href="#" class="btn">read more</a>
        </div>
        <div class="box">
            <img src="image/feature-img-3.png" alt="">
            <h3>easy payments</h3>
            <p>It is very easy to pay on our website, you can pay easily.</p>
            <a href="#" class="btn">read more</a>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products" id="products">
    <h1 class="heading"> our <span>products</span> </h1>
    <div class="swiper product-slider">
        <div class="swiper-wrapper">
            <?php foreach ($products as $product): ?>
                <div class="swiper-slide box">
                    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <div class="price"> $<?php echo $product['price']; ?>/- </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <a href="javascript:void(0);" class="btn" onclick="addToCart(<?php echo $product['id']; ?>)">add to cart</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories" id="categories">
    <h1 class="heading"> product <span>categories</span> </h1>
    <div class="box-container">
        <div class="box">
            <img src="image/cat-1.png" alt="">
            <h3>vegitables</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <img src="image/cat-2.png" alt="">
            <h3>fresh fruits</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <img src="image/cat-3.png" alt="">
            <h3>dairy products</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <img src="image/cat-4.png" alt="">
            <h3>fresh meat</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <img src="image/product-9.png" alt="">
            <h3>see food</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <img src="image/product-10.jpg" alt="">
            <h3>Fast Food</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>
    </div>
</section>

<!-- Review Section -->
<section class="review" id="review">
    <h1 class="heading"> customer's <span>review</span> </h1>
    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide box">
                <img src="image/pic-1.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>john</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="image/pic-2.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>Juliyana</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="image/pic-3.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>Jonathon</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            <div class="swiper-slide box">
                <img src="image/pic-4.png" alt="">
                <p>Very good website. All the stuff on this website is absolutely great. You all can buy your stuff from here.</p>
                <h3>Oliveya</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blogs Section -->
<section class="blogs" id="blogs">
    <h1 class="heading"> our <span>blogs</span> </h1>
    <div class="box-container">
        <div class="box">
            <img src="image/blog-1.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st oct, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Organica Is Where Early Adopters And Innovation Sockers Find Lively, Imaginative Tech Before It Hits The Mainstream.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>
        <div class="box">
            <img src="image/blog-2.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st oct, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Organica Is Where Early Adopters And Innovation Sockers Find Lively, Imaginative Tech Before It Hits The Mainstream.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>
        <div class="box">
            <img src="image/blog-3.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st oct, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Organica Is Where Early Adopters And Innovation Sockers Find Lively, Imaginative Tech Before It Hits The Mainstream.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3> Grocery <i class="fas fa-shopping-basket"></i> </h3>
            <p>Hello my name is Kaushalendra Kumar. I made this website for practice purpose only, I hope you all enjoy this project.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +91 8853455765 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +91 9140026484 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> kapilyadav001144@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Greater Noida, india - 201306 </a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> features </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> products </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> categories </a>
        </div>
        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <input type="email" placeholder="your email" class="email">
            <input type="submit" value="subscribe" class="btn">
            <img src="image/payment.png" class="payment-img" alt="">
        </div>
    </div>
    <div class="credit"> created by <span> Kaushlendra </span> | all rights reserved </div>
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
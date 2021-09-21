<div class="py-1 bg-primary">
  <div class="container">
    <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
      <div class="col-lg-12 d-block">
        <div class="row d-flex">
          <div class="col-md pr-4 d-flex topper align-items-center">
            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
            <span class="text">+91 9909201529</span>
          </div>
          <div class="col-md pr-4 d-flex topper align-items-center">
            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
            <span class="text">foodiva@gmail.com</span>
          </div>
          <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Foodiva</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link active">
            <span class="icon-shopping_cart"></span>
            <?php
            if (isset($_SESSION['uid'])) {
              $count = getcount();
              echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem; \" class=\"bg-warning\">$count</span>";
            } else {
              echo "<span style=\"text-align: center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius: 3rem;\" class=\"bg-warning\">0</span>";
            }
            ?>
          </a></li>
        <li>

          <?php
          if (!isset($_SESSION['uid'])) {
            echo '<li class="nav-item"><a href="index_login.php" class="nav-link">Log in</a></li>
           <li class="nav-item"><a href="index_signup.php" class="nav-link">Sign up</a></li>';
          } else {
            echo '<li class="nav-item"><a href="index.php?logout=1" class="nav-link">LOGOUT</a></li>
           <li class="nav-item"><a class="nav-link">' . $_SESSION['uname'] . '</a></li>
           <img  src="images/profile_photos/' . $_SESSION['uid'] . '.jpg" alt="profile image" onerror=this.src="images/profile_photos/default.jpg" style="margin-left:20px;width:50px;height:50px;border-radius:50%;">';
          }
          ?>
        </li>


      </ul>
    </div>
  </div>
</nav>
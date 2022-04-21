<?php
session_start();
?>
<?php
// login code 
$msg = "";
if (isset($_POST['login'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = $_POST['password'];
  if (empty($username)) {
    $msg = "<div class='alert alert-danger' role='alert'>
      الرجاء ادخال اسم المستخدم
     </div>";
  } elseif (empty($_POST['password'])) {
    $msg = "<div class='alert alert-danger' role='alert'>
    الرجاء ادخال كلمة المرور
   </div>";
  } else {
    include "conn.php";
    $sql = "select * from users where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $msg = "<div class='alert alert-danger' role='alert'>
        خطأ في اسم المستخدم و كلمة المرور
       </div>";
    } else {
      $user = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $user['id'];
      $_SESSION['user'] = $user['username'];
      header('Location:index.php');
    }
  }
}
?>
<?php
// register
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "insert into users (username,email,password) values ('$username','$email','$password')";
  include "conn.php";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $msg = '<div class="alert alert-success" role="alert">
      تمت عملية الاضافة بنجاح
    </div>';
  } else {
    $msg = '<div class="alert alert-danger" role="alert">
      لم تتم عملية الاضافة بنجاح
    </div>';
  }

  mysqli_close($conn);
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width , initial-scale = 1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <title>SPECIAL DESIGN</title>

  <link rel="stylesheet" href="style.css">

</head>

<body>

  <header>
    <h3 class="h3">SPECIAL <span>DESIGN</span></h3>
    <nav class="navigation">
      <a href="#home">Home</a>
      <a href="#about">about</a>
      <a href="#Service1">Shopping</a>
      <a href="#feature">Services</a>
      <a href="#reviews">Reviews</a>
      <?php if (isset($_SESSION['user'])) {
        echo '<a href="#">welcome:'.$_SESSION['user'].'</a>';
        
      } else {
        echo '<a href="#registration">register</a>';
      }
      ?>
      
      <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
    </nav>
  </header>
  <section id="home">
    <h4>BE-COOL-WITH-US</h4>
    <h2>GREAT OFFERS</h2>
    <h1>IN ALL PRODUCTS</h1>

    <div class="paragraph">
      <p>Our main goal is to help our customers put their own concept/ design on a wearable garment. You imagine and we Print! Whether Digital printing or vinyl cutting, you get to watch your T-shirt being made on the spot.</p>
    </div>
    <a href="#Service1"><button>BUY NOW</button></a>
  </section>
  <section id="about">
    <h1 class="heading"> <span>ABOUT US</span> </h1>

    <div class="content">
      <h1>WHY YOU SHOULD BUY FROM US?</h1>
      <p class="elparagraph">
        <span>Special Design</span> is the first Egyptian brand to provide easy access to printed customized t-shirts and the first to introduce direct to garment digital printing to the Egyptian market.
      </p>

      <h1>
        our store includes
      </h1>

      <div class="buttons">

        <a href="#Service1"><button>MEN</button></a>
        <a href="#Service2"><button>hodie</button></a>
        <a href="#Service3"><button>women</button></a>
      </div>
    </div>

  </section>
  <section id="Service1">

    <h1 class="heading">boys <span>T-SHIRTS</span> </h1>
    <h4 class="h4">SUMMER COLLECTION</h4>

    <div class="card-container">

      <div class="card">
        <img src="images/tshirt 1.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>
          <a href="#" target="_blank"><button>ADD TO CART</button></a>

        </div>
      </div>
      <div class="card">
        <img src="images/tshirt 5.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>
      <div class="card">
        <img src="images/8.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>
      <div class="card">
        <img src="images/tshirt 4.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>
      </div>
      <div class="card">
        <img src="images/9.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>

        </div>

      </div>

      <div class="card">
        <img src="images/10.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>

  </section>
  <section id="Service2">

    <h1 class="heading">hodie <span>collection</span> </h1>
    <h4 class="h4">winter COLLECTION</h4>

    <div class="card-container">

      <div class="card">
        <img src="images/h1.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>
          <a href="#" target="_blank"><button>ADD TO CART</button></a>

        </div>
      </div>
      <div class="card">
        <img src="images/h2.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>
      <div class="card">
        <img src="images/h3.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>
      <div class="card">
        <img src="images/h4.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>
      </div>
      <div class="card">
        <img src="images/h5.png" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>

        </div>

      </div>

      <div class="card">
        <img src="images/h6.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>

  </section>
  <section id="Service3">

    <h1 class="heading">girls <span>T-SHIRTS</span> </h1>
    <h4 class="h4">SUMMER COLLECTION</h4>

    <div class="card-container">

      <div class="card">
        <img src="images/k1.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>
          <a href="#" target="_blank"><button>ADD TO CART</button></a>

        </div>
      </div>
      <div class="card">
        <img src="images/k4.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>
      <div class="card">
        <img src="images/k3.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>
      <div class="card">
        <img src="images/k5.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>
      </div>
      <div class="card">
        <img src="images/k2.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>

        </div>

      </div>

      <div class="card">
        <img src="images/k6.jpg" alt="">
        <div class="content">
          <h2>$60 <span>$80</span></h2>

          <a href="#" target="_blank"><button>ADD TO CART</button></a>
        </div>

      </div>

  </section>
  <section id="feature">
    <h1 class="heading">NEW <span>SERVICES</span> </h1>
    <div class="card-container">
      <div class="fe-box">
        <img src="images/material.jpg" alt="">
        <h6 style="color: black;">CHOOSE THE MATERIAL</h6>
        <p>YOU CAN CHOOSE FROM <BR>
          COTTON , POLYSTER , HEATHER , PIMA/SUPIMA <br> TRI BLENDS , ORGANIC COTTON</p>
      </div>
      <div class="fe-box">
        <img src="images/design.jpg" alt="">
        <h6 style="color: black;">DESGIN YOUR T-SHIRT</h6>
        <p>YOU CAN DESIGN YOUR <br> T-SHIRT BY CHOOSING A LOGO AND CHOOSE THE MATERIAL OF THE T-SHIRT</p>
        <div class="buttons">
          <a href="design.html"><button>learn more</button></a>
        </div>
      </div>
    </div>
  </section>
  <section id="banner" class="section-p1">
    <h4>SUMMER OFFER</h4>
    <h2>UP TO <span>70% OFF</span> FOR ALL SUMMER'S T-SHIRTS</h2>
  </section>
  <section id="reviews" class="section-p1">

    <h1 class="heading"> OUR CLIENTS <span>REVIEWS</span> </h1>
    <div class="container">
      <div class="box">
        <div class="image">
          <img src="images/sara.png" alt="">
        </div>
        <div class="name_job">Kristina Bellis</div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p>"BEAUTIFUL AND AMAZING DESIGNS WILL BE FOUND ONLY IN SPECIAL DESIGNS STORE ,, I LOVE THEM"</p>

      </div>
      <div class="box">
        <div class="image">
          <img src="images/rev3.png" alt="">

        </div>
        <div class="name_job"> David Chrish</div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p>"THANK YOU SPECIAL DESIGNS STORE FOR THE BEAUTIFUL AND CHEERFUL T-SHIRTS ,, I LOVE YOU"</p>

      </div>
      <div class="box">
        <div class="image">
          <img src="images/rev2.jpg" alt="">

        </div>
        <div class="name_job">Stephen Marlo</div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p> THE BEST DESIGNS , BEST PRICES , BEST QUALITY EVER . THANK YOU SPECIAL DESIGNS STORE FOR THE T-SHIRTS</p>

      </div>
    </div>
  </section>

  <section id="registration">
    <div class="hero">
      <div class="form-box">
        <div class="button-box">
          <div id="btn"> </div>
          <button type="button" class="toggle-btn" onclick="login()"> LOG IN</button>
          <button type="button" class="toggle-btn" onclick="register()"> REGISTER</button>
        </div>
        <div class="social-icons">
          <img src="images/fb.png" alt="">
          <img src="images/tw.png" alt="">
          <img src="images/gp.png" alt="">
        </div>
        <form method="POST" id="login" class="input-group">
          <?php
          if (isset($msg)) {
            echo $msg;
          }
          ?>
          <input type="text" name="username" class="input-field" placeholder="User name" required>
          <input type="password" name="password" class="input-field" placeholder="Enter password" required>
          <input type="checkbox" class="chech-box"><span>Remember Password</span>
          <button type="submit" name="login" class="submit-btn">LOGIN</button>
        </form>
        <form method="POST" id="register" class="input-group">
          <input type="text" name="username" class="input-field" placeholder="User name" required>
          <input type="email" name="email" class="input-field" placeholder="enter email" required>
          <input type="password" name="password" class="input-field" placeholder="Enter password" required>
          <input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span>
          <button type="submit" name="submit" class="submit-btn">register</button>
        </form>
      </div>
    </div>
  </section>

  <section id="payment" class="section-p1">
    <div class="container">

      <form action="">

        <div class="row">

          <div class="col">

            <h3 class="title">billing address</h3>

            <div class="inputBox">
              <span>full name :</span>
              <input type="text" placeholder="john deo">
            </div>
            <div class="inputBox">
              <span>email :</span>
              <input type="email" placeholder="example@example.com">
            </div>
            <div class="inputBox">
              <span>address :</span>
              <input type="text" placeholder="room - street - locality">
            </div>
            <div class="inputBox">
              <span>city :</span>
              <input type="text" placeholder="mumbai">
            </div>

            <div class="flex">
              <div class="inputBox">
                <span>state :</span>
                <input type="text" placeholder="india">
              </div>
              <div class="inputBox">
                <span>zip code :</span>
                <input type="text" placeholder="123 456">
              </div>
            </div>

          </div>

          <div class="col">

            <h3 class="title">payment</h3>

            <div class="inputBox">
              <span>cards accepted :</span>
              <img src="images/card_img.png" alt="">
            </div>
            <div class="inputBox">
              <span>name on card :</span>
              <input type="text" placeholder="mr. john deo">
            </div>
            <div class="inputBox">
              <span>credit card number :</span>
              <input type="number" placeholder="1111-2222-3333-4444">
            </div>
            <div class="inputBox">
              <span>exp month :</span>
              <input type="text" placeholder="january">
            </div>

            <div class="flex">
              <div class="inputBox">
                <span>exp year :</span>
                <input type="number" placeholder="2022">
              </div>
              <div class="inputBox">
                <span>CVV :</span>
                <input type="text" placeholder="1234">
              </div>
            </div>

          </div>

        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn">

      </form>

    </div>

  </section>
  <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register() {
      x.style.left = "-400px";
      y.style.left = "50px"
      z.style.left = "110px"
    }

    function login() {
      x.style.left = "50px";
      y.style.left = "450px"
      z.style.left = "0"
    }
  </script>

</body>

</html>
<?php

session_start();

require_once ('CreateDb.php');
require_once ('component.php');


// create instance of Createdb class
$database = new CreateDb("prjweb3", "produit");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>
<html>
  <head>
    <title>alphasupplements</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--kevin-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel='stylesheet' href='./css1/stylel.css'>
    </head>
    <body>
        <!--mohamed-->
        
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="./photos/alphasupp.jpg"></a>
      </div>
      <ul style="display:inline-block" class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li class="nav-item"><a href="#">categories</a></li>
       <!--<li  class="nav-item"><a href="#">Card</a></li>-->
        <li  class="nav-item"><a href="contact.html">Contact</a></li>
        <li  class="nav-item"><a href="about.html">About</a></li>
        <li  class="nav-item"><a href="register.html"><i class="bi bi-person-circle"></i></a></li>
        <li  class="nav-item"><a href="logout.php">log out</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </nav>
  <!--shopping cart 2 -->
  <?php require_once ("header.php"); ?>
        <!--kevin-->
        <header>
            <h1>Online Store</h1>
            <button id="show-cart-btn">Show Cart</button>
          <div class="modal hide">
            <div class="modal-content">
              <span class="fa fa-xmark"></span>
              <h2>Shopping Cart</h2>
              <ul id="cart-list" class="cart-list"></ul>
              <div id="cart-total" class="cart-total"></div>
              <div class="cart-buttons">
                <button id="checkout" onclick="checkout()">Buy</button>
                <button id="close-cart-btn">Close</button>
              </div>
            </div>
          </div>
            </div>
          </header>
          <main>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/08/whey-fusion-1-scaled.jpg?resize=1536%2C480&ssl=1" alt="idk">
                  <div class="carousel-caption">
                   
                  </div>
                </div>
            
                <div class="item">
                  <img src="https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/08/METABOLIC-CREATINE-1-scaled.jpg?resize=1536%2C480&ssl=1" alt="idk">
                  <div class="carousel-caption">
                  
                  </div>
                </div>
            
                <div class="item">
                  <img src="https://i0.wp.com/superiorsupps.com/wp-content/uploads/2023/08/Combination-Render-Left-2.png?resize=1536%2C480&ssl=1"alt="idk">
                  <div class="carousel-caption">
                   
                  </div>
                </div>
              </div>
            
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div id="categories"></div>
            <div id="list" class="product-list"></div>
          </main>
          
          </div>
          <script src="projweb.js"></script>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                  component($row['nom'], $row['price'], $row['product_image'], $row['id']);
                }
            ?>
        <!--latest blog-->
        <div class="containers">
            <h2 class="title">
                latest blog
            </h2>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/spump.jpg">
            <div class="image__overlay ">
                <p class="image__description">
                    Seeking longer pumps:the role of arginase inhibitors in pre-workouts<br>
                </p>
            </div>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/orgsupp.jpg">
            <div class="image__overlay ">
                <p class="image__description">
                    The importance of organ support<br>
                </p>
            </div>
        </div>
        <div class="im-age">
            <img class="image__img" src="./photos/creatine1.jpg">
            <div class="image__overlay">
                <p class="image__description ">
                    The role of cratine in high-intensity intermittent activities<br>
                    </p>
            </div>
        </div>
        <!--<div class="im-age">
            <img class="image__img" src="./photos/recovery1.jpg">
            <div class="image__overlay">
                <p class="image__description">
                  Maximize your recovery following intense strength training<br></p>
            </div>
        </div>-->
        <!-- latest blog-->
      <!--<div class="containers">
        <h2 class="title">
            latest blog
        </h2>
    </div>
    <div id="card-area">
        <div class="wrapper">
            <div class="boxs-area">
                <div class="boxs">
                    <img src="prom019.jpg">
                    <div class="overlay">
                        <h3> The importance of organ support</h3>
                        <p> </p>
                        <a href="#">read more</a>

                    </div>
                </div>
                <div class="boxs">
                    <img src="prom019.jpg">
                    <div class="overlay">
                        <h3> Maximize your recovery following intense strength training</h3>
                        <p> </p>
                        <a href="#">read more</a>
                        </div>
                        </div>
                        <div class="boxs">
                            <img src="prom2019.jpg">
                            <div class="overlay">
                                <h3> Seeking longer pumps:the role of arginase inhibitors in pre-workouts</h3>
                                <p> </p>
                                <a href="#">read more</a>
                        </div>
                </div>

            </div>
        </div>
    </div>
-->

        <!--testimonial-->
        <section id='about-us'>
            <div class='container'>
                    <div class='col-12 text-center'>
                        <h2>Testimonials</h2>
                        <p class="title-p">HEAR WHAT OUR CLIENTS HAVE TO SAY ABOUT US.</p>
                    </div>
             <div class="row text-center mt-5">
                <div class="col-lg-4">
                    <div class="box my-5">
                    <img src="./photos/avatar1.jpg">
                    <h4 class="mb-4 mt-2">Jhon Medow</h4>
                    <h5>I have  recently placed an order with Alpha Supps for a Protein powder, and I was blown away by their first-rate customer support and product quality. My order arrived promptly, safely packaged.</h5>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="box my-5">
                    <img src="./photos/avatar2.jpg">
                    <h4 class="mb-4 mt-2">Mia piana</h4>
                    <h5> I've tried many supplement stores in the past, but none have compared to the level of service and quality that I've experienced with ALpha supps. Their knowledgeable staff guided me through selecting the right supplements for my goals, and I've seen incredible improvements in my energy levels and overall well-being. </h5>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="box my-5">
                    <img src="./photos/avatar4.jpg">
                    <h4 class="mb-4 mt-2">Maria Ruhl</h4>
                    <h5>  my experience with Alpha Supps has exceeded all of my expectations. I heartily endorse them to anyone looking for premium supplements and outstanding customer support. </h5>
                </div>
                </div>
              </div>
            </div>
        </section>
        <!--social media-->
        <div class="social"> Connect with us <br> Follow us on our social media platform</div>
          <table>
            <tr>
              <td width="25%">
              </td>
              <td>
            <div class="sicons"><a href="#" ><i class="bi bi-facebook"></i></a>
              <a href="#" ><i class="bi bi-instagram"></i></a>
              <a href="#" ><i class="bi bi-tiktok"></i></a>
              <a href="#" ><i class="bi bi-twitter-x"></i></a> 
              <a href="#" ><i class="bi bi-youtube"></i></i></a>
        </div>
              </td>
      </tr>
        </table>
        <!--external links-->
        <nav class=footer>
        <a href="#">Privacy policy</a>
        <a href="#"> Terms & Condition</a> 
        <a href="#">Delivery Policy</a>
        <a href="#">Refund & Cancelation</a>
        </nav>



    </body>
</html>
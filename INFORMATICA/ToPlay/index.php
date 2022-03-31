<?php session_start(); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>ToPlay | Home</title>
    
    <!-- Favicon  -->
    <a href="index.php">
    <link rel="icon" href="img/Logo.png">
    

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    
	<style>
    .carouselFix img
	{
		height: 512px;
		max-height: 512px;
		width: auto !important;
		max-width: auto !important;
        margin: auto;
	}
	
	.carouselFix .carousel-control-prev, .carouselFix .carousel-control-next
	{
		box-shadow: none;
		top: 50%;
        background-color: #000000
	}
	
	.carouselFix .carousel-caption
	{
		position: relative;
		top: 0;
		left: 0;
	}
    
	
    
    </style>
</head>

<body>


    
    <div id="wrapper">


        <!-- ****** Header Area Start ****** -->
        <header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#"><img src="img/Logo.png" width="120" height="120" alt=""></a>
                                </div>                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Esplora</a>
                                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                    <a class="dropdown-item" href="index.php">Home</a>
                                                    <a class="dropdown-item" href="shop.html">Articoli</a>
                                                    <a class="dropdown-item" href="cart.html">Carrello</a>
                                                    <a class="dropdown-item" href="checkout.html">Checkout</a>
                                                    <?php
                                                    	if($_SESSION["FUID"])
                                                        {
													?>
                                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                                    <a class="dropdown-item" href="">Ordini</a>
                                                    <a class="dropdown-item" href="">Wishlist</a>
                                                    <a class="dropdown-item" href="">Profilo</a>
                                                    <?php
                                                    	}
                                                    ?>
                                                </div>
                                            </li>                                          
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <form>
    							<button class="btn btn-primary"><a href="login.php" value >Login</a></button>
                            </form>
                            <div class="help-line">
                                <a href="tel:+396573556778"><i class="ti-headphone-alt"></i> +39 657 3556 778</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->

        <!-- ****** Top Discount Area Start ****** -->
       
        <!-- ****** Top Discount Area End ****** -->

        <!-- ****** Welcome Slides Area Start ****** -->
        

}
<div id="carouselExampleCaptions" class="carousel slide carouselFix" data-bs-ride="carousel">
  <div class="carousel-inner">
  
  <?php
 	include "../../config.php";
	$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
        	
	if ($conn->connect_error)
		die("Connessione fallita: " . $conn->connect_error);

  	$result = $conn->query("SELECT * FROM tp_articoli WHERE is_visible=1 AND is_vetrina=1 ORDER BY prezzo ASC LIMIT 5");
    
    $active = "active";
    while($row = $result->fetch_assoc())
    {
    	$img = "admin/upload/articoli/articoli_" . $row["pk"] . ".png";
        $nome = $row["nome"];
        $desc = $row["descrizione"];
		echo "
        <div class=\"carousel-item $active\">
      		<img src=\"$img\" class=\"d-block\" alt=\"$nome\">
      		<div class=\"carousel-caption d-none d-md-block\">
        		<h5>$nome</h5>
        		<p>$desc</p>
      		</div>
    	</div>";
        
        $active = "";
    }
  ?>

    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <!-- ****** Welcome Slides Area End ****** -->

  

        <!-- ****** New Arrivals Area Start ****** -->

        <section class="new_arrivals_area section_padding_100_0 clearfix">   
            <div class="container">
                <div class="row">
                    <div class="col-12">       
                        <div class="section_heading text-center">
                            <h2>Nuovi Prodotti</h2>
                            </div>
                        </div>
                    </div>
                </div>
            

            <div class="karl-projects-menu mb-100">
                <div class="text-center portfolio-menu">
                    <button class="btn active" data-filter="*">ALL</button>
                    <button class="btn" data-filter=".Felpe">Abbigliamento</button>
                    <button class="btn" data-filter=".Collezionabili">Collezionabili</button>
                    <button class="btn" data-filter=".Videogiochi">videogiochi</button>
                    <button class="btn" data-filter=".Cappelli">felpe/Cappelli</button>
      
                </div>
            </div>

            <div class="container">
            
                <div class="row karl-new-arrivals">
                	
				
                    <!-- Single gallery Item Start -->
                  <?php       
					
            include "../../config.php";
			$conn = new mysqli($CONFIG["db-host"], $CONFIG["db-user"], $CONFIG["db-pass"], $CONFIG["db-name"]);
        	
			if ($conn->connect_error)
				die("Connessione fallita: " . $conn->connect_error);

			$query = 
        			"
        			SELECT tp_articoli.pk as pk,
                    	tp_articoli.nome as nome,
                    	tp_articoli.codice as codice,
                    REPLACE(tp_articoli.prezzo, '.',',') as prezzo,
                    	tp_articoli.qta_mag as qta_mag,
                    	tp_articoli.descrizione as descrizione,
                        tp_articoli.is_vetrina as is_vetrina,
                    	tp_sottocategorie.nome as categoria 
                    FROM tp_articoli LEFT JOIN tp_sottocategorie ON tp_articoli.fk_sottocategorie = tp_sottocategorie.pk 
                    WHERE tp_articoli.fk_sottocategorie=tp_sottocategorie.pk 
                    AND tp_articoli.is_visible=1
                    AND tp_articoli.is_vetrina=1
        	";
        	
			$result = $conn->query($query);
    
			if(!$result)
				die("Query non valida: " . $conn->error);

        	while(($row = $result->fetch_assoc()))
        		{		
                	$pk = $row["pk"];
                    $img = "/INFORMATICA/ToPlay/admin/upload/articoli/articoli_$pk.png";
                
                  echo
                    '<div class="col-12 col-sm-5 col-md-3 single_gallery_item ' , $row["categoria"], ' wow fadeInUpBig" data-wow-delay="0.2s">',
                        //<!-- Product Image -->
                        '<div class="product-img">',
                           '<img src="',$img,'" width="100px">',
                            '<div class="product-quicview">',
                                '<a href="product-details.php?id_prodotto=', $row["pk"],'"<i class="ti-plus"></i></a>',
                            '</div>',
                        '</div>',
                        //<!-- Product Description -->
                        '<div class="product-description">',
                            '<h4 class="product-price">', $row["prezzo"],'</h4>',
                            '<p>', $row["nome"],'</p>',
                            //<!-- Add to Cart -->
                            '<a href="#" class="add-to-cart-btn">ADD TO CART</a>',
                        '</div>',
                    '</div>' 
            	;
            }
           ?>                    
           </div>
          </div>
        </section>
        
        <!-- ****** New Arrivals Area End ****** -->

        <!-- ****** Offer Area Start ****** -->
        <section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url(img/destiny_dlc.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-end justify-content-two">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                            <h2>Destiny 2 <span class="karl-level">PREZZO SPECIALE</span></h2>
                            <p>Prenota Ora</p>
                            <div class="offer-product-price">
                                <h3><span class="regular-price">$55.90</span> $45.90</h3>
                            </div>
                            <a href="#" class="btn karl-btn mt-30">Preordina Ora</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Offer Area End ****** -->

        <!-- ****** Popular Brands Area Start ****** -->
        <section class="karl-testimonials-area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>Vieni A Trovarci</h2>
                            <br><br>
                             <div id="content" text-align:center;>
                             
                             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2940.8971488007137!2d14.142643515738218!3d42.51499363329509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1331a4628cf3a1f3%3A0xa5b11c7753514ae6!2sIstituto%20di%20Istruzione%20Superiore%20%22Emilio%20Alessandrini%22!5e0!3m2!1sit!2sit!4v1645260195226!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
              </div>  
                           
          </div>
        </section>
        <!-- ****** Popular Brands Area End ****** -->

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single_footer_area">
                            <div class="footer-logo">
                                <img src="img/Logo.png" alt="">
                            </div>
                            <div class="copywrite_text d-flex align-items-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
			</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Faq</a></li>                                
                                <li><a href="#">Contatti</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="#">Account</a></li>
                                <li><a href="#">Spedizioni</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-lg-5">
                        <div class="single_footer_area">
                            <div class="footer_heading mb-30">
                                <h6>Iscriviti alla nostra newsletter</h6>
                            </div>
                            <div class="subscribtion_form">
                                <form action="#" method="post">
                                    <input type="email" name="mail" class="mail" placeholder="inserisci email">
                                    <button type="submit" class="submit">ISCRIVITI</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
	<!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
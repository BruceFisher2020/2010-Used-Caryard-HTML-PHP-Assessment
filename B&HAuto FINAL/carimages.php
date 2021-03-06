<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--================================================================-->
<!--	Filename:       CarImages.php                               -->
<!--	Description:	B&H Autos USED CARS LISTING                 -->
<!--	Author:		Bruce Fisher                                -->
<!--	Version:	4.0                                         -->
<!--                                                                -->
<!--    CALLED FROM:    php_functions.php -> Display_Car_Listings() -->
<!--                                                                -->
<!--    INPUTS:         CarIndex                                    -->
<!--                    Contains Car Index to use with folder       -->
<!--                    references                                  -->
<!--================================================================-->

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
        <!-- reference to stylesheet which contains css commands -->
        <link href="stylesheet.css" rel="stylesheet" type="text/css" />

        <!-- Search engine key words -->
        <meta name="keywords" content="B&amp;H Autos Maddington WA Used Cars" />

        <!-- Description that might be used to give brief to your website for search engines -->
        <meta name="description"
              content = "B&amp;H Autos Maddington Used Cars Address: 1846 Albany Highway, Maddington
                        Phone: (08) 9452 0980 Fax: (08) 9452 0982" />

        <!-- Description of the author - me -->
        <meta name="author" content="Bruce Fisher - Ionic Computer Services" />
    
    	<title>B&amp;H Autos - Car Images</title>

        <!-- GOOGLE ANALYTICS CODE -->
        <script type="text/javascript">
            var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-19390727-2']);    /* www.bhautos.com.au Web Property ID */
                _gaq.push(['_trackPageview']);

              (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();
        </script>

	</head>

	<body>
		
        <!-- WHOLE PAGE CONTAINER -->
    	<div id = "Page_Container">
    
            <!-- DISPLAY MAIN TITLE BAR -->
            <div id = "Main_Page_Title">

                <br />

                <!-- DISPLAY TITLE BAR B&H AUTOS LOGO and DEALER LICENSE # -->
                <img id = "Title_Image" src = "images/bhautosheader.gif" alt = "BH Autos Gif"/>
      	    	    
    		</div> <!-- END OF MAIN TITLE BAR -->			    
       	
                <!-- DISPLAY THE MENU BAR -->
                <div id = "left_menu">

                    <!-- MENU BAR LINKS -->
                    <div id = "menu_item">

                        <a href="index.html">Home Page</a>

                        <a href="used_car_listing.php">Used Car Listing</a>

                        <a href="finance.html">Finance Options</a>

                        <a href="warranty.html">Warranty Policy</a>

                        <a href="faq.html">FAQ Page</a>

                        <a href="contact.php">Contact Us</a>

                    </div> <!-- END OF MENU BAR LINKS -->

                    <br />

                <!-- CONTACT DETAILS -->
                <p class = "menu_bar_contact">
                    Phone
                </p> <!-- NEW LINE -->

                <p class = "menu_bar_contact">
                    (08) 9452 0980
                </p> <!-- NEW LINE -->

                <p class = "menu_bar_contact">
                    Fax
                </p> <!-- NEW LINE -->

                <p class = "menu_bar_contact">
                    (08) 9452 0982
                </p> <!-- NEW LINE -->

                <!-- END OF CONTACT DETAILS -->

                    <br />

                    <!-- COPYRIGHT FLASH -->
                    <p class = "nav_copyright">
                        <img src = "images/copyright2.gif" alt = "Copyright Gif"/>
                    </p>

                </div> <!-- END OF MENU BAR -->

                <br />

                <!--=========================-->
                <!-- USED CAR LISTING WINDOW -->
                <!--=========================-->
                <div id = "ListCarImages">

                    <?php require_once("includes/php_functions.php"); # PHP REQUIRED FUNCTIONS ?>

                    <?php $CarIndexFolder = $_GET['CarIndex']; # GET CarIndex sent from used_car_listing.php and it's function call from Display_Car_Listings() ?>

                    <?php Display_Car_Images($CarIndexFolder); # DISPLAY CAR PHOTO'S AND TITLE INFO ?>


                </div>
                <!--==================================================================================-->

                <!--==========================================================-->
                <!--================== SEARCH ENGINE =========================-->
                <!--==========================================================-->
                <div id ="SearchBox">

                    <form method="get" action="http://www.google.com.au/search" target="_blank">

                        <div class ="SearchBoxButtons">
                            <input type = "text" name = "q" size = "17" maxlength = "255" value = "" id ="SearchBoxInput"/>
                        </div>

                        <br />

                        <div class ="SearchBoxButtons">
                            <input type = "submit" value = "Google Search" class ="SearchBoxButton"/>
                            <input type="reset" value="X" class ="SearchBoxButton"/>

                            <br /><br />

                            <!--=============== PLACE B&H AUTO'S DOMAIN NAME HERE ===================-->
                            <input type = "checkbox"  name = "sitesearch" value = "www.bhautos.com.au" checked = "checked" /> only search B&amp;H Auto's
                        </div>

                    </form>

                </div>
                <!--==========================================================-->

                <br clear="all" /> <!-- START ON NEW LINE -->
  
                <br /><br />

                 <!-- FOOTER BAR -->
                <div id = "footer_bar">

                    <img id = "FooterImage" src = "images/addressbar2.gif" alt = "Address Bar Gif"/>

                    <!-- FOOTER BAR SMALL TEXT LINKS -->
                    <div class = "footer_small_text">

                        <!-- LEFT LINK -->
                        <div id = "left_footer_line">

                            <a href="privacy.html">Privacy Policy.</a>

                        </div> <!-- END OF LEFT LINK -->

                        <!-- RIGHT LINK -->
                        <div id = "right_footer_line">

                            Designed By <!-- <a href="#"> --> Ionic Computer Services. <!-- </a> -->

                        </div> <!-- END OF RIGHT LINK -->

                    </div> <!-- END OF FOOTER BAR SMALL TEXT LINKS-->

                    <br /><br />

                </div> <!-- END OF FOOTER BAR -->

                <!-- BOTTOM PAGE PADDING -->
                <br /><br /><br /><br /><br /><br /><br />
            
            </div> <!-- END OF PAGE CONTENTS -->
    
        </body>

</html>


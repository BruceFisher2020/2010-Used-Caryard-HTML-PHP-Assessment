<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    /**
     * An example feedback form.
     * @author Mike Cunneen - Modified only - due to time constraints by - Bruce Fisher
     * @package feedbackForm
     * @category utils
     * @copyright Copyright (c) 2010 Mike Cunneen
     * @license http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution License 3.0.
     *          You are free to use this as long as the conditions of the above license are met
     *          and this comment remains intact.
     */
    // Generic includes applicable to all php pages
    include_once 'includes/includes_inc.php';
    // Includes applicable only to this page.
    include_once 'feedback_functions.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">

    <!--==================================================-->
    <!--	Filename:   contact.html                  -->
    <!--	Description:B&H Autos CONTACT PAGE        -->
    <!--	Author:     Bruce Fisher                  -->
    <!--	Version:    3.0                           -->
    <!--==================================================-->

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- reference to stylesheet which contains css commands -->
        <link href="stylesheet.css" rel="stylesheet" type="text/css" />

        <!-- Search engine key words -->
        <meta name="keywords" content="B&amp;H Autos Maddington WA Used Cars" />

        <!-- Description that might be used to give brief to your website for search engines -->
        <meta name="description"
              content =	"B&amp;H Autos Maddington Used Cars Address: 1846 Albany Highway, Maddington
        		Phone: (08) 9452 0980 Fax: (08) 9452 0982" />

        <!-- Description of the author - me -->
        <meta name="author" content="Bruce Fisher - Ionic Computer Services" />

        <title>B&amp;H Autos - Contact Us</title>

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

            <!--=================-->
            <!-- CONTACT DETAILS -->
            <!--=================-->
            <div class = "main_text" id ="contact_page">

                <h2 class = "contact_details"> B&amp;H Auto's </h2>

                <h2 class = "contact_details"> Unit #1 1846 Albany Hwy, Maddington 6109 </h2>

                <h2 class = "contact_details"> PH: (08) 9452 0980 </h2>

                <h2 class = "contact_details"> FAX: (08) 9452 0982 </h2>

                <br />

            </div> <!-- END OF CONTACT DETAILS -->
            
            
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

            <div id ="contact_form">

                <h3> Email Feedback Form </h3>

                <div id ="form_error_msg">
                    <?php
                        if (formIsValid ())
                        {
                            handleFeedback();
                        }
                        else
                        {
                            // Default the HTML fieldnames to user-submitted values.
                            $firstname = trim($_POST['firstname']);
                            $lastname = trim($_POST['lastname']);
                            $email = trim($_POST['email']);
                            $feedback = trim($_POST['feedback']);

                            if (empty($feedback))
                            {
                                $feedback = $myapp_feedback_default_text;
                            }
                        }
                    ?>
                </div>
                
                <form action="contact.php" method="post">
                    <br/>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" value="<?php print $firstname; ?>" class ="EmailMsgBoxInput"/><br/>
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname"  value="<?php print $lastname; ?>" class ="EmailMsgBoxInput"/><br/>
                    <label for="email">Email Address:</label>
                    <input type="text" name="email" id="email"  value="<?php print $email; ?>" class ="EmailMsgBoxInput"/><br/><br/>
            
                    <label for="feedback"> Feedback: </label>
                  
                    <textarea id="feedback" name="feedback" rows="8" cols="50"><?php print $feedback; ?></textarea><br/><br/>

                    <div class ="EmailMsgBoxButtons">
                        <input type="submit" name="Submit" value="Send Email" class ="EmailMsgBoxButton"/>
                    </div>

                </form>
            </div>

            <br clear="all" /> <!-- START ON NEW LINE -->

            <br />

            <!-- FOOTER BAR -->
                <div id = "footer_bar">

                    <img id ="FooterImage" src = "images/addressbar2.gif" alt = "Address Bar Gif"/>

                        <!-- FOOTER BAR SMALL TEXT LINKS -->
                        <div class = "footer_small_text">

                            <!-- LEFT LINK -->
                            <div id = "left_footer_line">

                                <a href="privacy.html">Privacy Policy.</a>

                            </div> <!-- END OF LEFT LINK -->

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

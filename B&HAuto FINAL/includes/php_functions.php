<?php
    # PHP_FUNCTIONS include file
    # Author: Bruce Fisher
    # Version 3.2

    ############################################################
    ## FUNCTION: Read_File_Records_Into_Array()               ##
    ############################################################
    // Purpose: Reads $Filename records (if the parameter is  //
    //          passed also strips a given string from each   //
    //          record first) into 1D Array and returns the   //
    //          array. (TRIED TO MAKE IT RE-USABLE)           //
    //     	                                              //
    // Inputs:	$Filename                                     //
    //		Contains the name of the file to OPEN.        //
    //                                                        //
    //		$Strip_Record		                      //
    //          Contains 'string' to strip from $Filename     //
    //		records.                                      //
    //                                                        //
    // Returns:	$Record_Array[]                               //
    //          Contains record contents of $Filename         //
    //                                                        //
    // Displays: -- nothing --      	                      //
    //                                                        //
    // Author:  Bruce Fisher                                  //
    //                                                        //
    // Version: Final                                         //
    //                                                        //
    ////////////////////////////////////////////////////////////
    function Read_File_Records_Into_Array($Filename, $Strip_Record)
    {
        $Record_Array = array("");
        $file_pointer = fopen($Filename, "r") or exit("File ".$Filename." not found or not able to open!"); // OPEN file $Filename

        $record_index = 0;
        while (!feof($file_pointer))
        {
            $file_record = fgets($file_pointer); // READ next record from the file (first record if first instance of "fgets" being called)

            if (($Strip_Record != "") || ($Strip_Record != null))
            {
                $file_record = str_replace($Strip_Record, "", $file_record); // Remove any found seed $Srip_Record string from record
            }

            $Record_Array[$record_index] = $file_record;  // COPY the record into an array[]
            $record_index++;
        }

        fclose($file_pointer); // CLOSE file $Filename

        return $Record_Array; // RETURN Array of $Filename records
    }


    ############################################################
    ## FUNCTION: Display_Car_Listings()                       ##
    ############################################################
    // Purpose: Display Car*.jpg's listed in CarImages folder //
    //     	along with car details stored in cars.txt     //
    //     	                                              //
    // Inputs:	-- nothing --                                 //
    //                                                        //
    // Returns:	-- nothing --				      //
    //                                                        //
    // Displays: outputs HTML code of Cars listed, displayed  //
    //           as a table Listing Car Data                  //
    //                                                        //
    // Author:  Bruce Fisher                                  //
    //                                                        //
    ////////////////////////////////////////////////////////////
    function Display_Car_Listings()
    {
        $CarDetails = array("");
        $DetailHeader = array("Year/Make/Model: ", "Type: ", "Kms: ", "Price: ");
        $CarFilenameIndex = 1;
        $filefound = FALSE;

        #######################################################
        # DISPLAY CAR PICTURE with border and CAR INFORMATION #
        #######################################################
        
        $Fileopen_name = "carimages/cars.txt";
        $CarDetails = Read_File_Records_Into_Array($Fileopen_name, ""); // no "strip string" used with this call of the function (function created for ipad.php)

        if (($CarDetails != "") || ($CarDetails != NULL))
        {
            print '<table id = "CarList">';
            do
            {
                $CarImageFile = "carimages/car".$CarFilenameIndex.".jpg";
                if (file_exists($CarImageFile))
                {
                    $filefound = TRUE;

                    print '<tr class = "CarDetailRows">';

                        print '<td>';

                            # SET CarIndex to $CarFilenameIndex - FOR carimages.php TO _GET
                            print '<a href = "carimages.php?CarIndex='.$CarFilenameIndex.'"><img class = "MainCarPic" src = "'.$CarImageFile.'" alt = "BH Autos Used Car jpg"/></a>';

                        print '</td>';

                        $CarFilenameInfoIndex = $CarFilenameIndex - 1; # Set start position of where info of cars is listed from

                        print '<td class = "CarInfo">';

                            print '<span class = "DetailHeader">'.$DetailHeader[0].'</span>';
                            print '<span class = "Details">'.$CarDetails[($CarFilenameInfoIndex * 4)].'</span>'; # Jump to first details of Car
                            for ($CarDetailIndex = 1; $CarDetailIndex <= 3; $CarDetailIndex++)
                            {
                                print '<br /><br />';
                                print '<span class = "DetailHeader">'.$DetailHeader[$CarDetailIndex].'</span>';
                                print '<span class = "Details">'.$CarDetails[(($CarFilenameInfoIndex * 4) + $CarDetailIndex)].'</span>';
                            }

                        print '</td>';

                    print '</tr>';
                }
                else
                {
                    $filefound = FALSE;
                }

                $CarFilenameIndex++;

            } while ($filefound);

            print '</table>';
       }
    }

    
    ############################################################
    ## FUNCTION: Display_Car_Images()                         ##
    ############################################################
    // Purpose: Display Pic*.jpg's listed in CarImages/Car*   //
    //     	folder along with car details title stored in //
    //     	CarImages/cars.txt                            //
    //     	                                              //
    // Inputs:	$CarIndexFolder                               //
    //          Contains number to use for * folder number    //
    //          (see Purpose above)                           //
    //                                                        //
    // Returns:	-- nothing --				      //
    //                                                        //
    // Displays: outputs HTML code of Cars data listed in     //
    //           folder CarImages/Car*                        //
    //                                                        //
    // Author:  Bruce Fisher                                  //
    //                                                        //
    ////////////////////////////////////////////////////////////
    function Display_Car_Images($CarIndexFolder)
    {
        $CarDetails = array("");
        $CarFilenameIndex = 1;
        $filefound = FALSE;

        ##################################################
        # DISPLAY CAR PICTURE with border and CAR TITLE  #
        ##################################################
        
        $Fileopen_name = "carimages/cars.txt";
        $CarDetails = Read_File_Records_Into_Array($Fileopen_name, ""); // no "strip string" used with this call of the function

        $CarFilenameInfoIndex = (($CarIndexFolder - 1) * 4); # Set start position of where info of cars is listed from

        $TitleCarDetails = $CarDetails[$CarFilenameInfoIndex].'&nbsp;&nbsp;'.$CarDetails[$CarFilenameInfoIndex + 3]; # Add spacing between to title info

        print '<h2 id = "car_images_title_text">'.$TitleCarDetails.'</h2>';

        do
        {
            for ($display_across = 1; $display_across <= 2; $display_across++)
            {
                $CarImageFile = "carimages/car".$CarIndexFolder."/pic".$CarFilenameIndex.".jpg";
                if (file_exists($CarImageFile))
                {
                    $filefound = TRUE;

                    print '<img class = "LargeCarPic" src = "'.$CarImageFile.'" alt = "BH Autos Used Car jpg"/>';
                }
                else
                {
                    $filefound = FALSE;
                }

                $CarFilenameIndex++;
            }

            print '<br />';
        }
        while ($filefound);
    }



    ############################################################
    ############ FUTURE CMS TO BE PROGRAMMED ###################
    //##########################################################
    // NOT YET USED OR FINISHED CURRENTLY COPY OF
    // Display_Car_Listings()
    ############################################################
    ############################################################
    ## FUNCTION: CMS_Car_Listings()                           ##
    ############################################################
    // Purpose: CMS - allow user to ADD/DELETE/MODIFY         //
    //          anything they click on                        //
    //                                                        //
    // Inputs:	-- nothing --                                 //
    //                                                        //
    // Returns:	-- nothing --				      //
    //                                                        //
    // Displays: outputs HTML code of Cars listed, displayed  //
    //           as a table Listing Car Data allowing it to   //
    //           be then clicked on and edited or deleted.    //
    //           BUTTONS at the top/side allow user to        //
    //           ADD/DELETE/MODIFY anything they click on     //
    //                                                        //
    // Author:  Bruce Fisher                                  //
    //                                                        //
    ////////////////////////////////////////////////////////////
    function CMS_Car_Listings()
    {
        $CarDetails = array("");
        $DetailHeader = array("Year/Make/Model: ", "Type: ", "Kms: ", "Price: ");
        $CarFilenameIndex = 1;
        $filefound = FALSE;

        #######################################################
        # DISPLAY CAR PICTURE with border and CAR INFORMATION #
        #######################################################

        $Fileopen_name = "carimages/cars.txt";
        $CarDetails = Read_File_Records_Into_Array($Fileopen_name, ""); // no "strip string" used with this call of the function (function created for ipad.php)

        if (($CarDetails != "") || ($CarDetails != NULL))
        {
            print '<table id = "CarList">';
            do
            {
                $CarImageFile = "carimages/car".$CarFilenameIndex.".jpg";
                if (file_exists($CarImageFile))
                {
                    $filefound = TRUE;

                    print '<tr class = "CarDetailRows">';

                        print '<td>';

                            # SET CarIndex to $CarFilenameIndex - FOR CarImages.php TO _GET
                            print '<a href = "carimages.php?CarIndex='.$CarFilenameIndex.'"><img class = "MainCarPic" src = "'.$CarImageFile.'" alt = "BH Autos Used Car jpg"/></a>';

                        print '</td>';

                        $CarFilenameInfoIndex = $CarFilenameIndex - 1; # Set start position of where info of cars is listed from

                        print '<td class = "CarInfo">';

                            print '<span class = "DetailHeader">'.$DetailHeader[0].'</span>';
                            print '<span class = "Details">'.$CarDetails[($CarFilenameInfoIndex * 4)].'</span>'; # Jump to first details of Car
                            for ($CarDetailIndex = 1; $CarDetailIndex <= 3; $CarDetailIndex++)
                            {
                                print '<br /><br />';
                                print '<span class = "DetailHeader">'.$DetailHeader[$CarDetailIndex].'</span>';
                                print '<span class = "Details">'.$CarDetails[(($CarFilenameInfoIndex * 4) + $CarDetailIndex)].'</span>';
                            }

                        print '</td>';

                    print '</tr>';
                }
                else
                {
                    $filefound = FALSE;
                }

                $CarFilenameIndex++;

            } while ($filefound);

            print '</table>';
       }
    }

?>
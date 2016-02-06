<?php


    require_once('./lib/PHPTAL-1.3.0/PHPTAL.php');

    // render the whole page using PHPTAL

    // finally, create a new template object
    $template = new PHPTAL('cart.php');
    $template->setOutputMode(PHPTAL::HTML5);
    // now add the variables for processing and that you created from above:
    $template->page_title = "Fresh 'n Healthy: Online Farmers' Market";


    // execute the template
    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }


?>

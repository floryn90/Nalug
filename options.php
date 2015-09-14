<?php


// Function to handle upload logo file
function handle_logo_upload()
{
  if(isset($_POST['remove-logo'])){
    delete_option('logo');
  }elseif(!empty($_FILES["logo"]["tmp_name"]))
    {
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => false));
        $temp = $urls["url"];
        return $temp;
    }

}


// Function to handle upload logo file
function handle_about_image_upload()
{
  if(isset($_POST['remove-about-image'])){
    delete_option('about-image');
  }elseif(!empty($_FILES["about-image"]["tmp_name"]))
    {
        $urls = wp_handle_upload($_FILES["about-image"], array('test_form' => false));
        $temp = $urls["url"];
        return $temp;
    }

}

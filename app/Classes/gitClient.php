<?php

namespace App\Classes;

class gitClient
{

    private  $_base_url ;


  public function __construct()
  {
    $this->_base_url = "https://api.github.com/repos/torvalds/linux/commits";
  }

  protected function getUrl()
  {
    return $this->_base_url;
  }

//Curl function to inititalte the connection
public function execQuery()
{

      $url = $this->getURL();
        // create curl resource 
        $ch = curl_init(); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt( $ch, CURLOPT_USERAGENT, "MyUserAgent" );

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url);

        // $output contains the output string 
        $result = curl_exec($ch); 

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

        // Check if any error occurred
        if(curl_errno($ch))
        {
            echo 'Curl error: ' . curl_error($ch);
        }
       // close curl resource to free up system resources 
        curl_close($ch);  

        return $result;
}


}
?>
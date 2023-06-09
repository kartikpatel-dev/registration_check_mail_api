<?php
/*
** Template Name: Register Page
*/
get_header();
global $wpdb, $user_ID;  
if (!$user_ID) {  
   //All code goes in here.  
}  
else {  
   wp_redirect( home_url() ); exit;  
}




if (isset($_POST['user_registeration']))
{
    //registration_validation($_POST['username'], $_POST['useremail']);
    global $reg_errors;
    $reg_errors = new WP_Error;
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $password=$_POST['password'];
    
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => "https://mailcheck.p.rapidapi.com/?domain=$useremail",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: mailcheck.p.rapidapi.com",
            "X-RapidAPI-Key: c6641e8e30msh750cdb7919ea5f9p133d5bjsn718d5cd942db"
         ],
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
  

      curl_close($curl);
      $arr = json_decode($response);
      $api_result = $arr->block;
      if ($err) {
         echo "cURL Error #:" . $err;
         print_r($err);
      } else {
        // $arr = json_decode($response);
         //echo $arr->block;
       //  print_r($arr);
         //print_r($arr);
      }
    if(empty($api_result) || !is_email( $useremail ) ){
      $reg_errors->add('email', 'This is not valid email. Please Enter valid email id');
    }
    if(empty( $username ) || empty( $useremail ) || empty($password))
    {
        $reg_errors->add('field', 'Required form field is missing');
    }    
    if ( 6 > strlen( $username ) )
    {
        $reg_errors->add('username_length', 'Username too short. At least 6 characters is required' );
    }
    if ( username_exists( $username ) )
    {
        $reg_errors->add('user_name', 'The username you entered already exists!');
    }
    if ( ! validate_username( $username ) )
    {
        $reg_errors->add( 'username_invalid', 'The username you entered is not valid!' );
    }
   /* if ( !is_email( $useremail ) )
    {
        $reg_errors->add( 'email_invalid', 'Email id is not valid!' );
    }*/
    
    if ( email_exists( $useremail ) )
    {
        $reg_errors->add( 'email', 'Email Already exist!' );
    }
    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 5!' );
    }
    
    if (is_wp_error( $reg_errors ))
    { 
        foreach ( $reg_errors->get_error_messages() as $error )
        {
             $signUpError='<p style="color:#FF0000; text-aling:left;"><strong>ERROR</strong>: '.$error . '<br /></p>';
        } 
    }
    
    
    if ( 1 > count( $reg_errors->get_error_messages() ) )
    {
        // sanitize user form input
        global $username, $useremail;
        $username   =   sanitize_user( $_POST['username'] );
        $useremail  =   sanitize_email( $_POST['useremail'] );
        $password   =   esc_attr( $_POST['password'] );
        
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $useremail,
            'user_pass'     =>   $password,
            );
        $user = wp_insert_user( $userdata );
    }

}
?>
  <h3>Create your account</h3>
    <form action="" method="post" name="user_registeration">
        <label>Username <span class="error">*</span></label>  
        <input type="text" name="username" placeholder="Enter Your Username" class="text" required /><br />
        <label>Email address <span class="error">*</span></label>
        <input type="text" name="useremail" class="text" placeholder="Enter Your Email" required /> <br />
        <label>Password <span class="error">*</span></label>
        <input type="password" name="password" class="text" placeholder="Enter Your password" required /> <br />
        <input type="submit" name="user_registeration" value="SignUp" />
    </form>
    <?php if(isset($signUpError)){echo '<div>'.$signUpError.'</div>';}?>
<?php
get_footer();
?>
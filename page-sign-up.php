<?php

get_header()
?>



 <?php
 $error= '';
 $success = '';

 global $wpdb, $PasswordHash, $current_user, $user_ID;

 if(isset($_POST['task']) && $_POST['task'] == 'register' ) {


 $password1 = $wpdb->escape(trim($_POST['password1']));
 $password2 = $wpdb->escape(trim($_POST['password2']));
 $first_name = $wpdb->escape(trim($_POST['first_name']));
 $last_name = $wpdb->escape(trim($_POST['last_name']));
 $email = $wpdb->escape(trim($_POST['email']));
 $username = $wpdb->escape(trim($_POST['username']));

 if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
 $error= 'Please don\'t leave the required fields.';
 } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error= 'Invalid email address.';
 } else if(email_exists($email) ) {
 $error= 'Email already exist.';
 } else if($password1 <> $password2 ){
 $error= 'Password do not match.';
} else if(strpos($username, ' ' !== false)){
  $error= 'Username Has Space.';
} else if(username_exists($username)){
    $error= 'UserName Araldy Exists.';
} else {

 $user_id =
 wp_insert_user(
   array (
     'first_name' => apply_filters('pre_user_first_name', $first_name),
      'last_name' => apply_filters('pre_user_last_name', $last_name),
       'user_pass' => apply_filters('pre_user_user_pass', $password1),
        'user_login' => apply_filters('pre_user_user_login', $username),
         'user_email' => apply_filters('pre_user_user_email', $email),
          'role' => 'subscriber'
   )
);
 if( is_wp_error($user_id) ) {
 $error= 'Error on user creation.';
 } else {
   do_action('user_register', $user_id);

   
   $from = get_option('admin_email'); 
    $headers = 'From: '.$from . "\r\n"; 
    $subject = "Registration successful"; 
    $message = "Registration successful.\nYour login details\nUsername: $username\nPassword: $password1\nclick '". site_url().'/login' ."' to login";
    
    wp_mail( $email, $subject, $message, $headers ); 
    $success = "Please check your email for login details.";
    

   }

 }

 }
 ?>

        <!--display error/success message-->
       <div id="message">
         <?php
         if(! empty($err) ) :
         echo '<p class="error">'.$err.'</p>';
         endif;
         ?>

         <?php
         if(! empty($success) ) :
         echo $success;
         endif;
       ?>
       </div>

<main id="form-wrapper">

      <div class="row align-items-center justify-content-center">
        <div class="col-lg-7">
          <div class="form-img">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288.14 280.82"><defs><style>.cls-1{fill:#f5f5f5;}.cls-2{fill:#ebebeb;}.cls-3,.cls-9{fill:#27debf;}.cls-12,.cls-4{opacity:0.2;}.cls-10,.cls-12,.cls-5,.cls-8{fill:#fff;}.cls-6{fill:#e0e0e0;}.cls-7{fill:#f0f0f0;}.cls-8,.cls-9{stroke:#27debf;stroke-miterlimit:10;}.cls-10{opacity:0.7;}.cls-11{opacity:0.1;}.cls-13{fill:#ffa8a7;}.cls-14{fill:#37474f;}.cls-15{fill:#f28f8f;}.cls-16{opacity:0.3;}</style></defs><title>login</title><g     id="Floor"><path id="_Path_" data-name="&lt;Path&gt;" class="cls-1" d="M168.2,360.48c51.8,24.69,135.79,24.69,187.59,0s51.8-64.72,0-89.41-135.79-24.69-187.59,0S116.4,335.79,168.2,360.48Z" transform="translate(-113.86 -98.18)"/></g><g id="Shadow"><path id="_Path_2" data-name="&lt;Path&gt;" class="cls-2" d="M358.28,361.77c9,4.28,23.52,4.28,32.5,0s9-11.21,0-15.49-23.52-4.28-32.5,0S349.31,357.49,358.28,361.77Z" transform="translate(-113.86 -98.18)"/></g><g id="Plants"><g id="_Group_" data-name="&lt;Group&gt;"><g id="_Group_2" data-name="&lt;Group&gt;"><path id="_Path_3" data-name="&lt;Path&gt;" class="cls-3" d="M170,327.59l8.12-4.69a32.58,32.58,0,0,0,10-14.07c2.51-6.92,2.17-12.18.36-14.82-2.22-3.25-7.95-2.68-8.17,4.17C179.84,311.65,175.91,321,170,327.59Z" transform="translate(-113.86 -98.18)"/><path id="_Path_4" data-name="&lt;Path&gt;" class="cls-4" d="M170,327.59l8.12-4.69a32.58,32.58,0,0,0,10-14.07c2.51-6.92,2.17-12.18.36-14.82-2.22-3.25-7.95-2.68-8.17,4.17C179.84,311.65,175.91,321,170,327.59Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M170,328.09a.5.5,0,0,1-.29-.91c18.8-13,15.16-31.13,15.12-31.31a.5.5,0,0,1,1-.21c0,.19,3.84,18.94-15.52,32.34A.49.49,0,0,1,170,328.09Z" transform="translate(-113.86 -98.18)"/></g><g id="_Group_3" data-name="&lt;Group&gt;"><path id="_Path_5" data-name="&lt;Path&gt;" class="cls-3" d="M153.71,337s-2.83-2.3-2.14-5.42,2.51-5.36-.63-9.38-3.95-9.38-.26-12.29c2.85-2.25,7.3.94,8.91-5,1.17-4.34.77-13.95,6.31-17.15s9,1.62,8.12,8.13c-.76,5.83-1.83,11.45-1,13,1.62,3,4.39,2.59,4.26,8.07-.12,5.1-4.94,9.32-4.94,9.32Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M163,332.11a.5.5,0,0,1-.5-.44c-1.43-11.85,2-32.31,4.8-38.39a.5.5,0,0,1,.91.42c-2.77,6-6.08,26.52-4.71,37.85a.5.5,0,0,1-.44.56Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M162.73,322.88a.5.5,0,0,1-.22-.05c-3.47-1.7-5.67-7.72-5.76-8a.5.5,0,1,1,.94-.34c0,.06,2.15,5.9,5.26,7.42a.5.5,0,0,1-.22.95Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M162.67,326.88a.5.5,0,0,1-.19-1c5.84-2.34,9.48-9.3,9.52-9.37a.5.5,0,0,1,.89.46c-.15.3-3.85,7.36-10,9.84A.5.5,0,0,1,162.67,326.88Z" transform="translate(-113.86 -98.18)"/></g></g><g id="_Group_4" data-name="&lt;Group&gt;"><path id="_Path_6" data-name="&lt;Path&gt;" class="cls-3" d="M335.8,206s-4.37-7.07-4.79-14.77,1.27-10.89,3.59-11.81,2.49,1.91,3.69,3.58,3.62.72,4.51-4.49,4.18-14,11-15.71c7.5-1.86,3.48,6.94,1.59,10.37s-3.35,8.11-2.11,9.38,3.17-1.08,5,1.1c2.23,2.63-4.7,12.09-8.68,14.39Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M341.79,203h0a.5.5,0,0,1-.47-.53,72,72,0,0,1,11.2-34.8.5.5,0,1,1,.81.58,71,71,0,0,0-11,34.27A.5.5,0,0,1,341.79,203Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M342.36,197.1a.51.51,0,0,1-.24-.06c-2.8-1.55-4.35-6.15-4.42-6.34a.5.5,0,0,1,.95-.31s1.49,4.42,4,5.78a.5.5,0,0,1-.24.94Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M342.85,194.07a.5.5,0,0,1-.12-1c7.22-1.83,9.72-5.61,9.74-5.65a.5.5,0,0,1,.84.54c-.11.17-2.7,4.15-10.34,6.08Z" transform="translate(-113.86 -98.18)"/></g><path id="_Path_7" data-name="&lt;Path&gt;" class="cls-3" d="M241,272.54s-9.59-2.34-10.09-20.29c-.54-19.38,2.35-42-9-43.83s-17.66,12-17.51,28.14c.13,14.15,5.83,44.85,36.56,50.87Z" transform="translate(-113.86 -98.18)"/><path id="_Path_8" data-name="&lt;Path&gt;" class="cls-4" d="M241,272.54s-9.59-2.34-10.09-20.29c-.54-19.38,2.35-42-9-43.83s-17.66,12-17.51,28.14c.13,14.15,5.83,44.85,36.56,50.87Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M241,285.58h-.09a25.07,25.07,0,0,1-16.73-11.31c-12.42-18.53-8.51-53.13-7.22-59.17a.5.5,0,1,1,1,.21c-1.27,6-5.15,40.16,7.08,58.41a24.1,24.1,0,0,0,16.08,10.88.5.5,0,0,1-.09,1Z" transform="translate(-113.86 -98.18)"/><g id="_Group_5" data-name="&lt;Group&gt;"><path id="_Path_9" data-name="&lt;Path&gt;" class="cls-3" d="M241,331.67c-9.91,1.34-26,1.32-35.29-6s-7.35-13.62-3.78-16.25,6.67-5.64.53-11.47-16-15.22-19.2-29.29-1.62-22.87,4.66-25.8c6.09-2.84,7.7,1.67,11.43,11s12.12,1.33,19.3,4.24,6.89,8.67,7.35,13.62,2.82,6.32,6.88,6.32,8.12,2.34,8.12,7Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M241,315.33l-.13,0c-.43-.12-10.68-3.1-25.61-16.81-15.9-14.6-23.4-36.5-23.48-36.72a.5.5,0,0,1,.95-.32c.07.22,7.5,21.88,23.21,36.3,14.72,13.53,25.1,16.56,25.2,16.59a.5.5,0,0,1-.14,1Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M219.43,302a.5.5,0,0,1-.47-.32c-3.21-8.25-3.94-25.88-4-26.62a.5.5,0,0,1,.48-.52.52.52,0,0,1,.52.48c0,.18.75,18.21,3.9,26.3a.5.5,0,0,1-.28.65A.49.49,0,0,1,219.43,302Z" transform="translate(-113.86 -98.18)"/><path class="cls-5" d="M219.35,313.85a25,25,0,0,1-2.76-.14.5.5,0,0,1-.44-.56.49.49,0,0,1,.56-.44c.09,0,9.4,1.06,13.67-3.3a.5.5,0,1,1,.71.7C228,313.31,222.61,313.85,219.35,313.85Z" transform="translate(-113.86 -98.18)"/></g></g><g id="Gear"><g id="_Group_6" data-name="&lt;Group&gt;"><g id="_Group_7" data-name="&lt;Group&gt;"><path id="_Compound_Path_" data-name="&lt;Compound Path&gt;" class="cls-6" d="M182.5,158.7l-.91-5.29-4.72,3.11a6.51,6.51,0,0,0-1.79-2.18l2.26-6.11-4.2-.94L170,153.21a11.32,11.32,0,0,0-3.24,1.05l-1.34-4.46-5,4,.33,5.26A28.13,28.13,0,0,0,158,162.7l-4.16-.21L150.88,169l3.57,1.52a21.33,21.33,0,0,0-.71,4.14l-4.54,4.17.91,5.29,4.72-3.11a6.5,6.5,0,0,0,1.79,2.18l-2.26,6.11,4.2.94L163,186c1-.16.78-2.09,1.9-2.64l1.34,4.46,5-4-.13-2.07c1-1.13,4.87-3.64,5.7-4.94l1-1.72,2.92-6.54-1.36-2.46L178,162.88Zm-15.38,17.43c-3.86,3-5,3.7-5.74-.36s1.56-10.24,5.42-13.28,5.35-3.26,6,.79S171,173.1,167.12,176.14Z" transform="translate(-113.86 -98.18)"/><polygon id="_Path_10" data-name="&lt;Path&gt;" class="cls-1" points="59.27 49.11 64.77 52.29 61.66 58.2 56.16 55.03 59.27 49.11"/><polygon id="_Path_11" data-name="&lt;Path&gt;" class="cls-1" points="73.22 58.41 68.51 61.51 63.01 58.34 67.72 55.23 73.22 58.41"/><polygon id="_Path_12" data-name="&lt;Path&gt;" class="cls-6" points="72.47 73.53 68.89 72.01 63.39 68.84 66.97 70.36 72.47 73.53"/><polygon id="_Path_13" data-name="&lt;Path&gt;" class="cls-6" points="40.51 91.16 46.01 94.33 48.27 88.23 42.77 85.05 40.51 91.16"/><polygon id="_Path_14" data-name="&lt;Path&gt;" class="cls-6" points="57.9 92.76 52.4 89.59 51.06 85.13 56.56 88.3 57.9 92.76"/><path id="_Compound_Path_2" data-name="&lt;Compound Path&gt;" class="cls-2" d="M188,161.88l-.91-5.29-4.72,3.11a6.51,6.51,0,0,0-1.79-2.18l2.26-6.11-4.2-.94-3.11,5.92a11.32,11.32,0,0,0-3.24,1.05L170.94,153l-5,4,.33,5.26a28.16,28.16,0,0,0-2.78,3.68l-4.16-.21-2.92,6.54,3.57,1.52a21.33,21.33,0,0,0-.71,4.14L154.71,182l.91,5.29,4.72-3.11a6.51,6.51,0,0,0,1.79,2.18l-2.26,6.11,4.2.94,3.11-5.92a11.31,11.31,0,0,0,3.24-1.05l1.34,4.46,5-4-.33-5.26a28.11,28.11,0,0,0,2.78-3.68l4.16.21,2.92-6.54-3.57-1.52a21.27,21.27,0,0,0,.71-4.14Zm-15.38,17.43c-3.86,3-7.56,2.21-8.26-1.85s1.87-9.81,5.73-12.84,7.56-2.21,8.26,1.85S176.48,176.27,172.62,179.31Z" transform="translate(-113.86 -98.18)"/><polygon id="_Path_15" data-name="&lt;Path&gt;" class="cls-1" points="57.08 54.8 51.58 51.63 46.54 55.58 52.04 58.76 57.08 54.8"/><polygon id="_Path_16" data-name="&lt;Path&gt;" class="cls-6" points="46.54 55.58 46.87 60.84 52.37 64.01 52.04 58.76 46.54 55.58"/><polygon id="_Path_17" data-name="&lt;Path&gt;" class="cls-1" points="49.59 67.69 44.09 64.52 39.93 64.31 45.43 67.49 49.59 67.69"/><polygon id="_Path_18" data-name="&lt;Path&gt;" class="cls-6" points="39.93 64.31 37.01 70.85 42.51 74.03 45.43 67.49 39.93 64.31"/><polygon id="_Path_19" data-name="&lt;Path&gt;" class="cls-1" points="45.38 79.69 39.88 76.52 35.34 80.69 40.84 83.86 45.38 79.69"/><polygon id="_Path_20" data-name="&lt;Path&gt;" class="cls-6" points="41.76 89.15 36.26 85.98 35.34 80.69 40.84 83.86 41.76 89.15"/><polygon id="_Path_21" data-name="&lt;Path&gt;" class="cls-1" points="64.77 52.29 59.27 49.11 63.47 50.05 68.97 53.23 64.77 52.29"/></g><g id="_Group_8" data-name="&lt;Group&gt;"><path id="_Compound_Path_3" data-name="&lt;Compound Path&gt;" class="cls-6" d="M157.85,134.72v-7.9l-6.29,2.83a11.17,11.17,0,0,0-1.7-3.74l4-8L149,115.13l-4.94,7.42a11.18,11.18,0,0,0-4.09.4l-.69-6.86L132.44,120l-.69,7.66a33.79,33.79,0,0,0-4.09,4.32l-4.94-1.72-4.84,8.38,4,3.41a33.81,33.81,0,0,0-1.7,5.7l-6.29,4.42v7.9l6.29-2.83a11.18,11.18,0,0,0,1.7,3.74l-4,8,4.84,2.79,4.94-7.42a11.18,11.18,0,0,0,4.09-.4l.69,6.86,6.84-3.95.69-7.66a12.82,12.82,0,0,0,5.48-3.84l3.54,1.25,4.84-8.38-3-2.56a17.68,17.68,0,0,0,.71-6.56Zm-22,19.72c-5.25,3-8.51.88-8.51-5.18s4.34-13.48,9.59-16.51,8.43-.83,8.43,5.23S141.11,151.41,135.86,154.44Z" transform="translate(-113.86 -98.18)"/><polygon id="_Path_22" data-name="&lt;Path&gt;" class="cls-1" points="40.63 20.12 35.13 16.95 30.19 24.38 35.69 27.55 40.63 20.12"/><polygon id="_Path_23" data-name="&lt;Path&gt;" class="cls-1" points="49.49 31.81 43.99 28.64 37.7 31.47 43.2 34.64 49.49 31.81"/><polygon id="_Path_24" data-name="&lt;Path&gt;" class="cls-6" points="24.07 75.83 18.57 72.66 17.89 65.8 23.39 68.97 24.07 75.83"/><polygon id="_Path_25" data-name="&lt;Path&gt;" class="cls-6" points="4.02 70.83 9.52 74 13.48 66.01 7.98 62.84 4.02 70.83"/><path id="_Compound_Path_4" data-name="&lt;Compound Path&gt;" class="cls-2" d="M163.36,137.89V130l-6.29,2.83a11.18,11.18,0,0,0-1.7-3.74l4-8-4.84-2.79-4.94,7.42a11.18,11.18,0,0,0-4.09.4l-.69-6.86-6.84,3.95-.69,7.66a33.79,33.79,0,0,0-4.09,4.32l-4.94-1.72-4.84,8.38,4,3.41a33.79,33.79,0,0,0-1.7,5.7l-6.29,4.42v7.9l6.29-2.83a11.19,11.19,0,0,0,1.7,3.74l-4,8,4.84,2.79,4.94-7.42a11.19,11.19,0,0,0,4.09-.4l.69,6.86,6.84-3.95.69-7.66a33.75,33.75,0,0,0,4.09-4.32l4.94,1.72,4.84-8.38-4-3.41a33.8,33.8,0,0,0,1.7-5.7Zm-22,19.72c-5.25,3-9.5.57-9.5-5.49s4.25-13.43,9.5-16.46,9.5-.57,9.5,5.49S146.61,154.58,141.36,157.61Z" transform="translate(-113.86 -98.18)"/><polygon id="_Path_26" data-name="&lt;Path&gt;" class="cls-7" points="13.8 33.84 19.3 37.01 14.36 35.29 8.86 32.12 13.8 33.84"/><rect id="_Path_27" data-name="&lt;Path&gt;" class="cls-1" x="118.22" y="132.9" width="9.67" height="6.35" transform="translate(-170.16 76.5) rotate(-60.02)"/><polygon id="_Path_28" data-name="&lt;Path&gt;" class="cls-6" points="4.02 40.49 9.52 43.67 13.48 47.08 7.98 43.91 4.02 40.49"/><polygon id="_Path_29" data-name="&lt;Path&gt;" class="cls-1" points="6.29 49.61 11.79 52.78 5.5 57.21 0 54.03 6.29 49.61"/><polygon id="_Path_30" data-name="&lt;Path&gt;" class="cls-6" points="0 54.03 5.5 57.21 5.5 65.11 0 61.93 0 54.03"/><polygon id="_Path_31" data-name="&lt;Path&gt;" class="cls-1" points="30.92 21.09 25.41 17.91 18.57 21.86 24.07 25.04 30.92 21.09"/></g></g></g><g id="Device"><path id="_Path_32" data-name="&lt;Path&gt;" class="cls-5" d="M230.87,171.93,311,125.68c1.44-.83,2.6-.16,2.6,1.5V276a5.74,5.74,0,0,1-2.6,4.5l-80.11,46.25c-1.43.83-2.6.16-2.6-1.5V176.43A5.74,5.74,0,0,1,230.87,171.93Z" transform="translate(-113.86 -98.18)"/><g id="_Group_9" data-name="&lt;Group&gt;"><path id="_Path_33" data-name="&lt;Path&gt;" class="cls-8" d="M325.82,129.89c0-1.66-1.16-2.33-2.6-1.5l-9.59,5.54-70.52,40.71a5.74,5.74,0,0,0-2.6,4.5V327.92c0,1.66,1.16,2.33,2.6,1.5l70.54-40.73,9.56-5.52a5.75,5.75,0,0,0,2.6-4.5Z" transform="translate(-113.86 -98.18)"/><path class="cls-9" d="M242,330.28A1.83,1.83,0,0,1,241,330a2.3,2.3,0,0,1-1-2.12V179.14a6.21,6.21,0,0,1,2.85-4.93l70.52-40.71.5.87-70.52,40.71a5.28,5.28,0,0,0-2.35,4.07V327.92a1.1,1.1,0,0,0,1.85,1.07l70.54-40.73.5.87-70.54,40.73A2.85,2.85,0,0,1,242,330.28Z" transform="translate(-113.86 -98.18)"/><path class="cls-9" d="M313.91,289.13l-.5-.87,9.56-5.52a5.28,5.28,0,0,0,2.35-4.07V129.89a1.1,1.1,0,0,0-1.85-1.07l-9.59,5.54-.5-.87L323,128a2.07,2.07,0,0,1,3.35,1.93V278.67a6.21,6.21,0,0,1-2.85,4.93Z" transform="translate(-113.86 -98.18)"/></g><path id="_Path_34" data-name="&lt;Path&gt;" class="cls-3" d="M283.17,164.46c9-5.18,16.25-1,16.25,9.38s-7.27,23-16.25,28.14-16.25,1-16.25-9.38S274.2,169.65,283.17,164.46Z" transform="translate(-113.86 -98.18)"/><path id="_Path_35" data-name="&lt;Path&gt;" class="cls-3" d="M283.17,172.62c2.91-1.68,5.27-.32,5.27,3a11.65,11.65,0,0,1-5.27,9.13c-2.91,1.68-5.27.32-5.27-3A11.65,11.65,0,0,1,283.17,172.62Z" transform="translate(-113.86 -98.18)"/><path id="_Path_36" data-name="&lt;Path&gt;" class="cls-3" d="M293.44,190.54c0-5.52-3.88-7.76-8.66-5l-3,1.73c-4.78,2.76-8.66,9.48-8.66,15v1.49c2.76.92,6.25.42,10-1.77a32,32,0,0,0,10.27-10.16Z" transform="translate(-113.86 -98.18)"/><path id="_Path_37" data-name="&lt;Path&gt;" class="cls-10" d="M283.17,172.62c2.91-1.68,5.27-.32,5.27,3a11.65,11.65,0,0,1-5.27,9.13c-2.91,1.68-5.27.32-5.27-3A11.65,11.65,0,0,1,283.17,172.62Z" transform="translate(-113.86 -98.18)"/><path id="_Path_38" data-name="&lt;Path&gt;" class="cls-10" d="M293.44,190.54c0-5.52-3.88-7.76-8.66-5l-3,1.73c-4.78,2.76-8.66,9.48-8.66,15v1.49c2.76.92,6.25.42,10-1.77a32,32,0,0,0,10.27-10.16Z" transform="translate(-113.86 -98.18)"/><path id="_Path_39" data-name="&lt;Path&gt;" class="cls-3" d="M251.73,224.84l20.91-12.07c1-.55,1.73-.1,1.73,1v.69a3.83,3.83,0,0,1-1.73,3l-20.91,12.07c-1,.55-1.73.1-1.73-1v-.69A3.83,3.83,0,0,1,251.73,224.84Z" transform="translate(-113.86 -98.18)"/><path id="_Path_40" data-name="&lt;Path&gt;" class="cls-11" d="M251.73,224.84l20.91-12.07c1-.55,1.73-.1,1.73,1v.69a3.83,3.83,0,0,1-1.73,3l-20.91,12.07c-1,.55-1.73.1-1.73-1v-.69A3.83,3.83,0,0,1,251.73,224.84Z" transform="translate(-113.86 -98.18)"/><path id="_Path_41" data-name="&lt;Path&gt;" class="cls-3" d="M250.87,239.41l63.26-36.52c.48-.28.87-.05.87.5v7.38a1.91,1.91,0,0,1-.87,1.5l-63.26,36.52c-.48.28-.87.05-.87-.5v-7.38A1.91,1.91,0,0,1,250.87,239.41Z" transform="translate(-113.86 -98.18)"/><path id="_Path_42" data-name="&lt;Path&gt;" class="cls-12" d="M250.87,239.41l63.26-36.52c.48-.28.87-.05.87.5v7.38a1.91,1.91,0,0,1-.87,1.5l-63.26,36.52c-.48.28-.87.05-.87-.5v-7.38A1.91,1.91,0,0,1,250.87,239.41Z" transform="translate(-113.86 -98.18)"/><path id="_Path_43" data-name="&lt;Path&gt;" class="cls-3" d="M251.73,257.67l20.91-12.07c1-.55,1.73-.1,1.73,1v.69a3.83,3.83,0,0,1-1.73,3l-20.91,12.07c-1,.55-1.73.1-1.73-1v-.69A3.83,3.83,0,0,1,251.73,257.67Z" transform="translate(-113.86 -98.18)"/><path id="_Path_44" data-name="&lt;Path&gt;" class="cls-11" d="M251.73,257.67l20.91-12.07c1-.55,1.73-.1,1.73,1v.69a3.83,3.83,0,0,1-1.73,3l-20.91,12.07c-1,.55-1.73.1-1.73-1v-.69A3.83,3.83,0,0,1,251.73,257.67Z" transform="translate(-113.86 -98.18)"/><path id="_Path_45" data-name="&lt;Path&gt;" class="cls-3" d="M250.87,272.24l63.26-36.52c.48-.28.87-.05.87.5v7.38a1.91,1.91,0,0,1-.87,1.5l-63.26,36.52c-.48.28-.87.05-.87-.5v-7.38A1.92,1.92,0,0,1,250.87,272.24Z" transform="translate(-113.86 -98.18)"/><path id="_Path_46" data-name="&lt;Path&gt;" class="cls-12" d="M250.87,272.24l63.26-36.52c.48-.28.87-.05.87.5v7.38a1.91,1.91,0,0,1-.87,1.5l-63.26,36.52c-.48.28-.87.05-.87-.5v-7.38A1.92,1.92,0,0,1,250.87,272.24Z" transform="translate(-113.86 -98.18)"/><path id="_Path_47" data-name="&lt;Path&gt;" class="cls-3" d="M276.1,276.43l25-14.42c1-.55,1.73-.1,1.73,1v7.73a3.83,3.83,0,0,1-1.73,3l-25,14.42c-1,.55-1.73.1-1.73-1v-7.73A3.83,3.83,0,0,1,276.1,276.43Z" transform="translate(-113.86 -98.18)"/><path id="_Path_48" data-name="&lt;Path&gt;" class="cls-11" d="M276.1,276.43l25-14.42c1-.55,1.73-.1,1.73,1v7.73a3.83,3.83,0,0,1-1.73,3l-25,14.42c-1,.55-1.73.1-1.73-1v-7.73A3.83,3.83,0,0,1,276.1,276.43Z" transform="translate(-113.86 -98.18)"/></g><g id="Character"><path id="_Path_49" data-name="&lt;Path&gt;" class="cls-13" d="M335.3,243.85s-12.29-16.95-13-19c-.57-1.52,0-3.78.18-4.83s.34-3.39.52-4c.31-1.14-1.17-.9-2,.13s-1.12,3.12-1.54,3.46-3.7-4.43-5.42-6.64-2.78-3.54-3.82-2.72c-.75.59-.19,1.88,1,3.75a36.71,36.71,0,0,1,2,3.15c.19.4-.83.44-1.38,1.28-.43.66,0,1.73-.6,2.24a1.88,1.88,0,0,0-.48,2.47,16.07,16.07,0,0,0,4.23,4.48c1.84,1.27,2.58,1.72,3.66,3.45s10.87,19.4,11.53,20.46,1.93,3.22,3.86,3.28,17.73-13.54,18.54-14.22c2.6-2.17,3.42-2.49,3.87-.53.14.61.23,1.31.33,2.1.31,2.48,2,11.34,2,11.34s8,3.87,14.57,2,8.79-4.66,8.79-4.66l-3.29-5.36c.9-2.21,5-11.17,6.33-17.44l-20.6-3.33c-.42-.09-1.1-.26-2-.49-1.13-.3-4-1.3-6.17.61-7.09,6.17-21.16,19-21.16,19" transform="translate(-113.86 -98.18)"/><path id="_Path_50" data-name="&lt;Path&gt;" class="cls-14" d="M376.14,347.79l-3.69,5.13a12.34,12.34,0,0,0,5.36,1.14c3.3.13,4.21-1,4.33-1.22.56-1.2-.31-3.36-.55-5.21Z" transform="translate(-113.86 -98.18)"/><path id="_Path_51" data-name="&lt;Path&gt;" class="cls-14" d="M372.66,350.46s-4.47-.29-7.57-.67-5.54,1.12-4.81,2.39,2.43,2.33,5.08,3.22c2.27.76,5,1.32,7.37,2s4,1.56,5.36,1.09c1.54-.53,2.19-1.14,2.06-2.26a48.38,48.38,0,0,0-1.24-4.72Z" transform="translate(-113.86 -98.18)"/><path id="_Path_52" data-name="&lt;Path&gt;" class="cls-15" d="M382.15,342.64s-.56,4.66-.6,5.66-4.55,1.32-5.4-.51l-.14-5.7Z" transform="translate(-113.86 -98.18)"/><path id="_Path_53" data-name="&lt;Path&gt;" class="cls-13" d="M377.61,345.5l1.61,7.07s.15.86-3.53,1.41-9.46-1.93-10.44-2.43-1.1-1.5,2.52-1.3,4.9.21,4.9.21l-1.17-3.13Z" transform="translate(-113.86 -98.18)"/><path id="_Path_54" data-name="&lt;Path&gt;" class="cls-15" d="M385.19,228l2.55-.7s5.33,16.87,5.92,18.49,1.25,3.36.11,5.37c-1.37,2.39-8.58,12-8.58,12l-4.58-4.48,5.19-9.51-4.59-9.31Z" transform="translate(-113.86 -98.18)"/><path id="_Path_55" data-name="&lt;Path&gt;" class="cls-14" d="M359,206.09a7.52,7.52,0,0,1,.11-7.27c2.53-4.71,8.2-7,14.94-6.13,3.12.41,6.79,3,8.81,6.87,2.22,4.29,2.42,12.93,3,16.2Z" transform="translate(-113.86 -98.18)"/><path id="_Path_56" data-name="&lt;Path&gt;" class="cls-13" d="M358.82,207.94s-1.6,3.05-1.32,3.33a4.11,4.11,0,0,0,1.35.5Z" transform="translate(-113.86 -98.18)"/><path id="_Path_57" data-name="&lt;Path&gt;" class="cls-13" d="M363.68,198.3c-1.74,1.14-4.74,3.21-4.87,10.07-.13,7,.86,9.3,1.9,10.12.7.55,4.81.27,6.57-.14s6.83-2.92,8.66-6.73c2.15-4.48,1.71-11-1.48-12.95A11.16,11.16,0,0,0,363.68,198.3Z" transform="translate(-113.86 -98.18)"/><path id="_Path_58" data-name="&lt;Path&gt;" class="cls-3" d="M382.15,250.82c3.08,4.8,6,9,6.64,14.42,1.32,11.39-3,24.41-3.93,32.83a15.25,15.25,0,0,1,2.91,8.23c0,3.48-5.62,36.33-5.62,36.33s-4.08,1.24-6.15-.54l-3.86-60.43,2-7.36Z" transform="translate(-113.86 -98.18)"/><path id="_Path_59" data-name="&lt;Path&gt;" class="cls-4" d="M382.15,250.82c3.08,4.8,6,9,6.64,14.42,1.32,11.39-3,24.41-3.93,32.83a15.25,15.25,0,0,1,2.91,8.23c0,3.48-5.62,36.33-5.62,36.33s-4.08,1.24-6.15-.54l-3.86-60.43,2-7.36Z" transform="translate(-113.86 -98.18)"/><path id="_Path_60" data-name="&lt;Path&gt;" class="cls-3" d="M372.15,281.66l2-7.36a49.22,49.22,0,0,0,11-4.37s-2.08,3.79-8.06,5.86L374,285.25l-.27,21.64Z" transform="translate(-113.86 -98.18)"/><path id="_Path_61" data-name="&lt;Path&gt;" class="cls-16" d="M372.15,281.66l2-7.36a49.22,49.22,0,0,0,11-4.37s-2.08,3.79-8.06,5.86L374,285.25l-.27,21.64Z" transform="translate(-113.86 -98.18)"/><path id="_Path_62" data-name="&lt;Path&gt;" class="cls-3" d="M382.15,250.82c1.65,2.69,5.59,7.3,4.76,11.72-1,5.36-3.9,9.13-12.73,11.75l-8.28,30s4.31,4,5.63,7.87,6.08,33.36,6.08,33.36-1.47,2.4-6.12,1.82c0,0-16.21-37-17.36-39.41a12,12,0,0,1-1.37-8c.52-3.88,6-46.35,6-46.35Z" transform="translate(-113.86 -98.18)"/><path id="_Path_63" data-name="&lt;Path&gt;" class="cls-4" d="M382.15,250.82c1.65,2.69,5.59,7.3,4.76,11.72-1,5.36-3.9,9.13-12.73,11.75l-8.28,30s4.31,4,5.63,7.87,6.08,33.36,6.08,33.36-1.47,2.4-6.12,1.82c0,0-16.21-37-17.36-39.41a12,12,0,0,1-1.37-8c.52-3.88,6-46.35,6-46.35Z" transform="translate(-113.86 -98.18)"/><path id="_Path_64" data-name="&lt;Path&gt;" class="cls-3" d="M385.19,228l-20.6-3.33c-.42-.09-1.1-.26-2-.49h0s-.88,12.92-6.16,15.88h0c.13.62.23,1.31.33,2.1.31,2.48,2,11.34,2,11.34s8,3.87,14.57,2,8.79-4.66,8.79-4.66l-3.29-5.36C379.75,243.25,383.89,234.29,385.19,228Z" transform="translate(-113.86 -98.18)"/><path id="_Path_65" data-name="&lt;Path&gt;" class="cls-10" d="M385.19,228l-20.6-3.33c-.42-.09-1.1-.26-2-.49h0s-.88,12.92-6.16,15.88h0c.13.62.23,1.31.33,2.1.31,2.48,2,11.34,2,11.34s8,3.87,14.57,2,8.79-4.66,8.79-4.66l-3.29-5.36C379.75,243.25,383.89,234.29,385.19,228Z" transform="translate(-113.86 -98.18)"/><path id="_Path_66" data-name="&lt;Path&gt;" class="cls-3" d="M379.76,243.35a57.8,57.8,0,0,1-8.56,4.23,16.06,16.06,0,0,0,7.67-2.12Z" transform="translate(-113.86 -98.18)"/><path id="_Path_67" data-name="&lt;Path&gt;" class="cls-14" d="M363.17,198.64s-1,6.5,1.37,10.32c0,0,.87-2.59,3.07-2.09s2.31,3.37.77,5a3.21,3.21,0,0,1-3.25,1s-.35,4.7-.53,8.64-1.24,12.53,3.2,16,15.55,4.7,20.76-2.59c2.9-4.05-1-11.21-2.74-19.24-1.65-7.38-2.57-18.32-10.41-20.08S363.17,198.64,363.17,198.64Z" transform="translate(-113.86 -98.18)"/></g><g id="Cloud"><path id="_Path_68" data-name="&lt;Path&gt;" class="cls-2" d="M396.44,107.08l-2.12,1.22a11,11,0,0,0,.29-2.3c0-4.29-3-6-6.74-3.89a12,12,0,0,0-3,2.57v0c0-5.78-4.06-8.13-9.07-5.23s-9.07,9.92-9.07,15.71c0,.29,0,.57,0,.85a5.52,5.52,0,0,0-3.68.86,14.89,14.89,0,0,0-6.74,11.67,7.52,7.52,0,0,0,.17,1.62l-1.13.65c-3.07,1.77-5.56,5.23-5.56,7.73s2.49,3.08,5.56,1.31l41-23.69c3.07-1.77,5.56-5.23,5.56-7.73S399.51,105.3,396.44,107.08Z" transform="translate(-113.86 -98.18)"/></g>
          </svg>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="form-box">
            <div class="form-title">
              <div class="form-logo"><?php the_custom_logo(); ?></div>
              <p class="form-sub-title">Use your credentials to login into account.</p>
            </div>
            <form class="sign-up-form" method="post">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Frist Name"/>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Your Username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control pass-show" id="password1" name="password1" placeholder="Your Password">
                <i id="show" class="far fa-eye-slash right"></i>
                <i id="hide" class="far fa-eye right"></i>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Your Password">
              </div>
              <div class="form-group">
                <?php if($error != ""){ ?>
                  <p class="alert alert-danger"><?php echo $error; ?></p>
                <?php } ?>
                <?php if($success != ""){ ?>
                <p class="alert alert-success"><?php echo $success; ?></p>
                <?php } ?>
                <button type="submit" name="btnregister" class="form-btn" >Sign Up</button>
                <input type="hidden" name="task" value="register" />
              </div>
              <div class="text-center">
                <p class="note">Have already An Account? <a href="<?php echo site_url().'/login' ?>">Login</a> </p>
              </div>
            </form>
          </div>
        </div>
      </div>
</main>
<?php get_footer() ?>

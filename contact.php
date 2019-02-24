<?php

    $errors = '';
    $myemail = 'resume.shivam95@gmail.com';
    
    if(empty($_POST['firstname'])  || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['subject'])){
        $errors .= "\n Error: all fields are required";
    }

    $firstname= $_POST['firstname']; 
    $lastname= $_POST['lastname']; 
    $email = $_POST['email']; 
    $subject = $_POST['subject']; 

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)){
        $errors .= "\n Error: Invalid email address";
    }

    if( empty($errors)){

        $to = $myemail;

        $email_subject = "Contact form submission: $firstname";

        $email_body = "You have received a new message. ".

        " Here are the details:\n First Name: $firstname \n ".
            
        " Last Name: $lastname \n ".

        "Email: $email\n Message \n $subject";

        $headers = "From: $myemail\n";

        $headers .= "Reply-To: $email";

        mail($to,$email_subject,$email_body,$headers);

        //redirect to the 'thank you' page

        header('Location: index.html');

    }
?>
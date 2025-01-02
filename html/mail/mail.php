<?php
    $errors =[];
    $required_fields = array(
        'name' => 'Full name',
        'email' => 'Email Address',
        'phone' => 'Phone Number',
    );

    foreach ($required_fields as $field => $value) {
        if (isset($_POST[$field]) and empty(trim($_POST[$field]))) {
            $errors[] = $value . ' is missing.';
        }   
    }
    if (1 > count($errors)) {
        $mailBody = "";
        if(isset($_POST['name'])){
            $mailBody .= '<p>Full Name: ' . $_POST["name"] . '</p>' . "\n";
            $mailBody .= '<br>' . "\n";
        }
        if(isset($_POST['email'])){
            $mailBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
            $mailBody .= '<br>' . "\n";
        }
        if(isset($_POST['phone'])){       
            $mailBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
            $mailBody .= '<br>' . "\n";
        }   
        if(isset($_POST['message'])){
            $mailBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
        }

        $admin_email = 'demo@mailinator.com';
        $headers = "From: " . $_POST['email'] . "\r\n";
        $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $subject = 'A message from your contact form ' . $_POST["name"];
        
        $mail = mail($admin_email,$subject,$mailBody,$headers);
        $message = '';
        if($mail==true){
            $status = 1;
            $message .= '<div class="alert alert-success alert-dismissible fade show">';
            $message .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            $message .= '<strong>Success</strong>:';
            $message .= 'Mail Sent Successfully<br/>';
            $message .= '</div>';
        }else{
            $status = 0;
            $message .= '<div class="alert alert-danger alert-dismissible fade show">';
            $message .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            $message .= '<strong>ERROR</strong>:';
            $message .= 'Mail failed please send again<br/>';
            $message .= '</div>';
        }
    }else{
        $message ='';
        $status = 0;
        foreach ($errors as $error) {
            $message .= '<div class="alert alert-danger alert-dismissible fade show">';
            $message .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            $message .= '<strong>ERROR</strong>:';
            $message .= $error . '<br/>';
            $message .= '</div>';
        }
    }
    $response = ['status' => $status, 'message' => $message ];
    echo json_encode($response);
?>
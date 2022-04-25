<?php 
    if(isset($_POST['contact'])) {
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $message = $_POST['user_message'];
        $toEmail = "pmanager128@gmail.com";
        $emailSubject = "Feedback from Project Manager users";
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1', 'X-Mailer' => 'PHP/".phpversion()'];
        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: index.php');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    }
<?php

include("include/functions.php");
include("include/db_connect.php");
include("include/db_querys.php");
include("include/times.php");
include("include/mailhandler.php");
include("include/pepper.php");

    $mail               = $_POST['mail'];

    $secret             = $_POST['secret'];

    $password           = $_POST['password'];
    
    $password_repeat    = $_POST['password_repeat'];


//check if passwords match

    if($password != $password_repeat){
        //return error
        $error = "Passwörter stimmen nicht überein";
        include("login_set_passwort.php");
    }



    $password_hash      = password_hash($password.PEPPER, PASSWORD_DEFAULT);

//check if mail and secret match


    $sql        = "SELECT * FROM adminuser WHERE admin_user_mail = :mail AND admin_user_secret = :secret;";

    $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

    $statement	= $pdo->prepare($sql);
	
	$statement->bindParam(':mail', $mail);
	$statement->bindParam(':secret', $secret);
	
	$statement->execute();

    while($row = $statement->fetch()){
        $user_data = $row;
    }




     if(isset($user_data)){
        //update password and secret
        $new_secret = generate_secret();

        $admin_user_id               = $user_data['admin_user_id'];
        $name                        = $user_data['admin_user_name'];
        $email                       = $user_data['admin_user_mail'];

        $data['admin_user_secret']     = $new_secret;
        $data['admin_user_password']   = $password_hash;

        $data['admin_user_modify_id']  = $admin_user_id;
        $data['admin_user_modify_ts']  = time();


        $where = array();
        $wh['col'] = "admin_user_id";
        $wh['typ'] = "=";
        $wh['val'] = $admin_user_id;
        array_push($where, $wh);

        $db_result = db_update("adminuser", $data, $where);

        //send notification

        if($db_result['result'] == "ok"){

                  
                   
            $subject        = "Passwort aktualisiert";
        
            $body           = "<p>Hallo $name,<br> dein Passwort wurde ge&auml;ndert.</p>
            
            <p>Viele Gr&uuml;&szlig;e<br>
            <i>dreieichcon.de Administration</i></p>";
            
        
            $rec            = array();
        
            $rec1['mail']   = $email;
            $rec1['name']   = $name;
        
            array_push($rec, $rec1);
        
        
            $mail = phpmailer_send_mail($rec, $subject, $body);

            $success = "Das Passwort wurde erfolgreich geändert. Du kannst dich jetzt anmelden";

            include("login.php");
        }



    }else{
        //return error
        $error = "Benutzerkonto konnte nicht gefunden werden";
        include("login_set_password.php");
    }



    ?>
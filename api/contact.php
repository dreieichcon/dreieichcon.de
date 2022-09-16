<?php

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");
  include("../admin/include/mailhandler.php");


  $data['contact_form_name']         = $_POST['name'];
  $data['contact_form_mail']         = $_POST['mail'];
  $data['contact_form_message']      = $_POST['message'];
  $data['contact_form_ts']           = time();
  
  $data['contact_form_edit_ts']      = 0;
  $data['contact_form_edit_id']      = time();

  $db_result 	= db_insert("contact_form", $data);


  $message_plain = htmlspecialchars($_POST['message']);
  $name_plain    = htmlspecialchars($_POST['name']);
  $email_plain    = htmlspecialchars($_POST['mail']);
  

if($db_result['result'] == "ok"){			
    //if user inserted, send mail
    
        $name           = $_POST['name'];
        $email          = $_POST['mail'];
    
        $subject        = "Kontakt-Anfrage www.dreieichcon.de";
    
        $body           = "<p>Hallo $name_plain,<br> vielen Dank f&uuml;r die Anfrage. Das Team der DreieichCon wird sich in K&uuml;rze melden.</p>

        <p><u>Folgende Nachricht wurde &uuml;bermittelt</u></p>
        <p>$message_plain</p>

        <p>Dieses Postfach wird nicht &uuml;berwacht. Bitte nicht auf diese Nachricht antworten.</p>";
        
    
        $rec            = array();
    
        $rec1['mail']   = $email;
        $rec1['name']   = $name;
    
        array_push($rec, $rec1);
    
    
        $mail = phpmailer_send_mail($rec, $subject, $body);


//E-Mail to team
        
        $name           = "Dreieichcon.de";
        $email          = "info@dreieichcon.de";
    
        $subject        = "Kontakt-Anfrage www.dreieichcon.de";
    
        $body           = "<p>Moin,<br> &uuml;ber die Homepage wurde eine neue Kontakt-Anfrage gestellt:</p>

        <p><i>$name_plain</i> ($email_plain) schreibt:
        
        <p>$message_plain</p>

        <p>Dieses Postfach wird nicht &uuml;berwacht. Bitte nicht auf diese Nachricht antworten.</p>";
        
    
        $rec            = array();
    
        $rec1['mail']   = $email;
        $rec1['name']   = $name;
    
        array_push($rec, $rec1);
    
    
        $mail = phpmailer_send_mail($rec, $subject, $body);
    
    }
    

  header('Content-Type: application/json');
  echo json_encode($db_result);

?>
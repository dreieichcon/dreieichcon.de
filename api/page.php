<?php

//check information
  if(!isset($_GET['page_id'])){
      http_response_code(400);
      die;
  }

  $page_id = $_GET['page_id'];

//load librarys
  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");

  $return_array = array();

//load general content (title and type => requires join)

  $sql		= "SELECT * FROM page p, page_type t WHERE p.page_type_id = t.page_type_id AND p.page_id = :pageid ";
                                                          
  $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

  $statement	= $pdo->prepare($sql);

  $statement->bindParam(':pageid', $page_id);

  $statement->execute();

  $db_array = array();

  while($row = $statement->fetch()){
      foreach ($row as $key => $value){
          $row[$key] = db_parse($value);
      }
      array_push($db_array, $row);
  }

//if no page is found, return error 404
  if(count($db_array)>0){
    $return_array = $db_array[0];
  }else{
    http_response_code(404);
    die;
  }
    
//load page_content
  $page_content = array();
//load bios first


  $where = array();
  $wh['col'] = "page_id";
  $wh['typ'] = "=";
  $wh['val'] =  $page_id;
  array_push($where, $wh);

  $bios = db_select("page_bio", $where);

  $page_content['bio'] = $bios;


//load blog-posts second
    

  $where = array();
  $wh['col'] = "page_id";
  $wh['typ'] = "=";
  $wh['val'] =  $page_id;
  array_push($where, $wh);

  $order = array();
  $or['col'] = "page_blog_order";
  $or['dir'] = "ASC";
  array_push($order, $or);

  $blog = db_select("page_blog", $where, $order);

  $page_content['blog'] = $blog;


//add page_content to return array
  $return_array['page_content'] = $page_content;

//convert array to json and deliver
  if(isset($_GET['debug'])){
    echo"<pre>";
    print_r($return_array);
    echo"</pre>";
    die;
  }

  header('Content-Type: application/json');
  echo json_encode($return_array);

?>
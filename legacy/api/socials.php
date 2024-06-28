<?php

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");



    $order = array();
    $order1['col'] = "social_order";
    $order1['dir'] = "ASC";

    array_push($order, $order1);

    $db_array = db_select("social", array(), $order);

    $return_array = array();
    
    foreach($db_array as $line){
       $data = array();
        $data['href'] = $line['social_href'];
       $data['icon'] = $line['social_icon'];
       $platform = $line['social_platform'];
       $return_array[$platform] = $data;
       
    }

    
    header('Content-Type: application/json');
    $ret['socials'] = $return_array;
    echo json_encode($ret);


    /*
 socials: {
        youtube: {
            link: "https://www.youtube.com/channel/UCg6udpSdrTC6hStI07qhOFw",
            icon: "resources/icons/svgs/brands/youtube.svg",
        },
        discord: {
            link: "https://discord.gg/xJVEeRgqJp",
            icon: "resources/icons/svgs/brands/discord.svg",
        },
        twitch: {
            link: "https://www.twitch.tv/dreieichconworld",
            icon: "resources/icons/svgs/brands/twitch.svg",
        },
        instagram: {
            link: "https://www.instagram.com/dreieichcon/",
            icon: "resources/icons/svgs/brands/instagram.svg",
        },
        twitter: {
            link: "https://twitter.com/dreieichcon",
            icon: "resources/icons/svgs/brands/twitter.svg",
        },
        facebook: {
            link: "https://www.facebook.com/dreieichcon/",
            icon: "resources/icons/svgs/brands/facebook-f.svg",
        },
    },

    */
    ?>
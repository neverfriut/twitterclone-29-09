<?php
session_start();
if( ! isset($_POST['tweetId']) ){
    http_response_code(400);
    header('Content-Type: application/json');
    echo '{"error":"missing tweet ID"}';
    exit();
  }
  
  $tweetId = $_POST['tweetId'];
  // echo $_GET['tweetId'];
  $sUsers = file_get_contents('users.txt');
  $aUsers = json_decode($sUsers);
  
  //$aTweets = [];
  
  // print_r ($aUsers[id['tweets']);
  
  foreach($aUsers as $key => $aUser) {
    // $aUserTweets = $aUser->tweets;
    // DO NOT MAKE COPY OF ARRAY, CHANGE ORIGINAL!
  
    foreach($aUser->Tweets as $keyTweet => $oTweet) {
      if ($oTweet->TweetId ==  $tweetId){
        echo $oTweet->TweetId;
        array_splice($aUser->Tweets, $keyTweet, 1);
        echo '{"id": "' . $_POST['tweetId'] . '", "message" :"tweet has been deleted"}';
        //print_r($aUsers);
        // echo json_encode($aUsers, JSON_PRETTY_PRINT);
        $sData = json_encode($aUsers, JSON_PRETTY_PRINT);
        file_put_contents('users.txt', $sData);
        break;
      }
    }
  } 
  
//$_SESSION['id'] == $ajUsers[$i]['userId'] && 

// && $_SESSION['id'] == $ajUsers[$i]['userId'] && $_SESSION['email'] == $ajUsers[$i]['userEmail']
// && $_SESSION['id'] == $ajUsers[$i]['userId'] && $_SESSION['email'] == $ajUsers[$i]['userEmail'] 
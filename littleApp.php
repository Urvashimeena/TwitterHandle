<!DOCTYPE html>
<html>
<head>
    <title>twitter</title>
    <style type="text/css">
        td {
            border: 1px solid;
        }
        table {
            border: 1px solid;
        }
    </style>
</head>
<body>
<?php
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
  'oauth_access_token' =>"973986179178668032-l4hCm0bZZSTyQs5KByLILQaJ2ZipbLt",
    'oauth_access_token_secret' => "HE83kki6B8r1YEIiDqFPjlP3sxyHb0RmnjCNMF1bEOxic",
    'consumer_key' => "pFnrJR0tWOvQYnqQ0ALdo1F5o",
    'consumer_secret' => "Sip7xwjiBqjLEaAtLMKkYbu06EcY4psMiqf57AoDV5kCBBzFSy"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))
{
    $user = $_GET['user'];
}  else 
{
    echo "User doesnot exist";
}

$getfield = "?screen_name=$user";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
    $count = 2;
foreach($string as $items)
    {
        if($count>1)
        {
            ?>

                <table>
                    <tr>
                        <td>
                            Followers
                        </td>
                        <td>
                            <?php  echo $items['user']['followers_count'];  ?>
                        </td>
                     </tr> 
                     <tr>
                        <td>
                            Tweets
                        </td>
                        <td>
                            <?php  echo $items['user']['statuses_count'];  ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Latest Tweet
                        </td>
                        <td>
                            <?php  echo $items['text'];  ?>
                        </td>
                    </tr>

                </table>
            <?php
           
            // echo "number: ". $items['user']['statuses_count']."<br />";

            // // echo "Screen name: ". $items['user']['screen_name']."<br />";
            // echo "Followers: ". $items['user']['followers_count']."<br />";
            $count--;

        }
        else
        {
            break;
        }
        
    }
?>
</body>
</html>



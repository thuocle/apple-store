<?php
 
require_once './vendor/autoload.php';
 
// Lấy những giá trị này từ https://console.google.com
$client_id = '81678134426-j16al8im2mbsetfse3dv43svgvcs3cr8.apps.googleusercontent.com'; 
$client_secret = '6d69gLy991-1H-mxDnUQD8dg';
$redirect_uri = 'http://freetuts.app/google_api/login/login.php';
 
//Thông tin kết nói database
$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'free_tuts'; //Database Name
###################################################################
 
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
 
$service = new Google_Service_Oauth2($client);
 
// Nếu kết nối thành công, sau đó xử lý thông tin và lưu vào database
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    $user = $service->userinfo->get(); //get user info 
 
    // connect to database
    $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
 
    //Kiểm tra xem nếu user này đã tồn tại, sau đó nên login tự động
    $result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
    $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
 
    //show user picture
    echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
 
    if($user_count) // Nếu user tồn tại thì show thông tin hiện có
    {
        echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    }
    else //Ngược lại tạo mới 1 user vào database
    { 
        echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        $statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
        $statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
        $statement->execute();
        echo $mysqli->error;
    }
    exit;
}
 
//Nếu sẵn sàng kết nối, sau đó lưu session với tên access_token
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else { // Ngược lại tạo 1 link để login
    $authUrl = $client->createAuthUrl();
}
 
//Hiển thị button để login
echo '<div style="margin:20px">';
if (isset($authUrl)){ 
    //show login url
    echo '<div align="center">';
    echo '<h3>Login with Google -- Demo</h3>';
    echo '<div>Please click login button to connect to Google.</div>';
    echo '<a class="login" href="' . $authUrl . '">LOGIN</a>';
    echo '</div>';
     
} 
echo '</div>';
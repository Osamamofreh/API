<?php
require 'connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");
if(isset($postdata) )
{
  // Extract the data.
  $request = json_decode($postdata);
	
  //echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    
  // Sanitize.
  //$uid   = mysqli_real_escape_string($con, trim($request->category));
  $url = 'http://localhost:8080/api/getById?category=supermarket';
  $url_components = parse_url($_SERVER['REQUEST_URI']);
  parse_str($url_components['query'], $params);
  //echo $params['category'];
  // Get by id.
  $sql = "SELECT * FROM item WHERE Category ='".$params['category']."'; ";

$items = [];
if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $items[$cr]['ID']    = $row['ID'];
    $items[$cr]['Category'] = $row['Category'];
    $items[$cr]['Price'] = $row['Price'];
    $items[$cr]['Img_path'] = $row['img_path'];
    $items[$cr]['Name'] = $row['Name'];
    $cr++;
  }
    
  echo json_encode(['data'=>$items]);
}
else
{
  http_response_code(404);
}
  //$result = mysqli_query($con,$sql);
   //echo $result;
  //$row = mysqli_fetch_assoc($result);
  
  //$json = json_encode($row);
  //echo $json;
}
/**

$items = [];
$sql = "SELECT id, category, price, img_path,name FROM item";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $items[$cr]['id']    = $row['id'];
    $items[$cr]['category'] = $row['category'];
    $items[$cr]['price'] = $row['price'];
    $items[$cr]['img_path'] = $row['img_path'];
    $items[$cr]['name'] = $row['name'];
    $cr++;
  }
    
  echo json_encode(['data'=>$items]);
}
else
{
  http_response_code(404);
}
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
  echo Mofreh';
}*/
?>
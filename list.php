<?php
/**
 * Returns the list of items.
 */
require 'connect.php';
    
$items = [];
$sql = "SELECT id, category, price, img_path,name FROM item";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $items[$cr]['ID']    = $row['id'];
    $items[$cr]['Category'] = $row['category'];
    $items[$cr]['Price'] = $row['price'];
    $items[$cr]['Img_path'] = $row['img_path'];
    $items[$cr]['Name'] = $row['name'];
    $cr++;
  }
    
  echo json_encode(['data'=>$items]);
}
else
{
  http_response_code(404);
}

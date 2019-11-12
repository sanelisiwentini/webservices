<?php 

$url = 'https://api.flickr.com/services/rest/';
$data = array("method"=>"flickr.photos.getRecent","api_key"=>"45b563e1918b2caaa6ed47c8352cb0b0","format"=>"json","nojsoncallback"=>"1");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);

$result_data_json = json_decode($result,true);

$photoset = $result_data_json['photos'];
$photos = $photoset['photo'];

curl_close($ch);

foreach($photos as $pic){
    // https://farm{farm-id}.staticflickr.com/{server-id}/{id}_{secret}.jpg
    $pic_thumbnail_url = 'https://farm'.$pic['farm'].'.staticflickr.com/'.$pic['server'].'/'.$pic['id'].'_'.$pic['secret'].'_n.jpg';
    $pic_url = 'https://farm'.$pic['farm'].'.staticflickr.com/'.$pic['server'].'/'.$pic['id'].'_'.$pic['secret'].'.jpg';
    $pic_large_url = 'https://farm'.$pic['farm'].'.staticflickr.com/'.$pic['server'].'/'.$pic['id'].'_'.$pic['secret'].'_b.jpg';

    echo '<img src='.$pic_thumbnail_url.'</img>';
  echo '<br/><img src='.$pic_url.'</img>';
  echo '<br/><img src='.$pic_large_url.'</img>';
}
?>
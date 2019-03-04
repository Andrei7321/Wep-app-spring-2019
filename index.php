<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Найди по хештегу</title>
  </head>
  <body>
    <form class = "container" method="GET">
      <br />
      <label id = "tag">Введите слово без пробелов</label>
       <input type="text" name = "tag" class="form-control" placeholder="Введите хэш-тег без решетки">
       <br />
       <button type="submit" name = "search" class="btn btn-primary mb-2">Найти фоточку в инсте</button>
      <br />
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(isset($_GET['search']))
{
require __DIR__ . '/vendor/autoload.php';
$instagram = new \InstagramScraper\Instagram();
// Let's look at $media
$tag = $_GET['tag'];
$tag = str_replace(' ','',$tag);
$tag = str_replace('#','',$tag);
$medias = $instagram->getMediasByTag($tag,20);
for($i = 0; $i < count($medias); $i++)
{
$media = $medias[$i];
$im = $media->getImageHighResolutionUrl();
echo '
  <div class = "container">
  <div class="card cardos">
  <img src="'.$im.'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    <a href="'.$im.'" class="btn btn-primary">Открыть фото в полном размере</a>
  </div>
  </div>
  </div>
';
}
}
?>
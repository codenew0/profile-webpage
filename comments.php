<!DOCTYPE html>
<html lang="jp" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title></title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">
      <!-- <img src="Image/Character/Highlancer_m.png" alt="icon" width="50" height="50"> -->
      <h1 class="logo">
        <span class="word1">NEW</span>
        <span class="word2">CODE</span>
      </h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto navbar-fonts">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="projects.html">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="prospect.html">Prospect</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Comments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About me</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container padding">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 post">
        <h1>Comment</h1>
        <h4>If you have some suggestions to me, please leave your comments.</h4>
      </div>

      <div class="col-md-6 col-md-offset-3 comments-section">
        <form class="clearfix" action="comments.php" method="POST" id="comment_form">
          <h4>Leave me a comment:</h4>
          <textarea name="comment_text" class="form-control" cols="30" rows="3"></textarea>
          <button type="submit" class="btn btn-primary btn-sm" id="submit_comment">Submit comment</button>
        </form>

        <?php
        if (isset($_POST['comment_text'])) {
           //Get client ip
          if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
          } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          } else {
            $ip = $_SERVER['REMOTE_ADDR'];
          }
          
          $date = getdate();
          $month = $date['month'];
          $year = $date['year'];
          $day = $date['mday'];
          $date_str = $month . " " . $day . ", " . $year;
          $comment = $_POST['comment_text'];
          $str = array($ip, $date_str, $comment);
          $file = fopen('comments_privacy.csv', 'a');
          fputcsv($file, $str);
          fclose($file);
        }
        ?>
        <h2>Comment(s)</h2>
        <hr>

        <div id="comments-wrapper">
          <div class="comment clearfix">
            <div class="comment-details">
              <span class="comment-date">Codenew June 4, 2019</span>
              <p>This is the first comment on this website.</p>
            </div>
          </div>
        </div>

        <?php
        if (file_exists("comments_privacy.csv")) {
          $file = fopen("comments_privacy.csv", "r");
          if ($file) {
            while ($line = fgetcsv($file)) {
              $ip = $line[0];
              $date_str = $line[1];
              $comment = $line[2];
              print '<div id="comments-wrapper">
              <div class="comment clearfix">
                <div class="comment-details">
                  <span class="comment-date">'.$ip.' '.$date_str.'</span>
                  <p>'.htmlentities($comment).'</p>
                </div>
              </div>
            </div>';
            }
            fclose($file);
          }

        }
        ?>
      </div>
    </div>
  </div>

  <footer>
    <div class="container-fluid padding">
      <div class="row text-center">
        <div class="col-md-4">
          <img src="images/cat.png" width="50" height="50">
          <hr class="light">
          <!-- <p>111-1111-1111</p> -->
          <p>codenew0@gmail.com</p>
          <p>Japan</p>
          <p>Nomi, ishikawa</p>
        </div>
        <div class="col-md-4">
          <hr class="light">
          <h5>Sports time</h5>
          <hr class="light">
          <p>Monday: 5pm~</p>
          <p>Saturday: 4pm~</p>
        </div>
        <div class="col-md-4">
          <hr class="light">
          <h5>"TODO" List</h5>
          <hr class="light">
          <p>Tensorflow</p>
          <p>PixiJS</p>
          <p>Processing</p>
        </div>
        <div class="col-12">
          <hr class="light-100">
          <h5>&copy; codenew</h5>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
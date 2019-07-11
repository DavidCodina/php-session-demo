<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> - </title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main>
    <article>
      <h2>Session Status:</h2>

      <?php
      if ( !empty($_SESSION) ) {
        echo "<p>A session currently exists with an id of: <code>" . session_id() . "</code>.</p>";
      } else {
        echo "<p>No session currently exists.</p>";
      }
      ?>

      <ul>
      <?php
      if ( !empty($_SESSION) ) {
        foreach($_SESSION as $key => $value) {
          echo  '<li>' .
                  '<code>' . $key   . '</code> : ' .
                  '<code>' . $value . '</code>' .
                '</li>';
        }
      } else {
        echo '<p>The <code>$_SESSION</code> array is empty.';
      }
      ?>
      </ul>

      <br><br>
      <div style="margin: 50px auto; text-align:center;">
        <a href="index.php#form-container">Back to index.php</a>
      </div>
    </article>
  </main>
</body>
</html>

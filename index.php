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
  <header>
    <h1>PHP Session Demo</h1>
  </header>
  <main>
    <article>
      <br><br>

      <div id="form-container">
        <form id="set-session-var-form" method="POST">
          <label>Set a session variable (key):</label>
          <input type="text" name="session_key">
          <label>Set a value for the session variable:</label>
          <input type="text" name="session_value">
          <div style="text-align:center;">
            <button type="submit" name="set_session_var" value="true">Set Session Variable</button>
          </div>
        </form>


        <form id="unset-session-var-form" method="POST">
          <label>Unset the session variable with the following key:</label>
          <input type="text" name="session_key">
          <div style="text-align:center;">
            <button type="submit" name="unset_session_var" value="true">Unset Session Variable</button>
          </div>
        </form>
      </div>


      <form id="destroy-session-form" method="POST">
        <div style="text-align:center;">
          <button type="submit" name="destroy_session" value="true">DESTROY Session!!!</button>
        </div>
      </form>


      <div id="result-div"></div>


      <div style="margin: 50px auto; text-align:center;">
        <a href="session-status.php">Go to session-status.php</a>
      </div>
    </article>
  </main>
  <script src="script.js"></script>
</body>
</html>

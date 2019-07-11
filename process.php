
<?php
session_start();


/* =============================================================================
                         Set a Session Variable
============================================================================= */


if ( isset($_POST['set_session_var']) ) {
  $session_key            = htmlspecialchars( $_POST['session_key'] );
  $session_value          = htmlspecialchars( $_POST['session_value'] );
  $_SESSION[$session_key] = $session_value;

  $data = ["message" => "The <code>$session_key</code> session variable has been set to <code>$session_value</code>."];
  echo json_encode($data);
}


/* =============================================================================
                         Unset a Session Variable
============================================================================= */


if ( isset($_POST['unset_session_var']) ) {
  $session_key = htmlspecialchars( $_POST['session_key'] );


  if ( !empty($_SESSION) ) {
    if( !isset($_SESSION[$session_key]) ) {
      $data = ["message" => "<span style=color:rgb(200,0,0);'>Sorry. The <code>$session_key</code> session variable does not exist.</span>"];
      echo json_encode($data);
    } else {
      unset( $_SESSION[$session_key] );
      $data = ["message" => "The <code>$session_key</code> session variable has been unset."];
      echo json_encode($data);
    }
  } else {
    $data = ["message" => "<span style=color:rgb(200,0,0);'>Sorry. There's currently no session, and thus no variables to unset.</span>"];
    echo json_encode($data);
  }
}


/* =============================================================================
                         Destroy the Session
============================================================================= */


if ( isset($_POST['destroy_session']) ) {
  if ( !empty($_SESSION) ) {
    $data = ["message" => "<strong><em>Blam!</em></strong> The session with an id of <code>" . session_id() . "</code> has been destroyed."];
    session_destroy();
    echo json_encode($data);

  } else {
    $data = ["message" =>  "<span style=color:rgb(200,0,0);'>No session was destroyed because no session currently exists.</span>"];
    echo json_encode($data);
  }
}
?>

<?php
// // server should keep session data for AT LEAST 1 hour
// ini_set('session.gc_maxlifetime', 10);

// // each client should remember their session id for EXACTLY 1 hour
// session_set_cookie_params(10);



// echo 'session start: '. date( "H:i:s" );
if (!isset($_SESSION['visits']))
{
    $_SESSION['visits'] = 1;
}
else
{
    $_SESSION['visits']++;
}


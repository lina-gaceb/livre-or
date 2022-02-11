<?php
  // Initialiser la session
  session_start();
  
  // fin de la session.
  if(session_destroy())
  {
    // Rediriger page de connexion
    header("Location: connexion.php");
  }
?>
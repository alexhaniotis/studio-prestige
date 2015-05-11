<?php

if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
  if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr') {
    header('Location: /fr/');
  }
  else if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'en') {
    header('Location: /en/');
  }
  else {
    header('Location: /fr/');
  }
}
else {
  header('Location: /fr/');
}
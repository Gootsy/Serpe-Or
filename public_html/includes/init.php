<?php
require_once 'config.php';

function vite_get_scripts($entry)
{
  if (APP_ENV === 'dev') {

    // --- MODE DÉVELOPPEMENT ---  

    // On appelle le serveur Vite
    return '
      <script type="module" src="http://localhost:5173/@vite/client"></script>
      <script type="module" src="http://localhost:5173/src/' . $entry . '"></script>';
  } else {

    // --- MODE PRODUCTION ---

    // On va chercher le nom réel des fichiers dans le manifest.json
    $manifestPath = __DIR__ . '/../dist/.vite/manifest.json';
    $manifest = json_decode(file_get_contents($manifestPath), true);

    // On récupère les noms des fichiers js et css
    $js = $manifest['src/' . $entry]['file'];
    $css = $manifest['src/' . $entry]['css'][0] ?? '';

    // On construit les balises html à insérer dans le <head>
    $html = "";
    if ($css) {
      $html .= '<link rel="stylesheet" href="' . SITE_URL . '/public_html/dist/' . $css . '">';
    }
    $html .= '<script type="module" src="' . SITE_URL . '/public_html/dist/' . $js . '"></script>';

    return $html;
  }
}

function vite_get_asset($path) {
  // 1. Configuration
  $devHost = 'http://localhost:5173/'; 
  $manifestPath = __DIR__ . '/../dist/.vite/manifest.json'; 
  $distPrefix = 'dist/'; 
  $rootPath = 'src/images/'; // Chemin source dans ton dossier Vite

  // 2. Mode Développement
  // On utilise ta constante globale directement
  if (defined('APP_ENV') && APP_ENV === 'dev') {
      return $devHost . $rootPath . $path;
  }

  // 3. Mode Production (Lecture du manifest)
  if (!file_exists($manifestPath)) {
      // Optionnel : loguer une erreur ici si le manifest est absent en prod
      return ""; 
  }

  // On staticise la lecture du manifest pour éviter de relire le fichier 
  // 50 fois si tu as 50 images sur la page
  static $manifest = null;
  if ($manifest === null) {
      $manifest = json_decode(file_get_contents($manifestPath), true);
  }

  $key = $rootPath . $path;

  if (isset($manifest[$key])) {
      return $distPrefix . $manifest[$key]['file'];
  }

  return "";
}

<?php
// Charge WordPress
require_once('wp-load.php');

// Fonction pour vérifier si un fichier est utilisé dans le contenu
function is_media_used($attachment_url) {
    global $wpdb;

    // Cherche dans le contenu des articles et pages
    $query = $wpdb->prepare("
        SELECT ID FROM {$wpdb->posts}
        WHERE post_content LIKE %s
          AND post_status IN ('publish', 'draft')
    ", '%' . $attachment_url . '%');

    $results = $wpdb->get_results($query);

    return !empty($results);
}

// Obtenir tous les fichiers de la bibliothèque des médias
$media_files = get_posts([
    'post_type'   => 'attachment',
    'post_status' => 'inherit',
    'posts_per_page' => -1
]);

// Initialiser les fichiers non utilisés
$unused_files = [];

foreach ($media_files as $file) {
    $file_url = wp_get_attachment_url($file->ID);

    if (!is_media_used($file_url)) {
        // Ajouter aux fichiers non utilisés
        $unused_files[] = [
            'ID'  => $file->ID,
            'URL' => $file_url,
            'Title' => $file->post_title
        ];
    }
}

// Affiche les résultats
if (!empty($unused_files)) {
    echo "<h1>Médias inutilisés</h1>";
    echo "<ul>";
    foreach ($unused_files as $file) {
        echo "<li>ID: {$file['ID']}, URL: {$file['URL']}, Title: {$file['Title']}</li>";
    }
    echo "</ul>";
} else {
    echo "<h1>Aucun fichier inutilisé trouvé !</h1>";
}

?>
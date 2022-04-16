<?php
$file = 'randomMainAnswer.php';
// Öffnet die Datei, um den vorhandenen Inhalt zu laden
$current = file_get_contents($file);
// Fügt eine neue Person zur Datei hinzu
$current .= "<?php $" . "randomMainAnswer = array( $" . "first_name . ' neee  – dauert noch 😉', 'Sorry, aber ist noch nicht da 🤷🏾', 'Aber das Baby ist noch nicht da. Sorry ' . $" . "first_name . ' 😥', 'Nein dauert noch. Frag später noch mal ' . $" . "first_name . ' 🤗','Hmm ... Das mit dem Baby dauert wohl noch etwas. 🙃', ); ?>";
// Schreibt den Inhalt in die Datei zurück
file_put_contents($file, $current);
echo "The answers were all successfully set to <i>NO</i>.";
?>
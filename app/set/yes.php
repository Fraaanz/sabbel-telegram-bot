<?php
$file = 'randomMainAnswer.php';
// Öffnet die Datei, um den vorhandenen Inhalt zu laden
//$current = file_get_contents($file);
// Fügt eine neue Person zur Datei hinzu
$current = "<?php $" . "baby = 1; $" . "randomMainAnswer = array($" . "first_name . ' du darfst dich freuen!!!! 🙌 Das Baby ist da! Aber jetzt nicht die frisch gebackenen Eltern stressen. Du bekommst sicher bald mehr Infos. 😉', '😍 🥰 DAS BABY IST DA!!! 😍 🥰 Du darfst dich jetzt freuen. Du bekommst sicher bald ein Foto gesedet. Aber halte solange die Füße still. ☺️', 'Yeah! 🐣 Jetzt ist das Baby da. Aber ' . $" . "first_name . ', bitte jetzt noch Ruhe bewahren, du bekommst sicher bald mehr Infomationen. Also bitte nicht gleich die Eltern nerven 😀', $" . "first_name . ' du Glückspilz, du gehöst zu den Ersten 🤗 – DAS BABY IST DA! 🥰 Aber schreibe nicht gleich den frischen Eltern, die melden sich sicher bald mit einem Foto.');?>";
// Schreibt den Inhalt in die Datei zurück
file_put_contents($file, $current);
echo "The answers were all successfully set to <i>YES</i>.";
?>
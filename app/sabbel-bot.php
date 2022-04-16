<?php

// "Ist Sabine schon da?" t.me/sabbel_bot

include 'sendMessage.php';
include 'privateToken.php';

$json_out = json_decode(file_get_contents('php://input'), true);
$chat_id = $json_out['message']['chat']['id'];
$first_name = trim(str_replace('?', '', preg_replace('/[^A-Za-z0-9 ]/', '', $json_out['message']['chat']['first_name'])));
$type = $json_out['message']['chat']['type'];
$message = $json_out['message']['text'];
$message_id = $json_out['message']['message_id'];


if (stripos($message, '/start') === 0 && $type == 'private') {
    $sent = true;
    $replyA = true;
    $randomAnswer = array(
        'Moin ' . $first_name . '! Willst du wissen ob das Baby schon da ist?',
        'Hey ' . $first_name . ', du willst jetzt sicher wissen, ob das Baby schon da ist? ☺️',
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
}

$wordsForYes = array(
    'yes',
    'Ja',
    'ja',
    'klar'
);
if (in_array(strtolower($message), $wordsForYes) and !isset($sent) and $replyA = true) {
    $replyA = false;
    $sent = true;
    $randomAnswer = array(
        'Cool das du das wissen willst! 🤪',
        $first_name . ', du bist aber ungeduldig 😉',
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
    sleep(2);
    $sent = true;
    $randomAnswer = array(
        'Aber das Baby ist noch nicht da. Sorry ' . $first_name . '😥',
        'Neee ' . $first_name . ' – dauert noch 😉',
        'Sorry, aber ist noch nicht da 🤷🏾'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
}

$questionsA = array(
    'ist sabbel schon da',
    'ist sabbel schon da?',
    'ist sabine schon da',
    'ist sabine schon da?',
    'ist sabine schon da?',
    'ist sabbel da',
    'ist sabbel da?'
);
if (in_array(strtolower($message), $questionsA) and !isset($sent)) {
    $sent = true;
    $randomAnswer = array(
        'Nein! Sabbel lässt noch auf sich warten. 🥺',
        'Leider noch nicht. Keine Sabine, noch nicht – nur geduld ' . $first_name . '! ☺️',
        'Nö, Sabbel braucht noch etwas Zeit. 🤷🏾'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
}

if (!isset($sent) && $type == 'private') {
    $sent = true;
    $replyA = true;
    $randomAnswer = array(
        'Sorry, aber das habe ich nicht ganz verstanden. Aber du willst sicher wissen, ob das Baby schon da ist? 👶🏽',
        'Deine Eingabe war undeutlich, aber garantiert willst du wissen ob das Baby schon geschlüpft ist, oder? ',
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
}

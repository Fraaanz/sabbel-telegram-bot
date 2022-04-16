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
$baby = 0;

include 'randomMainAnswer.php';

if (stripos($message, '/start') === 0 && $type == 'private') {
    $sent = true;
    $replyA = true;
    $randomAnswer = array(
        'Moin ' . $first_name . '! Willst du wissen ob das Baby schon da ist? 😊',
        'Hey ' . $first_name . ', du willst jetzt sicher wissen, ob das Baby schon da ist? ☺️',
        'Na ' . $first_name . 'bist wohl aufgeregt und willst wissen ob das Baby schon gekommen ist, oder? 😉'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
}

$wordsForYes = array(
    'yes',
    'Ja',
    'ja',
    'klar',
    'ka',
    'genau',
    'Ka',
    'jo',
    'Jo',
    'auf jeden fall',
    'ok',
    'OK',
    'Ok'
);
if (in_array(strtolower($message), $wordsForYes) and !isset($sent) and $replyA = true) {
    $replyA = false;
    $sent = true;
    $randomAnswer = array(
        'Cool das du das wissen willst! 🤪',
        $first_name . ', du bist aber ungeduldig 😉',
        'Also ...'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
    sleep(2);
    $sent = true;
    shuffle($randomMainAnswer);
    sendMessage($bot_id, $chat_id, false, $randomMainAnswer[0]);
    sleep(2);
    if ($baby == 0) {
        $sent = true;
        $randomAnswer = array(
            'Willst du noch mal nach Fragen?',
            'Wenn du willst, dann kannst du dich später noch mal erkundigen, ja?',
            'Wenn du später noch mal schauen willst, dann schreib einfach "ok".'
        );
        shuffle($randomAnswer);
        sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
    }
}

if (!isset($sent) && $type == 'private') {
    $sent = true;
    $replyA = true;
    $randomAnswer = array(
        'Sorry, aber das habe ich nicht ganz verstanden. Aber du willst sicher wissen, ob das Baby schon da ist? 👶🏽',
        'Deine Eingabe war undeutlich, aber garantiert willst du wissen ob das Baby schon geschlüpft ist, oder?',
        'Was meinst du? Du bist doch nur hier, um zu erfahren ob das Baby schon da ist?'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
    sleep(2);
    $sent = true;
    $randomAnswer = array(
        'Antworte einfach mit "ja".',
        $first_name . ' du musst einfach mit "ja" antworten.',
        'Ja oder ja?'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
    sleep(1);
    $sent = true;
    $randomAnswer = array(
        '😉',
        '😜',
        '😁'
    );
    shuffle($randomAnswer);
    sendMessage($bot_id, $chat_id, false, $randomAnswer[0]);
}

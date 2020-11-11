<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 08.04.2018
 * Time: 17:00
 */
/*Установка внутренней кодировки скрипта*/
//mb_internal_encoding("UTF-8");
if (!isset($_REQUEST)) return;
//Получаем и декодируем уведомление
$data = json_decode(file_get_contents('php://input'));
//Подготовливаем ответ Алисе
$answer = array(
    "response" => array(
        "text" => "",
        "tts" => "",
        "buttons" => array(),
    "end_session" => true,
    ),
    "session" => array(
        "session_id" => $data->session->session_id,
        "message_id" => $data->session->message_id,
        "user_id" => $data->session->user_id,
    ),
  "version" => $data->version,
);

/*if (($data->request->command == '1.') ||
    ($data->request->command == 'Раз')||
    ($data->request->command == 'раз')||
    ($data->request->command == 'айнц')||
    ($data->request->command == 'Айнц'))
{
    $answer['response']['text'] = 'Здравствуйте! Вот хороший сайт об этом:';
    $answer['response']['tts'] = 'Здравствуйте! Вот хор+оший сайт об этом:';
    $answer['response']['buttons'][] = array(
        'title' => 'О заработке в интернете',
        'url' => 'https://dawork.ru/',
    );
}
else
{
    $answer['response']['text'] = 'Я ещё только учусь!';
}*/

if (($data->request->command == 'где я живу'))
{
    $answer['response']['text'] = 'Ты живёшь в Петропавловске Казахстане:';
    $answer['response']['tts'] = 'Ты живёшь в Петропавловске Казахстане:';
    $answer['response']['buttons'][] = array(
        'title' => 'Петропавловск',
        'url' => 'https://static.zakon.kz/uploads/posts/2019-09/pic_690/2019092120383631310_1.jpg',
    );
}
else
{
    $answer['response']['text'] = 'Я ещё только учусь!';
}




header('Content-Type: application/json');
echo json_encode($answer);

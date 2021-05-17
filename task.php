<?php

//Предисловие: Привет, проверяющий мои ответы незнакомец) Я первый раз пробую попасть на должность
//программиста PHP и не знаю какие решения хотят видеть на эти задания, поэтому сделал 2 решения, которые отличаются только методом подстановки в строку.
//Спасибо за потраченное на это время.

$test1 = "@storm87 сообщил нам вчера о результатах";
$test2 = "Я живу в одном доме с @300spartans";
$test3 = "Правильный ник: @usernick | неправильный ник: @usernick;";

function highlight_nicknames(string $text): string{ //Вариант 1
    $temp_str_arr = explode(" ", $text);
    foreach ($temp_str_arr as &$temp_str) {
        if (preg_match('/^@[A-Za-z][0-9A-Za-z]{0,}$/', $temp_str)) {
            $temp_str = str_pad($temp_str, strlen($temp_str)+3, "<b>", STR_PAD_LEFT);
            $temp_str = str_pad($temp_str, strlen($temp_str)+4, "<\b>");
        }
    }
    $text = implode(" ", $temp_str_arr);
    return $text ;
}

function highlight_nicknames(string $text): string{ //Вариант 2
    $temp_str_arr = explode(" ", $text);
    $temp_str_arr = preg_replace('/^@[A-Za-z][0-9A-Za-z]{0,}$/', '<b>${0}</b>', $temp_str_arr);
    $text = implode(" ", $temp_str_arr);
    return $text ;
}

echo highlight_nicknames($test1);
echo highlight_nicknames($test2);
echo highlight_nicknames($test3);

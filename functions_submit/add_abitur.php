<?php

require_once("../database_connect/pdo.php");
header('Content-Type: text/html; charset=utf-8');

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$level = $_POST['level'];
$educationalInstitution = $_POST['educationalInstitution'];
$examResult = $_POST['examResult'];
$individualAchievement = $_POST['individualAchievement'];

$statement = $pdo->prepare("INSERT INTO abiturs ( name, surname, patronymic, phone, birthday, level, educationalInstitution, examType, examResult, individualAchievement) VALUES (:name, :surname, :patronymic, :phone, :birthday, :level, :educationalInstitution, :examType, :examResult, :individualAchievement)");

$examType = $_POST['exam_type'];

if( $exam_type == "ege" ) {
    $result = $statement->execute(array('name' => $name, 'surname' => $surname, 
        'patronymic' => $patronymic, 'phone' => $phone, 'birthday' => $birthday, 'level' => $level, 'educationalInstitution' => $educationalInstitution,
        'examType'=> 1, 'examResult' => $examResult, 'individualAchievement' => $individualAchievement
    ));
} else {
    $result = $statement->execute(array('name' => $name, 'surname' => $surname, 
        'patronymic' => $patronymic, 'phone' => $phone, 'birthday' => $birthday, 'level' => $level, 'educationalInstitution' => $educationalInstitution,
        'examType'=> 2, 'examResult' => $examResult, 'individualAchievement' => $individualAchievement
    ));
}

header("location: ../dogovors.php");
exit;

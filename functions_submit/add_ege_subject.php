<?php

require_once("../database_connect/pdo.php");
header('Content-Type: text/html; charset=utf-8');

// Подключение к БД и обработка ошибок
try {
    // Проверка, не пустое ли поле entranceView и сохранение данных в таблицу entrance_exam
    if (!empty($_POST['entranceView'])) {
        $entranceView = $_POST['entranceView'];

        // Подготовка SQL-запроса на добавление данных в таблицу entrance_exam
        $query = "INSERT INTO entrance_exam (name) VALUES (:name)";
        $stmt = $pdo->prepare($query);

        // Привязка параметра (название Вступительного испытания) к значению
        $stmt->bindParam(':name', $entranceView);

        // Выполнение SQL-запроса
        $stmt->execute();
    }

} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

header("location: ../abitur.php");
exit;
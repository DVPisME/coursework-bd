<?php

require_once("../database_connect/pdo.php");
header('Content-Type: text/html; charset=utf-8');

// Подключение к БД и обработка ошибок
try {
    // Проверка, не пустое ли поле entranceView и сохранение данных в таблицу educational_institution
    if (!empty($_POST['nameEducational'])) {
        $nameEducational = $_POST['nameEducational'];

        // Подготовка SQL-запроса на добавление данных в таблицу eeducational_institution
        $query = "INSERT INTO educational_institution (name) VALUES (:name)";
        $stmt = $pdo->prepare($query);

        // Привязка параметра (название Вступительного испытания) к значению
        $stmt->bindParam(':name', $nameEducational);

        // Выполнение SQL-запроса
        $stmt->execute();
    }

} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

header("location: ../abitur.php");
exit;
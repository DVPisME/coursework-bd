<?php

require_once("../database_connect/pdo.php");
header('Content-Type: text/html; charset=utf-8');

// Подключение к БД и обработка ошибок
try {
    // Проверка, не пустое ли поле egeView и сохранение данных в таблицу ege_subjects
    if (!empty($_POST['egeView'])) {
        $egeView = $_POST['egeView'];

        // Подготовка SQL-запроса на добавление данных в таблицу ege_subjects
        $query = "INSERT INTO entrance_exam (name) VALUES (:name)";
        $stmt = $pdo->prepare($query);

        // Привязка параметра (название ЕГЭ) к значению
        $stmt->bindParam(':name', $egeView);

        // Выполнение SQL-запроса
        $stmt->execute();
    }

} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

header("location: ../abitur.php");
exit;
<?php 

require_once("../database_connect/pdo.php");
header('Content-Type: text/html; charset=utf-8');
try {

    $number = $_POST['number'];
    $date = $_POST['date'];
    $abitur_id = $_POST['abitur_id'];
    $specialization = $_POST['specialization'];
    $level = $_POST['level'];
    $formOfEducation = $_POST['formOfEducation'];

    $stmt = $pdo->prepare("INSERT INTO dogovors (number, date, abitur_id, specialization, level, formOfEducation) VALUES (:number, :date, :abitur_id, :specialization, :level, :formOfEducation)");
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':abitur_id', $abitur_id);
    $stmt->bindParam(':specialization', $specialization);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':formOfEducation', $formOfEducation);

    $stmt->execute();

    echo "Dogovor added successfully";
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  header("location: ../all_abitur.php");
  exit;
?>
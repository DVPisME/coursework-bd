<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="js/tailwind.js"></script>
    <title>Ввод данных абитуриента</title>
</head>

<body>

    <?php
    include("inc/header.php");
    include("database_connect/pdo.php");
    ?>

    <div class="w-[96%] overflow-x-auto mx-auto px-10 mt-6">
        <table class="table w-full">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-3 text-left">#</th>
                    <th class="py-2 px-3 text-left">Фамилия</th>
                    <th class="py-2 px-3 text-left">Имя</th>
                    <th class="py-2 px-3 text-left">Отчество</th>
                    <th class="py-2 px-3 text-left">Дата рождения</th>
                    <th class="py-2 px-3 text-left">Уровень образования</th>
                    <th class="py-2 px-3 text-left">Вид испытания</th>
                    <th class="py-2 px-3 text-left">Результат испытания</th>
                    <th class="py-2 px-3 text-left">Номер договора</th>
                    <th class="py-2 px-3 text-left">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->prepare("SELECT A.id, A.surname, A.name, A.patronymic,
                 A.birthday, A.level, E.name AS examType, A.examResult,
                  D.number FROM abiturs A INNER JOIN dogovors D ON A.id = D.abitur_id INNER JOIN entrance_exam_type E ON A.examType = E.id");
                $stmt->execute();
                $i = 1; 
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr class="hover:bg-gray-100">';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $i . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['surname'] . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['name'] . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['patronymic'] . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['birthday'] . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['level'] . '</td>';
                    if($row['examType'] = "entrance"){
                        echo '<td class="py-2 px-3 border-b border-gray-200">Вступительное испытание</td>';
                    } else {
                        echo '<td class="py-2 px-3 border-b border-gray-200">ЕГЭ</td>';
                    }
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['examResult'] . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">' . $row['number'] . '</td>';
                    echo '<td class="py-2 px-3 border-b border-gray-200">';
                    echo '<a href="?delete=' . $row['id'] . '" class="bg-red-500 hover:bg-red-700 text-white cursor-pointer font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">';
                    echo 'Удалить';
                    echo '</a>';
                    echo '</td>';
                    echo '</tr>';
                    $i++; 
                }

                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $pdo->beginTransaction(); // начать транзакцию
                    try {
                        // удалить связанные записи из таблицы dogovors
                        $stmt =  $pdo->prepare("DELETE FROM dogovors WHERE abitur_id = :id");
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                
                        // удалить запись из таблицы abturs
                        $stmt =  $pdo->prepare("DELETE FROM abiturs WHERE id = :id");
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                
                        $pdo->commit(); // подтвердить транзакцию
                        header('Location: all_abitur.php'); // перезагрузить страницу после удаления
                    } catch (PDOException $e) {
                        $pdo->rollback(); // отменить транзакцию в случае ошибки
                        echo "Error: " . $e->getMessage();
                    }
                }

                ?>
            </tbody>

        </table>
    </div>

</body>

</html>
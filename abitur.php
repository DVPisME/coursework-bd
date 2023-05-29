<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="js/tailwind.js"></script>
    <title>Ввод данных абитуриента</title>
</head>

<body>

    <?php
    include("database_connect/pdo.php");
    include("inc/header.php");
    ?>

    <div class="container mx-auto px-10 mt-6">

        <form action="functions_submit/add_abitur.php" method="post">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="surname" id="surname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="surname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Фамилия</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Имя</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="patronymic" id="patronymic" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="patronymic" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Отчество </label>
            </div>
            <!-- Телефон - Дата рождения -->
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="tel" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Номер телефона</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="date" name="birthday" id="birthday" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="birthday" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Дата рождения</label>
                </div>
            </div>

            <!-- Уровень образования - Бывшее учебное заведение -->
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="level" id="level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="level" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Уровень образования</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <?php
                    // Подготовка запроса на выборку всех записей из таблицы educational_institution
                        $query = "SELECT name FROM educational_institution";
                        $stmt = $pdo->query($query);

                        // Вывод элемента select и его опций со значениями из таблицы
                        echo '<select name="educationalInstitution" id="educationalInstitution" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>';
                        echo '<option value="" disabled selected>Выберите бывшее учебное заведение:</option>';
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                        }
                        echo '</select>';
                    ?>
                    <label for="educationalInstitution" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Вступительное испытание</label>
                </div>
            </div>
            <!-- Вид испытания - Результат -->
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-6"></div>
                <div class="flex items-center space-x-4 mb-6">
                    <p class="text-black-800 dark:text-black-200">Выберите вид вступительного испытания:</p>
                    <div class="flex items-center space-x-4">
                        <div class="relative flex items-center">
                            <input type="radio" name="exam_type" id="ege" value="ege" class="peer h-5 w-5 text-blue-600 cursor-pointer dark:text-blue-500 focus:outline-none" required /> <label for="ege" class="peer-checked:bg-blue-600 peer-checked:text-white dark:peer-checked:bg-blue-500 peer-checked:border-transparent peer-checked:text-white peer-hover:border-blue-600 peer-checked:shadow-md peer-checked:text-white peer-focus:outline-none cursor-pointer font-medium text-gray-600 dark:text-gray-400 ml-2 duration-300">ЕГЭ</label>
                        </div>
                        <div class="relative flex items-center">
                            <input type="radio" name="exam_type" id="entrance" value="entrance" class="peer h-5 w-5 text-blue-600 cursor-pointer dark:text-blue-500 focus:outline-none" required /> <label for="entrance" class="peer-checked:bg-blue-600 peer-checked:text-white dark:peer-checked:bg-blue-500 peer-checked:border-transparent peer-checked:text-white peer-hover:border-blue-600 peer-checked:shadow-md peer-checked:text-white peer-focus:outline-none cursor-pointer font-medium text-gray-600 dark:text-gray-400 ml-2 duration-300">Вступительное испытание</label>
                        </div>
                    </div>
                </div>
                <?php
                    $query = "SELECT name FROM ege_subjects";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    echo '<div class="relative z-0 w-full mb-6 group hidden" id="ege_subjects">';
                    echo '<select name="ege_subject" id="ege_subject" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">';
                    echo '<option value="" disabled selected>Выберите предмет ЕГЭ</option>';
                    foreach ($results as $row) {
                        echo "<option value='{$row['name']}'>{$row['name']}</option>";
                    }
                    echo '</select>';
                    echo '<label for="ege_subject" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Выберите предмет ЕГЭ</label>';
                    echo '</div>';
                ?>

                <?php
                    $query = "SELECT name FROM entrance_exam";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<div class="relative z-0 w-full mb-6 group hidden" id="entrance_exam">';
                    echo '<select name="entrance_exam" id="entrance_exam" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">';
                    echo '<option value="" disabled selected>Выберите вид вступительного испытания</option>';
                    foreach ($results as $row) {
                        echo "<option value='{$row['name']}'>{$row['name']}</option>";
                    }
                    echo '</select>';
                    echo '<label for="entrance_exam" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Выберите вид вступительного испытания</label>';
                    echo '</div>';
                ?>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="examResult" id="examResult" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="examResult" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Результат вступительного испытания</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="individualAchievement" id="individualAchievement" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="individualAchievement" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Индивидуальное достижение</label>
            </div>
            <button type="submit" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submitAbitur">Записать</button>
        </form>

    </div>
    <script>
        const egeSubjects = document.getElementById('ege_subjects');
        const entranceExam = document.getElementById('entrance_exam');
        const egeRadio = document.getElementById('ege');
        egeRadio.addEventListener('click', () => {
            egeSubjects.classList.remove('hidden');
            entranceExam.classList.add('hidden');
        });

        const entranceRadio = document.getElementById('entrance');
        entranceRadio.addEventListener('click', () => {
            egeSubjects.classList.add('hidden');
            entranceExam.classList.remove('hidden');
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="js/tailwind.js"></script>
    <title>Ввод дополнительных данных</title>
</head>

<body>

    <?php include("inc/header.php"); ?>

    <div class="w-11/12 mx-auto mx-auto px-10 mt-6">
        <!-- Заносим в таблицу данные о ЕГЭ -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="functions_submit/add_ege_subject.php" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="egeView"> ЕГЭ </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="egeView" id="egeView" type="text" placeholder="Введите вид ЕГЭ">
            </div>
            <div class="flex items-center justify-between mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="egeViewSubmit"> Сохранить </button>
            </div>
        </form>
        <!-- Заносим в таблицу данные о Вступительном испытании -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="functions_submit/add_entrance_exam.php" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="entranceView"> Вступительное испытание </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="entranceView" name="entranceView" type="text" placeholder="Введите вид Вступительного испытания">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="entranceViewSubmit"> Сохранить </button>
            </div>
        </form>
        <!-- Заносим в таблицу данные о Названии бывшего учебного заведения -->
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="functions_submit/add_educational_institution.php" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nameEducational"> Название учебного заведения </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameEducational" name="nameEducational" type="text" placeholder="Введите название учебного заведения">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="nameEducationalSubmit"> Сохранить </button>
            </div>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/css/style.css">
</head>
<body>
    <section class="welcome-block">
        <div class="welcome-items">
            <h2>Добрый день, <?= $user ? htmlspecialchars($user->full_name) : 'Гость' ?>!</h2>
            <p>Текущий семестр: Осень 2026 | Курс: 3</p>
        </div>
        <img src="/pop-it-mvc/public/image/mascot.png">
    </section>

    <section class="statistic-block">
        <div class="text-stats">
            <h4><?= $stats['students'] ?>+</h4>
            <p>студентов</p>
        </div>
        <div class="text-stats">
            <h4><?= $stats['groups'] ?>+</h4>
            <p>групп</p>
        </div>
        <div class="text-stats">
            <h4><?= $stats['disciplines'] ?>+</h4>
            <p>дисциплин</p>
        </div>
        <div class="text-stats">
            <h4>4.2</h4>
            <p>Средний GPA</p>
        </div>
    </section>
    <section class="quick-action">
        <a href="/students/create" class="card-link">
            <div class="card">
            <span>+</span>
            <p>Добавить студента</p>
        </div>
        </a>
        <a href="/groups/create" class="card-link">
            <div class="card">
            <span>+</span>
            <p>Добавить группу</p>
        </div>
        </a>
        <a href="/disciplines/create" class="card-link">
            <div class="card">
            <span>+</span>
            <p>Добавить дисциплину</p>
        </div>
        </a>
        <a href="/grades/create" class="card-link">
            <div class="card">
            <span>+</span>
            <p>Внести оценки</p>
        </div>
        </a>
    </section>
</body>
</html>
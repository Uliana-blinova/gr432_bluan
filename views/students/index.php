<h1>Список студентов</h1>

<a href="/students/create">Добавить студента</a>

<table>
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Группа</th>
            <th>Дата рождения</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student->full_name ?></td>
            <td><?= $student->group->name ?? 'Не распределен' ?></td>
            <td><?= $student->birth_date ?></td>
            <td>
                <a href="/students/<?= $student->student_id ?>">Просмотр</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
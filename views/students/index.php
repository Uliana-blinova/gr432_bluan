<section class="all-students">
    <div class="add-student">
        <h1>Список студентов</h1>
        <a href="students/create">Добавить студента</a>
    </div>
    <section class="table-students">
        <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Группа</th>
                <th>Дата рождения</th>
                <th>Пол</th>
                <th>Адрес</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student->full_name ?></td>
                <td><?= $student->group->name ?? 'Не распределен' ?></td>
                <td><?= $student->birth_date ?></td>
                <td><?= $student->gender ?></td>
                <td><?= $student->address ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
</section>
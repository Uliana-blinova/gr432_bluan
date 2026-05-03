<section class="all-students">
    <div class="add-student">
        <h1>Успеваемость студентов</h1>
        <a href="/students/create">Добавить студента</a>
    </div>
    <section class="table-students">
        <table>
        <thead>
            <tr>
                <th>Студент</th>
                <th>Группа</th>
                <th>Дисциплина</th>
                <th>Оценка</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grades as $grade): ?>
            <tr>
                <td><?= htmlspecialchars($grade->student->full_name) ?></td>
                <td><?= htmlspecialchars($grade->student->group->name ?? '-') ?></td>
                <td><?= htmlspecialchars($grade->discipline->name) ?></td>
                <td><?= $grade->grade_value ?></td>
                <td><?= date('d.m.Y', strtotime($grade->date_recorded)) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
</section>
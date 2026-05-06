<section class="all-students">
    <div class="add-student">
        <h1>Учебный план</h1>
        <a href="studyplan/create">+ Добавить в план</a>
    </div>
    <section class="table-students">
        <table>
        <thead>
            <tr>
                <th>Группа</th>
                <th>Дисциплина</th>
                <th>Курс</th>
                <th>Семестр</th>
                <th>Часов</th>
                <th>Контроль</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plans as $plan): ?>
            <tr>
                <td><?= htmlspecialchars($plan->group->name) ?></td>
                <td><?= htmlspecialchars($plan->discipline->name) ?></td>
                <td><?= $plan->course_num ?></td>
                <td><?= $plan->semester_num ?></td>
                <td><?= $plan->total_hours ?></td>
                <td><?= $plan->control_type ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
</section>
<section class="all-students">
    <div class="add-student">
        <h1>Список групп</h1>
        <a href="/groups/create">Добавить группу</a>
    </div>
    <section class="table-students">
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Группа</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= $group->group_id ?></td>
                <td><?= $student->group->name ?? 'Не распределен' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
</section>
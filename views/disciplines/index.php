<section class="all-students">
    <div class="add-student">
        <h1>Список дисциплин</h1>
        <a href="/groups/create">Добавить дисциплину</a>
    </div>
    <section class="table-students">
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Дисциплина</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disciplines as $discipline): ?>
            <tr>
                <td><?= $discipline->discipline_id ?></td>
                <td><?= $discipline->name ?? 'Не распределен' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
</section>        
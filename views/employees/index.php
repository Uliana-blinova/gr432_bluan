<h1>Сотрудники деканата</h1>
    
    <a href="/employees/create">+ Добавить сотрудника</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Логин</th>
                <th>Роль</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($employees)): ?>
                <tr>
                    <td>Сотрудников нет</td>
                </tr>
            <?php else: ?>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= $employee->user_id ?></td>
                        <td><?= htmlspecialchars($employee->full_name) ?></td>
                        <td><?= htmlspecialchars($employee->login) ?></td>
                        <td><?= $employee->role === 'dean' ? 'Сотрудник деканата' : $employee->role ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    
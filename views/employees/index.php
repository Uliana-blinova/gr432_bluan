<section class="all-students">
    <div class="add-student">
        <h1>Сотрудники деканата</h1>
        <a href="/employees/create">+ Добавить сотрудника</a>
    </div>
    <section class="table-students">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
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
                        <td>
                            <?php if(app()->auth::user()->role === 'admin'):  ?>
                                <select id="<?= $employee->user_id ?>">
                                    <option  <?= $employee->role === 'dean' ? 'selected' : "" ?> value="dean">Сотруник деканата</option>
                                    <option  <?= $employee->role === 'admin' ? 'selected' : "" ?> value="admin">Администратор</option>
                                </select>
                            <?php else:  ?>
                            <?= $employee->role === 'dean' ? 'Сотрудник деканата' : $employee->role ?></td>
                        <?php endif ?> 
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
   <script src="js/employees.js?<?= time() ?>"></script>   
    </section>
</section>
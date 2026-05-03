<form action="pop-it-mvc/studyplan/store" method="POST" class="student-form">
    <h1>Добавить дисциплину в учебный план</h1>
    <div class="form-group">
        <label>Группа</label>
        <select name="group_id" required>
            <option value="">Выберите группу</option>
            <?php foreach ($groups as $group): ?>
                <option value="<?= $group->group_id ?>"><?= htmlspecialchars($group->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Дисциплина</label>
        <select name="discipline_id" required>
            <option value="">Выберите дисциплину</option>
            <?php foreach ($disciplines as $discipline): ?>
                <option value="<?= $discipline->discipline_id ?>"><?= htmlspecialchars($discipline->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Курс</label>
        <input type="number" name="course_num" min="1" max="6" required class="form-input">
    </div>
    
    <div class="form-group">
        <label>Семестр</label>
        <input type="number" name="semester_num" min="1" max="12" required class="form-input">
    </div>
    
    <div class="form-group">
        <label>Всего часов</label>
        <input type="number" name="total_hours" min="1" required class="form-input">
    </div>
    
    <div class="form-group">
        <label>Вид контроля</label>
        <select name="control_type" required>
            <option value="зачет">Зачет</option>
            <option value="экзамен">Экзамен</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="button">Сохранить</button>
    </div>
</form>
</form>
<form action="store" method="POST" class="student-form">
    <h1>Выставить оценку студенту</h1>
    <div class="form-group">
        <label>Студент</label>
        <select name="student_id" required>
            <option value="">Выберите студента</option>
            <?php foreach ($students as $student): ?>
                <option value="<?= $student->student_id ?>">
                    <?= htmlspecialchars($student->full_name) ?> (<?= htmlspecialchars($student->group->name ?? '-') ?>)
                </option>
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
        <label>Оценка</label>
        <input type="number" name="grade_value" min="2" max="5" required class="form-input">
        <small>2 - неудовлетворительно, 3 - удовлетворительно, 4 - хорошо, 5 - отлично</small>
    </div>
    <div class="form-group">
        <label>Дата</label>
        <input type="date" name="date_recorded" value="<?= date('Y-m-d') ?>" required class="form-input">
    </div>
    <div class="form-group">
        <button type="submit" class="button">Сохранить</button>
    </div>
</form>
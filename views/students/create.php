<form action="store" method="POST" class="student-form">
    <h1>Добавление студента</h1>
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <div class="form-group">
        <input type="text" name="surname" placeholder="Фамилия" class="form-input" required>
    </div>
    
    <div class="form-group">
        <input type="text" name="name" placeholder="Имя" class="form-input" required>
    </div>
    
    <div class="form-group">
        <input type="text" name="patronymic" placeholder="Отчество" class="form-input">
    </div>
    
    <div class="form-group">
        <select name="group_id" class="form-select">
            <option value="" disabled selected>Выберите группу</option>
            <?php foreach ($groups as $group): ?>
                <option value="<?= $group->group_id ?>"><?= htmlspecialchars($group->name) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    
    <div class="form-group">
        <label class="form-label">Пол</label>
        <div class="radio-group">
            <label class="radio-label">
                <input type="radio" name="gender" value="male" class="radio-input">
                <span class="radio-custom">Мужской</span>
            </label>
            <label class="radio-label">
                <input type="radio" name="gender" value="female" class="radio-input">
                <span class="radio-custom">Женский</span>
            </label>
        </div>
    </div>
    
    <div class="form-group">
        <input type="text" name="address" placeholder="Адрес" class="form-input">
    </div>
    
    <div class="form-group">
        <label class="form-label">Дата рождения</label>
        <input type="date" name="birth_date" class="form-input">
    </div>
    
    <div class="form-group">
        <button type="submit" class="button">Сохранить</button>
    </div>
</form>
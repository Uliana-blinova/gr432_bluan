<form method="post" class="form-group">
    <h2>Регистрация</h2>
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    
    <?php if (!empty($errors)): ?>
        <div class="error-messages">
            <?php foreach ($errors as $field => $fieldErrors): ?>
                <?php foreach ($fieldErrors as $error): ?>
                    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <label>
        ФИО 
        <input type="text" name="full_name" value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>">
    </label>
    
    <label>
        Логин 
        <input type="text" name="login" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
    </label>
    
    <label>
        Пароль 
        <input type="password" name="password">
    </label>
    
    <button>Зарегистрироваться</button>
</form>
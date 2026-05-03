<form action="/pop-it-mvc/employees/store" method="POST" class="student-form">
    <h1>Добавление сотрудника</h1>
    <div class="form-group">
        <input type="text" name="full_name" placeholder="ФИО" required>
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="hidden" name="role" value="dean">
        <button type="submit" value="Сохранить">Сохранить</button>
    </div>
</form>
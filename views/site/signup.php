<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <h2>Регистрация</h2>
   <label>ФИО <input type="text" name="full_name"></label>
   <label>Логин <input type="text" name="login"></label>
   <label>Пароль <input type="password" name="password"></label>
   <button>Зарегистрироваться</button>
</form>

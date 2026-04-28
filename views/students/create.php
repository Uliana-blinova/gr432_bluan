<h1>Добавление студента</h1>
<form action="http://localhost/pop-it-mvc/students/store" method="POST">
    <input type="text" name="surname" placeholder="Фамилия">
    <input type="text" name="name" placeholder="Имя">
    <input type="text" name="patronymic" placeholder="Отчество">
    <select name="group_id">
        <option></option>
        <?php foreach ($groups as $group): ?>
            <option value="<?= $group->group_id ?>"><?=$group->name?></option>
            <?php endforeach ?>
    </select>
    <label for="M"> 
        <input type="radio" name="gender" id="M" value="male">Мужской
    </label>
    <label for="W"> 
        <input type="radio" name="gender" id="W" value="female">Женский
    </label>
    <input type="text" name="address" placeholder="Адрес">
    <label>Дата рождения</label>
    <input type="date" name="birth_date">
    <input type="submit" value="Сохранить">
</form>
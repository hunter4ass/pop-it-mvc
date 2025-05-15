<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post" action="/register">
  <label>Email <input type="text" name="email"></label><br>
  <label>Пароль <input type="password" name="password"></label><br>
  <button type="submit">Зарегистрироваться</button>
</form>

<?php 

require 'db.php';
			$data = $_POST;
			if( isset($data['do_login']) )
			{
				$errors = array();
				$user = R::findOne('users', 'login = ?', array($data['login']));
				if( $user )
				{
					#логин существует
					if( password_verify($data['password'], $user->password))
					{
					$_SESSION['logged_user'] = $user;
					echo '<div style="color:green;">Вы авторизованы<br/>
					Можете перейти на страницу <a href="admin.php">сотрудников</a> </div><hr>';
					} else
					{
						$errors[] = 'Неверный пароль';
					}
				} else
				{
					$errors[] = '<div style="color:red;">Пользователь не найден</div>';
				}
				if( ! empty($errors) )
				{
					echo '<div>'.array_shift($errors).'</div><hr>';
				}

			}
 
?>


<form action="login.php" method="POST">
	
<p>
	<p><strong>логин</strong>:</p>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>">
</p>
<p>
	<p><strong>Ваш пароль</strong>:</p>
	<input type="password" name="password">
</p>
	<button type="submit" name="do_login" value="<?php echo @$data['password']; ?>"> Войти</button>
</p>

</form>
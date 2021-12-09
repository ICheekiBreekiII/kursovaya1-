<?php
	require 'db.php';
			$data = $_POST;
			if( isset($data['do_signup']) )
			{

				$errors = array();
				if( trim($data['number']) == '' )
				{
					$errors[] = 'Введите логин!'; 
				}

				if(R::count('phones', "number = ?", array($data['number'])) > 0 )
				{
					$errors[] = 'Пользователь с таким номером уже существует!';
				}
				
				if( empty($errors) )
				{
					$user = R:: dispense('phones');
					$user ->number = $data['number'];
					
					R::store($user);
					echo '<div style="color: green;">Вы успешно пошли нахуй</div><hr>';


				} else
				{
					echo '<div>'.array_shift($errors).'</div><hr>';
				}

			}
		?>

<form action="numer.php" method="POST">
	
<p>
	<input type="text" name="number" value="<?php echo @$data['number']; ?>">
</p>


<p>
	<button type="submit" name="do_signup"> Зарегистрироваться</button>
</p>

</form>
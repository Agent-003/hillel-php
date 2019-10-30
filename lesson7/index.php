<?php
/*
 * ------------------ Практика по работе с наследованием, абстрактными классами и интерфейсами -------------------------
 */

/*
1) Создайте абстрактный класс User который содержит абстрактный метод getRole() который должен выводить роль пользователя,
например admin, viewer, moderator и тд.
Создайте классы Admin, Viewer, Moderator, которые наследуют класс User и реализуйте абстрактныей метод getRole() который
будет возвращать роль пользователя (подсказка имя класса == имени роли в нижнем регистре).

Так же позаботьтеся о методах которые будут получать и сохранять информацию о пользователе.

Не забудьте о модификаторах доступа, а так же о силе наследования.
*/

abstract class User
{
	public $data=[];

	abstract public function getRole();

	public function __set($name, $value)
	{
		$this->data[$name] = $value;

		if (!isset($this->date['role'])) {
			$this->data['role']= $this->getRole();
		}
	}
}

class Admin extends User
{
	public function getRole()
	{
		return mb_strtolower(__CLASS__);
	}
}

class Viewer extends User
{
	public function getRole()
	{
		return mb_strtolower(__CLASS__);
	}
}

class Moderator extends User
{
	public function getRole()
	{
		return mb_strtolower(__CLASS__);
	}
}

$admin=new Admin();
$admin->getRole();
$admin->login="sysadmin";
$admin->pass="password";
var_dump($admin);

$viewer=new Viewer();
echo $viewer->getRole();
$viewer->login="userrrr";
$viewer->pass="password";
var_dump($viewer);

$moderator=new Moderator();
echo $moderator->getRole();
$moderator->login="modeeer";
$moderator->pass="password";
var_dump($moderator);

/*
 *
2) Спроектируйте классы и интерфейсы, который будут описывать транспортные средства. Например:
а) автомобиль движется за счет мотора, имеет 4 колеса
б) велосипед использует мускульную силу, имеет два колеса
в) танк движется за счет мотора, имеет две гусеницы и умеет стрелять

В итоге вызов вашего класса может иметь следующий вызов.

$car = new Car();

echo $car->getWheelCount(); 	// вернет количество колес
echo $car->getDoorsCount(); 	// вернет количество дверей
echo $car->getMotorType(); 		// вернет тип двигателя: мотор или мускулы
echo $car->accelerate(10); 		// установить скорость 10 км/ч
echo $car->decelerate(5); 		// уменьшить скорость до 5 км/ч

$bike = new Bike();

echo $bike->getWheelCount(); 	// вернет количество колес
echo $bike->getMotorType(); 	// вернет тип двигателя: мотор или мускулы
echo $bike->accelerate(10); 	// установить скорость 10 км/ч
echo $bike->decelerate(5); 		// уменьшить скорость до 5 км/ч

$tank = new Tank();

echo $tank->getСaterpillar(); 	// вернет количество траков гусеницы
echo $tank->getMotorType(); 	// вернет тип двигателя: мотор или мускулы
echo $tank->accelerate(10); 	// установить скорость 10 км/ч
echo $tank->decelerate(5); 		// уменьшить скорость до 5 км/ч
echo $tank->fire(); 			// сделать выстрел, "Бах"

Вы так же можете добавить методы или изменить как вам угодно
 */

interface Transport
{
	public function accelerate($speed);
	public function decelerate($speedReduction);
	public function getMotorType();
	public function getWheelCount();
}

class AllTransports implements Transport {

	public $speed;
	public $caterpillar=null;

	public function accelerate($speed = NULL)
	{
		return $this->speed=$speed;
	}

	public function decelerate($speedReduction = NULL)
	{
		return $this->speed - $speedReduction;
	}

	public function getMotorType()
	{
		return 'Тип двигателя : ' . $this->motor;
	}

	function getWheelCount()
	{
		return 'Количество колес : ' . $this->wheel;
	}

	public function getСaterpillar()
	{
		if($this->caterpillar==NULL) {
			return 'Нет траков гусеницы , но есть коллеса.'.$this->getWheelCount();
		} else {
			return 'Количество траков гусеницы : ' . $this->caterpillar;
		}
	}
}

class Car extends AllTransports implements Transport {

	public $doors=4;
	public $motor='Мотор';
	public $wheel=4;

	function getDoorsCount()
	{
		return 'Количество дверей : ' . $this->wheel;
	}
}

class Bike extends AllTransports implements Transport
{
	public $doors=2;
	public $motor='Мускул';
	public $wheel=4;
}

class Tank extends AllTransports implements Transport
{

	public $caterpillar=2;
	public $motor='Мотор';

	public function fire() {
		return 'Бах';
	}
}

$car = new Car();
echo $car->getWheelCount(); 	// вернет количество колес
echo $car->getDoorsCount(); 	// вернет количество дверей
echo $car->getMotorType(); 		// вернет тип двигателя: мотор или мускулы
echo $car->accelerate(10);		// установить скорость 10 км/ч
echo $car->decelerate(5); 		// уменьшить скорость до 5 км/ч
echo $car->getСaterpillar();

$bike = new Bike();
echo $bike->getWheelCount(); 	// вернет количество колес
echo $bike->getMotorType(); 	// вернет тип двигателя: мотор или мускулы
echo $bike->accelerate(10); 	// установить скорость 10 км/ч
echo $bike->decelerate(5); 		// уменьшить скорость до 5 км/ч


$tank = new Tank();
echo $tank->fire(); 			// сделать выстрел, "Бах"
echo $tank->getСaterpillar(); 	// вернет количество траков гусеницы
echo $tank->getMotorType(); 	// вернет тип двигателя: мотор или мускулы
echo $tank->accelerate(10); 	// установить скорость 10 км/ч
echo $tank->decelerate(5); 		// уменьшить скорость до 5 км/ч
echo $tank->fire(); 			// сделать выстрел, "Бах"

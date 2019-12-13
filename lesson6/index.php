<?php
/*
 * ---------------------------------------- Домашнее задание 5 ----------------------------------------
 *
 * ДЗ. Базовые навыки ООП
 * 1. Создайте класс Into и реализуйте метод getClassName() который должен вывести имя класса в
 * котором вызывается метода, используйте магическую константу для получения имени класса.
 * */

class Into
{
	function getClassName()
	{
		return __CLASS__;
	}
}

$class = new Into;
echo($class->getClassName());

/* ---------------------------------------------------------------------------------------------------------------------
 *  2. Создайте класс Math и реализйте методо calcFactorial($number) который будет расчитывать
 *  факториал целых чисел.
 *
 * 3. Дополните класс Math из предыдущего задание и реализуйте метод для простого калькулятора.
 */
class Math
{
	function calcFactorial($number)
	{
		if($number > 0) {
			$factorial = 1;

			for($i = 1; $i <= $number; $i++) {
				$factorial = $factorial * $i;
			}
			return " n = $number ; факториал натурального числа n = $factorial \n";
		} else {
			return "n = $number - не натуральное число \n";
		}

	}

	function calculatorNew($type, ...$arg)
	{
		$result = (float)'';
		switch($type) {
			case 'sum':
				for($i = 0; $i < count($arg); $i++) {
					$result += $arg[$i];
				}
				return $result;
				break;
			case 'subtract';
				for($i = 0; $i < count($arg); $i++) {
					$result -= $arg[$i];
				}
				return $result;
				break;
			case 'multiply':
				for($i = 0; $i < count($arg); $i++) {
					$result *= $arg[$i];
				}
				return $result;
				break;
			case 'divide';
				$result = $arg[0];
				for($i = 1; $i < count($arg); $i++) {
					if($i > 0 && $arg[$i]==0) {
						return "Error , arg$i = 0. Деление на 0";
					} else {
						$result = $result / $arg[$i];
					}
				}
				return $result;
				break;
		}
	}
}

$calc = new Math;

echo "<br> \n";
echo $calc->calcFactorial(4);
echo "<br> \n";
echo $calc->calcFactorial(6);
echo "<br> \n";
echo $calc->calculatorNew('sum', 5, 3, 2);
echo "<br> \n";
echo $calc->calculatorNew('divide', 12, 3, 2);
echo "<br> \n";
echo $calc->calculatorNew('divide', 12, 3, 2, 0);
echo "<br> \n";

/* ---------------------------------------------------------------------------------------------------------------------
 * 4. Создайте класс который будет принимать массив целых чисел при создании объекта класса и
 * сортировать их (можно использовать PHPешный sort()), так же создайте свойсвтво где этот массив
 *  будет хранится и метод для получения этого свойства.
 */
class Sorting
{
	public $sortedArray=[];

	public function __construct(array $arrayNumbers)
	{
		$this->sortedArray=$arrayNumbers;
		sort($this->sortedArray);
	}

	public function getArray(){
		return $this->sortedArray;
	}
}

$arr=new Sorting([1,5,5,6,7,3,82,24,51]);
var_dump($arr->getArray());



/* ---------------------------------------------------------------------------------------------------------------------
 * 5. Создайте класс Accounting (например часть бухгальерской программы) и реализуйте следующий
 * функционал:
 * - метод для получения данных о пользователе, например ФИО, номер счета, сколько начисленно,
 * сколько вычтенно налогов и т.д.( на ваше усмотрение), данные должны быть представленны в массиве;
 * - метод для добавление новых записей в массив с данными о пользователе;
 * - метод для удаление записи о пользователе;
 * - метод для редактирования записи о пользователе;
 * - метод который считает количество налогов которые будут вычтенны из ЗП.
 */

class Accounting
{
	public $data=[];

	private const TAX = 0.195;

	// метод для добавление новых записей в массив с данными о пользователе
	public function addNewUserData($key,$value)
	{
		if(!isset($this->data[$key])) {
			$this->data[$key]=$value;
			echo "Запись $key - добавлена";
		} else {
			echo "Запись $key - уже существует";
		}
	}

	// Или использовать метод для добавление новых записей в массив с данными о пользователе
	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}

	// метод для получения данных о пользователе
	public function getUserData()
	{
		$this->data['taxes']=$this->calculationUserTaxy($this->data['salary']);
		return $this->data;
	}

	// метод для удаление записи о пользователе
	public function deleteUserData($key)
	{
		if(isset($this->data[$key])) {
			unset($this->data[$key]);
			echo "Запись $key - удалена";
		} else {
			echo "Запись $key - не найдена";
		}
	}

	// метод для редактирования записи о пользователе
	public function editUserData($key,$value)
	{
		if(isset($this->data[$key])) {
			$this->data[$key]=$value;
			echo "Запись $key - отредактирована";
		} else {
			echo "Запись $key - не найдена";
		}
	}

	// метод который считает количество налогов которые будут вычтенны из ЗП
	public function calculationUserTaxy($salary)
	{
		$taxes = $salary * self::TAX;
		return $taxes;
	}

}

$acc=new Accounting();
$acc->fio="Иванов Петр Васильевич";
$acc->billNimber="1111 2222 4444 3333";
$acc->salary=6000;
$acc->deleteUserData(fiоо);
$acc->editUserData('fio', 'bla-vvlvl');
$acc->addNewUserData('identification_number','11111111');
var_dump($acc->getUserData());

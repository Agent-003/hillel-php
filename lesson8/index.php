<?php
/* ---------------------------  * Практика по работе с исключениями и магическими методами -------------------------- */

/*
1) Напишите класс который с помощью магических методов будет делать манипуляции над строками.

Вызов класса должен быть следующий:
$stringFormater = new StringFormater();
$stringFormater->name = 'uSeRnaMe';
echo $stringFormater->name;		// вывести USERNAME
*/


class StringFormater
{
	protected $values = [];

	public function __get($key)
	{
		return strtoupper($this->values[$key]);
	}

	public function __set($key, $value)
	{
		$this->values[$key] = $value;
	}
}

$stringFormater = new StringFormater();
$stringFormater->name = 'uSeRnaMe';
echo $stringFormater->name;

echo "<br>";
echo "<hr>";
echo "<br>";
/*
2) Напишите класс который умеет заменять в строке пробелы на знак +, а строку приводить в нижний регистр . Вызов должен
быть следующий:

$concatenated = Concatenator::prepareString('I am concatenated');
echo $concatenated; // i+am+concatenated
*/

class Concatenator {

	public static function prepareString($string)
	{
		$string=strtolower ($string);
		$string=str_replace(' ','+',$string);
		return $string;
	}
}

$concatenated = Concatenator::prepareString('I am concatenated');
echo $concatenated;

echo "<br>";
echo "<hr>";
echo "<br>";

/*
3) Напишите класс который будет фильтровать массив путем удаления его элементов. Только с использованием магических
методов! Вызов класса будет такой:

$filter = new Filter(['f', 2, 't', 7, 2, 'k']);
$filter->getNumbers(); //[2,7,2]
$filter->getStrings(); // ['f', 't', 'k']
*/


class Filter
{
	protected $numbers = [];
	protected $strings = [];

	public function __construct($data)
	{
		foreach($data as $value){
			if(is_string($value)){
				$this->strings[]=$value;
			} else {
				$this->numbers[]=$value;
			}
		}
	}

	public function getNumbers()
	{
		return $this->numbers;
	}

	public function getStrings()
	{
		return $this->strings;
	}

}

$filter = new Filter(['f', 2, 't', 7, 2, 'k']);

var_dump($filter->getNumbers()); 		// [2,7,2]
var_dump($filter->getStrings()); // ['f', 't', 'k']



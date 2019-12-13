<?php
/*
 * 1. Написать функцию для получения первого и последнего элемента массива
 *
 * 2. Дано фрагмент кода
 * $array = [1,2,3,4,5,6,'','','']);
 * $items = implode(',', $array);
 *
 * Написать функцию для удаления последней запятой, т.е результат работы фунции должна быть строка вида "1,2,3,4,5,6"
 *
 * 3. Написать функцию которая будет удалять дубли и пустые значения (0, '', null) из массива
 *
 * 4. Написать функцию для сортировки пузырьком,
 * шпаргалка по алгоритму тут https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0_%D0%BF%D1%83%D0%B7%D1%8B%D1%80%D1%8C%D0%BA%D0%BE%D0%BC
 */

// 1. Написать функцию для получения первого и последнего элемента массива

$arr = [0 => 'first',
		1 => 'second',
		2 => 'third',
		3 => 'fourth'];


function getFirstAndLast($array, $flag='first')
{
	if($flag=='first') {
		$key = array_key_first($array);
	} else if($flag = 'last') {
		$key = array_key_last($array);
	}
	return $array[$key];
}

var_dump(getFirstAndLast($arr,'first' ));
var_dump(getFirstAndLast($arr,'last' ));

// 2. Дано фрагмент кода
// $array = [1,2,3,4,5,6,'','','']);
// $items = implode(',', $array);

// Написать функцию для удаления последней запятой, т.е результат работы фунции должна быть строка вида "1,2,3,4,5,6"


$array = [1,2,3,4,5,6,'','',''];


// 3. Написать функцию которая будет удалять дубли и пустые значения (0, '', null) из массива

function cleanArray($array)
{

	foreach($array as $key => $value) {
		echo "----------------------\n";
		var_dump($value);

		if($value===0) {
			echo $value . ' - $key ' . $key . "| ===0 \n";
						unset($array[$key]);
		} else if($value==='') {
			echo $value . ' - $key ' . $key . "| ==='' \n";
			unset($array[$key]);


		} else if(is_null($value)) {
			echo $value . ' - $key ' . $key . "| is_null \n";
			unset($array[$key]);

		} else {
			echo $value . ' - $key ' . $key . "| other \n";
		}
		echo "----------------------\n";
	}
	return $array;

}


$entry = [0 => 'foo',
		  1 => FALSE,
		  2 => -1,
		  3 => NULL,
		  4 => '',
		  5 => '0',
		  6 => 0,];

var_dump($entry);

var_dump(cleanArray($entry));


$entry1 = [0 => 'foo',
		  1 => FALSE,
		  2 => -1,
		  3 => NULL,
		  4 => '',
		  5 => '0',
		  6 => 0,];

//ARRAY_FILTER_USE_BOTH
print_r(array_filter($entry1));
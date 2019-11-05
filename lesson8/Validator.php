<?php

class EmptyStringException extends Exception
{
	public $input;
	public $message = 'Пустая строка';

	public function __construct(string $input)
	{
		$this->input = $input;
		parent::__construct($this->message);
	}

	public function getValueInput()
	{
		return $this->input;
	}
}

class InvalidInputTypeException extends Exception
{
	public $input;
	public $message = 'Данные были введены с неправильным типом';

	public function __construct(string $input)
	{
		$this->input = $input;
		parent::__construct($this->message);
	}

	public function getValueInput()
	{
		return $this->input;
	}
}


class Validator
{
	public $data = [];

	public function __construct()
	{
		foreach($_POST as $input => $value) {
			$this->data[$input] = $value;
		}
	}

	public function checkData()
	{
		foreach($this->data as $input => $value) {
			if(empty($value)==TRUE) {
				throw new EmptyStringException($input);
			} else if(gettype($value)!="string") {
				throw new InvalidInputTypeException($input);
			}
		}
	}


}
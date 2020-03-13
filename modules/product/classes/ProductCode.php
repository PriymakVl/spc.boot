<?php

namespace app\modules\product\classes;

/**
 * get code product by series
 */
class ProductCode
{
	public $full;
	public $short;
	public $series;
	public $model;
	public $thread;
	public $condensate;

	public function __construct($series, $thread, $condensate)
	{
		$this->series = $series;
		$this->thread = $thread;
		$this->condensate = $condensate;
		$this->setModel();
		$this->setShortCode();
		$this->setFullCode();
	}
	
	private  function  setShortCode() 
	{
		$this->short = $this->series.$this->model;
	}

	private function setFullCode()
	{
		if ($this->condensate) $postfix = $this->thread.'-'.$this->condensate;
		else $postfix = $this->thread;
		$this->full = $this->short.'-'.$postfix;
	}

	private function setModel()
	{
		switch($this->thread) {
			case 'M5': $this->model = '10'; //M5
			break;
			// case '06': return 10; //G1/8”
			case '08': $this->model = '20'; //G1/4”
			break;
			// case '10': return 10; //G3/8”
			case '15': $this->model = '40'; //G1/2”
			break;
			// case '20': return 10; //G3/4”
			case '25': $this->model = '60'; //G1”
			break;
			default: $this->model = '';
		}
	}



}
<?php

namespace app\modules\order\traits;

trait OrderConvert {


	public function createLinkCustomer()
	{
	    $customer = $this->customer;
	    $str = '<a class="customer-link" href="/customer/customer-admin/view?id_customer=%s">%s</a>';
	    $str .= '<br><span>%s</span><br><span>%s</span>';
	    return sprintf($str, $customer->id, $customer->name, $customer->email, $customer->phone);
	}

	public function createFieldCylinders()
	{
	    if (!$this->cylinders) return '<span class="text-danger">нет</span>';
	    $str = '';
	    foreach ($this->cylinders as $cylinder) {
	        $str .= $cylinder->code.' - '.$cylinder->qty.'шт. <br>';
	    }
	    return $str;
	}

	public function createFieldProducts()
	{
	    if (!$this->products) return '<span class="text-danger">нет</span>';
	    $str = '';
	    foreach ($this->products as $product) {
	        $str .= $product->name.' - '.$product->qty.'шт. <br>';
	    }
	    return $str;
	}

	public function createFieldState()
	{
	    if ($this->state == self::STATE_REGISTERED) $class = 'text-danger';
	    else if ($this->state == self::STATE_CLOSED) $class = 'text-success';
	    else $class = 'text-default';
	    $state = $this->convertState();
	    return sprintf('<span class="%s">%s</span>', $class, $state);
	}

}

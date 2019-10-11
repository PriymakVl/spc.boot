<?php

use yii\helpers\Html;

$this->title = 'Заказы заказчика';
?>

<div class="orders-customer">

    <h1>
    	<? printf('%s <span class="text-info">%s</span>', $this->title, $customer->name); ?>
    </h1>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="40">№</th>
            <th class="text-primary">№ заказа </th>
            <th class="text-primary">Товыры</th>
            <th class="text-primary">Цилиндры</th>
            <th class="text-primary">Примечание</th>
        </tr>
        <? $number = 1; ?>
        <? foreach($customer->orders as $order): ?>
            <tr >
                <td><?=$number?></td>
                <!-- number order -->
                <td>
                    <?=$order->id?>
                </td>
                <!-- order products -->
                <td>
                    <?= $order->createFieldProducts() ?>
                </td>
                <!-- order cylinders -->
                <td>
                    <?= $order->createFieldCylinders() ?>
                </td>
                 <!-- order note -->
                <td>
                    <?= $order->note ?>
                </td>
            </tr>
            <? $number++; ?>
        <? endforeach; ?>
    </table>
</div>

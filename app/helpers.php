<?php
if (!function_exists('getOrderNumber')) {
    function getOrderNumber($order)
    {
        if (strpos(trim($order), '=') !== false) {
            $order_number = substr($order, 1);
        } elseif (empty($order)) {
            $order_number = '';
        } elseif((strpos(trim($order), '"') !== false)){
            $order_number =$order;
        }else {
            $order_number = '"' . trim($order) . '"';
        }
        return $order_number;
    }
}

if (!function_exists('getPhone')) {
    function getPhone($phone)
    {
        if (strpos(trim($phone), "'") !== false) {
            $order_number = '"' . substr($phone, 1) . '"';
        } elseif (empty($phone)) {
            $order_number = '';
        } elseif((strpos(trim($phone), '"') !== false)){
            $order_number =$phone;
        }else {
            $order_number = '"' . trim($phone) . '"';
        }
        return $order_number;
    }
}

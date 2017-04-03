<?php
$str = "Платеж: Рамблер-Касса 1155р. Код: 398495";

class Pay
{
    public $patterns = ['gate' => 'Платеж:', 'code' => 'Код:'];

    private $pay = [];

    function getGate()
    {
        if (preg_match('/' . $this->patterns['gate'] . '\s(.*?)\s/i', $this->str, $match)) {
            $this->pay['gate'] = $match[1];
        }
    }

    function getAmount()
    {
        if (preg_match('/\s(\d+)(.*?)\./i', $this->str, $match)) {
            $this->pay['amount'] = $match[1];
            $this->pay['currency'] = $match[2];
        }
    }

    function getCode()
    {
        if (preg_match('/' . $this->patterns['code'] . '\s(\d+)/i', $this->str, $match)) {
            $this->pay['code'] = $match[1];
        }
    }

    function Process($str) {
        $this->str = $str;

        $this->getCode();
        $this->getAmount();
        $this->getGate();

        return $this->pay;
    }
}

print_r((new Pay())->Process($str));

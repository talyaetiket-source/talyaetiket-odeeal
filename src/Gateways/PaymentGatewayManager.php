<?php

namespace App\Gateways;

class PaymentGatewayManager {
    protected $gateways = [];

    public function addGateway($gateway) {
        $this->gateways[] = $gateway;
    }

    public function removeGateway($gateway) {
        $key = array_search($gateway, $this->gateways);
        if ($key !== false) {
            unset($this->gateways[$key]);
        }
    }

    public function getGateways() {
        return $this->gateways;
    }

    public function processPayment($gateway, $amount, $data) {
        if (!in_array($gateway, $this->gateways)) {
            throw new Exception('Gateway not found.');
        }
        // Process payment using the specified gateway
        // This part can be extended according to gateway implementation
    }
}  

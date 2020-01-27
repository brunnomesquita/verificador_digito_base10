<?php

class Verificador {
    
    private $digito;
    private $base;

    public function __construct() {
        $this->base = 10;
    }

    public function verificaConta($agencia, $conta, $digito) {
        if (empty($agencia)) {
            return "Verificar os campos";
        } else if (empty($conta)) {
            return "Verificar os campos";
        } else if (empty($digito)) {
            return "Verificar os campos";
        }
        // Recebe o dígito para conferencia tardia
        $this->digito = $digito;
        // Inicio da conferencia
        $resultado_multiplicacao = "";
        $numero = $agencia . $conta;
        $array_numero = str_split($numero);
        $mult = true;
        for($i = (count($array_numero) - 1); $i >= 0; $i--) {
            if($mult == true) {
                if ($i == 0) {
                    $resultado_multiplicacao .= $array_numero[$i] * 2;
                } else {
                    $resultado_multiplicacao .= $array_numero[$i] * 2 . '/';
                }
                
                $mult = false;
            } else {
                if ($i == 0) {
                    $resultado_multiplicacao .= $array_numero[$i] * 1;
                } else {
                    $resultado_multiplicacao .= $array_numero[$i] * 1 . '/';
                }
                $mult = true;
            }
        }

        $res_mult = explode('/', $resultado_multiplicacao);

        $separa_soma = "";
        $resultado_soma = 0;

        for ($j = 0; $j < count($res_mult); $j++) {
            
            $separa_soma = str_split($res_mult[$j]);
            
            if(count($separa_soma) > 1) {
                
                $resultado_soma += intval($separa_soma[0]) + intval($separa_soma[1]);
            } else {
                
                $resultado_soma += intval($separa_soma[0]);
            }

        }

        $digito_verificador = ( $this->base - ($resultado_soma % $this->base) );

        if ($digito_verificador == $digito) {
            return "Agência: " . $agencia . " / Conta: " . $conta . "-" . $digito . " é uma conta válida";
        } else {
            return "Agência: " . $agencia . " / Conta: " . $conta . "-" . $digito . " não é uma conta válida";
        }

    }   
}

<?php

namespace App\Validation;

class CPF
{
    public static function validar($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        $cpfValidation = substr($cpf, 0, 9);
        $cpfValidation .= self::calcularDigitoVerificador($cpfValidation);
        $cpfValidation .= self::calcularDigitoVerificador($cpfValidation);

        return $cpfValidation == $cpf;
    }

    public static function calcularDigitoVerificador($cpf)
    {
        $tamanho = strlen($cpf);
        $multiplicador = $tamanho + 1;

        $soma = 0;

        for ($i = 0; $i < $tamanho; $i++) {
            $soma += $cpf[$i] * $multiplicador;
            $multiplicador--;
        }

        $resto = $soma % 11;
        
        return $resto > 1 ? 11 - $resto : 0;
    }
}

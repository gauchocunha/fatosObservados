<?php
namespace App\Http\Controllers\ConverteData;

class ConverteData {

// Convertendo do portugues para o ingles

    static function ptParaEn($date) {
        try {
            if(is_null($date)){
                return NULL;
            } else {
            $data = implode('-', array_reverse(explode('/', $date)));
            return $data;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Convertendo do ingles para o portugues
    static function enParaPt($date) {
        try {
            if(is_null($date)){
                return NULL;
            } else {
            $data = implode('/', array_reverse(explode('-', $date)));
            return $data;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    static function diferencaEmDias($dataInicial, $dataFinal) {
	$d1 = explode('-', $dataInicial);
	$d2 = explode('-', $dataFinal);
	return floor((mktime(0,0,0,$d2[1],$d2[2],$d2[0])-mktime(0,0,0,$d1[1],$d1[2],$d1[0]))/86400);
	}
}

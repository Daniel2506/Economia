<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public static function periodoGracia($data){

        $reponse = new \stdClass();

        // tiempo a liquidar
        $liquidar = ($data['plazo_cliente'] * $data['periodo_cliente']);
        
        // Fecha  a operar
        $interval = 12 / $data['periodo_cliente'];
        $fecha= date('Y-m-d');



        // Interes periodico
        $ip = ($data['ip_cliente'] / 100);

        // Periodo gracia
        $periodoGracia = $data['periodo_gracia_cliente'] * $data['periodo_cliente'];
        // Annualidad
        $anualidad = (pow((1+$ip),($liquidar - $periodoGracia )) * $ip);
        $anualidad = $anualidad / (pow((1+$ip),($liquidar - $periodoGracia )) - 1);
        $anualidad = $data['monto_cliente'] * $anualidad;
        $monto = $data['monto_cliente'];

        for ($i=1; $i <= $liquidar; $i++) { 
            $cliente = new Cliente;

            if( $i <= $periodoGracia){
                $cliente->capital = '';
                $cliente->anualidad = '';
                $cliente->pos = $i;
                $cliente->fecha = date('Y-m-d', strtotime("+$interval months",strtotime($fecha)));
                $cliente->interes = $monto * $ip;
                // $monto = $monto - $cliente->capital;
                $fecha = $cliente->fecha;
                $cliente->total = $cliente->interes;
                $cliente->saldoCapital = '';
            }else{
                $cliente->anualidad = $anualidad;
                $cliente->pos = $i;
                $cliente->fecha = date('Y-m-d', strtotime("+$interval months",strtotime($fecha)));
                $cliente->interes = $monto * $ip;
                $cliente->total = $cliente->anualidad ;

                // Capital
                $capital = ($anualidad - $cliente->interes);
                $cliente->capital = $capital;

                $fecha = $cliente->fecha;
                $monto = $monto - $capital;
                $cliente->saldoCapital = $monto;
            }
            
            $reponse->model[] = $cliente;
        }
        $reponse->success = true;
        return $reponse;
    }

    public static function amortizacionCredito($data){

        $reponse = new \stdClass();

        // tiempo a liquidar
        $liquidar = ($data['plazo_cliente'] * $data['periodo_cliente']);
        
        // Fecha  a operar
        $interval = 12 / $data['periodo_cliente'];
        $fecha= date('Y-m-d');

        // Capital
        $capital = ($data['monto_cliente'] / $liquidar);

        // Interes periodico
        $ip = ($data['ip_cliente'] / 100);

        // Annualidad
        $anualidad = (pow((1+$ip),$liquidar) * $ip);
        $anualidad = $anualidad / (pow((1+$ip),$liquidar) - 1);
        $anualidad = $data['monto_cliente'] * $anualidad;
        $monto = $data['monto_cliente'];
        for ($i=1; $i <= $liquidar; $i++) { 
            
            $cliente = new Cliente;
            $cliente->capital = $capital;
            $cliente->anualidad = $anualidad;
            $cliente->pos = $i;
            $cliente->fecha = date('Y-m-d', strtotime("+$interval months",strtotime($fecha)));
            $cliente->interes = $monto * $ip;
            $cliente->total = $capital + $cliente->interes;
            
            $monto = $monto - $cliente->capital;
            $cliente->saldoCapital = $monto;
            
            $reponse->model[] = $cliente;
        }
        $reponse->success = true;
    	return $reponse;
    }
}

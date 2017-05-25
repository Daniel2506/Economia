<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public static function periodoGracia($data){
    	dd('periodoGracia');
    }

    public static function amortizacionCredito($data){
    	dd('amortizacionCredito');
    }
}

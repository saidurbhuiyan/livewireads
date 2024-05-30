<?php

namespace App\Libraries;


use App\Libraries\Ban;
use App\Models\Balance;

class BalanceClass
{
    private int $user_id;

    //private $adviser;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
        //$this->adviser = \App\Refer::where('refer_id',$user_id)->first();
    }

    public function add($pub_amount, $ad_amount = 0): void
    {

        //$ban = New BanClass($this->user_id);

        $balance = Balance::where('user_id', $this->user_id)->first();

        //pub amount
        if ($pub_amount < 0) {

            $balance->decrement('pub_coins', abs($pub_amount));

        } else {
            $balance->increment('pub_coins', $pub_amount);
        }

        //ads amount
        if ($ad_amount < 0){

            $balance->decrement('ad_coins', abs($ad_amount));

        }else{

            $balance->increment('ad_coins', $ad_amount);

        }





        $balance->save();

        /*if(!$ban->isBan())
          {

            $refer = New ReferClass($this->user_id);
            $refer->pay($amount);
          }*/

    }
}

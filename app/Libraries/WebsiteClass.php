<?php

namespace App\Libraries;

class WebsiteClass
{

    /**
     * Get ReadAble Status color
     * @return array[]
     */
    public function ReadAbleStatus(): array
    {
        return [
            'pending' => 'yellow',
            'active' => 'green',
            'inactive' => 'pink',
            'rejected' => 'red'
        ];

    }

    /**
     * is verified or not color
     * @return array[]
     */
    public function isVerified(): array
    {
       return [
            0 => ['text' => 'verified', 'color'=>'green'],
            1 => ['text' => 'not verified', 'color'=>'red'],
        ];


    }

    /**
     * Get analytic sources
     * @return string[]
     */
    public function analyticSources(): array
    {
        return [
            0 =>'Similar Web',
            1 => 'Google Analytics',
            2 => 'Yandex Metrics',
            3 => 'Other'
        ];

    }

    /**
     * Get domain protocols
     * @return string[]
     */
    public function domainProtocols(): array
    {
        return[
            0 => 'http://',
            1 => 'https://',
        ];

    }


}

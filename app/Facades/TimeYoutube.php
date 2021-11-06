<?php

namespace App\Facades;

use Carbon\Carbon;

class TimeYoutube
{
    /**
     * Format duration of Youtube API
     * 
     * @param string $duration (1H12M23S)
     * @return string (1:12:23)
     */
    public function duration($duration)
    {
        $duration = str_replace('PT', '', $duration);
        $findH = strpos($duration, 'H') ?: 0;
        $findM = strpos($duration, 'M') ?: 0;
        $findS = strpos($duration, 'S') ?: 0;
        $hh = substr($duration, 0, $findH);
        if ($findH == 0) {
            if ($findM == 0) {
                $mm = '00';
                $ss = substr($duration, 0, $findS);
            } elseif ($findS == 0) {
                $ss = '00';
                $mm = substr($duration, 0, $findM);
            } else {
                $mm = substr($duration, 0, $findM);
                $ss = substr($duration, $findM + 1, $findS - $findM - 1);
            }
            if (strlen($ss) == 1) {
                $ss = '0' . $ss;
            }
            $duration = $mm . ':' . $ss;
        } else {
            if ($findM == 0) {
                $mm = '00';
                $ss = substr($duration, $findH + 1, $findS - $findH - 1);
            } elseif ($findS == 0) {
                $ss = '00';
                $mm = substr($duration, $findH + 1, $findM - $findH - 1);
            } else {
                $mm = substr($duration, $findH + 1, $findM - $findH - 1);
                $ss = substr($duration, $findM + 1, $findS - $findM - 1);
            }
            if (strlen($mm) == 1) {
                $mm = '0' . $mm;
            }
            if (strlen($ss) == 1) {
                $ss = '0' . $ss;
            }
            $duration = $hh . ':' . $mm . ':' . $ss;
        }
        return $duration;
    }

    /**
     * Format date publish of Video
     * 
     * @param string $published (2019-04-08T22:52:43.000Z)
     * @return string
     */
    public function published($published)
    {
        $published = explode('T', $published)[0];
        return Carbon::createFromFormat('Y-m-d', $published)->isoFormat('D \\t\\h\\g M, YYYY');
    }
}

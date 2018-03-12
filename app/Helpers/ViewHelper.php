<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class ViewHelper
{
    public function generateList(Collection $list)
    {
        if (count($list) > 0) {
            $html = '<ul>';
            foreach ($list as $item) {
                $html .= '<li>' . $item->name . '</li>';
            }
            $html .= '</ul>';

            echo $html;
        } else {
            echo 'Everywhere';
        }
    }
}
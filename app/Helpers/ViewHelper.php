<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class ViewHelper
{
    public function generateList(Collection $list, $businessCategoriesCount)
    {
        if (count($list) === $businessCategoriesCount ) {
            echo 'Everywhere';
        } else if (count($list) > 0) {
            $html = '<ul>';
            foreach ($list as $item) {
                $html .= '<li>' . $item->name . '</li>';
            }
            $html .= '</ul>';

            echo $html;
        } else {
            echo 'No Categories Assigned';
        }
    }
}
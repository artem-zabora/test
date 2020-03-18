<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 18.03.2020
 * Time: 9:42
 */

namespace App\Traits;


trait CalendarTrait
{
    public function weeks()
    {
        // Set your timezone
        date_default_timezone_set('Asia/Tokyo');

        // Get prev & next month
        if (isset($_GET['ym'])) {
            $ym = $_GET['ym'];
        } else {
            // This month
            $ym = date('Y-m');
        }

        // Check format
        $timestamp = strtotime($ym . '-01');
        if ($timestamp === false) {
            $ym = date('Y-m');
            $timestamp = strtotime($ym . '-01');
        }

        // Today
        $today = date('Y-m-j', time());

        // For H3 title
        $html_title = date('Y / m', $timestamp);

        // Create prev & next month link     mktime(hour,minute,second,month,day,year)
        $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
        $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));


        // Number of days in the month
        $day_count = date('t', $timestamp);

        // 0:Sun 1:Mon 2:Tue ...
        $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
        //$str = date('w', $timestamp);


        // Create Calendar!!
        $weeks = array();
        $week = '';

        // Add empty cell
        $week .= str_repeat('<td></td>', $str);

        for ( $day = 1; $day <= $day_count; $day++, $str++) {

            $date = $ym . '-' . $day;

            if ($today == $date) {
                $week .= '<td class="today">' . '<a href="show/' . $ym . '-' . $day .'">' . $day . '</a>';
            } else {
                $week .= '<td>' . '<a href="show/'. $ym . '-' . $day .'">' . $day . '</a>';
            }
            $week .= '</td>';

            // End of the week OR End of the month
            if ($str % 7 == 6 || $day == $day_count) {

                if ($day == $day_count) {
                    // Add empty cell
                    $week .= str_repeat('<td></td>', 6 - ($str % 7));
                }

                $weeks[] = '<tr>' . $week . '</tr>';

                // Prepare for new week
                $week = '';
            }

        }

        $data = [
          'prev' => $prev,
          'next' => $next,
          'html_title' => $html_title,
          'weeks' => $weeks,
        ];


        return $data;
    }

}
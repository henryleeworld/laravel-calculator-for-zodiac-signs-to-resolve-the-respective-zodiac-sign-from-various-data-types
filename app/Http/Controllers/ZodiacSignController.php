<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Carbon;
use Intervention\Zodiac\Calculator;

class ZodiacSignController extends Controller 
{
    public function calculate() 
    {
        $zodiac = Calculator::make($now = now());
        $name = $zodiac->localized(str_replace('_', '-', app()->getLocale()));
        echo __('The zodiac sign born today (:today) is: ', ['today' => $now->toDateString()]) . $name . PHP_EOL;

        // method takes mixed formats
        $zodiac = Calculator::make($date = 'last day of August 2024');
        $name = $zodiac->localized(str_replace('_', '-', app()->getLocale()));
        echo __('The zodiac sign born at the end of August 2024 (:end_of_august_2024) is: ', ['end_of_august_2024' => Carbon::parse($date)->toDateString()]) . $name . PHP_EOL;

        // even DateTime objects
        $zodiac = Calculator::make($date = new DateTime('2024-03-23'));
        $name = $zodiac->localized(str_replace('_', '-', app()->getLocale()));
        echo __('The zodiac sign born on March 23, 2024 (:march_23_2024) is: ', ['march_23_2024' => Carbon::parse($date)->toDateString()]) . $name . PHP_EOL;

        // get zodiac from a Carbon
        $zodiac = Calculator::make($date = Carbon::yesterday());
        $name = $zodiac->localized(str_replace('_', '-', app()->getLocale()));
        echo __('The zodiac sign born yesterday (:yesterday) is: ', ['yesterday' => Carbon::parse($date)->toDateString()]) . $name . PHP_EOL;
    }
}

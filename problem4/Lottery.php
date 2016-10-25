<?php

class Lottery{

    public function findNextDate($optionalDate) {
        $formatDayForOptionalDate = $optionalDate->format('l');
        $timeOptionalDate = $optionalDate->format('G:i');
        $drawTime = '21:30';

        switch ($formatDayForOptionalDate) {
            case "Monday":
                $nextDrawDate = $optionalDate->add(new DateInterval('P1D'));
                return $nextDrawDate->format('Y-m-d');
                break;
            case "Tuesday":
                if ($timeOptionalDate >= $drawTime) {
                    $nextDrawDate = $optionalDate->add(new DateInterval('P5D'));
                    return $nextDrawDate->format('Y-m-d');
                } else {
                    return $optionalDate->format('Y-m-d');
                }
                break;
            case "Wednesday":
                $nextDrawDate = $optionalDate->add(new DateInterval('P4D'));
                return $nextDrawDate->format('Y-m-d');
                break;
            case "Thursday":
                $nextDrawDate = $optionalDate->add(new DateInterval('P3D'));
                return $nextDrawDate->format('Y-m-d');
                break;
            case "Friday":
                $nextDrawDate = $optionalDate->add(new DateInterval('P2D'));
                return $nextDrawDate->format('Y-m-d');
                break;
            case "Saturday":
                $nextDrawDate = $optionalDate->add(new DateInterval('P1D'));
                return $nextDrawDate->format('Y-m-d');
                break;
            case "Sunday":
                if ($timeOptionalDate >= $drawTime) {
                    $nextDrawDate = $optionalDate->add(new DateInterval('P2D'));
                    return $nextDrawDate->format('Y-m-d');
                } else {
                    return $optionalDate->format('Y-m-d');
                }
                break;
            default:
                echo $formatDayForOptionalDate . " is not a day!";
        }
    }
}

//current date
$currentDate = new DateTime('now');
// any other date you want
$optionalDate = new DateTime('2016-10-30 10:30 PM');

$Lottery = new Lottery();
//you can pass the $currentDate as parameter or any other $optionalDate and find the date for the next draw
$nextDrawDate = $Lottery->findNextDate($optionalDate);
echo $nextDrawDate;
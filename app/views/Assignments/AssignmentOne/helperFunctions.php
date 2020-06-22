<?php
/**
 * @param $race
 * @param $class
 * @param $gender
 * @return string
 *
 * Helper function to get the file name of the image.
 */
function getImgFile($race, $class, $gender){
    $racePrefix = substr($race, 0,2);
    $classPrefix = substr($class, 0,2);
    if($gender === 'Non-Binary'){
        if(rand(0,1) == 0){
            $genderPrefix = 'Ma';
        } else {
            $genderPrefix = 'Fe';
        }
    } else {
        $genderPrefix = substr($gender, 0, 2);
    }
    return $racePrefix . $classPrefix . $genderPrefix . '.jpg';
}

/**
 * @param $class
 * @return mixed|string
 * Is fed a class and pulls the info from the class file
 */
function getClassData($class){
    $classInfo = explode('/delimiter/',
        file_get_contents(APPROOT . '/app/views/Assignments/AssignmentOne/ClassInfo.txt'));
    switch($class){
        case 'Fighter':
            return $classInfo[0];
            break;
        case 'Cleric':
            return $classInfo[1];
            break;
        case 'Thief':
            return $classInfo[2];
            break;
        case 'Magic-User':
            return $classInfo[3];
            break;
        default:
            return "No class data";
            break;
    }
}

/**
 * @param $class
 * @return mixed|string
 * Is fed a class and pulls the info from the class file
 */
function getRaceData($race){
    $raceInfo = explode('/delimiter/',
        file_get_contents(APPROOT . '/app/views/Assignments/AssignmentOne/RaceInfo.txt'));
    switch($race){
        case 'Human':
            return $raceInfo[0];
            break;
        case 'Elf':
            return $raceInfo[1];
            break;
        case 'Dwarf':
            return $raceInfo[2];
            break;
        case 'Halfling':
            return $raceInfo[3];
            break;
        default:
            return "No class data";
            break;
    }
}

/**
 * @param $class
 * @return array
 *
 * To assign out stats in a way that doesn't leave you with a fighter who can't fight.
 */
function getStats($class){
    // roll six stats
    $stats = [rollStat(), rollStat(), rollStat(), rollStat(), rollStat(), rollStat()];
    // Sort from largest to smallest
    sort($stats);
    // Keep the two highest to assign to class archetype
    $lowStats = [$stats[0], $stats[1], $stats[2], $stats[3]];
    shuffle($theRest);

    switch ($class){
        case 'Fighter':
            // fighter's highest stats should be str and con.
            $assignedStats = [
                'str' => $stats[5],
                'con' => $stats[4],
                'dex' => $lowStats[0],
                'wis' => $lowStats[1],
                'int' => $lowStats[2],
                'cha' => $lowStats[3]
            ];
            break;
        case 'Cleric':
            // Cleric wants high wis and str
            $assignedStats = [
                'str' => $stats[4],
                'con' => $lowStats[0],
                'dex' => $lowStats[1],
                'wis' => $stats[5],
                'int' => $lowStats[2],
                'cha' => $lowStats[3]
            ];
            break;
        case 'Thief':
            // High Dex and Cha
            $assignedStats = [
                'str' => $lowStats[3],
                'con' => $lowStats[0],
                'dex' => $stats[5],
                'wis' => $lowStats[1],
                'int' => $lowStats[2],
                'cha' => $stats[4]
            ];
            break;
        case 'Magic-User':
            // High int and con
            $assignedStats = [
                'str' => $lowStats[3],
                'con' => $lowStats[0],
                'dex' => $lowStats[2],
                'wis' => $lowStats[1],
                'int' => $stats[5],
                'cha' => $stats[4]
            ];
            break;
        default:
            $assignedStats = [
                'str' => $stats[0],
                'con' => $stats[1],
                'dex' => $stats[2],
                'wis' => $stats[3],
                'int' => $stats[4],
                'cha' => $stats[5]
                ];
    }
    return $assignedStats;
}

function rollStat(){
    $roll = [
        rand(1, 6),
        rand(1, 6),
        rand(1, 6),
        rand(1, 6)
    ];
    // Sort the four rolls
    sort($roll);
    // Drop the lowest roll and sum, yes I know how to roll a D&D character, don't judge.
    return $roll[1] + $roll[2] + $roll[3];
}


<?php
 
// Create array to hold list of todo items
$items = array();
$thisone;

function sort_menu(&$items){
    echo "Press (A)->Z, (Z)->A, (O)rder entered, Re(V)erse order : ";
    $menu_choice = trim(fgets(STDIN));
    if ($menu_choice == 'A'){
        asort($items);
    } elseif ($menu_choice == 'Z') {
        rsort($items);
    } elseif ($menu_choice == 'O'){
        ksort($items);
    } elseif ($menu_choice == 'V'){
        krsort($items);
    }
// print_r($items);
}

// The loop!
do {
    // Iterate through list items
    foreach ($items as $key => $item) {
        // Display each item and a newline
        echo "[{$key}] {$item}\n";
    }
 
    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort, (Q)uit : ';
 
    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = trim(fgets(STDIN));
 
    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $thisone = trim(fgets(STDIN));
        // print_r($thisone);
        echo '(F)irst or (L)ast: ';
        $firstorlast = trim(fgets(STDIN));
            if ($firstorlast == 'F'){
               array_unshift ($items , $thisone);
            } else{
                array_push($items, $thisone);
            }
        // $items[] = trim(fgets(STDIN));
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
        // Remove from array
        unset($items[$key]);
        // Add a (S)ort option to your menu. When it is chosen, it should call a function called sort_menu().
    } elseif ($input == 'S'){
        sort_menu($items);
    } elseif ($input == 'X'){
        array_pop($items);
    } elseif ($input == 'Z'){
        array_shift($items);
    }

// Exit when input is (Q)uit
} while ($input != 'Q');
 
// Say Goodbye!
echo "Goodbye!\n";
 
// Exit with 0 errors
exit(0);
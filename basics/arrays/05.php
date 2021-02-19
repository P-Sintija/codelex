<?php
/*
function display_board()
{
    echo "   |   |   " . PHP_EOL;
    echo "---+---+---" . PHP_EOL;
    echo "   |   |   " . PHP_EOL;
    echo "---+---+---" . PHP_EOL;
    echo "   |   |   " . PHP_EOL;
}


display_board();
*/
//See tic-tac-toe.php
//
//Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.
//
//(...a game already in progress)
//
//	X   O
//	O X X
//	  X O
//
//'O', choose your location (row, column): 0 1
//
//	X O O
//	O X X
//	  X O
//
//'X', choose your location (row, column): 2 0
//
//	X O O
//	O X X
//	X X O
//
//The game is a tie.




////////// nepareizi ievadot, neatgriež vusu atpakaļ, jāizveido recursion funkcija
///////// nedrīkst ielikt jau aiņemtā laukā



function createGrid(): array
{
    $rows = array_fill(0, 3, " ");
    return array_fill(0, 3, $rows);
}

$grid = createGrid();


function drawGrid(array $grid): string
{
    return $gridString = implode(PHP_EOL, array_map(function ($cell) {
            return implode(" ", $cell);
        }, $grid)) . PHP_EOL;
}

function fillGrid(array &$grid, array $xInput, array $oInput): array
{
    for ($i = 0; $i < count($xInput); $i++) {
        for ($j = 0; $j < count($oInput); $j++) {
            $grid[$xInput[$i][0]][$xInput[$i][1]] = "X";
            $grid[$oInput[$j][0]][$oInput[$j][1]] = "O";
        }
    }
    return $grid;
}


$xMoves = [];
$oMoves = [];

function validate(string $playerInput)
{
    $length = strlen($playerInput);

    return $length > 1 && $length < 3 &&
        is_numeric($playerInput) &&
        $playerInput[0] < 3 && $playerInput[1] < 3;
}


function winner(array $grid): string
{
    $winner = "";
    for ($i = 0; $i < count($grid); $i++) {
        if (($grid[$i][0] === $grid[$i][1] && $grid[$i][1] === $grid[$i][2]) && $grid[$i][0] != " ") {
            $winner = $grid[$i][0];
        } else if ($grid[0][$i] === $grid[1][$i] && $grid[1][$i] === $grid[2][$i] && $grid[0][$i] !== " ") {
            $winner = $grid[0][$i];
        } else if ($grid[0][0] === $grid[1][1] && $grid[1][1] === $grid[2][2] && $grid[0][0] !== " ") {
            $winner = $grid[0][0];
        } else if ($grid[0][2] === $grid[1][1] && $grid[1][1] === $grid[2][0] && $grid[0][2] !== " ") {
            $winner = $grid[0][2];
        }
    }
    return $winner;
}


$possibleMoves = 9;

while ($possibleMoves > 0) {
    $possibleMoves = $possibleMoves - 1;
    if ($possibleMoves % 2 === 0) {
        $move = readline("'X', choose your location (row, column): ");
        if (validate($move)) {
            $xMoves[] = $move;
            fillGrid($grid, $xMoves, $oMoves);
            echo PHP_EOL . drawGrid($grid) . PHP_EOL;
        } else {
            echo "Something went wrong: enter an integer or the place is not free" . PHP_EOL;
            $move = readline("'X', choose your location (row, column): ");
        }
    } else if ($possibleMoves % 2 !== 0) {
        $move = readline("'O', choose your location (row, column): ");
        if (validate($move)) {
            $oMoves[] = $move;
            fillGrid($grid, $xMoves, $oMoves);
            echo PHP_EOL . drawGrid($grid) . PHP_EOL;
        } else {
            echo "Something went wrong: enter an integer or the place is not free" . PHP_EOL;
            $move = readline("'O', choose your location (row, column): ");
        }
    }


        if (strlen(winner($grid)) > 0) {
            echo "Winner" . winner($grid) . PHP_EOL;
            exit();
        }

    }

    if ($possibleMoves === 0) {
        echo "IT`S A TIE!! ";
        exit();
    }
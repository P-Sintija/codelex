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


function createGrid(): array
{
    $rows = array_fill(0, 3, " ");
    return array_fill(0, 3, $rows);
}

$grid = createGrid();
$xMoves = [];
$oMoves = [];
$possibleMoves = 9;


function determineTurn(int $count): string
{
    if ($count % 2 !== 0) {
        return $turn = "X";
    } else {
        return $turn = "O";
    }
}

function askCoordinates(string $turn): string
{
    if ($turn === "X") {
        return $turn = readline("'X', choose your location (row, column): ");
    } else {
        return $turn = readline("'O', choose your location (row, column): ");
    }
}

function validate(string $playerInput, array $grid): bool
{
    $length = strlen($playerInput);
    return $length > 1 && $length < 3 &&
        is_numeric($playerInput) &&
        $playerInput[0] < 3 && $playerInput[1] < 3 &&
        $grid[$playerInput[0]][$playerInput[1]] === " ";
}

function fillGrid(array &$grid, array $Input, string $turn): array
{
    for ($i = 0; $i < count($Input); $i++) {
        $grid[$Input[$i][0]][$Input[$i][1]] = $turn;
    }
    return $grid;
}

function drawGrid(array $grid): string
{
    return $gridString = implode(PHP_EOL, array_map(function ($cell) {
            return implode(" ", $cell);
        }, $grid)) . PHP_EOL;
}

function moveX(array &$moves, string $coordinates): array
{
    $moves[] = $coordinates;
    return $moves;
}

function moveO(array &$moves, string $coordinates): array
{
    $moves[] = $coordinates;
    return $moves;
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


while ($possibleMoves > 0) {

    if (strlen(winner($grid)) > 0) {
        echo "Winner " . winner($grid) . PHP_EOL;
        exit();
    }

    $turn = determineTurn($possibleMoves);
    $coordinates = askCoordinates($turn);

    if (validate($coordinates, $grid)) {
        if ($turn === "X") {
            moveX($xMoves, $coordinates);
        } else {
            moveO($oMoves, $coordinates);
        }

        $possibleMoves = $possibleMoves - 1;

        fillGrid($grid, $xMoves, "X");
        fillGrid($grid, $oMoves, "O");

        echo PHP_EOL . drawGrid($grid) . PHP_EOL;
    } else {
        echo PHP_EOL . "Something went wrong: enter an integer or the place is not free" . PHP_EOL;
    }

}


if (strlen(winner($grid)) > 0) {
    echo "Winner " . winner($grid) . PHP_EOL;
    exit();
} else if ($possibleMoves === 0) {
    echo "IT`S A TIE!! ";
    exit();
}



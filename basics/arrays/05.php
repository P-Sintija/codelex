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


function drawGrid($grid): string
{
    return $gridString = implode(PHP_EOL, array_map(function ($cell) {
            return implode(" ", $cell);
        }, $grid)) . PHP_EOL;
}

echo drawGrid($grid);

$possibleMoves = 9;

while($possibleMoves > 0) {

}
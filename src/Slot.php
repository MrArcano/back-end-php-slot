<?php

class Slot
{

    private static $symbols = ['a', 'k', 'q', 'p-blond', 'p-brown', 'p-pink', 'bonus', 'wild', 'p-forest'];

    private function __construct(){}

    /**
     * generateSlotSymbols Function
     *
     * This function generates a multidimensional array representing the "reels" of a slot machine.
     * Each "reel" contains 3 symbols randomly selected based on specific probabilities.
     *
     * @param array $symbols An array containing symbols available for the slot machine reels.
     * @return array Returns a multidimensional array where each element represents a reel with 3 symbols.
     */
    public static function generateSlotSymbols()
    {
        $slot = [];
        for ($i = 0; $i < 5; $i++) {
            $new_array = [];
            for ($j = 0; $j < 3; $j++) {
                $rand_num = rand(1, 100);
                // Definisci le probabilità
                if ($rand_num <= 60) {
                    // 60% di probabilità
                    $index = rand(0, 2);
                } elseif ($rand_num <= 90) {
                    // 30% di probabilità 
                    $index = rand(3, 5);
                } elseif ($rand_num <= 95) {
                    // 5% di probabilità 
                    $index = 6;
                } elseif ($rand_num <= 98) {
                    // 3% di probabilità 
                    $index = 7;
                } else {
                    // 2% di probabilità
                    $index = 8;
                }

                $new_array[$j] = Slot::$symbols[$index];
            }
            array_push($slot, $new_array);
        }

        return $slot;
    }
}

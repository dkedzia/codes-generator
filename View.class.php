<?php
class View{
    public function printHelp(){
        echo "Usage: php index.php [OPTIONS]\n\n";
        echo "Options available:\n\n";
        echo "\t-h, --help\t\tShowing this description and ends program\n";
        echo "\t-l, --length [NUMBER]\tSetting the length of each code.\n\t\t\t\tDefault is 10.\n";
        echo "\t-a, --amount [NUMBER]\tSetting the amount of generated codes\n\t\t\t\tDefault is 1.\n";
        echo "\t-f, --file [FILE NAME]\tSetting the text file name, to save codes in.\n\t\t\t\tBy default the name is 'codes.txt'.\n\n";
    }
    public function printCodes($codesArray){
        print_r($codesArray);
    }
    public function savedToFile($fileName){
        echo "\nOutput saved to file $fileName.\n";
    }
    public function tooManyCodes($max){
        echo "\nToo many codes. Max is $max.\n";
    }
};
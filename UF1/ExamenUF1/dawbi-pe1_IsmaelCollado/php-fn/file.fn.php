<?php

/**
 * utility functions to handle text files.
 */

namespace proven\files {

    /**
     * reads a file into an array of string (one line each).
     * @param string $filepath path to file read from.
     * @return array the array of string elements with that have been read.
     */
    function readAllLines(string $filepath) {
        $data = array();
        if ($file = fopen($filepath, "r")) {
            while(!feof($file)) {
                $line = fgets($file);
                $data[] = $line;
            }
            fclose($file);
        }
        return $data;
    }

    /**
     * writes an array of string to a file.
     * @param string $filepath path to file to write in.
     * @param array $data the data to be written.
     * @return int the number of lines actually written to file.
     */
    function writeAllLines(string $filepath, array $data) {
        
        // file_put_contents($filepath, implode(PHP_EOL, $data)) ? true : false;

        // $linesWritten = count($data);

        // return $linesWritten;

        $linesWritten = 0;
        //i reset the file becouse otherwhis it wont overwrite
        $file = fopen($filepath,"w");
            fwrite($file,"");
            fclose($file);
        foreach($data as $lines){
            $file = fopen($filepath,"a");
            if((fwrite($file,$lines."\n"))){
                $linesWritten ++;
            };
            fclose($file);
        }
        return $linesWritten;
        
        
    }

    /**
     * reads and gets all lines in file with given value in the field at position given by index.
     * @param string $filepath path to file read from.
     * @param int $fieldIndex index of field to search.
     * @param string $fieldValue value to search.
     * @return array the array of lines according to given criterion.
     */
    function readLinesWhereFieldIndex(string $filepath, int $fieldIndex, string $fieldValue) {
        //TODO
        $file = file($filepath);

        for ($i=0; $i < (count($file)); $i++) { 
            $line = $file[$i];
            $lineArray = explode(";", $line);

            if($fieldIndex < count($lineArray)){
               if(($lineArray[$fieldIndex] == $fieldValue)){
                    $ret = true;
                    $lineret = $line;
                    break;
                }else{
                    $ret = false;
                } 
            }else{
                $ret = false;
            }
        }

        if($ret){
            return $lineret;
        }else{
            return $ret;
        } 

    }

    /**
     * appends a line to file.
     * @param string $filepath path to file to write in.
     * @param string $data the line to bo written to file.
     * @return int the number of lines actually written.
     */
    function appendLine(string $filepath, string $data): int {
        $linesWritten = 0;
        $canWrite = true;

        $file = file($filepath);

        for ($i=0; $i < (count($file)); $i++) { 
            $line = $file[$i];
            $lineArray = explode(";", $line);

            $dataExplode = explode(";", $data);

            //Im checking id the id already exists in the file, if so, break the loop and canwrite is false

            if($lineArray[0] == $dataExplode[0]){
                $canWrite = false;
                break;
            }
        }

        if($canWrite){
            $file = fopen($filepath, 'a');
            fwrite($file, $data);  
            $linesWritten += 1;
            fclose($file);
            return $linesWritten;
        }else{
            return $linesWritten;
        }

        
    }

}


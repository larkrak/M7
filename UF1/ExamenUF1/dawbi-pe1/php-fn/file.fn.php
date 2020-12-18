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
    function readAllLines(string $filepath): array {
        $data = array();
        //TODO
        return $data;
    }

    /**
     * writes an array of string to a file.
     * @param string $filepath path to file to write in.
     * @param array $data the data to be written.
     * @return int the number of lines actually written to file.
     */
    function writeAllLines(string $filepath, array $data): int {
        $linesWritten = 0;
        //TODO
        return $linesWritten;
    }

    /**
     * reads and gets the first line in file with given value in the field at position given by index.
     * @param string $filepath path to file read from.
     * @param int $fieldIndex index of field to search.
     * @param string $fieldValue value to search.
     * @return array the array of lines according to given criterion.
     */
    function readLinesWhereFieldIndex(string $filepath, int $fieldIndex, string $fieldValue): array {
        $line = null;
        //TODO
        return $line;
    }

    /**
     * appends a line to file.
     * @param string $filepath path to file to write in.
     * @param string $data the line to bo written to file.
     * @return int the number of lines actually written.
     */
    function appendLine(string $filepath, string $data): int {
        $linesWritten = 0;
        //TODO
        return $linesWritten;
    }

}


<?php

/*
 * Returning a value from given assoc array
 * 
 * @param string $field Key name of assoc array
 * @param array $data Data from Database, usually returned by get method, or any other array
 * @return mixed @value1 Value from the array
 */

function getValue($field, $data = array()) 
{
     foreach ($data as $key => $value) {
         foreach ($value as $key1 => $value1) {
             if ($key1 === $field) {
                 return $value1;
             }
         }
     }
}
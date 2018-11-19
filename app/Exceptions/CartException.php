<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/11/19
 * Time: 21:50
 */

namespace App\Exceptions;


use Throwable;

class CartException extends \Exception
{
    private $error_arr=[];

    /**
     * CartException constructor.
     * @param string $message
     * @param int $code
     * @param array $error_arr
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, array $error_arr, Throwable $previous = null) {
        $this->error_arr=$error_arr;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Notes:
     * User:
     * Date:2018/11/19
     * @return array
     */
    public function getErrorArr(){
        return $this->error_arr;
    }
}
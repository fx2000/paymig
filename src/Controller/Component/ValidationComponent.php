<?php
/**
 * remitter
 *
 * @link      https://github.com/fx2000/remitter
 * @since     0.1
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Validation component
 *
 */
class ValidationComponent extends Component
{
    var $errors;

    /*
     * ¿Qué hace esta función?
     */
    function Presence($inputData)
    {
        if ($inputData == '' || $inputData == ' ') {
            return true;
        }
        return false;
    }

    /*
     * ¿Qué hace esta función?
     */
    function Space($inputData)
    {
        if ($inputData == '' || $inputData == ' ') {
            return true;
        }
        return false;
    }

    /*
     * ¿Qué hace esta función?
     */
    function Email($inputData)
    {
        $EMAIL_REG_EXP  = "/^[a-zA-Z0-9.]+[a-zA-Z0-9._-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/";
        if (!preg_match($EMAIL_REG_EXP, $inputData)) {
            return true;
        }
        return false;
    }

    /*
     * ¿Qué hace esta función?
     */
    function autoGeneratedPassword()
    {
        //set the random id length
        $random_id_length = 8;
        //generate a random id encrypt it and store it in $rnd_id
        $rnd_id = crypt(uniqid(rand(),1));
        //to remove any slashes that might have come
        $rnd_id = strip_tags(stripslashes($rnd_id));
        //Removing any . or / and reversing the string
        $rnd_id = str_replace(".","",$rnd_id);
        $rnd_id = strrev(str_replace("/","",$rnd_id));
        //finally I take the first 10 characters from the $rnd_id
        $rnd_id = substr($rnd_id,0,$random_id_length);
        $rnd_id = strtoupper($rnd_id);
        return $rnd_id = str_shuffle($rnd_id);
    }

    /*
     * ¿Qué hace esta función?
     */
    function error ($message) {
        if (!is_array($this->errors)) $this->errors = array(); {
            array_push($this->errors, $message);
        }
    }
}

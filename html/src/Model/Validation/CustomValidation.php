<?php
namespace App\Model\Validation;
use Cake\Validation\Validation;

class CustomValidation extends Validation {
  /**
   * 月日の指定
   * @param string $value
   * @return bool
   */
    public static function isValidDate($firstDay, $data) {
        return (bool) ($data['data']['finish_date'] > $firstDay);
    }

}
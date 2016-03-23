<?php
namespace App\Classes\Extension;

use Symfony\Component\Translation\TranslatorInterface;
use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{

    public function __construct(TranslatorInterface $translator, $data, $rules, $messages = array())
    {
        parent::__construct($translator, $data, $rules, $messages);

        $this->implicitRules[] = 'AttributeExists';
    }

    public function validateAttributeExists($attribute, $value, $parameters)
    {
        return isset($this->data[$attribute]);
    }
}
<?php

class SampleappValidator extends DefaultValidator {

    public function __construct() {
        parent::__construct();
    }

    private function _assertValidIsoCode($context, $input, $maxLength, $minLength)
    {
        $isocode = new StringValidationRule('StringValidator', $this->_encoder, $format);
        $isocode->setMinimumLength($minLength);
        $isocode->setMaximumLength($maxLength);
        $isocode->assertValid($context, $input);
        return null;
    }


    /**
     * @inheritdoc
     */
    public function isValidIsoCode($context, $input, $maxLength, $minLength)
    {
        try {
            $this->_assertValidIsoCode($context, $input, $maxLength, $minLength);
        }
        catch (Exception $e) {
            return false;
        }

        return true;
    }
}
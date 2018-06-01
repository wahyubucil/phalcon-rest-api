<?php

namespace Store\Toys;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\InclusionIn;

class Robots extends Model {
    public function validation() {
        $validator = new Validation();

        // Type must be: droid, mechanical or virtual
        $validator->add(
            'type',
            new InclusionIn(
                [
                    'model' => $this,
                    'domain' => [
                        'droid',
                        'mechanichal',
                        'virtual'
                    ]
                ]
            )
        );

        $validator->add(
            'name',
            new Uniqueness(
                [
                    'model' => $this,
                    'message' => 'The robot name must be unique'
                ]
            )
        );

        // Year cannot be less than zero
        if ($this->year < 0) {
            $this->appendMessage(
                new Message('The year cannot be less than zero')
            );
        }

        return $this->validate($validator);
    }
}

?>
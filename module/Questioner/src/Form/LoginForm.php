<?php


namespace Questioner\Form;


use Laminas\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('login');

        $this->add([
            'name' => 'user_name',
            'type' => 'text',
            'options' => [
                'label' => 'User Name',
            ]
        ]);

        $this->add([
            'name' => 'user_password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Register',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary'
            ]
        ]);
    }
}
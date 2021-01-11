<?php


namespace Questioner\Form;


use Laminas\Form\Element\Select;
use Laminas\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('user');

        $this->add([
            'name' => 'user_name',
            'type' => 'text',
            'options' => [
                'label' => 'User Name',
            ]
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'options' => [
                'label' => 'Email',
            ]
        ]);

        $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ]
        ]);

        $this->add([
            'name' => 'confirm_password',
            'type' => 'password',
            'options' => [
                'label' => 'Confirm Password',
            ]
        ]);

        $this->add([
            'type' => Select::class,
            'name' => 'user_type',
            'options' => [
                'label' => 'User Type',
                'empty_option' => 'Choose Type',
                'value_options' => [
                    '0' => 'Teacher',
                    '1' => 'Student',
                ],
            ],
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
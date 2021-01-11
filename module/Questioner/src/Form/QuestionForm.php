<?php


namespace Questioner\Form;


use Laminas\Form\Form;

class QuestionForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('question');

        $this->add([
           'name' => 'question',
           'type' => 'text',
           'options' => [
               'label' => 'Question'
           ],
           'attributes' => [
               'class' => 'form-control'
           ]
        ]);
        $this->add([
            'name' => 'first_choice',
            'type' => 'text',
            'options' => [
                'label' => 'First Choice'
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);
        $this->add([
            'name' => 'second_choice',
            'type' => 'text',
            'options' => [
                'label' => 'Second choice'
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);
        $this->add([
            'name' => 'third_choice',
            'type' => 'text',
            'options' => [
                'label' => 'Third Choice'
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);
        $this->add([
            'name' => 'correct_answer',
            'type' => 'text',
            'options' => [
                'label' => 'Correct Answer'
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' =>'Add',
                'class' => 'btn-primary form-control mt-3'
            ]
        ]);
    }
}
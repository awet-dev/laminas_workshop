<?php


namespace Questioner\Model;


class Question
{
    private string $question;
    private string $first_choice;
    private string $second_choice;
    private string $third_choice;
    private string $correct_answer;
    private int $id;


    public function __construct($data)
    {
        $this->question = isset($data)? $data['question']: "";
        $this->first_choice = isset($data)? $data['first_choice']: "";
        $this->second_choice = isset($data)? $data['second_choice']: "";
        $this->third_choice = isset($data)? $data['third_choice']: "";
        $this->correct_answer = isset($data)? $data['correct_answer']: "";
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return mixed|string
     */
    public function getFirstChoice(): string
    {
        return $this->first_choice;
    }

    /**
     * @return mixed|string
     */
    public function getSecondChoice(): string
    {
        return $this->second_choice;
    }

    /**
     * @return mixed|string
     */
    public function getThirdChoice(): string
    {
        return $this->third_choice;
    }

    /**
     * @return mixed|string
     */
    public function getCorrectAnswer(): string
    {
        return $this->correct_answer;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}
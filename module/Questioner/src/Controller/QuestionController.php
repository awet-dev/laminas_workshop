<?php


namespace Questioner\Controller;


use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Http\Response;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Questioner\Form\QuestionForm;
use Questioner\Model\Question;

class QuestionController extends AbstractActionController
{
    private TableGateway $tableGateway;
    private Adapter $adapter;

    public function __construct()
    {
        $this->adapter = include __DIR__.'/../../adapter/adapter.config.php';
        $this->tableGateway = new TableGateway('question_table', $this->adapter);
    }

    public function indexAction(): ViewModel
    {
        return new ViewModel([
            'form' => new QuestionForm()
        ]);
    }

    public function addAction(): Response
    {
        $request = $this->getRequest();
        if (! $request->isPost()) {
            return $this->redirect()->toRoute('question');
        }

        $form = new QuestionForm();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return $this->redirect()->toRoute('question');
        }

        $question = new Question($form->getData());
        $questionData = [
            'question' => $question->getQuestion(),
            'first_choice' => $question->getFirstChoice(),
            'second_choice' => $question->getSecondChoice(),
            'third_choice' => $question->getThirdChoice(),
            'correct_answer' => $question->getCorrectAnswer()
        ];
        $this->tableGateway->insert($questionData);
        return $this->redirect()->toRoute('question');
    }
}
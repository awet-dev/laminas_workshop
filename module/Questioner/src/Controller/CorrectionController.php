<?php


namespace Questioner\Controller;


use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Questioner\Model\Question;

class CorrectionController extends AbstractActionController
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
        $questions = [];
        $data = $this->tableGateway->select();
        foreach ($data as $item) {
            $question = new Question($item);
            $question->setId($item->id);
            array_push($questions, $question);
        }

        $request = $this->getRequest();
        if (! $request->isPost()) {
            return new ViewModel([
                'questions' => $questions,
            ]);
        }

        return new ViewModel([
            'questions' => $questions,
            'answer' => $request->getPost(),
        ]);
    }

}
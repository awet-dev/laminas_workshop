<?php


namespace Questioner\Controller;


use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Questioner\Form\LoginForm;
use Questioner\Form\UserForm;
use Questioner\Model\User;
use Laminas\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;

class UserController extends AbstractActionController
{
    private Adapter $adapter;
    private TableGateway $tableGateway;

    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        $this->adapter = include __DIR__.'/../../adapter/adapter.config.php';
        $this->tableGateway = new TableGateway('user_table', $this->adapter);
    }


    public function indexAction(): ViewModel
    {
        $form = new UserForm();
        return new ViewModel([
            'form' => $form,
        ]);
    }

    public function registerAction()
    {
        $form = new UserForm();
        $request = $this->getRequest();
        if (! $request->isPost()) {
            return new ViewModel(['form' => $form]);
        }
        $form->setData($request->getPost());
        if (! $form->isValid()) {
            return new ViewModel(['form' => $form]);
        }

        $user = new User($form->getData());
        $this->tableGateway->insert([
            'user_name' => $user->getUserName(),
            'user_email' => $user->getEmail(),
            'user_password' => $user->getPassword(),
            'user_type' => $user->getAdmin()
        ]);
        $user->setId($this->tableGateway->getLastInsertValue());

        if ($user->getAdmin() == 0) {
            return $this->redirect()->toRoute('question');
        } else {
            return $this->redirect()->toRoute('correction');
        }

    }

    public function loginAction(): ViewModel
    {
        $authAdapter = new AuthAdapter(
            $this->adapter,
            'user_table',
            'user_name',
            'user_password'
        );

        $form = new LoginForm();
        $request = $this->getRequest();
        if (! $request->isPost()) {
            return new ViewModel(['form' => $form]);
        }
        $form->setData($request->getPost());
        if (! $form->isValid()) {
            return new ViewModel(['form' => $form]);
        }

        $authAdapter
            ->setIdentity($form->getData()['user_name'])
            ->setCredential($form->getData()['user_password']);

        $result = $authAdapter->authenticate();
        $identity = $authAdapter->getResultRowObject();

        if ($result->getCode() == 1 && $identity->user_type == '0') {
            $this->redirect()->toRoute('question');
        } elseif ($result->getCode() == 1 && $identity->user_type == '1') {
        $this->redirect()->toRoute('correction');
        }
        elseif ($result->getCode() == 0) {
            return new ViewModel([
                'form' => $form,
                'messages' => $result->getMessages()
            ]);
        } elseif ($result->getCode() == -1) {
            return new ViewModel([
                'form' => $form,
                'messages' => $result->getMessages()
            ]);
        } elseif ($result->getCode() == -2) {
            return new ViewModel([
                'form' => $form,
                'messages' => $result->getMessages()
            ]);
        } elseif ($result->getCode() == -3) {
            return new ViewModel([
                'form' => $form,
                'messages' => $result->getMessages()
            ]);
        } elseif ($result->getCode() == -4) {
            return new ViewModel([
                'form' => $form,
                'messages' => $result->getMessages()
            ]);
        }
    }

}
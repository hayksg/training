<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ArticleController extends AbstractActionController
{
    public function indexAction()
    {
        return [];
    }

    public function addAction()
    {
        /*if ($this->request->isPost()) {
            $title = $this->request->getPost('title');

            if (! empty($title)) {
                $successMessage = 'Article added';
                $this->flashMessenger()->addSuccessMessage($successMessage);
            } else {
                $errorMessage = 'Article not added';
                $this->flashMessenger()->addErrorMessage($errorMessage);
            }

            // For regex
            //return $this->redirect()->toRoute('training/article', ['action' => 'article']);


            return $this->redirect()->toRoute('training/article');
        }*/

        return [];
    }

    public function postAction()
    {
        if ($this->request->isPost()) {
            $title = $this->request->getPost('title');

            if (! empty($title)) {
                $successMessage = 'Article added';
                $this->flashMessenger()->addSuccessMessage($successMessage);
            } else {
                $errorMessage = 'Article not added';
                $this->flashMessenger()->addErrorMessage($errorMessage);
            }

            // For regex
            //return $this->redirect()->toRoute('training/article', ['action' => 'article']);


            return $this->redirect()->toRoute('training/article');
        }
    }
}

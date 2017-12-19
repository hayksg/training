<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
        return [];
    }

    public function addAction()
    {
        return [];
    }

    public function addPostAction()
    {
        if ($this->request->isPost()) {
            $title = $this->request->getPost('title');

            if (! empty($title)) {
                $successMessage = 'Product added';
                $this->flashMessenger()->addSuccessMessage($successMessage);
            } else {
                $errorMessage = 'Product not added';
                $this->flashMessenger()->addErrorMessage($errorMessage);
            }

            return $this->redirect()->toRoute('training/product');

            // For regex route
            // return $this->redirect()->toRoute('training/product', ['action' => 'product']);
        }
    }

    public function editAction()
    {
        return [];
    }

    public function editPostAction()
    {
        //$id = $this->params()->fromRoute('id', 0);

        if ($this->request->isPost()) {
            $title = $this->request->getPost('title');

            if (! empty($title)) {
                $successMessage = 'Product edited';
                $this->flashMessenger()->addSuccessMessage($successMessage);
            } else {
                $errorMessage = 'Product not edited';
                $this->flashMessenger()->addErrorMessage($errorMessage);
            }

            return $this->redirect()->toRoute('training/product');

            // For regex route
            //return $this->redirect()->toRoute('training/product', ['action' => 'product']);
        }
    }
}

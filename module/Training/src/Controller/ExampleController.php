<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Controller\IndexController;

class ExampleController extends AbstractActionController
{
    public function indexAction()
    {
        if ($this->request->isPost()) {
            $this->prg();
        }

        $widget = $this->forward()->dispatch(IndexController::class, ['action' => 'index']);

        $viewModel = new ViewModel();
        //$viewModel->addChild($widget, 'widget');
        //$viewModel->setTemplate('training/example/template');
        $viewModel->setVariables([
            'url' => $this->url()->fromRoute(),
            'date' => $this->getDate(),
        ]);
        return $viewModel;
    }

    public function sampleAction()
    {
        //return $this->redirect()->toUrl('http://rambler.ru');
        //return $this->forward()->dispatch(IndexController::class, ['action' => 'index']);
        //$this->layout('layout/layoutTraining');

        $successMessage = 'Success message';
        $errorMessage   = 'Error message';

        $this->flashMessenger()->addSuccessMessage($successMessage);
        //$this->flashMessenger()->addErrorMessage($errorMessage);
        //return $this->redirect()->toRoute('training');

        return [
            'header' => get_headers('http://tutorial.loc'),
        ];
    }

    public function downloadAction()
    {

    }
}

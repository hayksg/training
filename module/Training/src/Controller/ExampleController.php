<?php

namespace Training\Controller;

use Zend\Http\Header\Cookie;
use Zend\Http\Header\SetCookie;
use Zend\Http\Headers;
use Zend\Http\Response\Stream;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Application\Controller\IndexController;

class ExampleController extends AbstractActionController
{
    public function indexAction()
    {
        $message = '';

        if ($this->request->isPost()) {
            $this->prg();
        }

        /*$container = new Container('PhpSessId');
        $message = $container->message;
        $container->getManager()->getStorage()->clear('PhpSessId');*/

        $cookie = $this->getRequest()->getCookie('cookieMessage');
        if ($cookie->offsetExists('cookieMessage')) {
            $message = $cookie->offsetGet('cookieMessage');

            $cookie = new setCookie('cookieMessage', '', time() - 3600, '/');
            $this->getResponse()->getHeaders()->addHeader($cookie);
        }


        $widget = $this->forward()->dispatch(IndexController::class, ['action' => 'index']);

        $viewModel = new ViewModel();
        //$viewModel->addChild($widget, 'widget');
        //$viewModel->setTemplate('training/example/template');
        $viewModel->setVariables([
            'url'     => $this->url()->fromRoute(),
            'date'    => $this->getDate(),
            'message' => $message,
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

        /*$container = new Container('PhpSessId');
        $container->message = 'Hello session';*/


        $cookie = new SetCookie('cookieMessage', 'Hello cookie', time() + 3600, '/');
        $this->getResponse()->getHeaders()->addHeader($cookie);

        return $this->redirect()->toRoute('training/example');

        return [
            'header' => get_headers('http://tutorial.loc'),
        ];
    }

    public function downloadAction()
    {
        $file = getcwd() . '/public_html/img/c.jpg';

        if (is_file($file)) {
            $filename = basename($file);
            $filesize = filesize($file);

            $stream = new Stream();
            $stream->setStream(fopen($file, 'r'));
            $stream->setStreamName($filename);
            $stream->setStatusCode(200);

            $headers = new Headers();
            $headers->addHeaderLine('Content-Type: application/octet-stream');
            $headers->addHeaderLine('Content-Disposition: attachment; filename=' . $filename);
            $headers->addHeaderLine('Content-Length: ' . $filesize);
            $headers->addHeaderLine('Cache-Control: no-store, must-revalidate');

            $stream->setHeaders($headers);
            return $stream;
        }
    }
}

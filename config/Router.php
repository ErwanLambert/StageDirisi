<?php
namespace Site\config;
use Site\src\controller\BackController;
use Site\src\controller\FrontController;
use Site\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($route))
            {
                if($route === 'secteur'){
                    $this->frontController->secteur($this->request->getGet()->get('secteurId'));
                }
                elseif($route === 'bureau'){
                    $this->frontController->bureau($this->request->getGet()->get('bureauId'));
                }
                elseif($route === 'addPersonnel'){
                    $this->backController->addPersonnel($this->request->getPost());
                }
                elseif($route === 'editPersonnel'){
                    $this->backController->editPersonnel($this->request->getPost(), $this->request->getGet()->get('personnelId'));
                }
                elseif($route === 'deletePersonnel'){
                    $this->backController->deletePersonnel($this->request->getGet()->get('personnelId'));
                }
                elseif($route === 'form_permission'){
                    $this->frontController->addPerm($this->request->getPost(), $this->request->getGet()->get('personnelId'));
                }
                elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}
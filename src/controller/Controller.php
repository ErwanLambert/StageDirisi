<?php 
namespace Site\src\controller;
use Site\config\Request;
use Site\src\constraint\Validation;
use Site\src\DAO\SecteurDAO;
use Site\src\DAO\BureauDAO;
use Site\src\DAO\PersonnelDAO;
use Site\src\DAO\DemandeDAO;
use Site\src\model\View;


abstract class Controller
{
    protected $secteurDAO;
    protected $bureauDAO;
    protected $personnelDAO;
    protected $demandeDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;
    
    public function __construct()
    {
        $this->secteurDAO = new SecteurDAO();
        $this->bureauDAO = new BureauDAO();
        $this->personnelDAO = new PersonnelDAO();
        $this->demandeDAO = new DemandeDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
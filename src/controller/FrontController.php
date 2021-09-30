<?php
namespace Site\src\controller;
use Site\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $secteurs = $this->secteurDAO->getSecteurs();
        return $this->view->render('home', [
            'secteurs' => $secteurs
        ]);
    }

    public function secteur($secteurId)
    {
        $secteur = $this->secteurDAO->getSecteur($secteurId);
        $bureaux = $this->bureauDAO->getBureauxFromSecteur($secteurId);
        return $this->view->render('single', [
            'secteur' => $secteur,
            'bureaux' => $bureaux
        ]);
    }

    public function bureau($bureauId)
    {
        $secteur = $this->secteurDAO->getSecteurFromBureau($bureauId);
        $bureau = $this->bureauDAO->getBureau($bureauId);
        $personnels = $this->personnelDAO->getPersonnelsFromBureau($bureauId);
        return $this->view->render('singlePersonnel', [
            'secteur' => $secteur,
            'bureau' => $bureau,
            'personnels' => $personnels
        ]);
    }

    public function addPerm(Parameter $post, $personnelId)
    {
        $personnel = $this->personnelDAO->getPersonnel($personnelId);
        if($post->get('submit')){
            $this->demandeDAO->addPerm($post, $personnelId);
            $this->session->set('form_permission', 'La demande a bien été faite');
            header('Location: ../public/index.php');
        }
        return $this->view->render('form_permission', [
            'personnel' => $personnel,
            'post' => $post
        ]);
    }

    public function login(Parameter $post)
    {
        if($post->get('submit')){
            $result = $this->personnelDAO->login($post);
            if($result && $result['isPasswordValid']){
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('idPers', $result['result']['idPers']);
                $this->session->set('pseudo', $post->get('pseudo'));
                $this->session->set('prenom', $post->get('prenom'));
                header('Location: ../public/index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}
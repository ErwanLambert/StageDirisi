<?php
namespace Site\src\controller;
use Site\config\Parameter;

class BackController extends Controller
{
    public function addPersonnel(Parameter $post)
    {
        if($post->get('submit')){
            $errors = $this->validation->validate($post, 'Personnel');
            if($this->personnelDAO->checkUser($post)){
                $errors['pseudo'] = $this->personnelDAO->checkUser($post);
            }
            if(!$errors){
                $this->personnelDAO->addPersonnel($post);
                $this->session->set('add_personnel', 'Votre inscription a bien été effectuée');
                header('Location: ../public/index.php');
            }
            return $this->view->render('add_personnel', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_personnel');
    }

    public function editPersonnel(Parameter $post, $personnelId)
    {
        $personnel = $this->personnelDAO->getPersonnel($personnelId);
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Personnel');
            if(!$errors){
                $this->personnelDAO->editPersonnel($post, $personnelId);
                $this->session->set('edit_personnel', 'Le personnel a bien été modifié');
                header('Location: ../public/index.php');
            }
            return $this->view->render('edit_personnel', [
                'personnel' => $personnel, 
                'errors' => $errors
            ]);
        }
        $post->set('idPers', $personnel->getIdPers());
        $post->set('nom', $personnel->getNom());
        $post->set('prenom', $personnel->getPrenom());
        $post->set('grade', $personnel->getGrade());
        $post->set('defGrade', $personnel->getDefGrade());       
        $post->set('idBureau', $personnel->getIdBureau());
        
        return $this->view->render('edit_personnel', [
            'personnel' => $personnel
        ]);
    }

    public function deletePersonnel($personnelId)
    {
        $this->personnelDAO->deletePersonnel($personnelId);
        $this->session->set('delete_personnel', 'Le personnel a bien été supprimé');
        header('Location: ../public/index.php');
    }

    public function profile()
    {
        return $this->view->render('profile');
    }

    public function updatePassword(Parameter $post)
    {
        if($post->get('submit')){
            $this->personnelDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
        }
        return $this->view->render('update_password');
    }

    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
        header('Location: ../public/index.php');
    }
}
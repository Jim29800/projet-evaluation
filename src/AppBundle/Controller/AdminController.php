<?php
namespace AppBundle\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use AppBundle\Entity\Annonce;
use AppBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
class AdminController extends BaseAdminController
{
    public function createNewAnnonceEntity()
    {
        $annonce =  new Annonce();
        $annonce->setUtilisateur($this->getUser());
        return $annonce;
    }
    public function createNewUtilisateurEntity()
    {

        $utilisateur = new Utilisateur();
        $utilisateur->setRoles(array('ROLE_ADMIN'));
        $utilisateur->setEnabled(true);
        
        return $utilisateur;
    }

}
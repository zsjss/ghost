<?php
namespace Ghost\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Registration Controller
 */
class RegistrationController extends Controller
{
    public function registerAction()
    {
        $this->get('ghost.breadcrumb')->add('Sign Up');

        $form        = $this->get('ghost.form.registration');
        $formHandler = $this->get('ghost.form.handler.registration');

        if ($formHandler->process()) {
            $this->get('session')->setFlash('success', 'Registration finish, please login.');
            return $this->redirect($this->generateUrl('security_login'));
        }

        return $this->render('GhostUserBundle:Registration:register.html.twig', array(
            'form' => $form->createView()
        ));
    }
}

<?php

namespace MovemberBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MovemberBundle:Default:index.html.twig');
    }
}

<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MCMDemoBundle:Default:index.html.twig');
    }
}

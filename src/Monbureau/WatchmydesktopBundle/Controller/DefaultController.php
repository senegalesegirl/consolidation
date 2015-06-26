<?php

namespace Monbureau\WatchmydesktopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MonbureauWatchmydesktopBundle:Default:index.html.twig');
    }
}

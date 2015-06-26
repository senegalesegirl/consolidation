<?php
namespace Monbureau\WatchmydesktopBundle\Service;

use Knp\Component\Pager\Paginator;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Collections\ArrayCollection;
class OrganisationService
{
    private $em;
    private $paginator;

    public function __construct($entitymanager, $paginator){
        $this ->em = $entitymanager;
        $this->paginator = $paginator;
    }

    public function getAllOrg(array $params)
    {

    $org= $this->em->getRepository('MonbureauWatchmydesktopBundle:Organisation')->findAll();//affichertouteslesOrganisations();
    return $this->paginator->paginate($org, $params['page'],$params['limit']);
    }


    /*
     * Toues les requetes CRUD sur l'entité seront ici!!!!
     */

}
<?php

namespace Monbureau\WatchmydesktopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OrganisationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrganisationRepository extends EntityRepository
{
    public function affichertouteslesOrganisations()
    {
        //$this->findAll();

        $qb= $this ->createQueryBuilder('org')->select('org')->from($this->_entityName, 'org');
        return $qb->getQuery();

    }




}

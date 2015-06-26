<?php

namespace Monbureau\WatchmydesktopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;

use Knp\Component\Pager\Event;


class OrganisationController extends Controller
{
    public function getAllOrganisationAction( Request $request)
    {

       $params['name'] = $request ->get('name',null);

        $params['page'] = $request ->get('page',1);
        $params['limit'] = $request ->get('limit',5);

        $service=$this->get('monbureauWatch.organisation.organisation_manager');

        $org = $service->getAllorg($params);

        $paginatedCollection = new PaginatedRepresentation(
            new CollectionRepresentation(
                $org,
        'users', // embedded rel
        'users'  // xml element name
    ),
    'monbureau.watchmydesktopbundle.organisation.getAllorgs', // route
    array(), // route parameters
    1,       // page number
    20,      // limit
    4,       // total pages
    'page',  // page route parameter name, optional, defaults to 'page'
    'limit', // limit route parameter name, optional, defaults to 'limit'
    false,   // generate relative URIs, optional, defaults to `false`
    75       // total collection size, optional, defaults to `null`
);
        //$paginatedCollection = $this->getPaginatedRepresentation($org, 'organisation', 'organisation');

        return $this->handleView($this->view($paginatedCollection, 3));
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
            'controller_method' => 'AppController',
        ]);
    }

    /**
     * @Route(
     *     "/api/packages/{package}/",
     *     name="api_get_package",
     *     requirements={"package"="(?:[a-z0-9]([_.-]?[a-z0-9]+)*)/[a-z0-9]([_.-]?[a-z0-9]+)*?"},
     *      methods={"GET"}
     * )
     */
    public function package()
    {
        return $this->render('app/index.html.twig', [
            'controller_method' => 'package',
        ]);
    }

    /**
     *  // the regex here should match package=fooooooooooooooooooooo/bar but it doesn't (see: AppControllerTest::testPackageDependentsWithLongNameMatches)
     * @Route(
     *     "/api/packages/{package}/dependents/",
     *     name="api_get_dependents_package",
     *     requirements={"package"="(?:[a-z0-9]([_.-]?[a-z0-9]+)*)/[a-z0-9]([_.-]?[a-z0-9]+)*?"},
     *    methods={"GET"}
     * )
     */
    public function packageDependents()
    {
        return $this->render('app/index.html.twig', [
            'controller_method' => 'packageDependents',
        ]);
    }

    /**
     * @Route(
     *     "/api/v2/packages/{package}/",
     *     name="api_get_package_v2",
     *     requirements={"package"="[a-z0-9]++([_.-][a-z0-9]+)*+/[a-z0-9]++([_.-][a-z0-9]+)*+"},
     *      methods={"GET"}
     * )
     */
    public function packageV2()
    {
        return $this->render('app/index.html.twig', [
            'controller_method' => 'packageV2',
        ]);
    }

    /**
     * // this updated version of the regex works
     * @Route(
     *     "/api/v2/packages/{package}/dependents/",
     *     name="api_get_dependents_package_v2",
     *     requirements={"package"="[a-z0-9]++([_.-][a-z0-9]+)*+/[a-z0-9]++([_.-][a-z0-9]+)*+"},
     *    methods={"GET"}
     * )
     */
    public function packageDependentsV2()
    {
        return $this->render('app/index.html.twig', [
            'controller_method' => 'packageDependentsV2',
        ]);
    }
}

<?php

namespace Boilerplate;

use Bolt\Extension\SimpleExtension;
use Bolt\Menu\MenuEntry;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BoilerplateExtension extends SimpleExtension
{

    /**
     * Set up the default configuration.
     *
     * @see https://docs.bolt.cm/extensions/basics/configuration#providing-defaults
     *
     * @return array
     */
    protected function getDefaultConfig()
    {
        return [
            'foo' => 'bar',
            'qux' => 'baz'
        ];
    }

    /**
     * Add a backend menu entry under 'extensions'.
     *
     * @see https://docs.bolt.cm/extensions/intermediate/admin-menus#registering-menu-entries
     *
     * @return array
     */
    protected function registerMenuEntries()
    {
        $menu = new MenuEntry('Boilerplate-menu', 'Boilerplate');
        $menu->setLabel('Boilerplate')
            ->setIcon('fa:leaf')
            ->setPermission('settings')
        ;

        return [
            $menu,
        ];
    }

    /**
     * Register routes for the Frontend
     *
     * @see https://docs.bolt.cm/extensions/intermediate/controllers-routes#route-callback-functions
     *
     * @param ControllerCollection $collection
     */
    protected function registerFrontendRoutes(ControllerCollection $collection)
    {
        // All requests to /foo
        $collection->match('/foo', [$this, 'frontendControllerFoo']);
    }

    /**
     * Register routes for the Backend
     *
     * @see https://docs.bolt.cm/extensions/intermediate/controllers-routes#route-callback-functions
     *
     * @param ControllerCollection $collection
     */
    protected function registerBackendRoutes(ControllerCollection $collection)
    {
        // GET requests on the /bolt/extensions/koala route
        $collection->get('/extensions/foo', [$this, 'backendControllerFoo']);

        // POST requests on the /bolt/extensions/koala route
        $collection->post('/extensions/foo', [$this, 'backendControllerFoo']);
    }



    /**
     * Register twig functions to be used in templates.
     *
     * @see https://docs.bolt.cm/extensions/basics/twig#registering-twig-functions
     *
     * @return array
     */
    protected function registerTwigFunctions()
    {
        return [
            'foo' => 'fooFunction',
            'bar' => ['barFunction', ['is_safe' => ['html']]]
        ];
    }

    /**
     * Register twig filters to be used in templates.
     *
     * @see https://docs.bolt.cm/extensions/basics/twig#registering-twig-filters
     *
     * @return array
     */
    protected function registerTwigFilters()
    {
        return [
            'foo' => 'fooFilter',
            'bar' => ['barFilter', ['is_safe' => ['html']]]
        ];
    }

    /**
     * Render and return the Twig file templates/foo.twig
     *
     * @return string
     */
    public function fooFunction()
    {
        return $this->renderTemplate('foo.twig');
    }

    /**
     * Lowercase strings.
     *
     * @param string $input
     *
     * @return string
     */
    public function fooFilter($input)
    {
        return strtolower($input);
    }


    /**
     * Controller - Callback function for frontend route
     *
     * @param Application $app
     * @param Request     $request
     *
     * @return Response
     */
    public function frontendControllerFoo(Application $app, Request $request)
    {
        return new Response('Drop bear sighted!', Response::HTTP_OK);
    }

    /**
     * Controller - Callback function for backend route
     *
     * @param Application $app
     * @param Request     $request
     *
     * @return Response
     */
    public function backendControllerFoo(Application $app, Request $request)
    {
        if ($request->isMethod('POST')) {
            // Handle the POST data
            return new Response('Thanks, Kenny', Response::HTTP_OK);
        }

        return new Response('Welcome to your admin page, Kenny', Response::HTTP_OK);
    }

}
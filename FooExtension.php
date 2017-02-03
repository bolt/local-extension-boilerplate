<?php

namespace Foo;

use Bolt\Extension\SimpleExtension;

class FooExtension extends SimpleExtension
{

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'foo' => 'fooFunction',
            'bar' => ['barFunction', ['is_safe' => ['html']]]
        ];
    }

    /**
     * {@inheritdoc}
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
    public function koalaFunction()
    {
        return $this->renderTemplate('koala.twig');
    }

    /**
     * Lowercase strings.
     *
     * @param string $input
     *
     * @return string
     */
    public function koalaFilter($input)
    {
        return strtolower($input);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [
            'foo' => 'bar',
            'qux' => 'baz'
        ];
    }
}
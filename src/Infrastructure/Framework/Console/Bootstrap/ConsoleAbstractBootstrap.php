<?php
declare(strict_types=1);

namespace OneCMS\Base\Infrastructure\Framework\Console\Bootstrap;

use OneCMS\Base\Infrastructure\Framework\Bootstrap\RegisterControllersBootstrapInterface;
use OneCMS\Base\Infrastructure\Framework\Bootstrap\RegisterDependencyBootstrapInterface;
use OneCMS\Base\Infrastructure\Framework\Console\Application\ConsoleApplicationInterface;
use OneCMS\Base\Infrastructure\Framework\Dependency\DependencyInterface;

/**
 * Class ConsoleAbstractBootstrap
 *
 * @package getonecms/base
 * @version 0.0.1
 * @since   0.0.1
 * @author  Mohammed Shifreen
 */
class ConsoleAbstractBootstrap
{
    /**
     * @var DependencyInterface
     */
    private DependencyInterface $dependency;

    /**
     * @return DependencyInterface
     */
    public function getDependency(): DependencyInterface
    {
        return $this->dependency;
    }

    /**
     * @param DependencyInterface $dependency
     */
    public function __construct(DependencyInterface $dependency)
    {
        $this->dependency = $dependency;

        if ($this instanceof RegisterDependencyBootstrapInterface) {
            $this->dependency->getContainer()->setdefinitions($this->dependencies());
        }
    }

    /**
     * Initialize
     * Note: If you override this method, you should call parent implementation on top of it.
     *
     * @param ConsoleApplicationInterface $app
     */
    public function init(ConsoleApplicationInterface $app): void
    {
        if ($this instanceof RegisterControllersBootstrapInterface) {
            $app->set(
                'controllerMap', array_merge($app->get('controllerMap'), $this->controllers())
            );
        }
    }
}
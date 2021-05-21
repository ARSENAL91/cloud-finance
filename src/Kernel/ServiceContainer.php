<?php


namespace Wwjpackages\CloudFinance\Kernel;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Wwjpackages\CloudFinance\Kernel\Providers\HttpClientServiceProvider;

class ServiceContainer extends Container
{
    /**
     * @var ServiceProviderInterface[]
     */
    protected $eagerProviders = [];
    protected $deferProviders = [];

    /**
     * ServiceContainer constructor.
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this->registerProviders($this->getProviders());
    }

    /**
     * @return ServiceProviderInterface[]
     */
    public function getProviders()
    {
        return array_merge([
            HttpClientServiceProvider::class,
        ], $this->eagerProviders);
    }

    /**
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $id => $provider) {
            parent::register(new $provider());
        }
    }

	/**
	 *
	 * @param string $id
	 * @return mixed
	 */
    public function __get($id)
    {
    	if(!in_array($id, $this->keys()) && isset($this->deferProviders[$id])){
    		$provider = $this->deferProviders[$id];
			parent::register(new $provider());
		}
        return $this->offsetGet($id);
    }


}
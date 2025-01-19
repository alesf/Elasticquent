<?php

namespace Elasticquent;

trait ElasticquentClientTrait
{
    use ElasticquentConfigTrait;

    /**
     * Get ElasticSearch Client
     *
     * @return \Elasticsearch\Client
     */
    public function getElasticSearchClient()
    {
        $config = $this->getElasticConfig();

        // elasticsearch v2.0 using builder
        if (class_exists('\Elasticsearch\ClientBuilder')) {
            return \Elasticsearch\ClientBuilder::fromConfig($config);
        }

        // elasticsearch v2.0 using builder
        if (class_exists('Elastic\Elasticsearch\ClientBuilder')) {
            return \Elastic\Elasticsearch\ClientBuilder::fromConfig($config);
        }

        // elasticsearch v2.0 using builder
        if (class_exists('Elastic\Elasticsearch\Client')) {
            return new \Elastic\Elasticsearch\Client($config);
        }

        // elasticsearch v1
        return new \Elasticsearch\Client($config);
    }
}

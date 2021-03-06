<?php

namespace KgBot\Shoporama;

use KgBot\Shoporama\Builders\CategoryBuilder;
use KgBot\Shoporama\Builders\OrderBuilder;
use KgBot\Shoporama\Builders\ProductBuilder;
use KgBot\Shoporama\Utils\Request;

class Shoporama
{
    /**
     * @var $request Request
     */
    protected $request;

    /**
     * Shoporama constructor.
     *
     * @param null $token API token
     * @param array $options Custom Guzzle options
     * @param array $headers Custom Guzzle headers
     */
    public function __construct($token = null, $options = [], $headers = [])
    {
        $this->initRequest($token, $options, $headers);
    }

    private function initRequest($token, $options = [], $headers = [])
    {
        $this->request = new Request($token, $options, $headers);
    }

    /**
     * @return \KgBot\Shoporama\Builders\ProductBuilder
     */
    public function products()
    {
        return new ProductBuilder($this->request);
    }

    /**
     * @return \KgBot\Shoporama\Builders\OrderBuilder
     */
    public function orders()
    {
        return new OrderBuilder($this->request);
    }

    /**
     * @return CategoryBuilder
     */
    public function categories()
    {

        return new CategoryBuilder($this->request);
    }

    public function update_stock($data)
    {
        return json_decode((string)$this->request->client->post('stock', [

            'json' => $data,
        ])->getBody());
    }

    /**
     * @return mixed
     */
    public function self()
    {
        return json_decode((string)$this->request->client->get('self')->getBody());
    }
}
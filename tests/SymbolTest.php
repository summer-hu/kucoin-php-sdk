<?php

namespace KuCoin\SDK\Tests;

use KuCoin\SDK\PublicApi\Symbol;

class SymbolTest extends TestCase
{
    /**
     * @return Symbol
     */
    public function testNewSymbol()
    {
        $api = new Symbol();
        $this->assertInstanceOf(Symbol::class, $api);
        return $api;
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetList(Symbol $api)
    {
        $data = $api->getList();
        $this->assertInternalType('array', $data);
        foreach ($data as $item) {
            $this->assertArrayHasKey('quoteCurrency', $item);
            $this->assertArrayHasKey('symbol', $item);
            $this->assertArrayHasKey('quoteMaxSize', $item);
            $this->assertArrayHasKey('quoteIncrement', $item);
            $this->assertArrayHasKey('baseMinSize', $item);
            $this->assertArrayHasKey('quoteMinSize', $item);
            $this->assertArrayHasKey('enableTrading', $item);
            $this->assertArrayHasKey('priceIncrement', $item);
            $this->assertArrayHasKey('name', $item);
            $this->assertArrayHasKey('baseIncrement', $item);
            $this->assertArrayHasKey('baseMaxSize', $item);
            $this->assertArrayHasKey('baseCurrency', $item);
        }
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetTicker(Symbol $api)
    {
        $data = $api->getTicker('ETH-BTC');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('size', $data);
        $this->assertArrayHasKey('price', $data);
        $this->assertArrayHasKey('bestBid', $data);
        $this->assertArrayHasKey('bestBidSize', $data);
        $this->assertArrayHasKey('bestAsk', $data);
        $this->assertArrayHasKey('bestAskSize', $data);
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetPartOrderBook(Symbol $api)
    {
        $data = $api->getPartOrderBook('ETH-BTC');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('bids', $data);
        $this->assertArrayHasKey('asks', $data);
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetAggregatedFullOrderBook(Symbol $api)
    {
        $data = $api->getAggregatedFullOrderBook('ETH-BTC');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('bids', $data);
        $this->assertArrayHasKey('asks', $data);
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetAtomicFullOrderBook(Symbol $api)
    {
        $data = $api->getAtomicFullOrderBook('ETH-BTC');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('sequence', $data);
        $this->assertArrayHasKey('bids', $data);
        $this->assertArrayHasKey('asks', $data);
    }


    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetHistories(Symbol $api)
    {
        $data = $api->getTradeHistories('ETH-BTC');
        $this->assertInternalType('array', $data);
        foreach ($data as $item) {
            $this->assertArrayHasKey('sequence', $item);
            $this->assertArrayHasKey('time', $item);
            $this->assertArrayHasKey('price', $item);
            $this->assertArrayHasKey('size', $item);
            $this->assertArrayHasKey('side', $item);
        }
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetHistoricRates(Symbol $api)
    {
        $data = $api->getHistoricRates('ETH-BTC', time() - 24 * 3600 * 7 * 3, time(), '8hour');
        $this->assertInternalType('array', $data);
        foreach ($data as $item) {
            //[ "time","open","close","high","low","volume","turnover"]
            $this->assertCount(7, $item);
        }
    }

    /**
     * @depends testNewSymbol
     * @param Symbol $api
     * @throws \KuCoin\SDK\Exceptions\BusinessException
     * @throws \KuCoin\SDK\Exceptions\HttpException
     * @throws \KuCoin\SDK\Exceptions\InvalidApiUriException
     */
    public function testGet24HStats(Symbol $api)
    {
        $data = $api->get24HStats('ETH-BTC');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('symbol', $data);
//        $this->assertArrayHasKey('changeRate', $data);
//        $this->assertArrayHasKey('changePrice', $data);
//        $this->assertArrayHasKey('open', $data);
//        $this->assertArrayHasKey('close', $data);
//        $this->assertArrayHasKey('high', $data);
//        $this->assertArrayHasKey('low', $data);
//        $this->assertArrayHasKey('vol', $data);
//        $this->assertArrayHasKey('volValue', $data);
    }
}
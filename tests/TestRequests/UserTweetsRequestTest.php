<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Acme\Tweet;

final class UserTweetsRequestTest extends TestCase
{   
    public function testPrepareRequest()
    {
        $userTweetsRequest = new Acme\Requests\UserTweetsRequest('username', 5);
        $prepareRequest = $userTweetsRequest->prepareRequest();
        $this->assertArrayHasKey('url', $prepareRequest);
        $this->assertArrayHasKey('getfield', $prepareRequest);
    }
    /**
     * @dataProvider dataProvider
     */
    public function testSaveRespons($data)
    {
        $userTweetsRequest = new Acme\Requests\UserTweetsRequest('username', 5);
        $userTweetsRequest->saveRespons($data);
        $this->assertNotEmpty($userTweetsRequest->tweets);
        foreach ($userTweetsRequest->tweets as $value) {
            $this->assertInstanceOf(Tweet::class, $value);
        }
    }

    public function dataProvider()
    {
        $dataArray = [];
        for ($i=0; $i < 25; $i++) { 
            $text = $this->randomString(\rand(5, 25));
            $id = \rand(0, 255);
            $dataArray[] = ['text'=>$text, 'id'=>$id];
        }
        $returnArray[][] = $dataArray;
        return $returnArray;
    }

    private function randomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ';
        $charactersLength = \strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[\rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
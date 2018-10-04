<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Acme\Tweet;
use Acme\Formatters\UserTweetsFormatter;

final class UserTweetsFormatterTest extends TestCase
{   
    /**
     * @dataProvider dataProvider
     */
    public function testShoutJsonFormat($data)
    {
        $userTweetsFormatter = new UserTweetsFormatter();
        $shoutJson = $userTweetsFormatter->shoutJsonFormat($data);
        $testData = json_decode($shoutJson, true);
        $this->assertArrayHasKey('data', $testData);
        foreach ($testData['data'] as $value) {
            $this->assertArrayHasKey('shout', $value);
            $checkShoutValue = false;
            if (is_string($value['shout'])) {
                $checkShoutValue = true;
            }
            $this->assertEquals(true, $checkShoutValue);
        }
    }

    public function dataProvider()
    {
        $dataArray = [];
        for ($i=0; $i < 25; $i++) { 
            $text = $this->randomString(\rand(5, 25));
            $id = \rand(0, 255);
            $dataArray[] = new Tweet($id, $text, $text);
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
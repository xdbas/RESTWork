<?php
class HelpersTest extends PHPUnit_Framework_TestCase
{
    public function testHtmlSpecialChars()
    {
        $singlestring = '<>&';
        $singlestringAnswer = '&lt;&gt;&amp;';

        $array = [
            '<>&',
            'key<' => [
                '<>&',
                'key<' => '<>&',
            ],
        ];
        $arrayAnswersDoKeysTrue = [
            '&lt;&gt;&amp;',
            'key&lt;' => [
                '&lt;&gt;&amp;',
                'key&lt;' => '&lt;&gt;&amp;',
            ],
        ];
        $arrayAnswersDoKeysFalse = [
            '&lt;&gt;&amp;',
            'key<' => [
                '&lt;&gt;&amp;',
                'key<' => '&lt;&gt;&amp;',
            ],
        ];

        $this->assertEquals($singlestringAnswer, \RESTWork\Helpers::htmlspecialchars($singlestring));
        $this->assertEquals($arrayAnswersDoKeysFalse, \RESTWork\Helpers::htmlspecialcharsArray($array, false));
        $this->assertEquals($arrayAnswersDoKeysTrue, \RESTWork\Helpers::htmlspecialcharsArray($array, true));
    }
}
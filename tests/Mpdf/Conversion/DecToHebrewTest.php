<?php

namespace Mpdf\Conversion;

class DecToHebrewTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	/**
	 * @var \Mpdf\SizeConverter
	 */
	private $converter;

	protected function set_up()
	{
		parent::set_up();

		$this->converter = new DecToHebrew();
	}

	/**
	 * @dataProvider conversionProvider
	 *
	 * @param string $input
	 * @param string $output
	 */
	public function testConvert($input, $output, $reverse = true)
	{
		$this->assertSame($output, $this->converter->convert($input, $reverse));
	}

    public static function conversionProvider()
    {
        return [
            [0, '0'],
            [1, 'א'],
            [22, 'בכ'],
            [75, 'הע', true],
            [158, 'חנק'],
            [158, 'חנק', true],
            [569, 'טסקת'],
            [666, 'וסרת'],
            [666, 'וסרת', true],
            [8456, 8456],
            [11248, 11248],
        ];
    }

}

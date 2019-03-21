<?php

	require_once '../../phpScripts/viewAboutMe.php';

	use PHPUnit\Framework\Testcase;

	class ViewAboutMeTest extends Testcase
	{
		public function testViewParagraphsSuccess()
		{
			$expected = '<p>This is a Paragraph</p><p>This is Another Paragraph</p>';
			$input = [['paragraph'=>'This is a Paragraph'],['paragraph'=>'This is Another Paragraph']];
			$case = viewParagraphs($input);
			$this->assertEquals($expected, $case);
		}

		public function testViewParagraphsMalformedInt()
		{
			$input = 100;
			$this->expectException(TypeError::class);
			viewParagraphs($input);
		}

		public function testViewParagraphsMalformedString()
		{
			$input = 'This is a Paragraph';
			$this->expectException(TypeError::class);
			viewParagraphs($input);
		}

		public function testViewParagraphsFailureIndexedArray()
		{
			$expected = '';
			$input = [['0'=>'This is a Paragraph']];
			$case = viewParagraphs($input);
			$this->assertEquals($expected, $case);
		}

		public function testViewParagraphsFailureEmptyValue()
		{
			$expected = '';
			$input = [['paragraph'=>'']];
			$case = viewParagraphs($input);
			$this->assertEquals($expected, $case);
		}

		public function testViewParagraphsFailureErrorKey()
		{
			$expected = '';
			$input = [['text'=>'This is a Paragraph']];
			$case = viewParagraphs($input);
			$this->assertEquals($expected, $case);
		}
	}
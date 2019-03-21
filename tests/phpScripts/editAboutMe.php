<?php
	require_once '../../phpScripts/editAboutMe.php';

	use PHPUnit\Framework\Testcase;

	class EditAboutMeTest extends Testcase
	{
		public function testEditParagraphSuccess()
		{
			$expected = 'This is a Paragraph';
			$input = ['paragraph'=>'This is a Paragraph'];
			$case = displayParagraph($input);
			$this->assertEquals($expected, $case);
		}

		public function testEditParagraphMalformedInt()
		{
			$input = 100;
			$this->expectException(TypeError::class);
			displayParagraph($input);
		}

		public function testEditParagraphMalformedString()
		{
			$input = 'This is a Paragraph';
			$this->expectException(TypeError::class);
			displayParagraph($input);
		}

		public function testEditParagraphFailureIndexedArray()
		{
			$expected = '';
			$input = ['0'=>'This is a Paragraph'];
			$case = displayParagraph($input);
			$this->assertEquals($expected, $case);
		}

		public function testEditParagraphFailureEmptyValue()
		{
			$expected = '';
			$input = ['paragraph'=>''];
			$case = displayParagraph($input);
			$this->assertEquals($expected, $case);
		}

		public function testEditParagraphFailureErrorKey()
		{
			$expected = '';
			$input = ['text'=>'This is a Paragraph'];
			$case = displayParagraph($input);
			$this->assertEquals($expected, $case);
		}

		public function testDisplayHiddenInputSuccess()
		{
			$expected = '<input type="hidden" name="textToEditId" value="1">';
			$input = 1;
			$case = displayHiddenInput($input);
			$this->assertEquals($expected, $case);
		}

		public function testDisplayHiddenInputMalformedString()
		{
			$input = 'this is wrong';
			$this->expectException(TypeError::class);
			displayHiddenInput($input);
		}

		public function testDisplayHiddenInputMalformedArray()
		{
			$input = [];
			$this->expectException(TypeError::class);
			displayHiddenInput($input);
		}

		public function testDisplayHiddenInputFailure()
		{
			$expected = '';
			$input = -1;
			$case = displayHiddenInput($input);
			$this->assertEquals($expected, $case);
		}
	}
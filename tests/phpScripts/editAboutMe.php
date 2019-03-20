<?php

	require '../../phpScripts/editAboutMe.php';

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

		public function testEditParagraphMalformed1()
		{
			$input = 100;
			$this->expectException(TypeError::class);
			displayParagraph($input);
		}

		public function testEditParagraphMalformed2()
		{
			$input = 'This is a Paragraph';
			$this->expectException(TypeError::class);
			displayParagraph($input);
		}

		public function testEditParagraphFailure1()
		{
			$expected = '';
			$input = ['0'=>'This is a Paragraph'];
			$case = displayParagraph($input);
			$this->assertEquals($expected, $case);
		}

		public function testEditParagraphFailure2()
		{
			$expected = '';
			$input = ['paragraph'=>''];
			$case = displayParagraph($input);
			$this->assertEquals($expected, $case);
		}

		public function testEditParagraphFailure3()
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

		public function testDisplayHiddenInputMalformed1()
		{
			$input = 'this is wrong';
			$this->expectException(TypeError::class);
			displayHiddenInput($input);
		}

		public function testDisplayHiddenInputMalformed2()
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
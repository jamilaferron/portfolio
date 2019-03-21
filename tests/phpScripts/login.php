<?php
	require_once '../../phpScripts/login.php';

	use PHPUnit\Framework\Testcase;

	class LoginTest extends Testcase
	{
		public function testReturnIdSuccess()
		{
			$expected = '1';
			$input = ['id'=> '1'];
			$case = returnId($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnIdMalformedInt()
		{
			$input = 100;
			$this->expectException(TypeError::class);
			returnId($input);
		}

		public function testReturnIdMalformedString()
		{
			$input = 'This is a Paragraph';
			$this->expectException(TypeError::class);
			returnId($input);
		}

		public function testReturnIdFailureIndexArray()
		{
			$expected = '';
			$input = [['0'=>'1']];
			$case = returnId($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnIdFailureEmptyValue()
		{
			$expected = '';
			$input = [['id'=>'']];
			$case = returnId($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnIdFailureErrorKey()
		{
			$expected = '';
			$input = [['text'=>'1']];
			$case = returnId($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnPasswordSuccess()
		{
			$expected = '1abcde';
			$input = ['password'=> '1abcde'];
			$case = returnPassword($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnPasswordMalformedInt()
		{
			$input = 100;
			$this->expectException(TypeError::class);
			returnPassword($input);
		}

		public function testReturnPasswordMalformedString()
		{
			$input = 'This is a Paragraph';
			$this->expectException(TypeError::class);
			returnPassword($input);
		}

		public function testReturnPasswordFailureIndexArray()
		{
			$expected = '';
			$input = [['0'=>'1abcde']];
			$case = returnPassword($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnPasswordFailureEmptyValue()
		{
			$expected = '';
			$input = [['id'=>'']];
			$case = returnPassword($input);
			$this->assertEquals($expected, $case);
		}

		public function testReturnPasswordFailureErrorKey()
		{
			$expected = '';
			$input = [['text'=>'1abcde']];
			$case = returnPassword($input);
			$this->assertEquals($expected, $case);
		}


		public function testDisplayLoginButtonSuccess()
		{
			$expected = '<form method="post" action="index.php" class="logout-button">
								<input type="submit" name="logout" value="Logout">
						</form>';
			$input1 = true;
			$input2 = 'index.php';
			$case = displayLoginButton($input1, $input2);
			$this->assertEquals($expected, $case);
		}

		public function testDisplayLoginButtonMalformedArray()
		{
			$input1 = [];
			$input2 = 'index.php';
			$this->expectException(TypeError::class);
			displayLoginButton($input1, $input2);
		}

	}
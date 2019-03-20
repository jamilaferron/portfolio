<?php
	require_once '../../phpScripts/functions.php';

	use PHPUnit\Framework\Testcase;

	class FunctionsTest extends Testcase
	{
		public function testDisplayTableRowSuccess()
		{
			$expected =  '<tr>
					<td>
						<p>This is a paragraph</p>
					</td>
					<td>
						<form action="editParagraph.php" method="post">
							<input type="hidden" name="paragraphId" value="1">
							<input type="submit" value="Edit" name="edit_item">
						</form>
					</td>
					<td>
						<form action="dashboard.php" method="post">
							<input type="hidden" name="paragraphId" value="1">
							<input type="submit" value="Delete" name="delete_item">
						</form>
					</td>
				</tr>';
			$input = [['id'=> '1', 'paragraph'=>'This is a paragraph']];
			$case = displayTableRow($input);
			$this->assertEquals($expected, $case);
		}

		public function testViewParagraphsMalformed1()
		{
			$input = 100;
			$this->expectException(TypeError::class);
			displayTableRow($input);
		}

		public function testViewParagraphsMalformed2()
		{
			$input = 'This is a Paragraph';
			$this->expectException(TypeError::class);
			displayTableRow($input);
		}

		public function testViewParagraphsFailure1()
		{
			$expected = '';
			$input = [['0'=>'This is a Paragraph']];
			$case = displayTableRow($input);
			$this->assertEquals($expected, $case);
		}

		public function testViewParagraphsFailure2()
		{
			$expected = '';
			$input = [['paragraph'=>'']];
			$case = displayTableRow($input);
			$this->assertEquals($expected, $case);
		}

		public function testViewParagraphsFailure3()
		{
			$expected = '';
			$input = [['text'=>'This is a Paragraph']];
			$case = displayTableRow($input);
			$this->assertEquals($expected, $case);
		}

		public function testCheckInputLengthSuccess()
		{
			$expected = true;
			$input = 'This is a paragraph';
			$case = checkInputLength($input);
			$this->assertEquals($expected, $case);
		}

		public function testCheckInputLengthMalformed()
		{
			$input = [];
			$this->expectException(TypeError::class);
			checkInputLength($input);
		}

		public function testCheckInputLengthFailure()
		{
			$expected = false;
			$input = '';
			$case = checkInputLength($input);
			$this->assertEquals($expected, $case);
		}

		public function testCheckInputLengthFailure2()
		{
			$expected = false;
			$input = 'I am a highly motivated full-stack web developer in training with a keen interest in PHP development. I am currently studying at the Mayden Academy in Bath. I have recently attained my BSc in Computing and IT (Software) from the Open University, this is where I decided to embark on a career as a Software Engineer.I am a highly motivated full-stack web developer in training with a keen interest in PHP development. I am currently studying at the Mayden Academy in Bath. I have recently attained my BSc in Computing and IT (Software) from the Open University, this is where I decided to embark on a career as a Software Engineer.I am a highly motivated full-stack web developer in training with a keen interest in PHP development. I am currently studying at the Mayden Academy in Bath. I have recently attained my BSc in Computing and IT (Software) from the Open University, this is where I decided to embark on a career as a Software Engineer.';
			$case = checkInputLength($input);
			$this->assertEquals($expected, $case);
		}
	}
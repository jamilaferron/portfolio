<?php

	require '../../phpScripts/functions.php';

	use PHPUnit\Framework\Testcase;

	class FunctionsTest extends Testcase
	{
		public function testDisplayTableRowSuccess()
		{
			$expected = '<tr>
					<td>
						<p>This is a paragraph</p>
					</td>
					<td>
						<a href="editParagraph.php" class="button">Edit</a>
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
	}
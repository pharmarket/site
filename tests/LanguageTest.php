<?php

class LanguageTest extends TestCase {

	/**
	 * Verification de la gestion de la langue
	 *
	 * @return void
	 */
	public function testLangue()
	{
		$langue = ['fr','en', 'es','de'];

		foreach($langue as $row){
			$response = $this->call('GET', 'language/'.$row);
			$this->assertSessionHas('locale', $row);
		}
	}

}

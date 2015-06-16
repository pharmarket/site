<?php

class HomeTest extends TestCase {

	/**
	 * Verification de l'etat de la home
	 *
	 * @return void
	 */
	public function testIsOnline()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

}

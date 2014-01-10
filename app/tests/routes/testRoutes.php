
<?php

class ExampleTest extends TestCase {

	public function testHomeRoute()
	{
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());
	}

}

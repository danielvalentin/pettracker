<?php

class RoutesTest extends TestCase {

	public function testAllRoutes()
	{
		$routes = Route::getRoutes();
		foreach($routes as $route)
		{
			$path = $route->getPath();
			if($path == '/')
			{
				$path = '';
			}
			$path = '/'.$path;
			$crawler = $this->client->request('GET', $path);
			if($path == '/user/logout')
			{
				$this->assertResponseStatus('302', '/user/logout did not redirect');
			}
			else
			{
				$this->assertTrue($this->client->getResponse()->isOk(), 'Path: '.$path.' failed to respond 200');
			}
		}
	}

}

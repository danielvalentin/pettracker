<?php

use Illuminate\View\FileViewFinder;

class BaseController extends Controller {
	
	protected $layout = 'templates.default';
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			
			$currentroute = Route::currentRouteAction();
			list($controller, $action) = explode('@', $currentroute);
			$controller = strtolower(str_replace('Controller', '', $controller));
			$view = $controller.'.'.$action;
			try
			{
				View::getFinder()->find($view);
				$this->layout->view = View::make($view);
			}
			catch(InvalidArgumentException $e)
			{
				$this->layout->view = '';
			};
		}
	}
	
	protected function view($name)
	{
		if ( ! is_null($this->layout))
		{
			$this->layout->view = View::make($name);
		}
	}
	
	protected function bind($key, $value)
	{
		$this->layout->view->$key = $value;
	}

}

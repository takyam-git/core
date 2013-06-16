<?php
namespace Fuel\Core;
class ViewModel_Rest extends ViewModel
{
	protected $_view = 'viewmodel/rest';

	public function render()
	{
		if (class_exists('Request', false))
		{
			$current_request = Request::active();
			Request::active($this->_active_request);
		}

		$this->before();
		$return = $this->{$this->_method}();
		$after_return = $this->after() and $return = $after_return;

		if (class_exists('Request', false))
		{
			Request::active($current_request);
		}

		return $return;
	}
}
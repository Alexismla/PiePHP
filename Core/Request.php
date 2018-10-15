<?php 

namespace Core;

/**
 * summary
 */
class Request
{
    /**
     * summary
     */
    public function __construct()
    {
        $request = [];
		foreach ($_REQUEST as $key => $value) {
			$this->{$key} = trim(stripslashes(htmlspecialchars($value)));
			$request[$key] = $this->{$key};
		}
		$this->request = $request;
    }
}

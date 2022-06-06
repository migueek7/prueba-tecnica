<?php 
class LinkController {

	public function linkPage() {

		$link = [];

		if (isset($_GET["url"])) 
		{
			$link = explode("/", $_GET["url"]);
		}
		else
		{
			$link = "home";
		}

		$request = linkModel::linkPage($link);

		return $request;
	}
}
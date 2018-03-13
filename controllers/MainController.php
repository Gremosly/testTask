<?php


	class MainController
	{
		public function actionIndex()
		{
				
				$productList=products::getAllProducts();
				require_once(ROOT."/views/index.php");

				return true;
			
		}

		
	}

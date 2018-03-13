<?php

	class sales
	{
		public static function getSalesByProductId($productId)
		{
			$db=Db::getConnection();
	
			$saleList=array();

			$result=$db->query('SELECT * '
				.'FROM sales '
				."WHERE productId = '$productId' "
				."ORDER BY startSale ASC ; ");
		
			$i=0;

			while($row = $result->fetch()){
				$saleList[$i]['saleId']=$row['saleId'];
				$saleList[$i]['productId']=$row['productId'];
				$saleList[$i]['salePrice']=$row['salePrice'];
				$saleList[$i]['startSale']=$row['startSale'];
				$saleList[$i]['endSale']=$row['endSale'];
				$i++;
			}
			return $saleList;
		}	

	}


?>

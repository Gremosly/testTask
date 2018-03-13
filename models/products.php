<?php

	class products
	{
		const default_price = 10000;

		public static function getAllProducts()
		{
			$db=Db::getConnection();
	
			$productList=array();

			$result=$db->query('SELECT * '
				.'FROM products '
				.'ORDER BY productId DESC ;');
		
			$i=0;

			while($row = $result->fetch()){
				$productList[$i]['productId']=$row['productId'];
				$productList[$i]['productName']=$row['productName'];
				$productList[$i]['price']=$row['price'];
				$productList[$i]['description']=$row['description'];
				$i++;
			}
			return $productList;
		}	

		public static function changePriceByProductId($productId,$price)
		{
			$db=Db::getConnection();
	
			
			$sql="UPDATE products SET "
			."price = :price, "
			."WHERE productId = :productId";

			$result=$db->prepare($sql);
			$result->bindParam(':price',$price,PDO::PARAM_STR);
			$result->bindParam(':productId',$productId,PDO::PARAM_INT);
			$result->execute();

			return true;

		}	

		public static function getPriceByProductId($productId)
		{
			$db=Db::getConnection();
	
			
			$result=$db->query("SELECT price FROM products WHERE productId = '$productId' ;");
			$row = $result->fetch();

			return $row['price'];

		}

		//	Приоритетнее цена, установленная позднее 
		public static function checkPriceByProductId($productId)
		{
			$db=Db::getConnection();
	
			$saleList=sales::getSalesByProductId($productId);
			$price=products::getPriceByProductId($productId);

			if($saleList){
				
				foreach ($saleList as $saleItem) {
					if (($saleItem['startSale']<date('Y-m-d'))&&($saleItem['endSale']>date('Y-m-d'))){
						$price=$saleItem['salePrice'];
					}		
				}

			};

			return $price;

		}	

		//	Приоритетнее цена с меньшим периодом действия
		public static function checkPriceByProductId2($productId)
		{
			$db=Db::getConnection();
	
			$saleList=sales::getSalesByProductId($productId);
			$price=products::getPriceByProductId($productId);

			if($saleList){
				$finDiff = null;
				foreach ($saleList as $saleItem) {
					if (($saleItem['startSale']<date('Y-m-d'))&&($saleItem['endSale']>date('Y-m-d'))){
						$d1 = strtotime($saleItem['startSale']);
						$d2 = strtotime($saleItem['endSale']);
						$diff = $d2-$d1;
						$diff = $diff/(60*60*24);
						if (($diff<$finDiff)||($finDiff==null)) {
							$price=$saleItem['salePrice'];
							$finDiff=$diff;
						};
					}		
				}

			};

			return $price;

		}	

	}


?>

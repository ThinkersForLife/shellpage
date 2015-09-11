<?php
include_once("db_config.php");
class Database {
		
		//var $pdo;		
		private static $connection;
		private $pdo;

		private function __construct(){

						try
						{
							$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=gbk', DB_USERNAME, DB_PASSWORD);
							$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						}
						catch (PDOException $e)
						{
							return 'connection failed: '.$e->getMessage();
						}


		}
		
		public static function getInstance(){

						if(is_null(self::$connection)){
							self::$connection=new Database();
						}
						return self::$connection;

		}
		/*	
		 *
		 *	Creates the table with the given name and predefined fields.
		 *
		 */
		public function createTable($table='built_shuffle'){

			$query="CREATE TABLE `$table` (
				 `slno` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique serial number pk',
				 `edate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp of entry',
				 `name` varchar(64) DEFAULT NULL COMMENT 'Name of the Person playing the game',
				 `email` varchar(256) DEFAULT NULL COMMENT 'email',
				 `companyName` varchar(256) DEFAULT NULL COMMENT 'companyName',
				 `location` varchar(32) DEFAULT NULL,
				 `quizName` varchar(128) DEFAULT NULL COMMENT 'name of the quiz',
				 `userAns` text DEFAULT NULL COMMENT 'Answer given by user',
				 `correctAns` text DEFAULT NULL COMMENT 'Correct Answer',
				 `status` text DEFAULT NULL COMMENT 'PLAYED OR NOT PLAYED',
				 `rawScr` text DEFAULT NULL COMMENT 'raw score',
				 `gameTime` text DEFAULT NULL COMMENT 'Time Taken to play the game',
				 `passScr` int(3) DEFAULT NULL COMMENT 'pass score',
				 `maxScr` int(5) DEFAULT NULL COMMENT 'max score',
				 `minScr` int(5) DEFAULT NULL COMMENT 'min score',
				 `totalScr` int(5) DEFAULT NULL COMMENT 'total score the user has gained from playing this game',
				 `totalGameTime` varchar(9) DEFAULT NULL COMMENT 'total time the user has played this game',
				 `jic` text COMMENT 'just in case',
				 `hashtag` varchar(64) DEFAULT NULL,
				 `field1` text DEFAULT NULL COMMENT 'Extra field',
				 `field2` text DEFAULT NULL COMMENT 'Extra field',
				 `field3` text DEFAULT NULL COMMENT 'Extra field',
				 `field4` text DEFAULT NULL COMMENT 'Extra field',
				 `field5` text DEFAULT NULL COMMENT 'Extra field',
				 `field6` text DEFAULT NULL COMMENT 'Extra field',
				 `session_id` text DEFAULT NULL COMMENT 'Session Id',
				 `ip_address` text DEFAULT NULL COMMENT 'IP address',
				 `user_agent` text DEFAULT NULL COMMENT 'User agent',
				 PRIMARY KEY (`slno`)
				) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COMMENT='This table has content that stores information of the 				quiz r'";

			$data = $this->pdo->prepare($query);

			try{
				$demo_games_configuration=$data->execute();
			}catch(PDOException $err){

						$query="CREATE TABLE `".RATINGS_TABLE."` (
							 `slno` int(5) NOT NULL AUTO_INCREMENT COMMENT 'unique serial number pk',
							 `edate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp of entry',
							 `name` varchar(64) DEFAULT NULL COMMENT 'Name of the Person playing the game',
							 `email` varchar(256) DEFAULT NULL COMMENT 'email',
							 `ratings` varchar(256) DEFAULT NULL COMMENT 'ratings',
							 PRIMARY KEY (`slno`) 
							) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COMMENT='This table has content that stores ratings of the 				quiz r'; ALTER TABLE ".RATINGS_TABLE."
ADD UNIQUE (email)";

						$data = $this->pdo->prepare($query);

						try{
							$demo_games_configuration=$data->execute();
						}catch(PDOException $err){
							return "Error: ".$err->getMessage();
						}


						return "Error: ".$err->getMessage();
			}

			
			return true;
		}

		/*
		 * 	Runs the query.	
		 * 	
		 */
		public function runQuery($sql_query){

			$query = $this->pdo->prepare($sql_query);

			try{
				$demo_games_configuration=$query->execute();
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}
			
			try{
				$demo_games_configuration=$query->fetchAll(PDO::FETCH_ASSOC);
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}
			
			return $demo_games_configuration;	
		}


		/*
		 * 	Returns the configuration of demo games theme
		 * 	
		 */
		public function getDemoGamesConfiguration(){
			
			$query = $this->pdo->prepare('SELECT * FROM '.DEMO_GAMES_PAGE_CONFIG);
			try{
				$demo_games_configuration=$query->execute();
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}
			
			$demo_games_configuration=$query->fetchAll(PDO::FETCH_ASSOC);
			
			return $demo_games_configuration;	
		}
		


		/**
		 *
		 *	Sorting Multi-dimenstional array
		 **/
		public function search_array($needle, $haystack) {
		     if(in_array($needle, $haystack)) {
			  return true;
		     }
		     foreach($haystack as $element) {
			  if(is_array($element) && search_array($needle, $element))
			       return true;
		     }
		   return false;
		}


		/*
		 * 	Returns the Top result
		 * 	
		 */
		public function getResult($limit=0,$email=-1){

			if($email!=-1){
				
								if($limit==-1)
											$query = $this->pdo->prepare('SELECT * FROM '.RESULT_TABLE.' ORDER BY totalScr DESC');
								else{
//											$query = $this->pdo->prepare('SELECT companyName,email,name,totalScr FROM '.RESULT_TABLE.' WHERE totalScr <> 0 GROUP BY email ORDER BY totalScr DESC');
											$query = $this->pdo->prepare('SELECT edate,companyName,email,name,SUM(totalScr) as totalScr,MAX(rawScr) as rawScr, COUNT(totalScr) as totalRows  FROM '.RESULT_TABLE.' WHERE totalScr > 0 GROUP BY email ORDER BY totalScr DESC');
											//$query = $this->pdo->prepare('SELECT companyName,email,name,SUM(totalScr) as totalScr FROM '.RESULT_TABLE.' WHERE totalScr <> 0 GROUP BY email ORDER BY rawScr DESC LIMIT 10');
								}

								if(strcmp($limit,"getResultforSubmit")==0){
									$email_query = $this->pdo->prepare('SELECT * FROM '.RESULT_TABLE.' WHERE email="'.$email.'" AND hashtag="'.$_SESSION['hash'].'" ORDER BY totalScr DESC LIMIT 1');	
								}
								else{
									$email_query = $this->pdo->prepare('SELECT * FROM '.RESULT_TABLE.' WHERE email="'.$email.'" ORDER BY totalScr DESC LIMIT 1');	
								}
			
				
								try{
											$result_data=$query->execute();
											$email_data=$email_query->execute();
								}catch(PDOException $err){
											return "Error: ".$err->getMessage();
								}
		
								$result_data=$query->fetchAll(PDO::FETCH_ASSOC);	
								$tmp_data=$result_data;
								$email_data=$email_query->fetchAll(PDO::FETCH_ASSOC);

								if(!in_array_r($email_data[0]['email'], $result_data)) {
										 // do something if the given value does not exist in the array
										 $result_data[count($result_data)-1]=$email_data[0];
								}
								$result_data=$tmp_data;
//								echo $limit;
								if(strcmp($limit,"getResult")==0){
									$result_data=$email_data;
								}
								if(strcmp($limit,"getResultforSubmit")==0)
									$result_data=$email_data;
			}else{

							if($limit==-1){
										$query = $this->pdo->prepare('SELECT edate,name,email,location,minScr,maxScr,totalGameTime,companyName,SUM(totalScr) as totalScr, COUNT(totalScr) as totalRows FROM '.RESULT_TABLE.' WHERE totalScr >= 0 GROUP BY email ORDER BY totalScr DESC');
										//$query = $this->pdo->prepare('SELECT * FROM '.RESULT_TABLE.' ORDER BY totalScr DESC');
							}
							else{
										//$query = $this->pdo->prepare('SELECT companyName,email,name,totalScr FROM '.RESULT_TABLE.' WHERE totalScr <> 0 GROUP BY email ORDER BY totalScr DESC LIMIT 10');
										$query = $this->pdo->prepare('SELECT edate,companyName,email,name,SUM(totalScr) as totalScr,MAX(rawScr) as rawScr, COUNT(totalScr) as totalRows  FROM '.RESULT_TABLE.' WHERE totalScr <> 0 GROUP BY email ORDER BY totalScr DESC');
//										$query = $this->pdo->prepare('SELECT companyName,email,name,SUM(totalScr) as totalScr,MAX(rawScr) as rawScr FROM '.RESULT_TABLE.' WHERE totalScr <> 0 GROUP BY email ORDER BY totalScr DESC LIMIT 10');
										$query2 = $this->pdo->prepare('SELECT edate,companyName,name,max(totalScr) as rawScr,email, COUNT(totalScr) as totalRows  FROM '.RESULT_TABLE.' WHERE totalScr <> 0 GROUP BY email ORDER BY totalScr DESC LIMIT 10');												
							}

							try{	
										$result_data=$query->execute();
							}catch(PDOException $err){
										return "Error: ".$err->getMessage();
							}
		
							$result_data=$query->fetchAll(PDO::FETCH_ASSOC);

			}
			return $result_data;	
		}
		
		/*
		 * 	Adds the ratings to the "RATINGS_TABLE" Constant
		 * 	
		 */
		public function logRatings($name,$email,$ratings){
			
			$query = $this->pdo->prepare('INSERT INTO '.RATINGS_TABLE.' SET name=:name,email=:email,ratings=:ratings');

			try{
				$result_data=$query->execute(
						array(
							'name' => $name,
							'email' => $email,
							'ratings' => $ratings
						)	
					);
			}catch(PDOException $err){
				echo "Error: ".$err->getMessage();
			}
					
			return "Thank you for the ratings :) ";	
		}

		/*
		 * Getting the ratings of the user.
		 */
		public function getRatings($email){

			$query = $this->pdo->prepare("SELECT * FROM ".RATINGS_TABLE." WHERE email='".$email."' LIMIT 1");
			try{
						$get_ratings=$query->execute();
			}catch(PDOException $err){
						return "Error: ".$err->getMessage();
			}			
			
			$get_ratings=$query->fetchAll(PDO::FETCH_ASSOC);
			
			return count($get_ratings);	

		}

		
		/*
		 * 	Adds the result to the "RESULT_TABLE" Constant
		 * 	
		 */
		public function addResult($edate,$name,$email,$companyName,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$time,$jic,$hashtag){
			
			$query = $this->pdo->prepare('INSERT INTO '.RESULT_TABLE.' SET edate=:edate,name=:name,email=:email,companyName=:companyName,location=:location,
						     quizName=:quizName,userAns=:userAns,correctAns=:correctAns,status=:status,rawScr=:rawScr,gameTime=:gameTime,passScr=:passScr,
						     maxScr=:maxScr,minScr=:minScr,totalGameTime=:totalGameTime,jic=:jic,hashtag=:hashtag');

			try{
				$result_data=$query->execute(
						array(
							'edate' => $edate,
							'name' => $name,
							'email' => $email,
							'companyName' => $companyName,
							'location' => $location,
							'quizName' => $quizName,
							'userAns' => $userAns,
							'correctAns' => $correctAns,
							'status' => $status,
							'rawScr' => $rawScr,
							'gameTime' => $gameTime,
							'passScr' => $passScr,
							'maxScr' => $maxScr,
							'minScr' => $minScr,
							'totalGameTime' => $time,
							'jic' => $jic,
							'hashtag' => $hashtag
						)	
					);
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}
					
			return "Your result has been saved successfully ! ";	
		}


		/*
		 * 	Updates the user's score in RESULT_TABLE.
		 *		NEW CODE BY Jay : 19 May, 2015 7:22 AM
		 * 
		 */
		public function updateResult($edate,$name,$email,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$totalGameTime,$totalScr,$jic,$hashtag){

			$query = $this->pdo->prepare('UPDATE '.RESULT_TABLE.' 
									SET 	
											edate=:edate,
											name=:name,
											email=:email,
											location=:location,						     						
											quizName=:quizName,
											userAns=case when userAns is null then :userAns
																			else concat(userAns,concat(",",:userAns)) end,
											correctAns=case when correctAns is null then :correctAns
																			else concat(correctAns,concat(",",:correctAns)) end,
											status=case when status is null then :status
																			else concat(status,concat(",",:status)) end,
											rawScr=case when rawScr is null then :rawScr
																			else concat(rawScr,concat(",",:rawScr)) end,
											gameTime=case when gameTime is null then :gameTime
																			else concat(gameTime,concat(",",:gameTime)) end,
											passScr=:passScr,
											maxScr=:maxScr,
											minScr=:minScr,
											totalGameTime=:totalGameTime,
											totalScr=:totalScr,
											jic=:jic,
											hashtag=:hashtag
										WHERE
											email=:checkEmail AND location=:checkLocation AND name=:checkName AND hashtag=:hashtag
							');
		
			try{
				$query->execute(
								array(
									'edate' => date("Y-m-d H:i:s"),
									'checkName' => $name,
									'checkEmail' => $email,
									'checkLocation' => $location,
									'name' => $name,
									'email' => $email,
									'location' => $location,
									'quizName' => $quizName,
									'userAns' => $userAns,
									'correctAns' => $correctAns,
									'status' => $status,
									'rawScr' => $rawScr,
									'gameTime' => ($gameTime-1),
									'passScr' => $passScr,
									'maxScr' => $maxScr,
									'minScr' => $minScr,
									'totalGameTime' => ($totalGameTime-1),
									'totalScr' => $totalScr,
									'jic' => $jic,
									'hashtag' => $hashtag
								)	
					);
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}
		
			return "Users score has been updated successfully !";	
		}
		
		


		/*
		 * 	Changes the Demo Games Site Details.
		 * 
		 */
		public function changeDemoGamesConfiguration($home_title,$home_tagline,$games_title,$games_description,$game_page_button_text,$game_page_button_link,$result_title,$result_description,$result_page_button_text,$result_page_button_link,$contact_title,$address_line_1,$address_line_2,$city_state,$phone,$email,$theme_name,$home_page_image){

			$query = $this->pdo->prepare('UPDATE '.DEMO_GAMES_PAGE_CONFIG.' 
						SET 
							home_title=:home_title,
							home_tagline=:home_tagline,
							games_title=:games_title,
							games_description=:games_description,
							game_page_button_text=:game_page_button_text,
							game_page_button_link=:game_page_button_link,
							result_title=:result_title,
							result_description=:result_description,
							result_page_button_text=:result_page_button_text,
							result_page_button_link=:result_page_button_link,
							contact_title=:contact_title,
							address_line_1=:address_line_1,
							address_line_2=:address_line_2,
							city_state=:city_state,
							theme_name=:theme_name,
							home_page_image=:home_page_image,
							phone=:phone,
							email=:email
							');
		
		$query->execute(
				array(
					'home_title' => $home_title,
					'home_tagline' => $home_tagline,
					'games_title' => $games_title,
					'games_description' => $games_description,
					'game_page_button_text' => $game_page_button_text,
					'game_page_button_link' => $game_page_button_link,
					'result_title' => $result_title,
					'result_description' => $result_description,
					'result_page_button_text' => $result_page_button_text,
					'result_page_button_link' => $result_page_button_link,
					'contact_title' => $contact_title,
					'address_line_1' => $address_line_1,
					'address_line_2' => $address_line_2,
					'city_state' => $city_state,
					'theme_name' => $theme_name,
					'home_page_image' => $home_page_image,
					'phone' => $phone,
					'email' => $email
				)
			);
		
			return "Demo Games Site Details Changed Successfully !";	
		}
		
		
		
		/*
		 * 	Adds the new word to "4pics1" table
		 * 	
		 */
		public function addWord($word,$category,$tags,$table='4pics1'){

			$query = $this->pdo->prepare('INSERT INTO '.$table.' SET word=:word,category=:category,tags=:tags');

			try{
				$result_data=$query->execute(
						array(
							'word' => $word,
							'category' => $category,
							'tags' => $tags
						)	
					);
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}
					
			return "New word has been added successfully ! ";	
		}
		
		

		/*
		 * 	Deletes the picture from database
		 * 	
		 */
		public function deletePicture($slno,$table='4pics1'){
			
			$query = $this->pdo->prepare('DELETE FROM '.$table.' WHERE slno='.$slno);
			try{
				$delete_picture=$query->execute();
			}catch(PDOException $err){
				return "Error: ".$err->getMessage();
			}				
			return "Picture has been deleted successfully from the database";	
		}
		


		/*
		 * Getting the serial number of last inserted pic.
		 */
		public function getLastWordDetails($table='4pics1'){

			$query = $this->pdo->prepare("SELECT max(slno) as mslno FROM $table LIMIT 1");
			try{
						$pic_count=$query->execute();
			}catch(PDOException $err){
						return "Error: ".$err->getMessage();
			}
			
			$pic_count=$query->fetchAll(PDO::FETCH_ASSOC);
			
			return $pic_count;	

		}

		
		
		/*
		 * 	Fetching the word details of given serial number and table name.
		 *	If the serialno is not given, it will return entire table data.
		 */
		public function getWordDetails($serialno,$table='4pics1'){

			if($serialno==null or $serialno==0)
				$query = $this->pdo->prepare("SELECT * FROM $table ORDER BY edate");
			else
				$query = $this->pdo->prepare("SELECT * FROM $table WHERE slno = $serialno ORDER BY edate LIMIT 1");		
		
			try{
						$word_details=$query->execute();
			}catch(PDOException $err){
						return "Error: ".$err->getMessage();
			}
			
			$word_details=$query->fetchAll(PDO::FETCH_ASSOC);
			
			return $word_details;	

		}



		
		/*
		 * Destructor will destroy an object when in no use.
		 */
		private function __destruct(){
			
		}
		
		
		
}

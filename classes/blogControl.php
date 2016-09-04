<?php

	require 'dbcontrol.php';

	class blogger{

		private $blogger_id;
		private $blogger_username;
		private $blogger_password;
		private $blogger_creation_date;
		private $blogger_is_active;
		private $blogger_updated_on;
		private $blogger_end_date;

		public function __construct(){

			$createTable = "create table if not exists blogger_info ( blogger_id int primary key auto_increment, blogger_username varchar(50), blogger_password varchar(25), blogger_creation_date date, blogger_is_active char(1) default 'N', blogger_updated_on date, blogger_end_dateDate date)";
			$connect = new connect();
			$connect->executeQuery($createTable);
		}

		public function checkUser($userName){

			$connect = new connect();
			$query = "select blogger_username from blogger_info where blogger_username='".$userName."' ";
			$result = $connect->executeQuery($query);

			return $result;
		}

		public function createBlogger($userName,$password){

			$connect = new connect();

			$query = "insert into blogger_info (blogger_username , blogger_password, blogger_creation_date , blogger_updated_date  ) values ('".$userName."','".$password."','".date("Y-m-d")."','".date("Y-m-d")."')";
		
			$connect->executeQuery($query);			
		}

		public function login($userName){
			session_destroy();
			session_start();
			$_SESSION['username'] = $userName;
			//echo "Succesfully Logged in<br>";
			
		}

		public function logout(){
			session_destroy();
			header("location: index.php");
		}

		public function getId($blogger_username){
			$connect = new connect();
			$query = "SELECT blogger_id FROM blogger_info WHERE blogger_username = '".$blogger_username."'"; 
		    $result = $connect->executeQuery($query);

		    $bloggerData = mysqli_fetch_assoc($result);
		    $bloggerId = $bloggerData['blogger_id'];
		    
		    return $bloggerId;

		}	

		public function getUsername($blogger_id){
			$connect = new connect();
			$query = "SELECT blogger_username FROM blogger_info WHERE blogger_id = '".$blogger_id."'"; 
		    $result = $connect->executeQuery($query);

		    $bloggerData = mysqli_fetch_assoc($result);
		    $bloggerUsername = $bloggerData['blogger_username'];
		    
		    return $bloggerUsername;

		}	


		public function displayBloggers(){
			$connect = new connect();
			$query = "SELECT blogger_username,blogger_creation_date,blogger_is_active,blogger_updated_date,blogger_end_date FROM blogger_info";
			$result = $connect->executeQuery($query);

			//$bloggerData = mysqli_fetch_assoc($result);
			return $result;
		}

		
		public function getActivity($blogger_id){
			$connect = new connect();
			$query = "SELECT blogger_is_active FROM blogger_info where  blogger_id = '" . $blogger_id . "'";
			$result = $connect->executeQuery($query);

			$bloggerData = mysqli_fetch_assoc($result);
			$bloggerActivity = $bloggerData['blogger_is_active'];
		
		    return $bloggerActivity;

		}

		public function changeActivity($blogger_id,$value){
			$connect = new connect();

			
			$query = "UPDATE blogger_info SET  blogger_is_active = '" . $value . "' , blogger_updated_date =  '".date("Y-m-d")."' , blogger_end_date = '".date("Y-m-d")."' WHERE blogger_id = '" . $blogger_id . "'";
			$result = $connect->executeQuery($query);
		}


		public function createProfile($bloggerId,$bloggerName,$bloggerLastname,$gender,$contact,$about){
			$connect = new connect();
			$query = "INSERT into profile (blogger_id,blogger_name,blogger_lastname,gender,contact,about) values ('".$bloggerId."','".$bloggerName."','".$bloggerLastname."','".$gender."','".$contact."','".$about."') ";
			$result = $connect->executeQuery($query);

			return $result;
		}


		public function bloggerProfile($bloggerId){
			$connect = new connect();
		$query = "SELECT blogger_name,blogger_lastname,gender,contact,about FROM profile WHERE blogger_id = '" .$bloggerId."'";
			$result = $connect->executeQuery($query);

			return $result;
		}

		public function getMaxBloggerId(){
			$connect = new connect();
			$query = "SELECT MAX(blogger_id) FROM blogger_info";
			$result = $connect->executeQuery($query);

			$bloggerData = mysqli_fetch_assoc($result);
			$bloggerMaxId = $bloggerData['MAX(blogger_id)'];

			return $bloggerMaxId;
		}
	}//class BLOGGER ends here.


	class blog{

		private $blog_id;
		private $blogger_id;
		public $blog_title;
		public $blog_desc;
		public $blog_category;
		public $blog_author;		
		private $blog_is_active;
		public $creation_date;
		public $updated_date;
		
		public function __construct()
		{
			$createBlog = "create table if not exists blog_master ( blog_d int primary key auto_increment, blogger_id int references blogger_id(blogger_info) , blog_title varchar(50), blog_desc text, blog_category varchar(10), creation_date,  updated_date date default NULL, blog_is_active char(1) default 'A')";
			
			$connect = new connect();
			$connect->executeQuery($createBlog);
		}

		public function storeBlog($blogger_id,$blog_title,$blog_desc,$blog_category,$blog_author){
			
		$connect = new connect();
		
			$query = "insert into blog_master (blogger_id , blog_title, blog_desc, blog_category,blog_author, creation_date, updated_date  ) values ('".$blogger_id."','".$blog_title."', '".$blog_desc."', '".$blog_category."','".$blog_author."', '".date("Y-m-d")."','".date("Y-m-d")."')";
		
			$result = $connect->executeQuery($query);	

			return $result;
		}

		public function editBlog($blog_id,$blog_title,$blog_desc,$blog_category){
			
		$connect = new connect();
		echo "blog id herr:" . $blog_id;
		echo "blog id herr:" . $blog_title;
			$query = "UPDATE blog_master set blog_title = '".$blog_title."' , blog_desc = '".$blog_desc."' , blog_category = '". $blog_category."' , updated_date = '".date("Y-m-d")."' WHERE blog_id = '".$blog_id."' ";
		
			$result = $connect->executeQuery($query);	

			return $result;
		}

		

		public function displayBlogs($blogger_id){
			$connect = new connect();
			$query = "SELECT blog_id,blog_title,blog_category,blog_desc,creation_date,updated_date,blog_is_active,blogger_creation_date,blogger_id,blogger_is_active FROM blog_master NATURAL JOIN blogger_info WHERE blogger_id = '".$blogger_id."' ";
			$result = $connect->executeQuery($query);
			
			return $result;
		}

		public function displayBlog($blog_id){
			$connect = new connect();
			$query = "SELECT blog_id,blog_title,blog_category,blog_desc,creation_date,updated_date,blogger_creation_date,blogger_id,blogger_is_active FROM blog_master NATURAL JOIN blogger_info WHERE blog_id = '".$blog_id."' ORDER BY creation_date desc";
			$result = $connect->executeQuery($query);
			
			return $result;
		}

		public function getBlogActivity($blog_id){
			$connect = new connect();
			$query = "SELECT blog_is_active FROM blog_master where  blog_id = '" . $blog_id . "'";
			$result = $connect->executeQuery($query);

			$blogData = mysqli_fetch_assoc($result);
			$blogActivity = $blogData['blog_is_active'];
		
		    return $blogActivity;

		}

		public function changeBlogActivity($blog_id,$value){
			$connect = new connect();
			$query = "UPDATE blog_master SET  blog_is_active = '" . $value . "' , updated_date =  '".date("Y-m-d")."' WHERE blog_id = '" . $blog_id . "'";
			$result = $connect->executeQuery($query);
		}

		public function getMaxBlogId(){
			$connect = new connect();
			$query = "SELECT MAX(blog_id) FROM blog_master";
			$result = $connect->executeQuery($query);

			$blogData = mysqli_fetch_assoc($result);
			$blogMaxId = $blogData['MAX(blog_id)'];

			return $blogMaxId;
		}

	}//class BLOG ends here.

		
	class imageThings{


		function saveimage($name,$image)
		{                   
            
			$connect = new connect();
			$connect->startConnection();

			$query = "INSERT into blog_detail (blog_id,blog_detail_image) values ('" . $name . " ','" . $image . "')";
			$result = $connect->executeQuery($query);

			if($result)
			{
				echo "<br/>Image uploaded.";
			}
			else
			{
				echo "<br/>Image not uploaded.";
			}
			//$connect->stopConnection();
		}


		function displayimage($blogId)
		{
			$connect = new connect();
			$connect->startConnection();
			$query = "SELECT blog_detail_image from blog_detail WHERE blog_id = '".$blogId."' ";
			$result = $connect->executeQuery($query);

			while($row = mysqli_fetch_array($result))
			{
				echo '<img height="300" width="300" src="data:image;base64,'.$row['blog_detail_image'].' "> ';
			}
			//$connect->stopConnection();   
		}

		function editimage($blogId,$value)
		{
			$connect = new connect();
			$connect->startConnection();

			$query1 = "SELECT blog_id FROM blog_detail WHERE blog_id = '" . $blogId . "' ";
			$result1 = $connect->executeQuery($query1);

			if (mysqli_num_rows($result1)){
				$query = "UPDATE blog_detail set blog_detail_image = '". $value ."' WHERE blog_id = '".$blogId."' ";
				$result = $connect->executeQuery($query);
			} else {
				$query = "INSERT into blog_detail (blog_id,blog_detail_image) values ('" . $blogId . " ','" . $value . "')";
				$result = $connect->executeQuery($query);			
			}
			

			
			//$connect->stopConnection();   
		}

    }//-------class imageThings end here
?>
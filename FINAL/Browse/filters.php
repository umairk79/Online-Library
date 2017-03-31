<?php 
		$search=$_GET['search'];
		$radio=$_GET['radio_group1'];
		$filter="none";
		if(isset($_GET['filter']))
			$filter=$_GET['filter'];
		
			
		switch($filter)
		{
			case "none":
					switch($radio)
					{
						case "all":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') or lower(author_name) like lower('".$search."%') or  lower(genre) like lower('".$search."%') order by bookname" ;
							break;
						case "bytitle":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') order by bookname" ;
							break;
						case "byauthor":
							$q="SELECT * FROM book_details natural join author_details where lower(author_name) like lower('".$search."%') order by bookname" ;
							break;
						case "bygenre":
							$q="SELECT * FROM book_details natural join author_details where lower(genre) like lower('".$search."%') order by bookname" ;
							break;
						
					}
					break;
			case "r-topdown":
					switch($radio)
					{
						case "all":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') or lower(author_name) like lower('".$search."%') or  lower(genre) like lower('".$search."%') order by rating desc,bookname" ;
							break;
						case "bytitle":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') order by rating desc,bookname" ;
							break;
						case "byauthor":
							$q="SELECT * FROM book_details natural join author_details where lower(author_name) like lower('".$search."%') order by rating desc,bookname" ;
							break;
						case "bygenre":
							$q="SELECT * FROM book_details natural join author_details where lower(genre) like lower('".$search."%') order by rating desc,bookname" ;
							break;
						
					}
					break;
			
			case "r-downtop":
					switch($radio)
					{
						case "all":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') or lower(author_name) like lower('%".$search."%') or  lower(genre) like lower('%".$search."%') order by rating,bookname" ;
							break;
						case "bytitle":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') order by rating,bookname" ;
							break;
						case "byauthor":
							$q="SELECT * FROM book_details natural join author_details where lower(author_name) like lower('".$search."%') order by rating,bookname" ;
							break;
						case "bygenre":
							$q="SELECT * FROM book_details natural join author_details where lower(genre) like lower('".$search."%') order by rating,bookname" ;
							break;
						
					}
					break;
					
			case "y-newold":
					switch($radio)
					{
						case "all":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') or lower(author_name) like lower('".$search."%') or  lower(genre) like lower('".$search."%') order by yop desc,bookname" ;
							break;
						case "bytitle":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') order by yop desc,bookname" ;
							break;
						case "byauthor":
							$q="SELECT * FROM book_details natural join author_details where lower(author_name) like lower('".$search."%') order by yop desc,bookname" ;
							break;
						case "bygenre":
							$q="SELECT * FROM book_details natural join author_details where lower(genre) like lower('".$search."%') order by yop desc,bookname" ;
							break;
						
					}
					break;	
					
			case "y-oldnew":
					switch($radio)
					{
						case "all":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') or lower(author_name) like lower('".$search."%') or  lower(genre) like lower('".$search."%') order by yop,bookname" ;
							break;
						case "bytitle":
							$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') order by yop,bookname" ;
							break;
						case "byauthor":
							$q="SELECT * FROM book_details natural join author_details where lower(author_name) like lower('".$search."%') order by yop,bookname" ;
							break;
						case "bygenre":
							$q="SELECT * FROM book_details natural join author_details where lower(genre) like lower('".$search."%') order by yop,bookname" ;
							break;
						
					}
					break;
			
		}
?>
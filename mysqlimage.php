<html>
    <body>
        <form method="post" enctype="multipart/form-data">
        <br/>
            <input type="file" name="image" />
            <br/><br/>
            <input type="submit" name="submit" value="Upload" />
        </form>
        <?php

        require 'classes/dbcontrol.php';
        

            if(isset($_POST['submit']))
            {
                

                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['tmp_name']);

                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            }

            displayimage();

            function saveimage($name,$image)
            {                   
                //echo "<br/>Image to be uploaded.";
                $connect = new connect();
                $connect->startConnection();

                $query = "insert into test (image_name,image) values ('" . $name . " ','" . $image . "')";
                $result = $connect->executeQuery($query);

                if($result)
                {
                    echo "<br/>Image uploaded.";
                }
                else
                {
                    echo "<br/>Image not uploaded.";
                }
                $connect->stopConnection();
            }

            function displayimage()
            {
                $connect = new connect();
                $connect->startConnection();
                $query = "select * from test";
                $result = $connect->executeQuery($query);

                while($row = mysqli_fetch_array($result))
                {
                    echo '<img height="300" width="300" src="data:image;base64,'.$row[1].' "> ';
                }
                $connect->stopConnection();   
            }
        ?>
    </body>
</html>
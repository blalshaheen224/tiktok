<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload vid</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="main.css">
    <?php
      include('config.php');
      $subject = '';
      $title   = '';
      if(isset($_POST['subject']))
      {
        $subject = $_POST['subject'];
      }

      if(isset($_POST['title']))
      {
        $title = $_POST['title'];
      }
      
      if(isset($_POST['but_upload']))
      {
        $maxsize = 5242880 ; //5mb
        $name    = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_filr= $target_dir.$name;
        $videoFileType = strtolower(pathinfo($target_filr,PATHINFO_EXTENSION));
        $extenstions_arr = array("mp4","mpeg","avi","3gp");
        $location = $target_filr;
        if(in_array($videoFileType,$extenstions_arr))
        {
           if( ($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0 ) )
               {
               echo"<center><h3 class = 'faild'>حجم الملف كبير يجب ان يكون حجمه اقل من 5 ميغا</h3><center>";
               }
                    else
                    {
                       if(move_uploaded_file( $_FILES['file']['tmp_name'] , $target_filr))
                            {
                               $query = "INSERT INTO videos(name,location,subject,title) VALUES('".$name."','".$location."','$subject','$title')";
                               mysqli_query($con,$query);
                               echo"<center><h3 class = 'succes'>  تم رفع الفيديو </h3><center>";
                          
                            }
                    }

         
              }
        }


      


    ?>
</head>
<body>
     <div class="container">
           <center>
             <img src="images/logo1.png" >
           </center>
           <div class="form">
               <form action="" method="post" enctype="multipart/form-data">
                  <input type="file" name="file" id="file" placeholder  ="اختيار ملف">
                  <br>
                  <input type="text" name="title" id="title" placeholder = "عنوان الفيديو">
                  <br>
                  <input type="text" name="subject" id="subject" placeholder ="وصف الفيديو" >
                  <br>
                  <input type="submit" value="رفع الفيديو" name="but_upload">
                  <a href="readvideos.php" class="linko">الرجوع للتطبيق</a>
               </form>
           </div>
      </div>    
</body>
</html>
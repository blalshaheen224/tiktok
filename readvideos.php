<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran app</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="app-vedio">
        <?php
        $fetchAllVideos = mysqli_query($con,"SELECT * FROM videos order by id desc");
        while($row = mysqli_fetch_assoc($fetchAllVideos))
        {
            $location = $row['location'];
            $subject = $row['subject'];
            $title = $row['title'];
            


          echo "  <div class='vedio'>
            <video src='".$location."' class='vedio-player'></video>
             <div class='footer'>
               <div class='footer-text'>
                  <h3>$title</h3>
                  <P class='description'>$subject</P>
                  <div class='img-marq'>
                  <a href='upload.php'> <img src='images/up.png'></a>
                    
                      
                  </div>
 
 
                 </div>
            </div>
            <img src='images/play1.png' class='image-play'>
            ";
        }
        ?>

    </div>

<script>
    const vedios = document.querySelectorAll('video');
    for(const video of vedios )
    {
           video.addEventListener('click',function()
           {
              if(video.paused)
              {
               video.play();
              }
              else
              {
               video.pause();
              }
           }
         )

    }
</script>
    
</body>
</html>


 </div>
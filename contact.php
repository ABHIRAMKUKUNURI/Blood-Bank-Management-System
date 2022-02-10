
<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="blood-bank";

$conn = mysqli_connect($server_name,$username ,$password,$database_name);
if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    
    $NAME = $_POST['NAME'];
    $EMAIL = $_POST['EMAIL'];
    $SUBJECT = $_POST['SUBJECT'];
    $MESSAGE = $_POST['MESSAGE'];
    // get the post recordsswds
    
    $sql_query = "INSERT INTO `messages`(`ID`, `NAME`, `EMAIL`, `SUBJECT`, `MESSAGE`,`STATUS`) 
    VALUES ('','$NAME','$EMAIL','$SUBJECT','$MESSAGE',1)";

    // insert in database 
    $rs = mysqli_query($conn, $sql_query);

    if($rs)
    {
        include 'contact.html';
        echo '
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <script> alert("Success! Your message has been Successfully sent.")</script>
        </div>
        
        
        ';
        
    }
    else{
        echo "error" . $sql ."" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members - Niners</title>

    <link rel="stylesheet" href="style.css">

    <?php
/*
TWO modes of coming into this file:
1. From the List page, in which case we will have the id
2. From this page after the user made the changes, in which case we will have "submit"
*/
        //Either way load file into memory - copy from list page
        $member_file = new SplFileObject('data/members.csv', 'r');
        $member_file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

        $member = [];
        $members = [];
        while(! $member_file->eof()){
            $members[] = $member_file->fgetcsv();
        }
        //Close the file as we will open it again later in a different mode
        $member_file = null;

        if(isset($_GET['submit'])){
            //we have the ID as well

            //find the record with that id
                //more efficient to do it while loading file!

            $row_number = -1;
            for($i=0;$i<count($members);$i++){
                if($members[$i][0] == $_GET['id']){
                    $row_number = $i;
                }
            }


            $member[] = $_GET['id'];
            $member[] = $_GET['surname'];
            $member[] = $_GET['firstname'];
            $member[] = $_GET['dob'];
            $member[] = $_GET['handicap'];
            $member[] = $_GET['ga_num'];
            $member[] = $_GET['phone'];
            $member[] = $_GET['email'];

            //open the file in truncate/write mode
            $member_file = new SplFileObject('data/members.csv', 'w');

            //write the data to file
            for($i=0;$i<count($members);$i++){
                $member_file->fputcsv($members[$i]);
            }
            //Go back to List
            header("Location: members.php");

        }elseif(isset($_GET['id'])){
            //find that member
            $row_number = -1;
            for($i=0;$i<count($members);$i++){
                if($members[$i][0] == $_GET['id']){
                    $row_number = $i;
                }
            }
            //take a copy of that record for ease of use
            if($row_number > -1){
                $member = $members[$row_number];
            }else{
                echo "Member ".$_GET['id']." not found.<br>";
                echo "<a href='members.php'>Back to Member List</a>";
                die();
            }
        }else{
            //shouldnt be here
            header("Location: members.php");
        }

    ?>
</head>
<body>

<pre>
        <?php
            // print_r($_GET);
            // print_r($member);
        ?>
</pre>


    <div class="container">
        <nav>

        </nav>
        <div class="main">
            <h1>Niners</h1>
            <h2>Members</h2>

            <form action="">
                <div class="row">
                    <label for="id">id</label>
                    <input name="id" type="text" readonly value="<?php echo $member[0];?>">
                </div>
                <div class="row">
                    <label for="surname">Surname</label>
                    <input name="surname" type="text" value="<?php echo $member[1];?>">
                </div>                
                <div class="row">
                    <label for="firstname">First name</label>
                    <input name="firstname" type="text" value="<?php echo $member[2];?>">
                </div>  
                <div class="row">
                    <label for="dob">DoB</label>
                    <input name="dob" type="date" value="<?php echo $member[3];?>">
                </div>  
                <div class="row">
                    <label for="handicap">Handicap</label>
                    <input name="handicap" type="number" step="1" value="<?php echo $member[4];?>">
                </div>  
                <div class="row">
                    <label for="ga_num">GA Number</label>
                    <input name="ga_num" type="text" minlength="10" maxlength="10" value="<?php echo $member[5];?>">
                </div>  
                <div class="row">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" value="<?php echo $member[6];?>">
                </div>  
                <div class="row">
                    <label for="email">email</label>
                    <input name="email" type="email" value="<?php echo $member[7];?>">
                </div> 
                <div class="row">
                    <button class="block" name="submit" type="submit">Submit Details</button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>

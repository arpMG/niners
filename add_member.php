<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members - Niners</title>

    <link rel="stylesheet" href="style.css">

    <?php

        $member = [];

        if(isset($_GET['submit'])){

            $member[] = $_GET['surname'];
            $member[] = $_GET['firstname'];
            $member[] = $_GET['dob'];
            $member[] = $_GET['handicap'];
            $member[] = $_GET['ga_num'];
            $member[] = $_GET['phone'];
            $member[] = $_GET['email'];

            $member_file = new SplFileObject('data/members.csv', 'a');
            $member_file->fputcsv($member);
            $member_file = null;


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
                    <label for="surname">Surname</label>
                    <input name="surname" type="text" placeholder="Enter surname">
                </div>                
                <div class="row">
                    <label for="firstname">First name</label>
                    <input name="firstname" type="text" placeholder="Enter first name">
                </div>  
                <div class="row">
                    <label for="dob">DoB</label>
                    <input name="dob" type="date">
                </div>  
                <div class="row">
                    <label for="handicap">Handicap</label>
                    <input name="handicap" type="number" step="1">
                </div>  
                <div class="row">
                    <label for="ga_num">GA Number</label>
                    <input name="ga_num" type="text" minlength="10" maxlength="10" placeholder="GA Number">
                </div>  
                <div class="row">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" placeholder="Phone">
                </div>  
                <div class="row">
                    <label for="email">email</label>
                    <input name="email" type="email" placeholder="email address">
                </div> 
                <div class="row">
                    <button class="block" name="submit" type="submit">Submit Details</button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
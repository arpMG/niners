<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member List - Niners</title>

    <link rel="stylesheet" href="style.css">
    <?php
        
        $member_file = new SplFileObject('data/members.csv', 'r');
        $member_file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

        $members = [];
        while(! $member_file->eof()){
            $member = $member_file->fgetcsv();
            $members[] = $member;
        }

    ?>

</head>
<body>
    <pre>
        <?php
            // print_r($members);
        ?>
    </pre>
    <div class="container">
        <h1>Niners</h1>
        <h2>Member List</h2>
        <table class="tbl">
            <thead>
                <th>id</th>
                <th>Surname</th>
                <th>First name</th>
                <th>Date of Birth</th>
                <th>Handicap</th>
                <th>GA Number</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                    foreach($members as $member){
                       echo "<tr>".PHP_EOL;
                       echo "<td>".$member[0]."</td>".PHP_EOL;
                       echo "<td>".$member[1]."</td>".PHP_EOL;
                       echo "<td>".$member[2]."</td>".PHP_EOL;
                       echo "<td>".$member[3]."</td>".PHP_EOL;
                       echo "<td>".$member[4]."</td>".PHP_EOL;
                       echo "<td>".$member[5]."</td>".PHP_EOL;
                       echo "<td>".$member[6]."</td>".PHP_EOL;
                       echo "<td>".$member[7]."</td>".PHP_EOL;
                       echo "<td><a href='edit_member.php?id=".$member[0]."'>edit</a></td>".PHP_EOL;
                       echo "<td><a href='del_member.php?id=".$member[0]."'>del</a></td>".PHP_EOL;

                       echo "</tr>".PHP_EOL;
                    }
                ?>
            </tbody>
        </table>


    </div>
</body>
</html>
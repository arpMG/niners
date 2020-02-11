<?php
    if(isset($_GET['id'])){

        //load file into memory - copy from list page
        $member_file = new SplFileObject('data/members.csv', 'r');
        $member_file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

        $members = [];
        while(! $member_file->eof()){
            $member = $member_file->fgetcsv();
            $members[] = $member;
        }
        //Close the file as we will open it again later in a different mode
        $member_file = null;

        //find the record with that id
            //more efficient to do it while loading file!

        $row_number = -1;
        for($i=0;$i<count($members);$i++){
            if($members[$i][0] == $_GET['id']){
                $row_number = $i;
            }
        }

        //delete it

        if($row_number > -1){
            unset($members[$row_number]);
        }else{
            echo "Error - member not found";
            die(); //return to list page?
        }

        //open the file in truncate/write mode
        $member_file = new SplFileObject('data/members.csv', 'w');

        //write the data to file
        for($i=0;$i<count($members);$i++){
            $member_file->fputcsv($members[$i]);
        }

        //now go back to list
        header("Location: members.php");

    }
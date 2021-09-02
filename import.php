<?php

    if($_GET['add'] == "yes"){
        $users = [
            ['Ajout', 'de', 'mots']
        ];

        $fp = fopen('file.csv', 'w');

        foreach ($users as $user) {
            fputcsv($fp, $user);
        }

        fclose($fp);
    }

    $row = 1;
    if (($handle = fopen("file.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
        }
        fclose($handle);
    }
    

/*    echo $_POST['test'];

    if(!empty($_POST)){
        
        $file = checkInput($_FILES['image']['name']);
        
        $filePath = 'file/' . basename($file);
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        
        if($fileExtension != "csv"){
            echo "Fichier csv requis !";
        } else if ($fileExtension == "csv"){
            $row = 1;
            if (($handle = fopen("file.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    echo "<p> $num fields in line $row: <br /></p>\n";
                    $row++;
                    for ($c=0; $c < $num; $c++) {
                        echo $data[$c] . "<br />\n";
                    }
                }
                fclose($handle);
            }
        }
    }


    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }*/

?>


<html>
    <header>
        <title>Import CSV</title>
    </header>
    
    
    <body>
        <form role="form" action="import.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" id="test" name="test">
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </body>
    
</html>
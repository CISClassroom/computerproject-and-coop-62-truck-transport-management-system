<?php 
    $con = mysqli_connect('localhost','root','','register');
    mysqli_set_charset($con, 'utf8');
    //check connection
    if(mysqli_connect_error()){
        echo 'Failed to connect to MySQL:' . mysqli_connect_error();
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM car_data
        INNER JOIN province ON car_data.car_province = province.id 
        WHERE car_data.rec = $id";

 

    $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
    while($result = mysqli_fetch_array($query)) {
        //$ad_id= $result['ad_id'];
        $car_plate = $result['car_plate'];
            $name_th = $result['name_th'];
            $car_status = $result['car_status'];
            $company_id = $result['company_id'];
            $dateRegis = $result['dateRegis'];
            $dateExTax = $result['dateExTax'];
            $dateExIns = $result['dateExIns'];

        echo json_encode(array("statusCode"=>200,"car_plate"=>$car_plate
        ,"name_th"=>$name_th,"car_status"=>$car_status,"company_id"=>$company_id,
        "dateRegis"=>$dateRegis,"dateExTax"=>$dateExTax
        ,"dateExIns"=>$dateExIns));

    }



?>
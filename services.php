<?php include ("menubar.php");
//include "include/database.php";
if (!isset($_SESSION['username'])) {
    print "<script language='javascript'>
					window.location = 'index.php';
				</script>";
}
?>
<?php


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://test.mcd.5starcompany.com.ng/api/reseller/list',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('service' => 'all'),
    CURLOPT_HTTPHEADER => array(
        'Authorization: MCDKEY_903sfjfi0ad833mk8537dhc03kbs120r0h9a'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$data=json_decode($response, true);
$success=$data["success"];
$success1=$data["message"];
foreach($data['data'] as $plans){
//    echo $plans['name'];
//    echo $plans['code'];
}
?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <!--                                                <h4 class="font-weight-bold mb-0">--><?php //echo $name; ?><!--</h4>-->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-0">Avaliable Services</h4>
                                        <p class="card-description">
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Services</th>
                                                    <th>Status</th>
                                                    <!--                                                        <th>Amount</th>-->
                                                    <th>Reason</th>
                                                    <th>Date</th>
                                                    <th>Update At</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if($success==1){
                                                foreach($data['data'] as $plans){
                                                ?>
                                                <tr>
                                                    <td><i class="fa fa-lg"></i><?php echo $plans['service']; ?></td>
                                                    <?php
                                                    if($plans['status']==1){
                                                        $b="Active";
                                                        $a=$b;
                                                    }
                                                    else{
                                                        $b="Not Active";
                                                    }
                                                    ?>
                                                    <!--                                                        <td>--><?php //echo $plans['amount']; ?><!--</td>-->

                                                    <td><?php echo $a; ?></td>
                                                    <td><?php echo $plans['reason']; ?></td>

                                                    <td><?php echo $plans['created_at']; ?></td>
                                                    <td><?php echo $plans['updated_at']; ?></td>
                                                    <?php }
                                                    }else{
                                                        echo  "No Service Available";
                                                    }
                                                    ?>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

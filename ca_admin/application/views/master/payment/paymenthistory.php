<style>
.table td, .table th {
padding: 5px;
vertical-align: top;
border-top: 1px solid #e9ecef;
font-size: 12px;
}
#simpletable table tr:nth-child(even){
background:#f1f1f1;
}
</style>
<div class="main-body">
    <!-- Second section block -->
        <section class="invite-user-list-block">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Payment history</h5>
                    </div>
                    
                    <?php if (!empty($payment)){?>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Invoice Id</th>
                                        <th>Plan name</th>
                                        <th>Users</th>
                                        <th>Total (&#8377;)</th>
                                        <th>Status</th>
                                        <th>Plan expire</th>
                                        <th>Billing email</th>
                                        <th>Mode of payment</th>
                                        <th>Plan description</th>
                                        <th>Transaction id</th>
                                        <th>Invoice time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($payment as $data){
                                        
                                        $c = $data['users'];
                                        $count = json_decode($c);
                                        $count = count($count);
                                        $plan_name = $data['plan_name'];
                                        $plan_desc = $data['plan_description'];
                                        $plan_users = $data['users'];
                                        $plan_expire = $data['plan_expire'];
                                        $price = $data['price'];
                                        $producttax = $data['product_tax'];
                                        $plan_name = json_decode($plan_name);
                                        $plan_desc = json_decode($plan_desc);
                                        $plan_users = json_decode($plan_users);
                                        $plan_expire = json_decode($plan_expire);
                                        $price = json_decode($price);
                                        $producttax = json_decode($producttax);
                                    ?>
                                    <tr>
                                        <?php 
                                        $tbl_plan_name = array();
                                        $tbl_plan_desc = array();
                                        $tbl_plan_user = array();
                                        $tbl_plan_exp = array();
                                        for ($j=0; $j< $count; $j++)
                                        {
                                        
                                            $tbl_plan_name[] =  $plan_name[$j][0];                                                            
                                            $tbl_plan_desc[] = $plan_desc[$j]->description;
                                            $tbl_plan_user[] = $plan_users[$j][0];
                                            $tbl_plan_exp[] = $plan_expire[$j]->plan_expire;                       
                                        }
                                        ?>
                                        
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $data['invoice_no']; ?></td>
                                        <td> 
                                            <?php if($count > 1){?>
                                            <table>
                                                <?php foreach ($tbl_plan_name as $name){ ?>
                                                    <tr><td><?php echo $name; ?></td></tr>
                                                <?php }?>
                                            </table>
                                                <?php }else{ echo $plan_name[0][0]; }?>
                                        </td>
                                        <td>
                                            <?php if($count > 1){?>
                                            <table>
                                            <?php foreach ($tbl_plan_user as $user){ ?>
                                                <tr><td><?php if($user == 0){ echo '0';}else{ echo $user;} ?></td></tr>
                                            <?php }?>
                                        </table>
                                        <?php }else{ echo $plan_users[0][0]; }?>
                                        
                                        </td>
                                        <td><?php echo $data['total']; ?></td>
                                        <td><label class="label label-<?php if($data['status'] == 'failure'){echo 'danger';}elseif ($data['status'] == 'success' || $data['status'] == 'Successful'){echo 'success';}else{echo 'primary'; }?>"><?php echo $data['status']; ?></label></td>
                                        <td>
                                            <?php if($count > 1){?>
                                        <table>
                                            <?php foreach ($tbl_plan_exp as $expiry){ ?>
                                                <tr><td><?php echo $expiry; ?></td></tr>
                                            <?php }?>
                                        </table>
                                        <?php }else{ echo $plan_expire[0]->plan_expire; }?>
                                        
                                        </td>
                                            <td><?php echo $data['billing_email']; ?></td>
                                        <td><?php echo $data['mode_of_payment']; ?></td>
                                        <td>
                                            <?php if($count > 1){?>
                                        <table>
                                                    <?php foreach ($tbl_plan_desc as $desc){ ?>
                                                    <tr>
                                                        <td><?php echo $desc; ?></td>
                                                                
                                                    </tr>
                                                    <?php }?>

                                        </table>
                                        <?php }else{ echo $plan_desc[0]->description; }?>
                                        
                                        </td>
                                            <td><?php echo $data['transaction_id']; ?></td>
                                        <td><?php  $d = strtotime($data['created_at']); echo date('l jS \of F Y h:i:s A',$d);  ?></td>
                                    </tr>
                                    <?php $i++; }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="card-block">
                    <h2>No Payments yet</h2>
                    </div>
                    <?php }?>                                                
                </div> 
            </div>
        </div>
    </section>
    <!-- End section block -->
</div> 
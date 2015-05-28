<?php
$data = get_post_meta($pid, 'pricing_table_opt',true);
$featured=  get_post_meta($pid, 'pricing_table_opt_feature',true);
$feature_description =  get_post_meta($pid, 'pricing_table_opt_feature_description',true);
$data_des = get_post_meta($pid, 'pricing_table_opt_description',true);
//print_r($data_des);
$feature_name=  get_post_meta($pid, 'pricing_table_opt_feature_name',true);
$package_name=  get_post_meta($pid, 'pricing_table_opt_package_name',true);
$returnurl =  get_post_meta($pid, '__wppt_returnurl',true);
$cancelurl =  get_post_meta($pid, '__wppt_cancelurl',true);
$business =  get_post_meta($pid, '__wppt_business',true);
$notifyurl = home_url('/?__wppt_payment_notify='.$pid);
$pt = get_post($pid);
$alt_feature=get_post_meta($pid, 'alt_feature',true);
$alt_price=get_post_meta($pid, 'alt_price',true);
$alt_detail=get_post_meta($pid, 'alt_detail',true);
$style = isset($style)?$style:'';

$currency_code = get_post_meta($pid, '__wppt_currency_code',true);
$currency_code = $currency_code?$currency_code:'USD';
$currency = isset($currency)?$currency:'$';

$paypal = '';
?>



<?php 
$total=count($data);
$count = 0;
foreach( $data as $key=> $value ) {
    $count++;
?>
    <!--         Start Price Table-->
    <div class="pricing-table-3 pull-left">
      <div class="pricing-box <?php if($package_name[$key]==$featured) echo ' pricing-featured'; ?>">
        <ul>
            <li class="title-row">
                <h5><?php echo $package_name[$key];?></h5>
            </li>
            <li class="price-row"><span class="currency"><?php echo $currency;?></span><span class="price"><?php echo $value['Price'];?></span><span class="price-cent">,00</span><span class="plane"><?php echo $value['Detail'];?></span></li>
            <?php
            foreach($value as $key1=>$value1){
                if ( strtolower( $key1 ) != "buttonurl" && strtolower( $key1 ) != "buttontext" && strtolower( $key1 ) != "price" && strtolower( $key1 ) != "detail") {
   
                    if ( $value1 != '' )
                        echo "<li class='option' title='{$feature_name[$key1]}'>".$feature_name[$key1].': '.$value1."</li>";
                    else
                        echo "<li class='option' title='{$feature_name[$key1]}'>".$feature_name[$key1]."</li>";
                }
            }
            ?>
          <li>
            <?php 
                if( isset( $paypal_button ) ) 
                    echo str_replace(array_keys($data), array_values($data), $paypal); 
                else 
                    echo '<a href="' . $value['ButtonURL'] . '" class="btn btn-primary btn">' . $value['ButtonText'] . '</a>';
            ?>
          </li>
        </ul>
      </div>
    </div>
    <!--         End Price Table-->
<?php } // end of foreach ?>
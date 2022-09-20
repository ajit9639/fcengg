<?php


include './include/config.php';


//  if(isset($_POST['$cat_id'])){
 $cid = $_POST['$cat_id'];
 "SELECT * FROM `subcategory` where category_name='$cid'";

  $query = mysqli_query($conn,"SELECT * FROM `subcategory` where category_name='$cid'"); ?>
<option value="">Select Sub Category</option>
  <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['subcategory_id'];?>"><?php echo $rw['subcategory_name'];?></option>                
<?php } 
// }
?>


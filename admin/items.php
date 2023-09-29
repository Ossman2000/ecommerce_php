<?php
/*
Items page
=================================================================
*/
ob_start();

session_start();

$pagetitle='Items';
if (isset($_SESSION['Username'])) {
	include 'init.php';

	$do=isset($_GET['do'])? $_GET['do']:'Manage';
	if ($do=='Manage') {
		$stmt2 = $con->prepare("SELECT * FROM items");
	$stmt2->execute();
	$rows = $stmt2->fetchAll();
?>
<h1 class="text-center">Manage Items</h1>
<br>

<div class="container">
			<a href="items.php?do=Add&itemid=<?php echo $_SESSION['ID']?>" class="btn btn-primary "> Add Items </a>
			<a href="categories.php" class="btn btn-primary ">Categories Manage </a>
			<div class="table-responsive">
				<table class="table text-center" >
						<tr style="font-size: medium ;">
				<td>#Item_ID</td>
				<td>Item Name</td>
				<td>Description</td>
				<td>Price</td>
				<td> Add Date </td>
				<td> Country Made </td>
				<td> Status </td>
				<td>Rating</td>
				<td>Activation status</td>
				<td>Control</td>
			</tr>
				<?php
			foreach($rows as $row){

				echo" <tr style='color: black; font-size: small; ' >";

				echo" <td>" . $row['Item_ID'] ."</td>";
				echo" <td>" .$row['Name'] ."</td>";
				echo" <td>" .$row['Description'] ."</td>";
				echo" <td>" .$row['Price'] ."</td>";
				echo" <td>" .$row['Add_Date'] ."</td>";
				echo" <td>" .$row['Country_Made'] ."</td>";
				echo" <td>" .$row['Status'] ."</td>";
				echo" <td>" .$row['Rating'] ."</td>";
				echo" <td> ";
if ($row['Approve'] == 0 ) {
				echo "<a href='items.php?do=Approve&itemid=". $row['Item_ID'].   "' class='btn btn-primary' >Approve</a> ";
				}elseif($row['Approve'] == 1){

					echo "APPROVED";
				}
				echo "</td>" ; 
				echo "<td>";
				echo "<a href='items.php?do=Edit&itemid=". $row['Item_ID'].   "' class='btn btn-success' >Edit</a> ";
				echo "<a href='items.php?do=Delete&itemid=". $row['Item_ID'].   "' class='btn btn-danger' >Delete</a> ";
				echo "</td>";
				echo "</tr>";
}
?>


				</table>
			</div>
</div>
	<?php

}

elseif($do=='Add') { ?>
		<h1 class="text-center">Add New Item</h1>
		<div class="container">
			<form class="form-horizontal" action="?do=Insert" method="POST">

				<!-- start Name Field-->
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="name" class="form-control"   placeholder="Name of the Item"/>
					</div>
				</div>


				<!--description field-->


				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="Description" class="form-control"   placeholder="Description of the Item"/>
					</div>
				</div>

				<!-- country Made -->
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Country of Made</label>
					<div class="col-sm-10 col-md-6">
					
<select id="country" name="country" class="form-control" placeholder="Country of the Item">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>

					</div>
				</div>
            





                    <div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">price of the Item </label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="price" class="form-control"  placeholder="Price of the Item"/>
					</div>
				</div>

 


      			<!-- CATEGORY -->

				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Category </label>
					<div class="col-sm-10 col-md-6">
						<select name="category" >
							<?php 

							$stmt= $con->prepare("SELECT * FROM categories");
							$stmt->execute();
							$cats = $stmt->fetchAll();
							foreach($cats as $cat){

								echo "<option value='" .  $cat['ID'] . "'>" .$cat['Name'].   "</option>";
							}

							?>
						</select>
					</div>
				</div>


<!-- member -->


<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Member </label>
					<div class="col-sm-10 col-md-6">
						<select name="member" >
							<?php 

							$stmt= $con->prepare("SELECT * FROM users");
							$stmt->execute();
							$users = $stmt->fetchAll();
							foreach($users as $user){

								echo "<option value='" .  $user['UserID'] . "'>" .$user['FullName'].   "</option>";
							}

							?>
						</select>
					</div>
				</div>




<!--                status ________________________________________________        -->

            <div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Status</label>
					<div class="col-sm-10 col-md-6">
						<select  name="status">
							<option value="NEW">NEW</option>
							<option value="LIKE NEW">LIKE NEW</option>
							<option value="VERY GOOD"> VERY GOOD</option>
							<option value="GOOD">GOOD</option>
							<option value="ACCEPTABLE"> ACCEPTABLE </option>
							<option value="POOR">POOR</option>

						</select>

					</div>
				</div>


				<!--End name field-->
				<!--Start Submit field-->
				<div class="form-group form-group-lg">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" value="Add Item" class="btn btn-primary btn-lg"/>
					</div>
				</div>

			</form>
		</div>
<?php
} elseif($do=='Insert'){


		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

	echo"<h1 class='text-center'>insert Items </h1>";
	echo "<div class='container'>";

			
			$name    = $_POST['name'];
			$desc    = $_POST['Description'];
			$price   = $_POST['price'];
			$country = $_POST['country'];
		    $status  = $_POST['status'];
		    $member  = $_POST['member'];	    
		    $cat  = $_POST['category'];


			
	

			//pass trick
			

			$formErrors = array();
			if (empty($name)) {

			$formErrors[] = '<div class="alert alert-danger">  name cant be <strong> empty</strong></div>'; 
			
			}
			if (empty($country)) {

			$formErrors[] = '<div class="alert alert-danger">  country cant be <strong> empty</strong></div>'; 
			
			}
			if (empty($price)) {

			$formErrors[] = '<div class="alert alert-danger"> price cant be empty</div>'; 

			}
			if (empty($desc)) {

			$formErrors[] = '<div class="alert alert-danger"> describtion cant be empty</div>'; 
			}
			
			foreach ($formErrors as $error) {
				echo $error . '<br/>';

				// code...
				} }
				if (empty($formErrors)){

				$stmt = $con->prepare("INSERT INTO items(Name,Description,Price,Country_Made,Status,Add_Date,Cat_ID,Member_ID) VALUES(:zname,:zdesc,:zprice,:zcountry,:zstatus,now(),:zcat, :zmem)");
						$stmt->execute(array('zname' => $name, 'zdesc' => $desc , 'zprice' => $price, 'zcountry' => $country,'zstatus' => $status , 'zcat'=>$cat ,'zmem' =>$member));										
						echo  "<div class='alert alert-success'>" .' Record Inserted</div>'; 
	} } 

	elseif($do=='Edit'){

$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
	echo $itemid;
	$stmt = $con->prepare("SELECT * FROM items WHERE Item_ID = ? ");
$stmt->execute(array($itemid));


$item = $stmt -> fetch();


$count = $stmt->rowCount();

	if ($stmt -> rowCount() > 0) {

?>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br>
<h1 style="font-size: 60px;" class="text-center">Edit Item</h1>
<br><br>
		<div class="container">
			<form class="form-horizontal" action="?do=Update" method="POST">
				<input type="hidden" name="itemid" value="<?php echo $itemid ?>"/>
				<!-- start Name Field-->
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="name" class="form-control" value="<?php echo $item['Name'] ?>"  placeholder="Name of the Item"/>
					</div>
				</div>


				<!--description field-->


				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="Description" class="form-control" value="<?php echo $item['Description'] ?>"  placeholder="Description of the Item"/>
					</div>
				</div>

				<!-- country Made -->
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Country of Made</label>
					<div class="col-sm-10 col-md-6">
					
<select id="country" name="country" class="form-control" value="<?php echo $item['Country_Made'] ?>"  placeholder="Country of the Item">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinie">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of america">United States of america</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>

					</div>
				</div>
            





                    <div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">price of the Item </label>
					<div class="col-sm-10 col-md-6">
						<input type="text" name="price" class="form-control" value="<?php echo $item['Price'] ?>" placeholder="Price of the Item"/>
					</div>
				</div>






<!--                status ________________________________________________        -->

            <div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Status</label>
					<div class="col-sm-10 col-md-6">
						<select  name="status">
							<option value="NEW">NEW</option>
							<option value="LIKE NEW">LIKE NEW</option>
							<option value="VERY GOOD"> VERY GOOD</option>
							<option value="GOOD">GOOD</option>
							<option value="ACCEPTABLE"> ACCEPTABLE </option>
							<option value="POOR">POOR</option>

						</select>

					</div>
				</div>
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Category </label>
					<div class="col-md-6">
						<select name="category" >
							<?php 

							$stmt= $con->prepare("SELECT * FROM categories");
							$stmt->execute();
							$cats = $stmt->fetchAll();
							foreach($cats as $cat){

								echo "<option value='" .  $cat['ID'] . "'>" .$cat['Name'].   "</option>";
							}

							?>
						</select>
					</div>
				</div>


<!-- member -->


<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label">Member </label>
					<div class="col-sm-10 col-md-6">
						<select name="member" >
							<?php 

							$stmt= $con->prepare("SELECT * FROM users");
							$stmt->execute();
							$users = $stmt->fetchAll();
							foreach($users as $user){

								echo "<option value='" .  $user['UserID'] . "'>" .$user['FullName'].   "</option>";
							}

							?>
						</select>
					</div>
				</div>


				<!--End name field-->
				<!--Start Submit field-->
				<div class="form-group form-group-lg">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" value="Edit Item" class="btn btn-primary btn-lg"/>
					</div>
				</div>

			</form>
		</div>
<!-- 
<?php
$stmt = $con->prepare("SELECT 
		comments.*,items.Name AS Item_Name , users.Username AS member 
		FROM comments 
		INNER JOIN 
		items ON  items.Item_ID = comments.item_id
		INNER JOIN users ON users.UserID = comments.user_id ");
	$stmt->execute();
	$rows = $stmt->fetchAll();

	?>

	 -->
<?php
$stmt = $con->prepare("SELECT 
		comments.*,users.Username AS member 
		FROM comments 
		INNER JOIN 
		users
		 ON
		  users.UserID = comments.user_id  
		WHERE item_id = ?");

	$stmt->execute(array($itemid));
	
	$rows = $stmt->fetchAll();

	?>


<h1 class="text-center">Manage Comments </h1>
<br>
<div class="container">
		<br>
		<br>

	<div class="table-responsive" >
		<table class="table text-center">
			<tr>
				<td>#ID</td>
				<td>Comment</td>
				<td>Added date</td>
				<td>Item name</td>
				<td>User Name</td>
				<td>Control</td>
				<td>Approve</td>
			</tr>
			<?php


			foreach($rows as $row){

				echo" <tr style='color: black;' >";
				echo" <td>" .$row['c_id'] ."</td>";

				echo" <td>" .$row['comment'] ."</td>";

				echo" <td>".$row['comment_date'] ."</td>";
				
				// echo" <td>" .$row['Item_Name'] ."</td>";
				
				echo" <td>" .$row['member'] ."</td>";
			
				echo" <td> " ;

				echo "<a href='comments.php?do=Delete&comid=". $row['c_id']."' class='btn btn-danger confirm'>Delete</a> </td>";
				
				echo "</td>";
			
				echo "<td>";

				if ($row['status'] == 0) {
					echo "<a href='comments.php?do=Activate&comid=". $row['c_id']."' class='btn btn-primary'>Activate</a> </td>";
				}
				elseif($row['status'] == 1){

					echo "APPROVED";
				}

				echo "</td>";

				echo "</tr>";
			}	

			?>
		</table>
		
	</div>
</div>





		</div>

<?php

	} else {

		echo"no id";
	}



	}elseif($do=='Update'){


echo"<h1 class='text-center'>Update Item </h1>";
		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

			$id = $_POST['itemid'];
			$name = $_POST['name'];
			$desc = $_POST['Description'];
			$price = $_POST['price'];
			$country = $_POST['country'];
			$status = $_POST['status'];
			$member = $_POST['member'];
			$cat = $_POST['category'];
			
		// update db with this info
			$stmt = $con-> prepare("UPDATE items SET Name = ?, Description = ?, Price = ?, Country_Made = ?  , Status = ? , Member_ID = ? , Cat_ID = ? WHERE Item_ID = ?");
			$stmt->execute(array($name, $desc, $price, $country , $status  , $member , $cat, $id));
			echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record updated</div>'; 
	 }else {
		echo 'get lost';
	}


	}elseif($do=='Delete'){

		$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
	echo $itemid;

	$stmt = $con->prepare("SELECT * FROM items WHERE Item_ID = ?");
$stmt->execute(array($itemid));
$row = $stmt -> fetch();
$count = $stmt->rowCount();
	if ($stmt -> rowCount() > 0) {

		$stmt = $con->prepare("DELETE FROM items WHERE Item_ID = :zuser");
		$stmt->bindParam(":zuser" , $itemid);
		$stmt->execute();
					echo  "<div class='alert alert-success'>" . $stmt->rowCount() .' Record deleted</div>'; 

	}



	}elseif($do=='Approve'){

$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

		$check = checkItem('Item_ID' , 'items' , $itemid);
		if ($check > 0) {

		

		$stmt = $con->prepare("UPDATE items SET Approve = 1 WHERE Item_ID = ?");
		
		$stmt->execute(array($itemid));
		$count = $stmt->rowCount();

						echo  "<div class='alert alert-success'>".' Record Activate</div>'; 


	}
}
}
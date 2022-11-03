<?php include('common/header.php');?>
<?php 

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
if(isset($_GET['id'])){
 $user_id = $_GET['id'];
}

if(isset($_POST['save'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $birth = $_POST['birth'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $time = time();
  
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");
  
    $sql = "UPDATE user_info SET fname='$fname',lname='$lname',email='$email',country='$country',address='$address',city='$city',zip='$zip',birth='$birth',phone='$phone',facebook='$facebook',img='$file_name',time=$time WHERE id=$user_id";
    $query = mysqli_query($conn,$sql);
    if($query){
      $msg = "Successfully Updated your Profile";
      header("location:user-edit.php?msg=$msg&&id=$user_id");

    }
  }
 $user_edit = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE id=$user_id"));

?>
<main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
        <div class="container">
            <div class="page_content">
                <div class="dashboard_layout">
                    <?php include('common/sidebar.php');?>
                    <div class="dashboard_content">
                        <div class="dc_box">
                            <div class="dc_box_header">

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="icon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <span class="text"> Profile </span>
                                        </h6>
                                    </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="f_name">First Name</label>
                                        <input name="fname" id="f_name" type="text" class="base_input"
                                            value="<?php echo $user_edit['fname'];?>" />
                                    </div>
                                    <div class="input_area">
                                        <label for="l_name">Last name</label>
                                        <input name="lname" id="l_name" type="text" class="base_input"
                                            value="<?php echo $user_edit['lname'];?>" />
                                    </div>
                                </div>
                                <br />
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label>Select Country</label>
                                        <select name="country" class="base_select">
                                            <option selected value="<?php echo $user_edit['country'];?>">
                                                <?php echo $user_edit['country'];?></option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Algeria">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua">Antigua &amp; Barbuda</option>
                                            <option value="Antilles, Netherlands">Antilles, Netherlands</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas, The</option>
                                            <option value="Bahrain">Bahrain</option>
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
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Virgin Islands">British Virgin Islands</option>
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
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia, the">Gambia, the</option>
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
                                            <option value="Guernsey and Alderney">Guernsey and Alderney</option>
                                            <option value="Guiana, French">Guiana, French</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea, Equatorial">Guinea, Equatorial</option>
                                            <option value="Guinea-Bissau-Bissau3">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong, (China)">Hong Kong, (China)</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Ivory Coast (Cote d'Ivoire)">
                                                Ivory Coast (Cote d'Ivoire)
                                            </option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, (South) Rep. of">Korea, (South) Rep. of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Dem. Rep.">Lao People's Dem. Rep.</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao, (China)">Macao, (China)</option>
                                            <option value="Macedonia, TFYR">Macedonia, TFYR</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="13Malaysia3">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar (ex-Burma)">Myanmar (ex-Burma)</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palestinian Territory">Palestinian Territory</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="1Philippines66">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka (ex-Ceilan)">Sri Lanka (ex-Ceilan)</option>
                                            <option value=" St. Vincent &amp; the Grenad.">
                                                St. Vincent &amp; the Grenad.
                                            </option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Rep. of">Tanzania, United Rep. of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="input_area">
                                        <label for="address">Address</label>
                                        <input name="address" id="address" type="text" class="base_input"
                                            value="<?php echo $user_edit['address'];?>" />
                                    </div>
                                </div>
                                <br />
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="city">City</label>
                                        <input name="city" id="city" type="text" class="base_input"
                                            value="<?php echo $user_edit['city'];?>" />
                                    </div>

                                    <div class="input_area">
                                        <label for="zipcode">ZIP Code</label>
                                        <input name="zip" id="zipcode" type="text" class="base_input"
                                            value="<?php echo $user_edit['zip'];?>" />
                                    </div>
                                </div>
                                <br />
                                <div class="flex_inputs">
                                    <div class="input_area">
                                        <label for="date-of-birth">Date of Birth</label>
                                        <input name="birth" id="date-of-birth" type="text" class="base_input"
                                            value="<?php echo $user_edit['birth'];?>" />
                                    </div>

                                    <div class="input_area">
                                        <label for="m_number">Mobile Number</label>
                                        <input name="phone" id="m_number" type="text" class="base_input"
                                            value="<?php echo $user_edit['phone'];?>" />
                                    </div>
                                </div>

                                <br />
                                <?php if(!empty($user_edit['gmail_verify'])){?>
                                <div>
                                    <label for="facebook_profile">Email</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input disabled name="email" type="text" value="<?php echo $user_edit['email'];?>"
                                            id="facebook_profile" />
                                    </div>
                                </div>
                                <?php }else{?>
                                    <div>
                                    <label for="facebook_profile">Email</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                            <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input placeholder="Email" name="email" type="text" value="<?php echo $user_edit['email'];?>"
                                            id="facebook_profile" />
                                    </div>
                                </div>
                             <?php } ?>

                                <br>
                                <div>
                                    <label for="facebook_profile">Facebook Profile</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                                <i class="fab fa-facebook"></i>
                                            </span>
                                        </div>
                                        <input name="facebook" type="text" value="<?php echo $user_edit['facebook'];?>"
                                            id="facebook_profile" />
                                    </div>
                                </div>

                                <br />
                                <div>
                                    <label for="twitter_p">Twitter</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                                <i class="fab fa-twitter"></i>
                                            </span>
                                        </div>
                                        <input name="twitter" type="text" value="<?php echo $user_edit['twitter'];?>"
                                            id="twitter_p" />
                                    </div>
                                </div>

                                <br />
                                <div>
                                    <label for="twitter_p">File</label>
                                    <div class="base_input_icon">
                                        <div class="icon">
                                            <span>
                                                <i class="fa-solid fa-file-image"></i>
                                            </span>
                                        </div>
                                        <input style="padding-top:10px;" name="file" type="file" id="twitter_p"
                                            required />
                                    </div>
                                </div>

                                <br />
                                <input onclick="alert('Are you sure?')" name="save" type="submit" class="base_btn"
                                    value="Save" />
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>
        <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

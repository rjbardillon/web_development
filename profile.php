<?php
    session_start();
    $page = "profile";
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
?>


    <?php
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';
        $username = $_SESSION['username'];
        $user_data = userExists($connection, $username);
        $q1 = $user_data['q1'];
        $q2o1 = $user_data['q2o1'];
        $q2o2 = $user_data['q2o2'];
        $q2o3 = $user_data['q2o3'];
        $q2o4 = $user_data['q2o4'];
        $q2o5 = $user_data['q2o5'];
        $q3 = $user_data['q3'];
        $phone = $user_data['phone'];
        $firstName = $user_data['firstName'];
        $middleName = $user_data['middleName'];
        $lastName = $user_data['lastName'];
        $gender = $user_data['gender'];
        $birthday = $user_data['birthday'];
        $race = $user_data['race'];
        $raceType = $user_data['raceType'];
    ?>
    <div class="container profile">
        <h1>Profile</h1>
        <div class="questionnaire">
            <form action="includes/update.inc.php" method="POST">
                <ol>
                    <!-- 1 -->
                    <div class="q1">
                        <li><b>How many people were living or staying in this house,
            apartment, or mobile home on April 1, 2020?</b><input type="button" value="edit" onclick="enableEditingQ1(this);"></li>
                        <input type="number" id="q1" name="q1" max="99" maxlength="2" value="<?php echo ($q1) ?>" readonly onkeyup="numbersOnly(this);" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    </div>
                    <!-- 2 -->
                    <div class="q2">
                        <li><b>Were there any additional people staying here on April 1, 2020
            that you did not include in Question 1? Check all that apply.</b><input type="button" value="edit" onclick="enableEditingQ2(this);"> </li>
                        <input type="checkbox" name="q2o1" id="o1" value="Children, related or unrelated, such as newborn babies,
            grandchildren, or foster children" <?php if ($q2o1 != NULL) {
                echo "checked";
            } ?> disabled>
                        <label for="o1">Children, related or unrelated, such as newborn babies,
            grandchildren, or foster children</label><br>
                        <input type="checkbox" name="q2o2" id="o2" value="Relatives, such as adult children, cousins, or in-laws"<?php if ($q2o2 != NULL) {
                echo "checked";
            } ?> disabled>
                        <label for="o2">Relatives, such as adult children, cousins, or in-laws</label><br>
                        <input type="checkbox" name="q2o3" id="o3" value="Nonrelatives, such as roommates or live-in babysitters"<?php if ($q2o3 != NULL) {
                echo "checked";
            } ?> disabled>
                        <label for="o3">Nonrelatives, such as roommates or live-in babysitters</label><br>
                        <input type="checkbox" name="q2o4" id="o4" value="People staying here temporarily"<?php if ($q2o4 != NULL) {
                echo "checked";
            } ?> disabled>
                        <label for="o4">People staying here temporarily</label><br>
                        <input type="checkbox" name="q2o5" id="o5" value="No additional people" <?php if ($q2o5 != NULL) {
                echo "checked";
            } ?> disabled>
                        <label for="o5">No additional people</label>
                    </div>
                    <!-- 3 -->
                    <div class="q3">
                        <li><b>Is this house, apartment, or mobile home?</b><input type="button" value="edit" onclick="enableEditingQ3(this);"></li>
                        <input type="radio" name="q3" id="q3o1" value="Owned by you or someone in this household with a mortgage or loan? Include home equity loans." 
                        <?php if ($q3 == "Owned by you or someone in this household with a mortgage
        or loan? Include home equity loans.") {
                echo "checked";
            } ?> disabled>
                        <label for="q3o1">Owned by you or someone in this household with a mortgage or loan? Include home equity loans.</label><br>
                        <input type="radio" name="q3" id="q3o2" value="Owned by you or someone in this household free and clear (without a mortgage or loan)?"
                        <?php if ($q3 == "Owned by you or someone in this household free and clear
        (without a mortgage or loan)?") {
                echo "checked";
            } ?> disabled>
                        <label for="q3o2">Owned by you or someone in this household free and clear (without a mortgage or loan)?</label><br>
                        <input type="radio" name="q3" id="q3o3" value="Rented?" <?php if ($q3 == "Rented?") {
                echo "checked";
            } ?> disabled>
                        <label for="q3o3">Rented?</label><br>
                        <input type="radio" name="q3" id="q3o4" value="Occupied without payment of rent?" <?php if ($q3 == "Occupied without payment of rent?") {
                echo "checked";
            } ?> disabled>
                        <label for="q3o4">Occupied without payment of rent?</label>
                    </div>
                    <!-- 4 -->
                    <div class="q4">
                        <li><b>What is your telephone number?</b> We will only contact you if needed for official Census Bureau
            business.<input type="button" value="edit" onclick="enableEditingQ4(this);"></li>
                        <label for="phone">Cellphone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="9123456789" maxlength="10" value="<?php echo ($phone) ?>" readonly onkeyup="numbersOnly(this);">
                    </div>
                        <!-- 5 -->
                    <div class="q5">
                        <li><b>Please provide information for each person living here. If
                        there is someone living here who pays the rent or owns this
                        residence, start by listing him or her as Person 1. If the
                        owner or the person who pays the rent does not live here,
            start by listing any adult living here as Person 1. <br>What is Person 1’s name? </b>Print name below.<input type="button" value="edit" onclick="enableEditingQ5(this);"></li><br>
                        <label for="fName">First Name</label><br>
                        <input type="text" name="fName" id="fName" value="<?php echo ($firstName) ?>" readonly oninput="this.value = this.value.toUpperCase()" maxlength="50"><br>
                        <label for="MI">Middle Initial</label><br>
                        <input type="text" name="MI" id="MI" value="<?php echo ($middleName) ?>" readonly oninput="this.value = this.value.toUpperCase()" maxlength="1"><br>
                        <label for="lName">Last Name</label><br>
                        <input type="text" name="lName" id="lName" value="<?php echo ($lastName) ?>" readonly oninput="this.value = this.value.toUpperCase()" maxlength="60"><br>
                    </div>
                        <!-- 6 -->
                    <div class="q6">
                        <li><b>What is Person 1’s sex?</b><input type="button" value="edit" onclick="enableEditingQ6(this);"></li>
                        <input type="radio" id="male" name="q6" value="Male" <?php if ($gender == "Male") {
                echo "checked";
            } ?> disabled>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="q6" value="Female" <?php if ($gender == "Female") {
                echo "checked";
            } ?> disabled>
                        <label for="female">Female</label>
                    </div>
                        <!-- 7 -->
                    <div class="q7">
                        <li><b>What is Person 1’s date of birth?</b><input type="button" value="edit" onclick="enableEditingQ7(this);"></li>
                        <input type="date" id="q7" name="q7" value="<?php echo($birthday); ?>" readonly>
                    </div>
                    <!-- 8 -->
                    <div class="q8">
                        <li><b>What is Person 1’s race?</b> Mark one or more boxes AND print origins.<input type="button" value="edit" onclick="enableEditingQ8(this);"></li>

                        <input type="radio" name="q8" id="q8o1" value="White" onclick="EnableRaceOne(this);" <?php if ($raceType == "White") {
                echo "checked";
            } ?> disabled>
                        <label for="q8o1">White – Print, for example, German, Irish, English, Italian,
            Lebanese, Egyptian, etc.</label><br>
                        <input type="text" class="race1" name="q8o1" id="race1" disabled="disabled" value="<?php if ($raceType == "White") {
                            echo($race);
                        } ?>" required>
                        <br>
                        <input type="radio" name="q8" id="q8o2" value="Black" onclick="EnableRaceTwo(this);" <?php if ($raceType == "Black") {
                echo "checked";
            } ?> disabled>
                        <label for="q8o2">Black or African Am. – Print, for example, African American,
            Jamaican, Haitian, Nigerian, Ethiopian, Somali, etc.</label><br>
                        <input type="text" class="race2" name="q8o2" id="race2" disabled="disabled" value="<?php if ($raceType == "Black") {
                            echo($race);
                        } ?>" required>
                        <br>
                        <input type="radio" name="q8" id="q8o3" value="Alaska" onclick="EnableRaceThree(this);" <?php if ($raceType == "Alaska") {
                echo "checked";
            } ?> disabled>
                        <label for="q8o3">American Indian or Alaska Native – Print name of enrolled or
            principal tribe(s), for example, Navajo Nation, Blackfeet Tribe,
            Mayan, Aztec, Native Village of Barrow Inupiat Traditional
            Government, Nome Eskimo Community, etc.</label><br>
                        <input type="text" class="race3" name="q8o3" id="race3" disabled="disabled" value="<?php if ($raceType == "Alaska") {
                            echo($race);
                        } ?>" required>
                        <br>
                        <input type="radio" name="q8" id="chinese" value="Chinese" <?php if ($race == "Chinese") {
                echo "checked";
            } ?> disabled>
                        <label for="chinese">Chinese</label>
                        <input type="radio" name="q8" id="vietnamese" value="Vietnamese" <?php if ($race == "Vietnamese") {
                echo "checked";
            } ?> disabled>
                        <label for="vietnamese">Vietnamise</label>
                        <input type="radio" name="q8" id="native-hawaiian" value="Native Hawaiian" <?php if ($race == "Native Hawaiian") {
                echo "checked";
            } ?> disabled>
                        <label for="native-hawaiian">Native Hawaiian</label>
                        <br>
                        <input type="radio" name="q8" id="filipino" value="Filipino" <?php if ($race == "Filipino") {
                echo "checked";
            } ?> disabled>
                        <label for="filipino">Filipino</label>
                        <input type="radio" name="q8" id="korean" value="Korean" <?php if ($race == "Korean") {
                echo "checked";
            } ?> disabled>
                        <label for="korean">Korean</label>
                        <input type="radio" name="q8" id="samoan" value="Samoan" <?php if ($race == "Samoan") {
                echo "checked";
            } ?> disabled>
                        <label for="samoan">Samoan</label>
                        <br>
                        <input type="radio" name="q8" id="indian" value="Indian" <?php if ($race == "Indian") {
                echo "checked";
            } ?> disabled>
                        <label for="indian">Indian</label>
                        <input type="radio" name="q8" id="japanese" value="Japanese" <?php if ($race == "Japanese") {
                echo "checked";
            } ?> disabled>
                        <label for="japanese">Japanese</label>
                        <input type="radio" name="q8" id="chamorro" value="Chamorro" <?php if ($race == "Chamorro") {
                echo "checked";
            } ?> disabled>
                        <label for="chamorro">Chamorro</label>
                        <br>
                        <input type="radio" name="q8" id="q8o4" value="Some" onclick="EnableRaceFour(this);" <?php if ($raceType == "Some") {
                echo "checked";
            } ?> disabled>
                        <label for="q8o4">Some other race – Print race or origin.</label><br>
                        <input type="text" class="race4" name="race4" id="race4" disabled="disabled" value="<?php if ($raceType == "Some") {
                            echo($race);
                        } ?>" required><br>
                    </div>
                    <input type="submit" name="update" value="Update">
                </ol>
            </form>
        </div>
        <?php
            include('footer.php'); 
        ?>
    </div>
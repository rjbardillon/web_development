<?php
    session_start();
    $page = "registration";
    include('header.php');
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
?>

<div class="container registration">
    <h1>Registration Page</h1>
    <div class="instructions">
        <h4>Before you answer Question 1, count the people living in this
    house, apartment, or mobile home using our guidelines.</h4>
        <ul>
            <li>Count all people, including babies, who live and sleep here
    most of the time.</li>
            <li>If no one lives and sleeps at this address most of the time, go
    online at ourwebsite.gov or call the number on page 8.</li>
        </ul>
        <h4>The census must also include people without a permanent
    place to live, so:</h4>
        <ul>
            <li>If someone who does not have a permanent place to live is
    staying here on April 1, 2020, count that person.</li>
        </ul>
        <h4>The Census Bureau also conducts counts in institutions and
    other places, so:</h4>
        <ul>
            <li>Do not count anyone living away from here, either at college
    or in the Armed Forces.</li>
            <li>Do not count anyone in a nursing home, jail, prison, detention
    facility, etc., on April 1, 2020.</li>
            <li>Leave these people off your questionnaire, even if they will
    return to live here after they leave college, the nursing home,
    the military, jail, etc. Otherwise, they may be counted twice.</li>
        </ul>
    </div>
    <div class="questionnaire">
        <form action="includes/register.inc.php" method="POST">
            <ol>
                <!-- 1 -->
                <li><b>How many people were living or staying in this house,
    apartment, or mobile home on April 1, 2020?</b></li>
                <input type="text" name="q1">
                <!-- 2 -->
                <li><b>Were there any additional people staying here on April 1, 2020
    that you did not include in Question 1? Check all that apply.</b> </li>
                <input type="checkbox" name="q2o1" id="o1" value="Children, related or unrelated, such as newborn babies,
    grandchildren, or foster children">
                <label for="o1">Children, related or unrelated, such as newborn babies,
    grandchildren, or foster children</label><br>
                <input type="checkbox" name="q2o2" id="o2" value="Relatives, such as adult children, cousins, or in-laws">
                <label for="o2">Relatives, such as adult children, cousins, or in-laws</label><br>
                <input type="checkbox" name="q2o3" id="o3" value="Nonrelatives, such as roommates or live-in babysitters">
                <label for="o3">Nonrelatives, such as roommates or live-in babysitters</label><br>
                <input type="checkbox" name="q2o4" id="o4" value="People staying here temporarily">
                <label for="o4">People staying here temporarily</label><br>
                <input type="checkbox" name="q2o5" id="o5" value="No additional people">
                <label for="o5">No additional people</label>
                <!-- 3 -->
                <li><b>Is this house, apartment, or mobile home?</b></li>
                <input type="radio" name="q3" id="q3o1" value="Owned by you or someone in this household with a mortgage
    or loan? Include home equity loans.">
                <label for="q3o1">Owned by you or someone in this household with a mortgage
    or loan? Include home equity loans.</label><br>
                <input type="radio" name="q3" id="q3o2" value="Owned by you or someone in this household free and clear
    (without a mortgage or loan)?">
                <label for="q3o2">Owned by you or someone in this household free and clear
    (without a mortgage or loan)?</label><br>
                <input type="radio" name="q3" id="q3o3" value="Rented?">
                <label for="q3o3">Rented?</label><br>
                <input type="radio" name="q3" id="q3o4" value="Occupied without payment of rent?">
                <label for="q3o4">Occupied without payment of rent?</label>
                <!-- 4 -->
                <li><b>What is your telephone number?</b> We will only contact you if needed for official Census Bureau
    business.</li>
                <label for="phone">Cellphone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="9123456789" maxlength="10">
                <!-- 5 -->
                <li><b>Please provide information for each person living here. If
                there is someone living here who pays the rent or owns this
                residence, start by listing him or her as Person 1. If the
                owner or the person who pays the rent does not live here,
    start by listing any adult living here as Person 1. <br>What is Person 1’s name? </b>Print name below.</li>
                <label for="fName">First Name</label>
                <input type="text" name="fName" id="fName" oninput="this.value = this.value.toUpperCase()" maxlength="50">
                <label for="MI">Middle Initial</label>
                <input type="text" name="MI" id="MI" oninput="this.value = this.value.toUpperCase()" maxlength="1">
                <label for="lName">Last Name</label>
                <input type="text" name="lName" id="lName" oninput="this.value = this.value.toUpperCase()" maxlength="60">
                <!-- 6 -->
                <li><b>What is Person 1’s sex?</b></li>
                <input type="radio" id="male" name="q6" value="Male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="q6" value="Female">
                <label for="female">Female</label>
                <!-- 7 -->
                <li><b>What is Person 1’s date of birth?</b></li>
                <input type="date" name="q7">
                <!-- 8 -->
                <li><b>What is Person 1’s race?</b> Mark one or more boxes AND print origins.</li>

                <input type="radio" name="q8" id="q8o1" value="q8o1" onclick="EnableRaceOne(this);">
                <label for="q8o1">White – Print, for example, German, Irish, English, Italian,
    Lebanese, Egyptian, etc.</label><br>
                <input type="text" class="race1" name="race1" id="race1" disabled="disabled">
                <br>
                <input type="radio" name="q8" id="q8o2" value="q8o2" onclick="EnableRaceTwo(this);">
                <label for="q8o2">Black or African Am. – Print, for example, African American,
    Jamaican, Haitian, Nigerian, Ethiopian, Somali, etc.</label><br>
                <input type="text" class="race2" name="race2" id="race2" disabled="disabled">
                <br>
                <input type="radio" name="q8" id="q8o3" value="q8o3" onclick="EnableRaceThree(this);">
                <label for="q8o3">American Indian or Alaska Native – Print name of enrolled or
    principal tribe(s), for example, Navajo Nation, Blackfeet Tribe,
    Mayan, Aztec, Native Village of Barrow Inupiat Traditional
    Government, Nome Eskimo Community, etc.</label><br>
                <input type="text" class="race3" name="race3" id="race3" disabled="disabled">
                <br>
                <input type="radio" name="q8" id="chinese" value="Chinese">
                <label for="chinese">Chinese</label>
                <input type="radio" name="q8" id="vietnamese" value="Vietnamese">
                <label for="vietnamese">Vietnamise</label>
                <input type="radio" name="q8" id="native-hawaiian" value="Native Hawaiian">
                <label for="native-hawaiian">Native Hawaiian</label>
                <br>
                <input type="radio" name="q8" id="filipino" value="Filipino">
                <label for="filipino">Filipino</label>
                <input type="radio" name="q8" id="korean" value="Korean">
                <label for="korean">Korean</label>
                <input type="radio" name="q8" id="samoan" value="Samoan">
                <label for="samoan">Samoan</label>
                <br>
                <input type="radio" name="q8" id="indian" value="Indian">
                <label for="indian">Indian</label>
                <input type="radio" name="q8" id="japanese" value="Japanese">
                <label for="japanese">Japanese</label>
                <input type="radio" name="q8" id="chamorro" value="Chamorro">
                <label for="chamorro">Chamorro</label>
                <br>
                <input type="radio" name="q8" id="q8o4" value="q8o4" onclick="EnableRaceFour(this);">
                <label for="q8o4">Some other race – Print race or origin.</label><br>
                <input type="text" class="race4" name="race4" id="race4" disabled="disabled"><br>
                <input type="submit" name="register" value="Register">
            </ol>
        </form>
    </div>
    

</div>
<?php
     include('footer.php'); 
?>
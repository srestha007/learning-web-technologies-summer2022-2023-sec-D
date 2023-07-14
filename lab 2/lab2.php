<!DOCTYPE HTML>
<html>

<body>
    <?php
    $name = $email = $dob = $gender = $blood = '';
    $degree = [];
    $nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = '';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // name validation
        if (empty($_POST["name"])) {
            $nameErr = "*Name is required";
        } else if (str_word_count($_POST["name"]) < 2) {
            $nameErr = "Min 2 words*";
        } else if (!preg_match('/[a-zA-Z]/', $_POST["name"][0])) {
            $nameErr = "Must start with a letter*";
        } else {
            $name = $_POST["name"];
        }

        // email validation
        if (empty($_POST["email"])) {
            $emailErr = "*Email is required";
        } else if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["email"])) {
            $emailErr = "Invalid email address*";
        } else {
            $email = $_POST["email"];
        }

        // date validation
        if (empty($_POST["date"])) {
            $dobErr = "*Date of birth is required";
        } else {
            $dob = $_POST["date"];
        }

        // gender validation
        if (empty($_POST["gender"])) {
            $genderErr = "*One must be selected";
        } else {
            if (isset($_POST["gender"])) {
                $gender = $_POST["gender"];
            }
        }

        // degree validation
        if (empty($_POST["degree"])) {
            $degreeErr = "*Check your degree";
        } else {
            if (isset($_POST["degree"])) {
                if (count($_POST["degree"]) < 2) {
                    $degreeErr = "*2 of them must be selected";
                } else {
                    $degree = $_POST["degree"];
                }
            }
        }

        // blood validation
        if (empty($_POST["blood"])) {
            $bloodErr = "*Must be selected";
        } else {
            $blood = $_POST["blood"];
        }
    }
    ?>

    <?php echo $name ?>
    <?php echo $email ?>
    <?php echo $dob ?>
    <?php echo $gender ?>
    <?php foreach ($degree as $deg) {
        echo $deg . " ";
    } ?>
    <?php echo $blood ?>

        <form method="POST">
            <fieldset>
                <legend>NAME</legend>
                <input type="text" name="name" id="name">
                <span class="error">
                    <?php echo $nameErr ?>
                </span>
            </fieldset>
            <br>
            <fieldset>
                <legend>EMAIL</legend>
                <input type="email" name="email" id="email">
                <span class="error">
                    <?php echo $emailErr ?>
                </span>
            </fieldset>
            <br>
            <fieldset>
                <legend>DATE OF BIRTH</legend>
                <input type="date" name="date" id="date">
                <span class="error">
                    <?php echo $dobErr ?>
                </span>
            </fieldset>
            <br>
            <fieldset>
                <legend>GENDER</legend>
                <input type="radio" name="gender" id="male" value="Male"> Male
                <input type="radio" name="gender" id="female" value="Female"> Female
                <input type="radio" name="gender" id="other" value="Other"> Other
                <span class="error">
                    <?php echo $genderErr ?>
                </span>
            </fieldset>
            <br>
            <fieldset>
                <legend>DEGREE</legend>
                <input type="checkbox" name="degree[]" value="SSC" id="ssc"> SSC
                <input type="checkbox" name="degree[]" value="HSC" id="hsc"> HSC
                <input type="checkbox" name="degree[]" value="BSc" id="bsc"> BSc
                <input type="checkbox" name="degree[]" value="MSc" id="msc"> MSc
                <span class="error">
                    <?php echo $degreeErr ?>
                </span>
            </fieldset>
            <br>
            <fieldset>
                <legend>BLOOD GROUP</legend>
                <select name="blood" id="blood">
                    <option value=""></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <span class="error">
                    <?php echo $bloodErr ?>
                </span>
            </fieldset>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
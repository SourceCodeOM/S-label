<style>
    body {
        font-family: monospace;
        font-size: large;
    }
    #create_database {
        background-color: aqua;
        padding: 50px 100px 50px 200px;
        font-size: 20;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }
    #form_all {
        background-color: yellow;
        float: left;
        width: 600px;
        text-align: center;
        margin-top: 20px;
        height: 250px;
        border-bottom-left-radius: 20px;
    }
    .sort {
        text-align: right;
        background-color: grey;
        color: white;
        height: 250px;
        margin-top: 20px;
        margin-left:  250px;
        bottom: 50%;
        padding-right: 50px;
        border-bottom-right-radius: 20px;
    }
</style>

<div id="create_database">
<?php
require_once 'data_for_connect.php';
require_once 'create_database.php';
require_once 'create_table_of_database.php';
?>
</div>

<div id="form_all">
    <form action="" method="POST">
        <p>Sorting...</p>
        <fieldset>
            <input type="hidden" name="sort" value="s0" id="s0">
            <input type="radio" name="sort" value="s1" id="s1">...by firm        |
            <input type="radio" name="sort" value="s2" id="s2">...by ch. to ex. |
            <input type="radio" name="sort" value="s3" id="s3">...by ex. to ch. |
        </fieldset>
        <p>Choose a company...</p>
        <fieldset>
            <input type="checkbox" name="sel[]" value="lala" id="ch1">...lala |  
            <input type="checkbox" name="sel[]" value="fafa" id="ch2">...fafa |
            <input type="checkbox" name="sel[]" value="gaga" id="ch3">...gaga |   
        </fieldset>
        <br><input type="submit" name="subm" value="Submit">
    </form>
</div>

<?php
if(isset($_POST['subm'])) {
    if($_POST['sort'] == 's1') {
    ?>
        <div class="sort">
            <?php
            echo 'Data is sorted by firm!<br>';
            require 'sort_firm.php'; ?>  
        </div>
    <?php
    } elseif($_POST['sort'] == 's2') {
    ?>
        <div class="sort">
            <?php
            echo 'Data is sorted from cheap to expensive!<br>';
            require 'sort_ch_to_ex.php'; ?>
        </div>
    <?php
    } elseif($_POST['sort'] == 's3') {
    ?>
        <div class="sort">
            <?php
            echo 'Data is sorted from expensive to cheap!<br>';
            require 'sort_ex_to_ch.php'; ?>
        </div>
    <?php
    } elseif($_POST['sort'] == 's0') {
    ?>
        <div class="sort">
            <?php
            echo 'Data is not sorted!<br>';
            require 'echo_data.php'; ?>
        </div>
    <?php
    }    
} else {
    ?>
        <div class="sort">
            <?php
            echo 'Data is not sorted!<br>';
            require 'echo_data.php'; ?>
        </div>
    <?php
}

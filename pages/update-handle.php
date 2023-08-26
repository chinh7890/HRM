<?php
       session_start();
       require_once("../connect.php");
       if(isset($_GET["id"])){
              $id=$_GET["id"];

              $FullName = $_POST["FullName"];//
              $EngLishName = $_POST["EngLishName"];//
              $Gender = $_POST["Gender"];//
              $National = $_POST["National"];//
              $MaritalStatus = $_POST["MaritalStatus"];//
              $MilitaryService = $_POST["MilitaryService"];//
              $PhoneNumber = $_POST["PhoneNumber"];//

              $DayOfBirth = $_POST["DateofBirth"];//
              
              $Position=$_POST["Position"];//

              $PassportNumber = $_POST["PassportNumber"];//
              $DOIpp = $_POST["DateofIssue_pass"];//
              $POIpp = $_POST["PlaceofIssue_pass"];//
              $DOEpp = $_POST["DateofExpiry_pass"];//

              $CICN = $_POST["cicn"];//
              $DOIcicn = $_POST["DateofIssue_cicn"];//
              $POIcicn = $_POST["PlaceofIssue_cicn"];//

              $PlaceOfResidence = $_POST["PlaceofResidence"];
              $PermanentAddress = $_POST["PermanentAddress"];
              $HealthCheckUpDate = $_POST["Health"];//

              $JobTitle=$_POST["JobTitle"];//
              $JobCategory=$_POST["JobCategory"];//
              $Team = $_POST["Team"];//
              $Level = $_POST["Level"];//
              $StartDate = $_POST["Startdate"];//
              $TypeOfContract = $_POST["TypeofContract"];//

              $ContractDuration = $_POST["ContractDuration"];//
              $EndDate = $_POST["EndDate"];

              $Email = $_POST["email"];//
              $Country = $_POST["Country"];//
              $Location = $_POST["location"];//

              //Address, pass, cccd
              $sql = "SELECT address_id, pass_id, cccd_id FROM `tb_employee` WHERE employee_id='$id'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $addressID= $row['address_id'];
                     $PassportID= $row['pass_id'];
                     $CICNID= $row['cccd_id'];
              }

              //Job Title
              $sql = "SELECT job_title_id FROM tb_job_title WHERE job_title_name='$JobTitle'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $JobTitle= $row['job_title_id'];
              }
              //Job Category
              $sql = "SELECT job_category_id FROM tb_job_category WHERE job_category_name='$JobCategory'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $JobCategory= $row['job_category_id'];
              }
              //Team
              $sql = "SELECT team_id FROM tb_team WHERE team_name='$Team'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $Team= $row['team_id'];
              }
              //Level
              $sql = "SELECT level_id FROM tb_level WHERE level_name='$Level'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $Level= $row['level_id'];
              }
              //TypeOfContract
              $sql = "SELECT type_contract_id FROM tb_type_contract WHERE type_contract_name='$TypeOfContract'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $TypeOfContract= $row['type_contract_id'];
              }
              //Country
              $sql = "SELECT country_id FROM tb_country WHERE country_name='$Country'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $Country= $row['country_id'];
              
              }
              //Location
              $sql = "SELECT location_id FROM tb_location WHERE location_name='$Location'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $Location= $row['location_id'];
              
              }
              //Location
              $sql = "SELECT position_id FROM tb_position WHERE position_name='$Position'";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                     $Position= $row['position_id'];
              
              }

              $sql_up1=" UPDATE
                            `tb_employee`
                     SET
                            `photo` = '[value-3]',
                            `employee_name` = '$FullName',
                            `english_name` = '$EngLishName',
                            `gender` = '$Gender',
                            `marital_status` = '$MaritalStatus',
                            `date_of_birth` = '".formatDateToMySQL($DayOfBirth)."',
                            `national_name` = '$National',
                            `military_service` = '$MilitaryService',
                            `team_id` = '$Team',
                            `health_checkup_date` = '$HealthCheckUpDate',
                            `job_title_id` = '$JobTitle',
                            `job_category_id` = '$JobCategory',
                            `position_id` = '$Position',
                            `level_id` = '$Level',
                            `pass_id` = '$PassportID',
                            `cccd_id` = '$CICNID',
                            `country_id` = ' $Country',
                            `location_id` = '$Location'
                     WHERE
                            employee_id='$id'";
              $sql_up2="UPDATE
                            `tb_address`
                     SET
                            `phone_number` = '$PhoneNumber',
                            `place_of_residence` = '$PlaceOfResidence',
                            `permanent_address` = '$PermanentAddress',
                            `email` = ' $Email'
                     WHERE
                            address_id='$addressID'";

              $sql_up3="UPDATE
                            `tb_passport`
                     SET
                            `pass_number` = '$PassportNumber',
                            `date_of_issue` = '".formatDateToMySQL($DOIpp)."',
                            `date_of_expiry` = '". formatDateToMySQL($DOEpp)."',
                            `place_of_issue` = '$POIpp'
                     WHERE
                            pass_id='$PassportID'";
              $sql_up4="UPDATE
                            `tb_citizen_identity`
                     SET
                            `cccd_number` = '$CICN',
                            `date_of_issue_cccd` = '". formatDateToMySQL($DOIcicn)."',
                            `place_of_issue_cccd` = '$POIcicn'
                     WHERE
                            cccd_id='$CICNID'";
              $sql_up5="UPDATE
                     `tb_contract`
              SET
                     `start_date` = '".formatDateToMySQL($StartDate)."',
                     `contract_duration` = '$ContractDuration',
                     `end_date` = '". formatDateToMySQL($EndDate)."',
                     `type_contract_id` = '$TypeOfContract'
                     
              WHERE
                     `employee_id` = '$id'";
              
              $conn->query($sql_up1);
              $conn->query($sql_up2);
              $conn->query($sql_up3);
              $conn->query($sql_up4);
              $conn->query($sql_up5);
              header("location: ./profile.php?id=$id");
              $_SESSION['update']="1";

       }
       function formatDateToMySQL($inputDate) {
              $dateObj = DateTime::createFromFormat('m/d/Y', $inputDate);
              if ($dateObj) {
                  return $dateObj->format('Y/m/d');
              } else {
                  return "Invalid date format";
              }
       }
?>
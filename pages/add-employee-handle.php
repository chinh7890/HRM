<?php
    require "../connect.php";
    if(isset($_POST['add'])){
        $EmployeeCode = $_POST["EmployeeCode"];
        $FullName = $_POST["FullName"];
        $EngLishName = $_POST["EngLishName"];
        $Position = $_POST["Position"];
        $Unit = $_POST["Unit"];
        $PhoneNumber = $_POST["PhoneNumber"];
        $Email = $_POST["Email"];
        $DayOfBirth = $_POST["DayOfBirth"];
        $PlaceOfResidence = $_POST["PlaceOfResidence"];
        $PermanentAddress = $_POST["PermanentAddress"];
        $Level = $_POST["Level"];//
        $Team = $_POST["Team"];
        $Contract = $_POST["Contract"];
        $Country = $_POST["Country"];//
        $Office = $_POST["Office"];//
        $HealthCheckUpDate = $_POST["HealthCheckUpDate"];
        $PassportNumber = $_POST["PassportNumber"];
        $DOIpp = $_POST["DOIpp"];
        $POIpp = $_POST["POIpp"];
        $DOEpp = $_POST["DOEpp"];
        $CICN = $_POST["CICN"];
        $POIcicn = $_POST["POIcicn"];
        $POIcicn = $_POST["POIcicn"];
        $DOEcicn = $_POST["DOEcicn"];
        $TypeOfContract = $_POST["TypeOfContract"];//
        $StartDate = $_POST["StartDate"];
        $ContractDuration = $_POST["ContractDuration"];//
        $EndDate = $_POST["EndDate"];
        $PersonalProfile = $_POST["PersonalProfile"];
        $Certificate = $_POST["Certificate"];
        
        // $InsertEmployee = "INSERT INTO tb_employee(employee_code, photo, 
        // employee_name, english_name, date_of_birth, unit, team, health_checkup_date, 
        // position_id, role_id, level_id, pass_id, cccd_id, address_id, country_id, 
        // office_id, personal_profile_id, certificate_id, contract_id) 
        // VALUES ('".$EmployeeCode."','','".$FullName."','".$EngLishName."','".$DayOfBirth."',
        // '".$Unit."','".$Team."','".$HealthCheckUpDate."','".$Position."','[11]','[12]',
        // '[13]','[14]','[15]','[16]','[17]','[18]',
        // '[19]','[20]')";

        //level
        foreach($Level as $lv)
        {
            $LevelTemp = $lv;
        }
        $SelectLevelId = "SELECT level_id FROM tb_level WHERE level_name = '".$LevelTemp."'";
        echo $SelectLevelId;
        //country
        foreach($Country as $ct)
        {
            $CountryTemp = $ct;
        }
        $SelectCountryId = "SELECT country_id FROM tb_country WHERE country_name = '".$CountryTemp."'";
        echo $SelectCountryId;
        //Office
        foreach($Office as $off)
        {
            $OfficeTemp = $off;
        }
        $SelectOfficeId = "SELECT Office_id FROM tb_Office WHERE Office_name = '".$OfficeTemp."'";
        echo $SelectOfficeId;
        //TypeOfContract
        foreach($TypeOfContract as $toc)
        {
            $TypeOfContractTemp = $toc;
        }
        $SelectTypeOfContractId = "SELECT type_contract_id FROM tb_type_contract WHERE type_contract_name = '".$TypeOfContractTemp."'";
        echo $SelectCountryId;
        //ContractDuration 
        foreach($ContractDuration as $cd)
        {
            $ContractDurationTemp = $cd;
        }
        $SelectContractDurationId = "SELECT ContractDuration_id FROM tb_ContractDuration WHERE ContractDuration_name = '".$ContractDurationTemp."'";
        echo $SelectContractDurationId;exit;
    }

?>
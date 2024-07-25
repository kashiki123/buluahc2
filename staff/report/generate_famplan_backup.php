<?php
session_start();
require '../../vendor/autoload.php';
include_once('../../config.php');

use Dompdf\Dompdf;
use Dompdf\Options;


$fromDate = $_GET['fromDate'];
$toDate = $_GET['toDate'];

$fromDate = $conn->real_escape_string($fromDate);
$toDate = $conn->real_escape_string($toDate);

$fromDateTime = new DateTime($fromDate);
$toDateTime = new DateTime($toDate);

$currentMonth = $fromDateTime->format('F');
$currentYear = $fromDateTime->format('Y');

$fromDate = mysqli_real_escape_string($conn, $fromDate);
$toDate = mysqli_real_escape_string($conn, $toDate);

include("report_queries/famplan_report_queries.php");
include("report_queries/totalCurrentUser.php");

$conn->close();

$pdf = new Dompdf();

$pdf->setPaper('A2', 'landscape');

$evenRow = false;

$htmlContent = '<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Planning Report</title>
    <style>
        /* Add CSS styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            /* Set to 100% for full width */
            border: 1px solid #000;
            /* Border color and thickness */
        }

        td,
        th {
            border: 1px solid #000;
            /* Border for table cells */
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
<h1>'. $btlTotal10to14.'</h1>
    <table>
        <tr>
            <td colspan="35">
                <center>
                    FHSIS REPORT for the month of '.$currentMonth.' Year '. $currentYear.'.
                    <br>
                    Name of Municipality/City: CAGAYAN DE ORO CITY
                    <br>
                    Name of Province: MISAMIS ORIENTAL
                    <br>
                    Name of Barangay: BULUA
                    <br>
                    Projected Population of the Year:32,376
                    <br>
                    For Submission to CHO
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="35">
                Section A. Family Planning Services and Deworming for Women of Reproductive Age
            </td>
        </tr>

        <tr>
            <td rowspan="2" colspan="7">
                A1. Whole Column
                <br>
                (Col. 1)
            </td>
           
            <td colspan="7">
                Age
                <br>
                (Col. 2)
            </td>
            <td rowspan="2" colspan="7">
                Total for WRA 15-19 y/o <br>
                (Col. 3)
            </td>
            <td rowspan="2" colspan="7">
                Interpretation<br>
                (Col. 4)
            </td>
            <td rowspan="2" colspan="7">
                Recommendation/Action<br>
                (Col. 5)
            </td>
        </tr>
        <tr>
            <!-- Nested row for Age -->
            <td colspan="3">
                10-14 y/o
            </td>
            <td colspan="2">
                15-19 y/o
            </td>
            <td colspan="2">
                20-49 y/o
            </td>
        </tr>
        <tr>
            <td colspan="7">
                1. Proportion of WRA with unmet need for modern FP
                (No.1.1/No.1.2 X 100)
            </td>
            <td colspan="3"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="7"></td>
            <td colspan="7" rowspan="3"></td>
            <td colspan="7" rowspan="3"></td>
        </tr>

        <tr>
            <td colspan="7">
                1.1 Number of WRA with unmet need for MFP - Total
            </td>
            <td colspan="3"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="7"></td>
        </tr>

        <tr>
            <td colspan="7">
                1.2
                Total No. of Estimated WRA
                (Total Population X 25.854%)
            </td>
            <td colspan="3"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="7"></td>

        </tr>
        <tr>
            <td rowspan="2" colspan="5">
                A2. Use of FP Method
                <br>
                (Col. 1)
            </td>
            <!-- Fix this below -->
            <td rowspan="2" colspan="4">
                Current Users
                <br>
                (Beginning of Month)
                <br>
                (Col. 2)
            </td>
            <td colspan="8">
                Acceptors
            </td>
            <td rowspan="2" colspan="4">
                Drop-outs<br>
                (Present Month) <br>
                (Col. 5)
            </td>
            <td rowspan="2" colspan="4">
                Current Users<br>
                (End of Month) <br>
                (Col. 6)
            </td>
            <td rowspan="2" colspan="4">
                New Acceptors<br>
                (Present Month) <br>
                (Col. 7)
            </td>
            <td rowspan="2" colspan="4">
                CPR<br>
                Col. 6/TP x 25.854% <br>
                (Col. 8)
            </td>
            <td rowspan="2">
                Interpretation <br>
                (Col.9)
            </td>
            <td rowspan="2">Recommendation/Actions to be
                <br>
                (Col. 10)
            </td>
        </tr>
        <tr>
            <!-- Nested row for Age -->
            <td colspan="4">
                New Acceptors(Previous Month)
                (Col. 3)
            </td>
            <td colspan="4">
                Other Acceptors(Present Month)
                (Col. 4)
            </td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td>10-14</td>
            <td>15-19</td>
            <td>20-49</td>
            <td>Total</td>
            <td rowspan="18"></td>
            <td rowspan="18"></td>

        </tr>
        <tr>
            <td colspan="5">a. BTL - Total</td>
            
            <td>'.$btlTotal10to14.'</td>
            <td>'.$btlTotal15to19.'</td>
            <td>'.$btlTotal20to49.'</td>
            <td>'.$btlCUMBTotal.'</td>

            <td>'.$btlANAPMCount_count10to14.'</td>
            <td>'.$btlANAPMCount_count15to19.'</td>
            <td>'.$btlANAPMCount_count20to49.'</td>
            <td>'.$btlANAPMCount_countTotal.'</td>

            <td>'.$btlOAPMCount_count10to14.'</td>
            <td>'.$btlOAPMCount_count15to19.'</td>
            <td>'.$btlOAPMCount_count20to49.'</td>
            <td>'.$btlOAPMCount_totalCount.'</td>

            <td>'.$btlDOPMCount_count10to14.'</td>
            <td>'.$btlDOPMCount_count15to19.'</td>
            <td>'.$btlDOPMCount_count20to49.'</td>
            <td>'.$btlDOPMCount_totalCount.'</td>

            <td>'.$fbtlCUEOMTotal10to14.'</td>
            <td>'.$fbtlCUEOMTotal15to19.'</td>
            <td>'.$fbtlCUEOMTotal20to49.'</td>
            <td>'.$fbtlCUEOMTotal.'</td>

            <td>'.$btlNAPMCount_count10to14.'</td>
            <td>'.$btlNAPMCount_count15to19.'</td>
            <td>'.$btlNAPMCount_count20to49.'</td>
            <td>'.$btlNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">b. NSV - Total</td>
            <td>'.$nsvCUMBTotal10to14.'</td>
            <td>'.$nsvCUMBTotal15to19.'</td>
            <td>'.$nsvCUMBTotal20to49.'</td>
            <td>'.$nsvCUMBTotal.'</td>
            <td>'.$nsvANAPMCount_count10to14.'</td>
            <td>'.$nsvANAPMCount_count15to19.'</td>
            <td>'.$nsvANAPMCount_count20to49.'</td>
            <td>'.$nsvANAPMCount_countTotal.'</td>
            <td>'.$nsvOAPMCount_count10to14.'</td>
            <td>'.$nsvOAPMCount_count15to19.'</td>
            <td>'.$nsvOAPMCount_count20to49.'</td>
            <td>'.$nsvOAPMCount_totalCount.'</td>
            <td>'.$nsvDOPMCount_count10to14.'</td>
            <td>'.$nsvDOPMCount_count15to19.'</td>
            <td>'.$nsvDOPMCount_count20to49.'</td>
            <td>'.$nsvDOPMCount_totalCount.'</td>
            <td>'.$nsvCUEOMTotal10to14.'</td>
            <td>'.$nsvCUEOMTotal15to19.'</td>
            <td>'.$nsvCUEOMTotal20to49.'</td>
            <td>'.$nsvCUEOMTotal.'</td>
            <td>'.$nsvNAPMCount_count10to14.'</td>
            <td>'.$nsvNAPMCount_count15to19.'</td>
            <td>'.$nsvNAPMCount_count20to49.'</td>
            <td>'.$nsvNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">c. Condom - Total</td>
            <td>'.$condomCUMBTotal10to14.'</td>
            <td>'.$condomCUMBTotal15to19.'</td>
            <td>'.$condomCUMBTotal20to49.'</td>
            <td>'.$condomCUMBTotal.'</td>
            <td>'.$condomANAPMCount_count10to14.'</td>
            <td>'.$condomANAPMCount_count15to19.'</td>
            <td>'.$condomANAPMCount_count20to49.'</td>
            <td>'.$condomANAPMCount_countTotal.'</td>
            <td>'.$condomOAPMCount_count10to14.'</td>
            <td>'.$condomOAPMCount_count15to19.'</td>
            <td>'.$condomOAPMCount_count20to49.'</td>
            <td>'.$condomOAPMCount_totalCount.'</td>
            <td>'.$condomDOPMCount_count10to14.'</td>
            <td>'.$condomDOPMCount_count15to19.'</td>
            <td>'.$condomDOPMCount_count20to49.'</td>
            <td>'.$condomDOPMCount_totalCount.'</td>
            <td>'.$condomCUEOMTotal10to14.'</td>
            <td>'.$condomCUEOMTotal15to19.'</td>
            <td>'.$condomCUEOMTotal20to49.'</td>
            <td>'.$condomCUEOMTotal.'</td>
            <td>'.$condomNAPMCount_count10to14.'</td>
            <td>'.$condomNAPMCount_count15to19.'</td>
            <td>'.$condomNAPMCount_count20to49.'</td>
            <td>'.$condomNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">d. Pill - Total</td>
            <td>'.$pillsCUMBTotal10to14.'</td>
            <td>'.$pillsCUMBTotal15to19.'</td>
            <td>'.$pillsCUMBTotal20to49.'</td>
            <td>'.$pillsCUMBTotal.'</td>
            <td>'.$pillsANAPMCount_count10to14.'</td>
            <td>'.$pillsANAPMCount_count15to19.'</td>
            <td>'.$pillsANAPMCount_count20to49.'</td>
            <td>'.$pillsANAPMCount_counTotal.'</td>
            <td>'.$pillsOAPMCount_count10to14.'</td>
            <td>'.$pillsOAPMCount_count15to19.'</td>
            <td>'.$pillsOAPMCount_count20to49.'</td>
            <td>'.$pillsOAPMCount_totalCount.'</td>
            <td>'.$pillsDOPMCount_count10to14.'</td>
            <td>'.$pillsDOPMCount_count15to19.'</td>
            <td>'.$pillsDOPMCount_count20to49.'</td>
            <td>'.$pillsDOPMCount_totalCount .'</td>
            <td>'.$pillsCUEOMTotal10to14.'</td>
            <td>'.$pillsCUEOMTotal15to19.'</td>
            <td>'.$pillsCUEOMTotal20to49.'</td>
            <td>'.$pillsCUEOMTotal.'</td>
            <td>'.$pillsNAPMCount_count10to14.'</td>
            <td>'.$pillsNAPMCount_count15to19.'</td>
            <td>'.$pillsNAPMCount_count20to49.'</td>
            <td>'.$pillsNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5"> d.1 Pills-POP - Total</td>
            <td>'.$pillspopCUMBTotal10to14.'</td>
            <td>'.$pillspopCUMBTotal15to19.'</td>
            <td>'.$pillspopCUMBTotal20to49.'</td>
            <td>'.$pillspopCUMBTotal.'</td>
            <td>'.$pillspopANAPMCount_count10to14.'</td>
            <td>'.$pillspopANAPMCount_count15to19.'</td>
            <td>'.$pillspopANAPMCount_count20to49.'</td>
            <td>'.$pillspopANAPMCount_counTotal.'</td>
            <td>'.$pillspopOAPMCount_count10to14.'</td>
            <td>'.$pillspopOAPMCount_count15to19.'</td>
            <td>'.$pillspopOAPMCount_count20to49.'</td>
            <td>'.$pillspopOAPMCount_totalCount.'</td>
            <td>'.$pillspopDOPMCount_count10to14.'</td>
            <td>'.$pillspopDOPMCount_count15to19.'</td>
            <td>'.$pillspopDOPMCount_count20to49.'</td>
            <td>'.$pillspopDOPMCount_totalCount.'</td>
            <td>'.$pillspopCUEOMTotal10to14.'</td>
            <td>'.$pillspopCUEOMTotal15to19.'</td>
            <td>'.$pillspopCUEOMTotal20to49.'</td>
            <td>'.$pillspopCUEOMTotal.'</td>
            <td>'.$pillspopNAPMCount_count10to14.'</td>
            <td>'.$pillspopNAPMCount_count15to19.'</td>
            <td>'.$pillspopNAPMCount_count20to49.'</td>
            <td>'.$pillspopNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5"> d.2 Pills-COC - Total</td>
            <td>'.$pillscocCUMBTotal10to14.'</td>
            <td>'.$pillscocCUMBTotal15to19.'</td>
            <td>'.$pillscocCUMBTotal20to49.'</td>
            <td>'.$pillscocCUMBTotal.'</td>
            <td>'.$pillscocANAPMCount_count10to14.'</td>
            <td>'.$pillscocANAPMCount_count15to19.'</td>
            <td>'.$pillscocANAPMCount_count20to49.'</td>
            <td>'.$pillscocANAPMCount_counTotal.'</td>
            <td>'.$pillscocOAPMCount_count10to14.'</td>
            <td>'.$pillscocOAPMCount_count15to19.'</td>
            <td>'.$pillscocOAPMCount_count20to49.'</td>
            <td>'.$pillscocOAPMCount_totalCount.'</td>
            <td>'.$pillscocDOPMCount_count10to14.'</td>
            <td>'.$pillscocDOPMCount_count15to19.'</td>
            <td>'.$pillscocDOPMCount_count20to49.'</td>
            <td>'.$pillscocDOPMCount_totalCount.'</td>
            <td>'.$pillscocCUEOMTotal10to14.'</td>
            <td>'.$pillscocCUEOMTotal15to19.'</td>
            <td>'.$pillscocCUEOMTotal20to49.'</td>
            <td>'.$pillscocCUEOMTotal.'</td>
            <td>'.$pillscocNAPMCount_count10to14.'</td>
            <td>'.$pillscocNAPMCount_count15to19.'</td>
            <td>'.$pillscocNAPMCount_count20to49.'</td>
            <td>'.$pillscocNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">e. Injectibles(DMPA/POI)-Total</td>
            <td>'.$injectablesCUMBTotal10to14.'</td>
            <td>'.$injectablesCUMBTotal15to19.'</td>
            <td>'.$injectablesCUMBTotal20to49.'</td>
            <td>'.$injectablesCUMBTotal.'</td>
            <td>'.$injectablesANAPMCount_count10to14.'</td>
            <td>'.$injectablesANAPMCount_count15to19.'</td>
            <td>'.$injectablesANAPMCount_count20to49.'</td>
            <td>'.$injectablesANAPMCount_countTotal.'</td>
            <td>'.$injectablesOAPMCount_count10to14.'</td>
            <td>'.$injectablesOAPMCount_count15to19.'</td>
            <td>'.$injectablesOAPMCount_count20to49.'</td>
            <td>'.$injectablesOAPMCount_totalCount.'</td>
            <td>'.$injectablesDOPMCount_count10to14.'</td>
            <td>'.$injectablesDOPMCount_count15to19.'</td>
            <td>'.$injectablesDOPMCount_count20to49.'</td>
            <td>'.$injectablesDOPMCount_totalCount .'</td>
            <td>'.$injectablesCUEOMTotal10to14.'</td>
            <td>'.$injectablesCUEOMTotal15to19.'</td>
            <td>'.$injectablesCUEOMTotal20to49.'</td>
            <td>'.$injectablesCUEOMTotal.'</td>
            <td>'.$injectablesNAPMCount_count10to14.'</td>
            <td>'.$injectablesNAPMCount_count15to19.'</td>
            <td>'.$injectablesNAPMCount_count20to49.'</td>
            <td>'.$injectablesNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">f. Implant - Total</td>
            <td>'.$implantCUMBTotal10to14.'</td>
            <td>'.$implantCUMBTotal15to19.'</td>
            <td>'.$implantCUMBTotal20to49.'</td>
            <td>'.$implantCUMBTotal.'</td>
            <td>'.$implantANAPMCount_count10to14.'</td>
            <td>'.$implantANAPMCount_count15to19.'</td>
            <td>'.$implantANAPMCount_count20to49.'</td>
            <td>'.$implantANAPMCount_countTotal.'</td>
            <td>'.$implantOAPMCount_count10to14.'</td>
            <td>'.$implantOAPMCount_count15to19.'</td>
            <td>'.$implantOAPMCount_count20to49.'</td>
            <td>'.$implantOAPMCount_totalCount.'</td>
            <td>'.$implantDOPMCount_count10to14.'</td>
            <td>'.$implantDOPMCount_count15to19.'</td>
            <td>'.$implantDOPMCount_count20to49.'</td>
            <td>'.$implantDOPMCount_totalCount.'</td>
            <td>'.$implantCUEOMTotal10to14.'</td>
            <td>'.$implantCUEOMTotal15to19.'</td>
            <td>'.$implantCUEOMTotal20to49.'</td>
            <td>'.$implantCUEOMTotal.'</td>
            <td>'.$implantNAPMCount_count10to14.'</td>
            <td>'.$implantNAPMCount_count15to19.'</td>
            <td>'.$implantNAPMCount_count20to49.'</td>
            <td>'.$implantNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>


        <tr>
            <td colspan="5">g. IUD(IUD-I and IUD-PP) - Total</td>
            <td>'.$iudCUMBTotal10to14.'</td>
            <td>'.$iudCUMBTotal15to19.'</td>
            <td>'.$iudCUMBTotal20to49.'</td>
            <td>'.$iudCUMBTotal.'</td>
            <td>'.$iudANAPMCount_count10to14.'</td>
            <td>'.$iudANAPMCount_count15to19.'</td>
            <td>'.$iudANAPMCount_count20to49.'</td>
            <td>'.$iudANAPMCount_countTotal.'</td>
            <td>'.$iudOAPMCount_count10to14.'</td>
            <td>'.$iudOAPMCount_count15to19.'</td>
            <td>'.$iudOAPMCount_count20to49.'</td>
            <td>'.$iudOAPMCount_totalCount.'</td>
            <td>'.$iudDOPMCount_count10to14.'</td>
            <td>'.$iudDOPMCount_count15to19.'</td>
            <td>'.$iudDOPMCount_count20to49.'</td>
            <td>'.$iudDOPMCount_totalCount.'</td>
            <td>'.$iudCUEOMTotal10to14.'</td>
            <td>'.$iudCUEOMTotal15to19.'</td>
            <td>'.$iudCUEOMTotal20to49.'</td>
            <td>'.$iudCUEOMTotal.'</td>
            <td>'.$iudNAPMCount_count10to14.'</td>
            <td>'.$iudNAPMCount_count15to19.'</td>
            <td>'.$iudNAPMCount_count20to49.'</td>
            <td>'.$iudNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5"> g.1 IUD-I - Total</td>
            <td>'.$iudiCUMBTotal10to14.'</td>
            <td>'.$iudiCUMBTotal15to19.'</td>
            <td>'.$iudiCUMBTotal20to49.'</td>
            <td>'.$iudiCUMBTotal.'</td>
            <td>'.$iudI_ANAPMCount_count10to14.'</td>
            <td>'.$iudI_ANAPMCount_count15to19.'</td>
            <td>'.$iudI_ANAPMCount_count20to49.'</td>
            <td>'.$iudI_ANAPMCount_countTotal.'</td>
            <td>'.$iudiOAPMCount_count10to14.'</td>
            <td>'.$iudiOAPMCount_count15to19.'</td>
            <td>'.$iudiOAPMCount_count20to49.'</td>
            <td>'.$iudiOAPMCount_totalCount.'</td>
            <td>'.$iudiDOPMCount_count10to14.'</td>
            <td>'.$iudiDOPMCount_count15to19.'</td>
            <td>'.$iudiDOPMCount_count20to49.'</td>
            <td>'.$iudiDOPMCount_totalCount.'</td>
            <td>'.$iudiCUEOMTotal10to14.'</td>
            <td>'.$iudiCUEOMTotal15to19.'</td>
            <td>'.$iudiCUEOMTotal20to49.'</td>
            <td>'.$iudiCUEOMTotal.'</td>
            <td>'.$iudiNAPMCount_count10to14.'</td>
            <td>'.$iudiNAPMCount_count15to19.'</td>
            <td>'.$iudiNAPMCount_count20to49.'</td>
            <td>'.$iudiNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5"> g.1 IUD-PP - Total</td>
            <td>'.$iudppCUMBTotal10to14.'</td>
            <td>'.$iudppCUMBTotal15to19.'</td>
            <td>'.$iudppCUMBTotal20to49.'</td>
            <td>'.$iudppCUMBTotal.'</td>
            <td>'.$iudPP_ANAPMCount_count10to14.'</td>
            <td>'.$iudPP_ANAPMCount_count15to19.'</td>
            <td>'.$iudPP_ANAPMCount_count20to49.'</td>
            <td>'.$iudPP_ANAPMCount_countTotal.'</td>
            <td>'.$iudppOAPMCount_count10to14.'</td>
            <td>'.$iudppOAPMCount_count15to19.'</td>
            <td>'.$iudppOAPMCount_count20to49.'</td>
            <td>'.$iudppOAPMCount_totalCount.'</td>
            <td>'.$iudppDOPMCount_count10to14.'</td>
            <td>'.$iudppDOPMCount_count15to19.'</td>
            <td>'.$iudppDOPMCount_count20to49.'</td>
            <td>'.$iudppDOPMCount_totalCount.'</td>
            <td>'.$iudppCUEOMTotal10to14.'</td>
            <td>'.$iudppCUEOMTotal15to19.'</td>
            <td>'.$iudppCUEOMTotal20to49.'</td>
            <td>'.$iudppCUEOMTotal.'</td>
            <td>'.$iudppNAPMCount_count10to14.'</td>
            <td>'.$iudppNAPMCount_count15to19.'</td>
            <td>'.$iudppNAPMCount_count20to49.'</td>
            <td>'.$iudppNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            >
        </tr>

        <tr>
            <td colspan="5">h. NFP-LAM - Total</td>
            <td>'.$nfplamCUMBTotal10to14.'</td>
            <td>'.$nfplamCUMBTotal15to19.'</td>
            <td>'.$nfplamCUMBTotal20to49.'</td>
            <td>'.$nfplamCUMBTotal.'</td>
            <td>'.$nfplamANAPMCount_count10to14.'</td>
            <td>'.$nfplamANAPMCount_count15to19.'</td>
            <td>'.$nfplamANAPMCount_count20to49.'</td>
            <td>'.$nfplamANAPMCount_countTotal.'</td>
            <td>'.$nfplamOAPMCount_count10to14.'</td>
            <td>'.$nfplamOAPMCount_count15to19.'</td>
            <td>'.$nfplamOAPMCount_count20to49.'</td>
            <td>'.$nfplamOAPMCount_totalCount.'</td>
            <td>'.$nfplamDOPMCount_count10to14.'</td>
            <td>'.$nfplamDOPMCount_count15to19.'</td>
            <td>'.$nfplamDOPMCount_count20to49.'</td>
            <td>'.$nfplamDOPMCount_totalCount.'</td>
            <td>'.$nfplamCUEOMTotal10to14.'</td>
            <td>'.$nfplamCUEOMTotal15to19.'</td>
            <td>'.$nfplamCUEOMTotal20to49.'</td>
            <td>'.$nfplamCUEOMTotal.'</td>
            <td>'.$nfplamNAPMCount_count10to14.'</td>
            <td>'.$nfplamNAPMCount_count15to19.'</td>
            <td>'.$nfplamNAPMCount_count20to49.'</td>
            <td>'.$nfplamNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>


        <tr>
            <td colspan="5"> i. NFP-BBT - Total</td>
            <td>'.$nfpbbtCUMBTotal10to14.'</td>
            <td>'.$nfpbbtCUMBTotal15to19.'</td>
            <td>'.$nfpbbtCUMBTotal20to49.'</td>
            <td>'.$nfpbbtCUMBTotal.'</td>
            <td>'.$nfpbbtANAPMCount_count10to14.'</td>
            <td>'.$nfpbbtANAPMCount_count15to19.'</td>
            <td>'.$nfpbbtANAPMCount_count20to49.'</td>
            <td>'.$nfpbbtANAPMCount_countTotal.'</td>
            <td>'.$nfpbbtOAPMCount_count10to14.'</td>
            <td>'.$nfpbbtOAPMCount_count15to19.'</td>
            <td>'.$nfpbbtOAPMCount_count20to49.'</td>
            <td>'.$nfpbbtOAPMCount_totalCount.'</td>
            <td>'.$nfpbbtDOPMCount_count10to14.'</td>
            <td>'.$nfpbbtDOPMCount_count15to19.'</td>
            <td>'.$nfpbbtDOPMCount_count20to49.'</td>
            <td>'.$nfpbbtDOPMCount_totalCount.'</td>
            <td>'.$nfpbbtCUEOMTotal10to14.'</td>
            <td>'.$nfpbbtCUEOMTotal15to19.'</td>
            <td>'.$nfpbbtCUEOMTotal20to49.'</td>
            <td>'.$nfpbbtCUEOMTotal.'</td>
            <td>'.$nfpbbtNAPMCount_count10to14.'</td>
            <td>'.$nfpbbtNAPMCount_count15to19.'</td>
            <td>'.$nfpbbtNAPMCount_count20to49.'</td>
            <td>'.$nfpbbtNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>



        <tr>
            <td colspan="5"> j. NFP-CMM - Total</td>
            <td>'.$nfpcmmCUMBTotal10to14.'</td>
            <td>'.$nfpcmmCUMBTotal15to19.'</td>
            <td>'.$nfpcmmCUMBTotal20to49.'</td>
            <td>'.$nfpcmmCUMBTotal.'</td>
            <td>'.$nfpcmmANAPMCount_count10to14.'</td>
            <td>'.$nfpcmmANAPMCount_count15to19.'</td>
            <td>'.$nfpcmmANAPMCount_count20to49.'</td>
            <td>'.$nfpcmmANAPMCount_countTotal.'</td>
            <td>'.$nfpcmmOAPMCount_count10to14.'</td>
            <td>'.$nfpcmmOAPMCount_count15to19.'</td>
            <td>'.$nfpcmmOAPMCount_count20to49.'</td>
            <td>'.$nfpcmmOAPMCount_totalCount.'</td>
            <td>'.$nfpcmmDOPMCount_count10to14.'</td>
            <td>'.$nfpcmmDOPMCount_count15to19.'</td>
            <td>'.$nfpcmmDOPMCount_count20to49.'</td>
            <td>'.$nfpcmmDOPMCount_totalCount.'</td>
            <td>'.$nfpcmmCUEOMTotal10to14.'</td>
            <td>'.$nfpcmmCUEOMTotal15to19.'</td>
            <td>'.$nfpcmmCUEOMTotal20to49.'</td>
            <td>'.$nfpcmmCUEOMTotal.'</td>
            <td>'.$nfpcmmNAPMCount_count10to14.'</td>
            <td>'.$nfpcmmNAPMCount_count15to19.'</td>
            <td>'.$nfpcmmNAPMCount_count20to49.'</td>
            <td>'.$nfpcmmNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td colspan="5"> k. NFP-STM - Total</td>
            <td>'.$nfpstmCUMBTotal10to14.'</td>
            <td>'.$nfpstmCUMBTotal15to19.'</td>
            <td>'.$nfpstmCUMBTotal20to49.'</td>
            <td>'.$nfpstmCUMBTotal.'</td>
            <td>'.$nfpstmANAPMCount_count10to14.'</td>
            <td>'.$nfpstmANAPMCount_count15to19.'</td>
            <td>'.$nfpstmANAPMCount_count20to49.'</td>
            <td>'.$nfpstmANAPMCount_countTotal.'</td>
            <td>'.$nfpstmOAPMCount_count10to14.'</td>
            <td>'.$nfpstmOAPMCount_count15to19.'</td>
            <td>'.$nfpstmOAPMCount_count20to49.'</td>
            <td>'.$nfpstmOAPMCount_totalCount.'</td>
            <td>'.$nfpstmDOPMCount_count10to14.'</td>
            <td>'.$nfpstmDOPMCount_count15to19.'</td>
            <td>'.$nfpstmDOPMCount_count20to49.'</td>
            <td>'.$nfpstmDOPMCount_totalCount.'</td>
            <td>'.$nfpstmCUEOMTotal10to14.'</td>
            <td>'.$nfpstmCUEOMTotal15to19.'</td>
            <td>'.$nfpstmCUEOMTotal20to49.'</td>
            <td>'.$nfpstmCUEOMTotal.'</td>
            <td>'.$nfpstmNAPMCount_count10to14.'</td>
            <td>'.$nfpstmNAPMCount_count15to19.'</td>
            <td>'.$nfpstmNAPMCount_count20to49.'</td>
            <td>'.$nfpstmNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5"> l. NFP-SDM - Total</td>
            <td>'.$nfpsdmCUMBTotal10to14.'</td>
            <td>'.$nfpsdmCUMBTotal15to19.'</td>
            <td>'.$nfpsdmCUMBTotal20to49.'</td>
            <td>'.$nfpsdmCUMBTotal.'</td>
            <td>'.$nfpsdmANAPMCount_count10to14.'</td>
            <td>'.$nfpsdmANAPMCount_count15to19.'</td>
            <td>'.$nfpsdmANAPMCount_count20to49.'</td>
            <td>'.$nfpsdmANAPMCount_countTotal.'</td>
            <td>'.$nfpsdmOAPMCount_count10to14.'</td>
            <td>'.$nfpsdmOAPMCount_count15to19.'</td>
            <td>'.$nfpsdmOAPMCount_count20to49.'</td>
            <td>'.$nfpsdmOAPMCount_totalCount.'</td>
            <td>'.$nfpsdmDOPMCount_count10to14.'</td>
            <td>'.$nfpsdmDOPMCount_count15to19.'</td>
            <td>'.$nfpsdmDOPMCount_count20to49.'</td>
            <td>'.$nfpsdmDOPMCount_totalCount.'</td>
            <td>'.$nfpsdmCUEOMTotal10to14.'</td>
            <td>'.$nfpsdmCUEOMTotal15to19.'</td>
            <td>'.$nfpsdmCUEOMTotal20to49.'</td>
            <td>'.$nfpsdmCUEOMTotal.'</td>
            <td>'.$nfpsdmNAPMCount_count10to14.'</td>
            <td>'.$nfpsdmNAPMCount_count15to19.'</td>
            <td>'.$nfpsdmNAPMCount_count20to49.'</td>
            <td>'.$nfpsdmNAPMCount_totalCount.'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td colspan="5"> m. Total Current Users</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
    </table>
</body>

</html>';

// Load HTML content into Dompdf
$pdf->loadHtml($htmlContent);

// Render the HTML to PDF
$pdf->render();

// Get the PDF content
$pdfContent = $pdf->output();

// Send the appropriate headers for a PDF file
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="patients_report.pdf"');

// Output the PDF content
echo $pdfContent;

// Close the connection
$conn->close();

// Script to open PDF in a new tab
echo '<script>
    var blob = new Blob([' . json_encode($pdfContent) . '], {type: "application/pdf"});
    var url = URL.createObjectURL(blob);
    window.open(url, "_blank");
</script>';

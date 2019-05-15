<?php

namespace App\Http\Controllers;

use GusApi\Exception\InvalidUserKeyException;
use GusApi\GusApi;
use GusApi\ReportTypes;
use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    public function index()
    {
        $gus = new GusApi('abcde12345abcde12345', 'dev');
//for development server use:
//$gus = new GusApi('abcde12345abcde12345', 'dev');

        try {
            $nipToCheck = 5250007738; //change to valid nip value
            $gus->login();
            $gusReports = $gus->getByNip($nipToCheck);
            if (count($gusReports) > 1) {
                return redirect()->back();
            } else {
                // $gusr =
                $reportType = ReportTypes::REPORT_PUBLIC_LAW;
                //echo $gusReport->getName();
                $fullReport = $gus->getFullReport($gusReports[0], $reportType);
                return $gusReports[0];
            }
            foreach ($gusReports as $gusReport) {
                //you can change report type to other one
                dd($gusReports);
                $reportType = ReportTypes::REPORT_PUBLIC_LAW;
                //echo $gusReport->getName();
                $fullReport = $gus->getFullReport($gusReport, $reportType);
            }
        } catch (InvalidUserKeyException $e) {
            echo 'Bad user key';
        } catch (\GusApi\Exception\NotFoundException $e) {
            echo 'No data found <br>';
            echo 'For more information read server message below: <br>';
            echo $gus->getResultSearchMessage();
        }
    }
}

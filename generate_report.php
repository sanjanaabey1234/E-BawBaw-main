<?php
require 'vendor/autoload.php';

$host = 'localhost';
$db = 'ebawbawdb';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reportType = $_POST['report_type'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    if ($month == "") {
        // Full year report
        $queryDateCondition = "YEAR(created_at) = ?";
        $queryDateCondition2 = "YEAR(reg_date) = ?";
        $queryDateCondition3 = "YEAR(date_created) = ?";
        $params = [$year];
    } else {
        // Specific month report
        $startDate = $year . '-' . $month . '-01';
        $endDate = date("Y-m-t", strtotime($startDate));
        $queryDateCondition = "created_at BETWEEN ? AND ?";
        $queryDateCondition2 = "reg_date BETWEEN ? AND ?";
        $queryDateCondition3 = "date_created BETWEEN ? AND ?";
        $params = [$startDate, $endDate];
    }

    switch ($reportType) {
        case 'combined_animals_foster_parents':
            $query = "SELECT * FROM combined_animals_foster_parents WHERE $queryDateCondition";
            break;
        case 'transports':
            $query = "SELECT * FROM transports WHERE $queryDateCondition";
            break;
        case 'donors':
            $query = "SELECT * FROM donors WHERE $queryDateCondition2";
            break;
        case 'abhyadana':
            $query = "SELECT * FROM abhyadana WHERE $queryDateCondition";
            break;  
        case 'animals':
            $query = "SELECT * FROM animals WHERE $queryDateCondition";
            break; 
        case 'sterilization':
            $query = "SELECT * FROM sterilization WHERE $queryDateCondition3";
            break;      
        default:
            die("Invalid report type.");
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['generate_excel'])) {
        generateExcelReport($data, $reportType, $year, $month);
    } elseif (isset($_POST['generate_pdf'])) {
        generatePDFReport($data, $reportType, $year, $month);
    }
}

function generateExcelReport($data, $reportType, $year, $month)
{
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    if ($reportType == 'combined_animals_foster_parents') {
        $columns = ['ID', 'Animal ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Client Location', 'Animal Sex', 'Age', 'Client NIC', 'Link', 'Client Contact', 'Note', 'Created At', 'Updated At', 'Foster Parent ID', 'Foster Parent', 'Email', 'Contact', 'Address', 'NIC', 'Description', 'Foster Parent Created At'];
    } elseif ($reportType == 'transports') {
        $columns = ['ID', 'Transport Date', 'Vehicle No', 'Driver Name', 'Source', 'Destination', 'Note', 'Created At', 'Updated At'];
    } elseif ($reportType == 'donors') {
        $columns = ['ID', 'Donor Name', 'Email', 'Contact', 'Amount', 'Note', 'Created At', 'Updated At'];
    } elseif ($reportType == 'abhyadana') {
        $columns = ['ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Sex', 'Age', 'NIC', 'Colour', 'Amount', 'Contact', 'Invoice', 'link', 'note', 'Created At', 'Updated At'];
    } elseif ($reportType == 'animals') {
        $columns = ['ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Sex', 'Age', 'NIC',' Contact', 'Note', 'Created At', 'Updated At'];
    } elseif ($reportType == 'sterilization') {
        $columns = ['ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Sex', 'Age', 'NIC', ' Kids', 'Count', 'Contact', 'form', 'Date Created'];
    } 


    $columnLetter = 'A';
    foreach ($columns as $column) {
        $sheet->setCellValue($columnLetter . '1', $column);
        $columnLetter++;
    }

    $rowNumber = 2;
    foreach ($data as $row) {
        $columnLetter = 'A';
        foreach ($row as $cell) {
            $sheet->setCellValue($columnLetter . $rowNumber, $cell);
            $columnLetter++;
        }
        $rowNumber++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = "$reportType-Report-$year-$month.xlsx";

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    $writer->save('php://output');
    exit;
}

function generatePDFReport($data, $reportType, $year, $month)
{
    $dompdf = new Dompdf();
    $html = "<h1>$reportType Report for $year-$month</h1><table border='1'><tr>";

    if ($reportType == 'combined_animals_foster_parents') {
        $columns = ['ID', 'Animal ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Client Location', 'Animal Sex', 'Age', 'Client NIC', 'Link', 'Client Contact', 'Note', 'Created At', 'Updated At', 'Foster Parent ID', 'Foster Parent', 'Email', 'Contact', 'Address', 'NIC', 'Description', 'Foster Parent Created At'];
    } elseif ($reportType == 'transports') {
        $columns = ['ID', 'Transport Date', 'Vehicle No', 'Driver Name', 'Source', 'Destination', 'Note', 'Created At', 'Updated At'];
    } elseif ($reportType == 'donors') {
        $columns = ['ID', 'Donor Name', 'Email', 'Contact', 'Amount', 'Note', 'Created At', 'Updated At'];
    }  elseif ($reportType == 'abhyadana') {
        $columns = ['ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Sex', 'Age', 'NIC', 'Colour', 'Amount', 'Contact', 'Invoice', 'link', 'note', 'Created At', 'Updated At'];
    }  elseif ($reportType == 'animals') {
        $columns = ['ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Sex', 'Age', 'NIC',' Contact', 'Note', 'Created At', 'Updated At'];
    }  elseif ($reportType == 'sterilization') {
        $columns = ['ID', 'Name', 'Client Name', 'Animal Type', 'Location', 'Sex', 'Age', 'NIC', ' Kids', 'Count', 'Contact', 'form', 'Date Created'];
    } 

    foreach ($columns as $column) {
        $html .= "<th>$column</th>";
    }
    $html .= "</tr>";

    foreach ($data as $row) {
        $html .= "<tr>";
        foreach ($row as $cell) {
            $html .= "<td>$cell</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $fileName = "$reportType-Report-$year-$month.pdf";
    $dompdf->stream($fileName, ["Attachment" => 1]);
    exit;
}
?>
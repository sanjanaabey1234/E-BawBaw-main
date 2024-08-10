<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

// Database connection
$host = 'localhost';
$dbname = 'ebawbawdb';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$year = $_POST['year'];
$month = $_POST['month'];
$filter = '';

if ($month) {
    $filter = " AND YEAR(created_at) = :year AND MONTH(created_at) = :month";
} elseif ($year) {
    $filter = " AND YEAR(created_at) = :year";
}

$query = "SELECT * FROM transports WHERE 1=1" . $filter;
$stmt = $conn->prepare($query);
if ($month) {
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':month', $month);
} elseif ($year) {
    $stmt->bindParam(':year', $year);
}
$stmt->execute();
$transports = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['generate_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Driver');
    $sheet->setCellValue('C1', 'Client');
    $sheet->setCellValue('D1', 'Vehicle');
    $sheet->setCellValue('E1', 'Vehicle Type');
    $sheet->setCellValue('F1', 'From');
    $sheet->setCellValue('G1', 'To');
    $sheet->setCellValue('H1', 'Contact');
    $sheet->setCellValue('I1', 'Mileage');
    $sheet->setCellValue('J1', 'Animal Details');
    $sheet->setCellValue('K1', 'Notes');
    $sheet->setCellValue('L1', 'Created At');

    $row = 2;
    foreach ($transports as $transport) {
        $sheet->setCellValue("A$row", $transport['id']);
        $sheet->setCellValue("B$row", $transport['driver']);
        $sheet->setCellValue("C$row", $transport['client']);
        $sheet->setCellValue("D$row", $transport['vehicle']);
        $sheet->setCellValue("E$row", $transport['vehicle_type']);
        $sheet->setCellValue("F$row", $transport['from']);
        $sheet->setCellValue("G$row", $transport['to']);
        $sheet->setCellValue("H$row", $transport['contact']);
        $sheet->setCellValue("I$row", $transport['mileage']);
        $sheet->setCellValue("J$row", $transport['animal_details']);
        $sheet->setCellValue("K$row", $transport['notes']);
        $sheet->setCellValue("L$row", $transport['created_at']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'transports_report.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment;filename=\"$filename\"");
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
}

if (isset($_POST['generate_pdf'])) {
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    $html = '<h1>Transports Report</h1>';
    $html .= '<table border="1" cellpadding="4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Driver</th>
                        <th>Client</th>
                        <th>Vehicle</th>
                        <th>Vehicle Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Contact</th>
                        <th>Mileage</th>
                        <th>Animal Details</th>
                        <th>Notes</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>';

    foreach ($transports as $transport) {
        $html .= '<tr>
                    <td>' . $transport['id'] . '</td>
                    <td>' . $transport['driver'] . '</td>
                    <td>' . $transport['client'] . '</td>
                    <td>' . $transport['vehicle'] . '</td>
                    <td>' . $transport['vehicle_type'] . '</td>
                    <td>' . $transport['from'] . '</td>
                    <td>' . $transport['to'] . '</td>
                    <td>' . $transport['contact'] . '</td>
                    <td>' . $transport['mileage'] . '</td>
                    <td>' . $transport['animal_details'] . '</td>
                    <td>' . $transport['notes'] . '</td>
                    <td>' . $transport['created_at'] . '</td>
                  </tr>';
    }

    $html .= '</tbody></table>';

    $pdf->writeHTML($html);
    $filename = 'transports_report.pdf';

    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment;filename=\"$filename\"");
    header('Cache-Control: max-age=0');
    $pdf->Output('php://output', 'I');
    exit;
}
?>
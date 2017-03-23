<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Registration;
use Codedge\Fpdf\Fpdf\FPDF;
use fpdi\FPDI;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function index(){
        return view('reports.reports');
    }

    public function printPromissoryNote(Registration $Registration){
        // initiate FPDI
        $pdf = new FPDI('P','mm','Letter');
        // add a page
        $pdf->AddPage();
        $pdf->SetFont('Arial','','10');

        $pdf->SetXY(33, 26);
        $pdf->Write(0,"nako");

        /*$pdf->SetXY(80, 50);
        $pdf->Write(0,"UNLIFINANCE CORP.");

        $pdf->SetXY(40, 204);
        $pdf->MultiCell(0,4,"another nako");*/


        $pdf->Output();
    }

    public function certAttendance(FPDF $fpdf){

        $registrations = Registration::all();

        $fpdf->SetFont('Arial', 'B', 20);

        foreach( $registrations as $i => $registration ) {

            if ( $i % 2 == 0 ) {
                $fpdf->AddPage("L","Legal");
                $fpdf->SetXY(6,115);
            } else {
                $fpdf->SetXY(171,115);
            }

            $fpdf->Cell(152, 0,strtoupper(iconv('UTF-8','windows-1252',$registration->last_name)).", ".strtoupper(iconv('UTF-8','windows-1252',$registration->first_name))." ".strtoupper(iconv('UTF-8','windows-1252',$registration->middle_name)),0,0,'C');

        }

        $content = $fpdf->Output('',"S",true);


        return response($content, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Length'      =>  strlen($content),
            'Content-Disposition' => 'inline; filename="mypdf.pdf"',
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
            'Pragma'              => 'public'
        ]);
    }

    public function certAttendanceWithImage(FPDF $fpdf){

        $registrations = Registration::orderBy('id')->get();

        $fpdf->SetFont('Arial', 'B', 20);

        $y = 115;
        foreach( $registrations as $i => $registration ) {

            if ( $i % 2 == 0 ) {
                $fpdf->AddPage("L","Legal");
                $fpdf->Image('images/cert_attendance.jpg',10,10,152.4);
                $fpdf->Image('images/cert_attendance.jpg',172.4,10,152.4);
                $fpdf->SetXY(10,$y);
            } else {
                $fpdf->SetXY(172.4,$y);
            }

            $fpdf->Cell(152.4, 0, strtoupper(iconv('UTF-8','windows-1252',$registration->last_name)).", ".strtoupper(iconv('UTF-8','windows-1252',$registration->first_name))." ".strtoupper(iconv('UTF-8','windows-1252',$registration->middle_name)),0,0,'C');

        }

        $content = $fpdf->Output('',"S",true);


        return response($content, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Length'      =>  strlen($content),
            'Content-Disposition' => 'inline; filename="mypdf.pdf"',
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
            'Pragma'              => 'public'
        ]);
    }

    public function certMembershipAssociate(FPDF $fpdf){

        $registrations = Membership::whereTypeOfMember('A')
            //whereTypeOfMembership(6)
            //whereBetween('type_of_membership',[1,4])
            //->whereTypeOfMember('R')
            ->get();

        $fpdf->SetFont('Arial', 'B', 30);

        $y = 105;

        foreach( $registrations as $i => $registration ) {
            $fpdf->SetXY(10,$y);
            $fpdf->AddPage("S","Letter");
            //$fpdf->Image('images/regularmember_1yr.jpg',10,10,260);
            //$fpdf->Image('images/regularmember_3yrs.jpg',10,10,260);
            $fpdf->Image('images/associatemember.jpg',10,10,260);
            $fpdf->SetXY(10,$y);
            $fpdf->Cell(260, 0, strtoupper(iconv('UTF-8','windows-1252',$registration->last_name)).", ".strtoupper(iconv('UTF-8','windows-1252',$registration->first_name))." ".strtoupper(iconv('UTF-8','windows-1252',$registration->middle_name)),0,0,'C');

        }

        $content = $fpdf->Output('',"S",true);


        return response($content, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Length'      =>  strlen($content),
            'Content-Disposition' => 'inline; filename="mypdf.pdf"',
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
            'Pragma'              => 'public'
        ]);
    }

    public function certMembershipRegular1Year(FPDF $fpdf){

        $registrations = Membership::whereTypeOfMember('R')
            ->whereBetween('type_of_membership',[1,4])
            ->get();

        $fpdf->SetFont('Arial', 'B', 30);

        $y = 105;

        foreach( $registrations as $i => $registration ) {
            $fpdf->SetXY(10,$y);
            $fpdf->AddPage("S","Letter");
            $fpdf->Image('images/regularmember_1yr.jpg',10,10,260);
            $fpdf->SetXY(10,$y);
            $fpdf->Cell(260, 0, strtoupper(iconv('UTF-8','windows-1252',$registration->last_name)).", ".strtoupper(iconv('UTF-8','windows-1252',$registration->first_name))." ".strtoupper(iconv('UTF-8','windows-1252',$registration->middle_name)),0,0,'C');

        }

        $content = $fpdf->Output('',"S",true);


        return response($content, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Length'      =>  strlen($content),
            'Content-Disposition' => 'inline; filename="mypdf.pdf"',
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
            'Pragma'              => 'public'
        ]);
    }

    public function certMembershipRegular3Years(FPDF $fpdf){

        $registrations = Membership::whereTypeOfMember('R')
            ->whereTypeOfMembership(6)
            ->get();

        $fpdf->SetFont('Arial', 'B', 30);

        $y = 105;

        foreach( $registrations as $i => $registration ) {
            $fpdf->SetXY(10,$y);
            $fpdf->AddPage("S","Letter");
            $fpdf->Image('images/regularmember_3yrs.jpg',10,10,260);
            $fpdf->SetXY(10,$y);
            $fpdf->Cell(260, 0, strtoupper(iconv('UTF-8','windows-1252',$registration->last_name)).", ".strtoupper(iconv('UTF-8','windows-1252',$registration->first_name))." ".strtoupper(iconv('UTF-8','windows-1252',$registration->middle_name)),0,0,'C');

        }

        $content = $fpdf->Output('',"S",true);


        return response($content, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Length'      =>  strlen($content),
            'Content-Disposition' => 'inline; filename="mypdf.pdf"',
            'Cache-Control'       => 'private, max-age=0, must-revalidate',
            'Pragma'              => 'public'
        ]);
    }



}

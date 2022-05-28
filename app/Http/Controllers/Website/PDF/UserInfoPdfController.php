<?php

namespace App\Http\Controllers\Website\PDF;

use App\Http\Controllers\Controller;
use App\Services\PDF\generatePdfService;
use PDF;


class UserInfoPdfController extends Controller
{
    public function generateUserInfoPDF($id)
    {
        $generatePDfService = new generatePdfService();
        $pdf_data = $generatePDfService->generatePdf($id);

        $pdf = PDF::loadView('Website.PDF.UserProfilePdf', $pdf_data)->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);

        return $pdf->download('invoice.pdf');
    }
}

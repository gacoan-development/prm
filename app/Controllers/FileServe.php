<?php

namespace App\Controllers;

class FileServe extends BaseController
{
    public function viewFile($origin, $filename){

        switch($origin){
            case "pengelola":
                $folder = 'vendor_attachments';
            break;
            case "tarif":
                $folder = 'fee_attachments';
            break;
            case "pajak":
                $folder = 'taxpay_attachments';
            break;
            case "invoice":
                $folder = 'inv_attachments';
            break;
        }
        
        $filePath = WRITEPATH . $folder.'/' . $filename;

        if (file_exists($filePath)) {
            $mimeType = mime_content_type($filePath);
            return $this->response
                        ->setHeader('Content-Type', $mimeType)
                        ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                        ->setBody(file_get_contents($filePath));
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("File not found: " . $filename);
        }
    }

    public function downloadFile($origin, $filename){
        
        switch($origin){
            case "pengelola":
                $folder = 'vendor_attachments';
            break;
            case "tarif":
                $folder = 'fee_attachments';
            break;
            case "pajak":
                $folder = 'taxpay_attachments';
            break;
            case "invoice":
                $folder = 'inv_attachments';
            break;
        }

        $filePath = WRITEPATH . $folder.'/' . $filename;

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("File not found: " . $filename);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Document;
use App\Models\DocumentStatus;
use App\Models\DocumentType;
use App\Models\Archive;
use App\Models\DocumentArchive;

class ExpiringDocumentController extends Controller
{
    public function index()
    {
        // документы с истекающим сроком хранения (менее чем через 200 дней)
        $expiringDocuments = Document::where('DisposableDate', '<', Carbon::now()->addDays(200))
                                     ->where('Status', 1) 
                                     ->get();

       
        foreach ($expiringDocuments as $document) {
            $document->status = optional(DocumentStatus::find($document->Status))->name;
            $document->type = optional(DocumentType::find($document->Type))->name;
           
            $documentId = $document->DocumentID;           
            $documentArchive = DocumentArchive::where('document_id', $documentId)->first();
           
            if ($documentArchive) {
                $archiveId = $documentArchive->archive_id;              
                $archive = Archive::find($archiveId);
                $archiveLocation = "Ряд: {$archive->Row}, Стеллаж: {$archive->Shelf}, Полка: {$archive->ShelfPosition}";
            } else {
                $archiveLocation = 'трабл';
            }          
            $document->archive_info = $archiveLocation;
        }
        return view('expiring_documents.index', compact('expiringDocuments'));
    }
}
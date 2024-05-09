<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentArchive;


class ArchiveDocumentController extends Controller
{
    public function allDocuments()
    {
        // получить все записи из таблицы document_archive с отношениями к документам и архивам
        $documentArchives = DocumentArchive::with('document', 'archive')->get();

        return view('archives.index', compact('documentArchives'));
    }

    public function specificStatusDocumentsStatus2()
    {       
        // получить документы со статусом 2
        $specificStatusDocumentsStatus2 = Document::where('Status', 2)->get();
        return view('archives.specific_status_documents_status2', compact('specificStatusDocumentsStatus2'));
    }

    public function specificStatusDocumentsStatus3()
    {
        // получить документы со статусом 3
        $specificStatusDocumentsStatus3 = Document::where('Status', 3)->get();
        return view('archives.specific_status_documents_status3', compact('specificStatusDocumentsStatus3'));
    }
}
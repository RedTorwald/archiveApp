<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentStatus;
use App\Models\DocumentType;

class EditDocumentController extends Controller
{
    public function edit(Document $document)
    {
        
        $status = optional(DocumentStatus::find($document->Status))->name;        
        $type = optional(DocumentType::find($document->Type))->name;
        $statuses = DocumentStatus::all();
        return view('documents.edit', compact('document', 'status', 'type', 'statuses'));
    }

    public function update(Request $request, Document $document)
    {
        $validatedData = $request->validate([
            'status' => 'required|exists:document_statuses,id',
            'responsable_person' => 'required|string',
        ]);
           
        $newStatus = $validatedData['status'];
        $newResponsiblePerson = $validatedData['responsable_person'];
         
        $currentStatus = $document->Status;
           
        $document->update([
            'Status' => $newStatus,
            'ResponsiblePerson' => $newResponsiblePerson,
        ]);
    
      
        if ($newStatus != 1 && $currentStatus != $newStatus) {
            $document->archives()->detach(); 
    
       
            $archive = $document->archives()->first(); 
            if ($archive) {
                $archive->increment('DocumentCapacity');
            }
        }
        
        if ($newStatus == 3 or $newStatus == 2) {
            $document->update([
                'DisposableDate' => now()->toDateString(), 
            ]);
        }
    
        return redirect()->route('documents.all', $document)->with('success', 'Статус документа успешно обновлен.');
    }

}

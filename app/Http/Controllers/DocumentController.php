<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use App\Models\Archive;
use App\Models\DocumentStatus;
use App\Models\DocumentType;

use Carbon\Carbon;

class DocumentController extends Controller
{
    public function create()
    {   
        $archives = Archive::where('DocumentCapacity', '>', 0)->get();
        $statuses = DocumentStatus::all();
        $types = DocumentType::all();
        
        return view('documents.create', compact('archives', 'statuses', 'types'));
    }    
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|string',
            'date_received' => 'required|date',
            'type' => 'required|integer|exists:document_types,id',
            'status' => 'required|integer|exists:document_statuses,id',
            'disposable_date' => 'nullable|date',      
            'responsible_person' => 'required|string',  
            'archive_id' => 'required|integer|exists:archives,ArchiveID',
        ]);   
      
        $archive = Archive::find($request->archive_id);
       
        if ($this->isShelfAvailable($archive)) {            
            $archive->decrement('DocumentCapacity'); 
          
            $document = new Document();           
            $document->Title = $request->title;
            $document->DateReceived = $request->date_received;
            $document->Type = $request->type;
            $document->Status = $request->status;
            

            $documentType = DocumentType::findOrFail($request->type);
            $storageYears = $documentType->getStorageYears();

            $disposableDate = Carbon::parse($request->date_received)->addYears($storageYears);

            $document->ResponsiblePerson = $request->responsible_person;
            $document->DisposableDate = $disposableDate;

          
            $document->save();

            $archive = Archive::find($request->archive_id);            
            $document->archives()->attach($archive);
            
         
            $user = User::first();
            $document->users()->attach($user);
            
            return redirect()->route('documents.all')->with('success', 'Документ успешно создан.');
            
            
        } else {
            return redirect()->back()->with('error', 'Выбранная полка архива уже заполнена.');
        }
    }
   
    private function isShelfAvailable($archive)
    {       
        return $archive->DocumentCapacity > 0;
    }
}
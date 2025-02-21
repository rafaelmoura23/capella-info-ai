<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatRAGController extends Controller
{
    public function index()
    {
        return view('chat_rag_langchain.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,txt|max:2048'
        ]);
    
        $response = Http::attach(
            'file',
            file_get_contents($request->file('file')),
            $request->file('file')->getClientOriginalName()
        )->post('http://127.0.0.1:8001/upload/'); // Mudamos para porta 8001
    
        return redirect()->route('chat_rag.index')->with('message', $response->json()['message']);
    }
    
    public function ask(Request $request)
    {
        $request->validate(['query' => 'required|string']);
    
        $response = Http::asForm()->post('http://127.0.0.1:8001/ask/', [ // Mudamos para porta 8001
            'query' => $request->input('query')
        ]);
    
        return response()->json($response->json());
    }
}    
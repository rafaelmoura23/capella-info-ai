<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class ChatRAGController extends Controller
{
    /**
     * Exibe a página do chatbot com os documentos do usuário autenticado.
     */
    public function index()
    {
        $userId = Auth::id();
    
        // Obtém as mensagens e documentos do usuário autenticado
        $messages = Message::where('user_id', $userId)->latest()->get();
        $documents = Document::where('user_id', $userId)->latest()->get();
    
        return view('chat_rag_langchain.index', compact('messages', 'documents'));
    }
    

    /**
     * Faz o upload do arquivo e associa ao usuário autenticado.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,txt|max:2048'
        ]);

        // Salvar arquivo no storage
        $file = $request->file('file');
        $path = $file->store('documents');

        // Salvar no banco de dados com user_id
        $document = Document::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'user_id' => Auth::id(), // Associar ao usuário logado
        ]);

        // Enviar para a API FastAPI
        $response = Http::attach(
            'file',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post('http://127.0.0.1:8001/upload/');

        return redirect()->route('chat_rag.index')->with('message', 'Arquivo enviado com sucesso!');
    }

    /**
     * Faz uma pergunta e retorna a resposta.
     */
    public function ask(Request $request)
    {
        $request->validate(['query' => 'required|string']);

        // Envia a pergunta para a API do FastAPI
        $response = Http::asForm()->post('http://127.0.0.1:8001/ask/', [
            'query' => $request->input('query')
        ]);

        // Obtém a resposta da API
        $botResponse = $response->json()['response'];

        // Salvar no banco de dados
        Message::create([
            'user_id' => Auth::id(),
            'question' => $request->input('query'),
            'response' => $botResponse,
        ]);

        return response()->json(['response' => $botResponse]);
    }

    /**
     * Permite ao usuário baixar apenas seus próprios arquivos.
     */
    public function download($id)
    {
        $document = Document::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return Storage::download($document->path, $document->name);
    }

    /**
     * Permite ao usuário excluir apenas seus próprios arquivos.
     */
    public function delete($id)
    {
        $document = Document::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Deletar arquivo do storage
        Storage::delete($document->path);

        // Remover do banco de dados
        $document->delete();

        return redirect()->route('chat_rag.index')->with('message', 'Arquivo excluído com sucesso!');
    }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Pagamento;
use GuzzleHttp\Client;
use Illuminate\Http\Request;




class dashboardController extends Controller
{
   
    public function index()
    {
       
        return view('dashboard');
    }
    public function lista()
    {
        $lista = Pagamento::get();
        return view('lista',compact('lista'));
    }
    public function pagamento(Request $request)
    {
        $attributes = request()->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'valor' => 'required',
            'exp' => 'required',
            'numero' => 'required|min:13|max:16',
            'seguranca' => 'required|min:3|max:4'
          
        ]);
        
         $datatratada = date('m/Y', strtotime($request->exp));
         $valortratado = str_replace(',', '', str_replace('.', '', $request->valor));
         $url = 'https://apisandbox.cieloecommerce.cielo.com.br/1/sales/';
         $client = new \GuzzleHttp\Client();
         $headers = [
             'Accept' => 'application/json',
             'Content-Type' => 'application/json',
             'MerchantId' => 'edc50604-be99-494d-90e2-ba6e9b584adb',
             'MerchantKey' => 'OZBWAXOTUGRLTHXCFZZXFIMQUBNEYDZDTJDWANEF',
            
           ];
 
           $body = '{
              
            "MerchantOrderId":"2014111903",
            "Customer":{  
               "Name":"'.$request->nome.'"
            },
            "Payment":{  
               "Type":"'.$request->tipo.'",
               "Amount":"'.$valortratado.'",
               "Installments":1,
               "Authenticate":false,
               "ReturnUrl":"http://www.cielo.com.br",
               "SoftDescriptor":"123456789ABCD",
               "CreditCard":{  
                  "CardNumber":"'.$request->numero.'",
                  "Holder":"Teste Holder",
                  "ExpirationDate":"'.$datatratada.'",
                  "SecurityCode":"'.$request->seguranca.'",
                  "Brand":"Visa"
               }
            }
            
            }';
        $request = $client->request('POST', $url, [ 'headers' => $headers, 'body' => $body ]);
       $dados = $request->getBody();
       $dados = json_decode($dados);
       $salvarPagamento = new Pagamento;
       $salvarPagamento->nome = $dados->Customer->Name;
       $salvarPagamento->retorno = $dados->Payment->Links[0]->Href;
       $salvarPagamento->save();
       return redirect('/'); 
        
    }
    
    public function consulta($id)
    {
        $pagamento = Pagamento::find($id);
        $url = $pagamento->retorno;
         $client = new \GuzzleHttp\Client();
         $headers = [
             'Accept' => 'application/json',
             'Content-Type' => 'application/json',
             'MerchantId' => 'edc50604-be99-494d-90e2-ba6e9b584adb',
             'MerchantKey' => 'OZBWAXOTUGRLTHXCFZZXFIMQUBNEYDZDTJDWANEF',
            
           ];
       $request = $client->request('GET', $url, [ 'headers' => $headers]);
       $dados = $request->getBody();
       $dados = json_decode($dados);
        return view('item',compact('dados'));
    }
    
   
}

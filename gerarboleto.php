<?php
   require __DIR__ . '/../../vendor/autoload.php'; // caminho relacionado a SDK

   use Gerencianet\Exception\GerencianetException;
   use Gerencianet\Gerencianet;

   $clientId = 'Client_Id_4e4327e045ceb277ed5f62db8c46c399c309e0bf';// insira seu Client_Id, conforme o ambiente (Des ou Prod)
   $clientSecret = 'Client_Secret_bb1ad596c70e1c17089cd27ec860816670412681'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
    ];
    // $charge_id refere-se ao ID da transação gerada anteriormente
    $params = [
            'id' => $charge_id

    ];

   $item_1 = [
       'name' => $_GET["produto"], // nome do item, produto ou serviço
       'value' => $_GET["valor"] // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
   ];
   $items = [
       $item_1
   ];
   $metadata = array('notification_url'=>'sua_url_de_notificacao_.com.br'); //Url de notificações
   $customer = [
       'name' => $_GET["nomecomprador"], // nome do cliente
       'cpf' => $_GET["cpf"], // cpf válido do cliente
       'phone_number' => $_GET["telefone"], // telefone do cliente
   ];

   $bankingBillet = [
       'expire_at' => date('d/m/Y', time() + (2 * 24 * 60 * 60)), // data de vencimento do titulo
       'message' => 'GN-VENDAS', // mensagem a ser exibida no boleto
       'customer' => $customer,
   ];
   $payment = [
       'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
   ];
   $body = [
       'items' => $items,
       'metadata' =>$metadata,
       'payment' => $payment
   ];
   try {
     $api = new Gerencianet($options);
     $pay_charge = $api->oneStep([],$body);
     echo '<pre>';
     print_r($pay_charge);
     echo '<pre>';

    } catch (GerencianetException $e) {
       print_r($e->code);
       print_r($e->error);
       print_r($e->errorDescription);
   } catch (Exception $e) {
       print_r($e->getMessage());
   }

   
?>

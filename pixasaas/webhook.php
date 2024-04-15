<?php

// Receber dados do webhook
$webhookData = file_get_contents("php://input");

// Verificar se há dados
if ($webhookData) {
    // Converter dados JSON em array
    $data = json_decode($webhookData, true);

    // Verificar se a conversão foi bem-sucedida
    if ($data !== null && isset($data['event']) && isset($data['payment'])) {
          // Configuração do banco de dados
    // Configuração do banco de dados
    $servername = "localhost";
    $username = "hercul27_lopesmatheus7";
    $password = "Fl@mengo7rbr";
    $dbname = "hercul27_hercules2";

         // Conectar ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Extrair dados do array
        $event = $conn->real_escape_string($data['event']);
        $payment = $data['payment'];

        $payment_id = $conn->real_escape_string($payment['id']);
        $date_created = $conn->real_escape_string($payment['dateCreated']);
        $customer = $conn->real_escape_string($payment['customer']);
        $value = $payment['value'];
        $billing_type = $conn->real_escape_string($payment['billingType']);
        $status = $conn->real_escape_string($payment['status']);
        $due_date = $conn->real_escape_string($payment['dueDate']);
        $payment_date = $conn->real_escape_string($payment['paymentDate']);
        $invoice_url = isset($payment['invoiceUrl']) ? $conn->real_escape_string($payment['invoiceUrl']) : null;
        $invoice_number = isset($payment['invoiceNumber']) ? $conn->real_escape_string($payment['invoiceNumber']) : null;
        $transaction_receipt_url = isset($payment['transactionReceiptUrl']) ? $conn->real_escape_string($payment['transactionReceiptUrl']) : null;

        // Preparar e executar a consulta
        $sql = "INSERT INTO payments (event, payment_id, date_created, customer, value, billing_type, status, due_date, payment_date, invoice_url, invoice_number, transaction_receipt_url) 
                VALUES ('$event', '$payment_id', '$date_created', '$customer', $value, '$billing_type', '$status', '$due_date', '$payment_date', '$invoice_url', '$invoice_number', '$transaction_receipt_url')";

        $result = $conn->query($sql);

        // Verificar se a consulta foi bem-sucedida
        if (!$result) {
            echo "Erro ao armazenar dados no banco de dados: " . $conn->error;
        }

        // Fechar a conexão
        $conn->close();
    } else {
        // Responder com erro (código 400)
        http_response_code(400);
        echo "Erro ao processar dados do webhook";
    }
} else {
    // Responder com erro (código 400)
    http_response_code(400);
    echo "Nenhum dado recebido do webhook";
}

?>
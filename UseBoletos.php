<?php
class UseBoletos
{
    public $valor_boleto;
    public $data_documento;
    public $data_vencimento;
    public $perc_multa;
    public $perc_juros_mora;
    public $valor_desconto;
    public $data_desconto;
    public $numero_documento;
    public $pedido_numero;
    public $especie_documento;
    public $instrucao1;
    public $instrucao2;
    public $instrucao3;
    public $observacao;
    //
    public $sacado_razao;
    public $sacado_fantasia;
    public $sacado_cpf_cnpj;
    public $sacado_cidade;
    public $sacado_cep;
    public $sacado_uf;
    public $sacado_logradouro;
    public $sacado_numero;
    public $sacado_bairro;
    public $sacado_complemento;

    private $X_Credenciado_Chave = '';
    private $identificadorCredenciado = '';
    private $sandbox;

    const PROD_URL = "https://api.useboletos.com.br/recebimentos/v1/";

    function __construct($params = [])
    {
        $this->X_Credenciado_Chave = $params[0]->X_Credenciado_Chave;
        $this->identificadorCredenciado = $params[0]->identificadorCredenciado;
        var_dump($params);
        
    }

    public function createCharge(
        $valor_boleto,
        $data_documento,
        $data_vencimento,
        $perc_multa,
        $perc_juros_mora,
        $valor_desconto,
        $data_desconto,
        $numero_documento,
        $pedido_numero,
        $especie_documento,
        $instrucao1,
        $instrucao2,
        $instrucao3,
        $observacao,
        $sacado_razao,
        $sacado_fantasia,
        $sacado_cpf_cnpj,
        $sacado_cidade,
        $sacado_cep,
        $sacado_uf,
        $sacado_logradouro,
        $sacado_numero,
        $sacado_bairro,
        $sacado_complemento
    ) {
        
        $this->valor_boleto = $valor_boleto;
        $this->data_documento = $data_documento;
        $this->data_vencimento = $data_vencimento;
        $this->perc_multa = $perc_multa;
        $this->perc_juros_mora = $perc_juros_mora;
        $this->valor_desconto = $valor_desconto;
        $this->data_desconto = $data_desconto;
        $this->numero_documento = $numero_documento;
        $this->pedido_numero = $pedido_numero;
        $this->especie_documento = $especie_documento;
        $this->instrucao1 = $instrucao1;
        $this->instrucao2 = $instrucao2;
        $this->instrucao3 = $instrucao3;
        $this->observacao = $observacao;
        $this->sacado_razao = $sacado_razao;
        $this->sacado_fantasia = $sacado_fantasia;
        $this->sacado_cpf_cnpj = $sacado_cpf_cnpj;
        $this->sacado_cidade = $sacado_cidade;
        $this->sacado_cep = $sacado_cep;
        $this->sacado_uf = $sacado_uf;
        $this->sacado_logradouro = $sacado_logradouro;
        $this->sacado_numero = $sacado_numero;
        $this->sacado_bairro = $sacado_bairro;
        $this->sacado_complemento = $sacado_complemento;
        return $this;
    }

    public function issueCharge()
    {
        $requestData = [
            'valor_boleto' => $this->valor_boleto,
            'data_documento' => $this->data_documento,
            'data_vencimento' => $this->data_vencimento,
            'perc_multa' => $this->perc_multa,
            'perc_juros_mora' => $this->perc_juros_mora,
            'valor_desconto' => $this->valor_desconto,
            'data_desconto' => $this->data_desconto,
            'numero_documento' => $this->numero_documento,
            'pedido_numero' => $this->pedido_numero,
            'especie_documento' => $this->especie_documento,
            'instrucao1' => $this->instrucao1,
            'instrucao2' => $this->instrucao2,
            'instrucao3' => $this->instrucao3,
            'observacao' => $this->observacao,
            'sacado.razao' => $this->sacado_razao,
            'sacado_fantasia' => $this->sacado_fantasia,
            'sacado_cpf_cnpj' => $this->sacado_cpf_cnpj,
            'sacado_cidade' => $this->sacado_cidade,
            'sacado_cep' => $this->sacado_cep,
            'sacado_uf' => $this->sacado_uf,
            'sacado_logradouro' => $this->sacado_logradouro,
            'sacado_numero' => $this->sacado_numero,
            'sacado_bairro' => $this->sacado_bairro,
            'sacado_complemento' => $this->sacado_complemento,
        ];

        return $this->request("boletos", $requestData);
        //return json_decode($this->request("boletos", $requestData));
    }
    
    public function ecoar()
    {
        echo 'e';
        
    }

    private function request($urlSufix, $data)
    {
        $fields = json_encode($data);

        $fields =
            "{valor_boleto: " .
            $data['valor_boleto'] .
            ",    data_documento : '" .
            $data['data_documento'] .
            "', data_vencimento : '" .
            $data['data_vencimento'] .
            "', perc_multa : " .
            $data['perc_multa'] .
            ",    perc_juros_mora: " .
            $data['perc_juros_mora'] .
            ", valor_desconto: " .
            $data['valor_desconto'] .
            ",  numero_documento: '" .
            $data['numero_documento'] .
            "',    pedido_numero: 1,    especie_documento: '" .
            $data['especie_documento'] .
            "',instrucao1:'" .
            $data['instrucao1'] .
            "',  instrucao2: '" .
            $data['instrucao2'] .
            "', instrucao3: '" .
            $data['instrucao3'] .
            "', observacao: '" .
            $data['observacao'] .
            "', sacado: { razao: '" .
            $data['sacado.razao'] .
            "',        cpf_cnpj: '" .
            $data['sacado_cpf_cnpj'] .
            "', logradouro: '" .
            $data['sacado_logradouro'] .
            "',numero: '" .
            $data['sacado_numero'] .
            "', bairro: '" .
            $data['sacado_bairro'] .
            "',cidade: '" .
            $data['sacado_cidade'] .
            "',uf: '" .
            $data['sacado_uf'] .
            "', cep: '" .
            $data['sacado_cep'] .
            "'   }}";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL =>
                'https://api.useboletos.com.br/recebimentos/v1/' .
                $this->identificadorCredenciado .
                '/' .
                $urlSufix,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $fields,

            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-Credenciado-Chave: " . $this->X_Credenciado_Chave,
            ],
        ]);

        $response = curl_exec($curl);
        if ($response) {
            $response = $response;
        } else {
            $response = 'ERROR' . $response; //curl_error($curl);
        }
        curl_close($curl);
        return $response;
    }
}

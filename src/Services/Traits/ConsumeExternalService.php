<?php

namespace Queopius\MicroserviceCommon\Services\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumeExternalService
{
    public function headers(array $headers = [])
    {
        array_push($headers, [
            'Accepte' => 'application/json',
            'Autorization' => $this->token
        ]);

        return Http::withHeaders($headers);
    }

    public function request(
        string $method,
        string $endPoint,
        array $formParams = [],
        array $headers = []
    ) {
        return $this->headers($headers)
                    ->$method($this->url . $endPoint, $formParams);
    }
}

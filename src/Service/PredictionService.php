<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PredictionService
{
    private const API_URL = 'http://127.0.0.1:5000/predict';

    public function __construct(
        private HttpClientInterface $client
    ) {
    }

    public function predict(array $data): float
    {
        $response = $this->client->request('POST', self::API_URL, [
            'json' => $data,
        ]);

        $result = $response->toArray();

        return (float) $result['predicted_price_inr'];
    }
}

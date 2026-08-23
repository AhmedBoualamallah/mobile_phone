<?php

namespace App\Controller;

use App\Service\PredictionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PredictionController extends AbstractController
{
    #[Route('/prediction', name: 'app_prediction')]
    public function index(PredictionService $predictionService): Response
    {
        $data = [
            'smartphone_brand' => 'Samsung',
            'processor_brand' => 'qualcomm',
            'rating_score' => 80,
            'core_count' => 8,
            'clock_speed_ghz' => 2.8,
            'ram_gb' => 8,
            'storage_gb' => 256,
            'has_5g' => true,
            'has_nfc' => true,
            'has_ir_blaster' => false,
            'fast_charging' => true,
            'display_inches' => 6.5,
            'res_width_px' => 1080,
            'res_height_px' => 2400,
            'refresh_rate_hz' => 120,
            'battery_mah' => 5000,
            'charging_watt' => 45,
            'rear_camera_count' => 3,
            'front_camera_count' => 1,
            'rear_camera_main_mp' => 50,
            'front_camera_main_mp' => 12,
            'os_name' => 'android',
            'memory_card_supported' => false,
        ];

        $predictedPrice = $predictionService->predict($data);

        return $this->render('prediction/index.html.twig', [
            'predicted_price' => $predictedPrice,
        ]);
    }
}
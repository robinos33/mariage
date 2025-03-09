<?php

namespace App\Service;

use Google\Service\Sheets as GoogleServiceSheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetsService
{
    private GoogleServiceSheets $service;
    private string $spreadsheetId;

    public function __construct(string $credentialsPath, string $spreadsheetId)
    {
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsPath);
        $client->addScope(GoogleServiceSheets::SPREADSHEETS);

        $this->service = new GoogleServiceSheets($client);
        $this->spreadsheetId = $spreadsheetId;
    }

    public function appendRow(array $data): void
    {
        $range = 'liste!A2';
        $body = new ValueRange([
            'values' => [$data],
        ]);

        $params = ['valueInputOption' => 'RAW'];
        $this->service->spreadsheets_values->append($this->spreadsheetId, $range, $body, $params);
    }
}

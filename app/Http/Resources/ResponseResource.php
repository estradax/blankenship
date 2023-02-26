<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use Throwable;

class ResponseResource extends JsonResource
{
    private bool $isError;
    private Throwable $error;
    private string $error_type;
    private mixed $data;

    private function __construct(string $error_type, Throwable $error, mixed $data, bool $isError)
    {
        parent::__construct(null);

        $this->error = $error;
        $this->error_type = $error_type;
        $this->data = $data;
        $this->isError = $isError;
    }

    public static function error(string $type, Throwable $e): ResponseResource
    {
        return new ResponseResource($type, $e, null, true);
    }

    public static function success(mixed $data): ResponseResource
    {
        return new ResponseResource('', new \Exception(), $data, false);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        if ($this->isError) {
            return [
                'error' => [
                '   type' => $this->error_type,
                    'message' => $this->error->getMessage()
                ],
                'data' => null
            ];
        }

        return [
            'error' => null,
            'data' => $this->data
        ];
    }
}

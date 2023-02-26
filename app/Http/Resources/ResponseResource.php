<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use Throwable;

class ResponseResource extends JsonResource
{
    private Throwable $error;
    private string $error_type;

    public static function fromError(string $type, Throwable $e): ResponseResource
    {
        return new ResponseResource($type, $e);
    }

    public function __construct(string $error_type, Throwable $error)
    {
        parent::__construct(null);

        $this->error = $error;
        $this->error_type = $error_type;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'error' => [
                'type' => $this->error_type,
                'message' => $this->error->getMessage()
            ],
            'data' => null
        ];
    }
}

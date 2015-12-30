<?php
namespace CodeProject\Transformers;

use CodeProject\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract {

    public function transform(Client $model)
    {
        return [
            'id'          => $model->id,
            'name'        => $model->name,
            'responsible' => $model->responsible,
            'email'       => $model->email,
            'phone'       => $model->phone,
            'address'     => $model->address,
            'obs'         => $model->obs,
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Client extends Model
{
    use HasFactory;

    const TABLE_QUANTITY = 4;

    protected $fillable = [
        'id',
        'cpf',
        'name',
        'date_of_birth',
        'gender',
        'address',
        'state',
        'city'
    ];

    public $primaryKey  = 'id';

    protected $table = 'clients';

    public static function getClient(int $limit = self::TABLE_QUANTITY, string|null $state = null, string|null $cpf = null, string|null $name = null, string|null $date_of_birth = null, string|null $city = null)
    {
        $query = self::select('clients.*');

        if ($cpf) {
            $query->where('clients.cpf', 'like', '%' . $cpf . '%');
        }
        if ($name) {
            $query->orwhere('clients.name', 'like', '%' . $name . '%');
        }
        if ($date_of_birth) {
            $query->orwhere('clients.date_of_birth', 'like', '%' . $date_of_birth . '%');
        }
        if ($state) {
            $query->orwhere('clients.state', 'like', '%' . $state . '%');
        }
        if ($city) {
            $query->orwhere('clients.city', 'like', '%' . $city . '%');
        }

        return $query->paginate($limit);
    }
}

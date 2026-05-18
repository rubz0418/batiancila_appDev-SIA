<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public const BARANGAYS = [
        'Ambacon',
        'Badiangon',
        'Bangcas A',
        'Bangcas B',
        'Biasong',
        'Bugho',
        'Calag-itan',
        'Calayugan',
        'Calinao',
        'Canipaan',
        'Catublian',
        'Ilaya',
        'Ingan',
        'Labrador',
        'Libas',
        'Lumbog',
        'Manalog',
        'Manlico',
        'Matin-ao',
        'Nava',
        'Nueva Esperanza',
        'Otama',
        'Palongpong',
        'Panalaron',
        'Patong',
        'Poblacion',
        'Pondol',
        'Salog',
        'Salvacion',
        'San Pablo Island',
        'San Pedro Island',
        'Santo Niño I',
        'Santo Niño II',
        'Tahusan',
        'Talisay',
        'Tawog',
        'Toptop',
        'Tuburan',
        'Union',
        'Upper Bantawon',
    ];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'shop_name',
        'description',
        'location',
        'purpose',
        'time_on_site',
        'visit_date',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'visit_date' => 'date',
        ];
    }
}

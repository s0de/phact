<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @date 12/04/16 18:51
 */

namespace Modules\Test\Models;

use Phact\Orm\Fields\CharField;
use Phact\Orm\Fields\ForeignField;
use Phact\Orm\Model;

class NoteThesis extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class
            ],
            'note' => [
                'class' => ForeignField::class,
                'modelClass' => Note::class
            ]
        ];
    }
}
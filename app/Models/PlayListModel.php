<?php
namespace App\Models;
use CodeIgniter\Model;
class PlayListModel extends Model{
    protected $table= 'playlist';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['Id','PlayListName'];
}

?>
<?php
namespace App\Models;
use CodeIgniter\Model;
class SongModel extends Model{
    protected $table= 'songs';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['SongName','PlayListId'];
}

?>
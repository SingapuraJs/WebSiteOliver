<?php 

namespace Model;

use Model\BaseModel;

class PostModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'posts';
    }

    public function make($postData) 
    {
        try {
            $sql = 'INSERT INTO ' . $this->table . '(imagem, descricao, id_usuario) VALUES (:img, :desc, :id);';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':img', $postData['img']);
            $stmt->bindParam(':desc', $postData['desc']);
            $stmt->bindParam(':id', $postData['id']);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
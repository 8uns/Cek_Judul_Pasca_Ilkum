<?php

class Paper_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPapersById($id)
    {
        $this->db->query("SELECT * FROM `papers` WHERE paper_id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getPapersAll()
    {
        $this->db->query("SELECT * FROM `papers` ORDER BY paper_id DESC");
        return $this->db->resultSet();
    }

    public function getPapersResultTitle($titles)
    {

        $titles = array_column($titles, 'title');

        $titlesWithQuotes = array_map(function ($title) {
            return '"' . $title . '"';
        }, $titles);

        $titles = implode(", ",  $titlesWithQuotes);

        $this->db->query("SELECT * FROM `papers` WHERE title IN($titles)");
        return $this->db->resultSet();
    }

    public function addData($data, $document)
    {
        $query = "INSERT INTO `papers`
                    (title, years, document, text_doc) 
                        VALUES
                        (:title, :years, :document, :text_doc)";
        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('years', $data['years']);
        $this->db->bind('document', $document);
        $this->db->bind('text_doc', $data['text_doc']);

        $this->db->execute();
        return $this->db->rowCount();
    }




    public function updateData($data, $id, $document)
    {
        if ($document == 'empty') {
            $query = "UPDATE `papers` 
                    SET 
                    title=:title, 
                    -- document=:document, 
                    -- text_doc=:text_doc, 
                    years=:years
                    WHERE paper_id=:paper_id
                        ";
            $this->db->query($query);

            $this->db->bind('title', $data['title']);
            // $this->db->bind('document', $document);
            // $this->db->bind('text_doc', $data['text_doc']);
            $this->db->bind('years', $data['years']);
            $this->db->bind('paper_id', $id);
        } else {
            unlink('file/' . $data['document_old']);
            $query = "UPDATE `papers` 
                    SET 
                    title=:title, 
                    document=:document, 
                    -- text_doc=:text_doc, 
                    years=:years
                    WHERE paper_id=:paper_id
                        ";
            $this->db->query($query);

            $this->db->bind('title', $data['title']);
            $this->db->bind('document', $document);
            // $this->db->bind('text_doc', $data['text_doc']);
            $this->db->bind('years', $data['years']);
            $this->db->bind('paper_id', $id);
        }


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM `papers` 
                    WHERE paper_id=:paper_id
                        ";
        $this->db->query($query);
        $this->db->bind('paper_id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

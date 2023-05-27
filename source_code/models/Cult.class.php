<?php

class Cult extends DB
{
    function getCult()
    {
        $query = "SELECT * FROM cult";
        return $this->execute($query);
    }
    function getCultById($id)
    {
        $query = "SELECT * FROM cult WHERE id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
          echo "<script>alert('{$data['name']}') </script>";
        $name = $data['name'];

        $query = "insert into cult values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE cult_id = '$id'";
        $this->execute($query);

        $query = "delete FROM cult WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $query = "update cult set name = '$name' where id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

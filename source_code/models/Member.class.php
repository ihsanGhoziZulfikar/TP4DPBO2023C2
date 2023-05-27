<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }
    
    function getMemberJoin()
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.join_date, members.cult_id, cult.name as cult_name FROM members LEFT JOIN cult ON members.cult_id=cult.id";
        return $this->execute($query);
    }
    
    function getMemberById($id)
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.join_date, members.cult_id, cult.name as cult_name FROM members LEFT JOIN cult ON members.cult_id=cult.id where members.id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
          echo "<script>alert('{$data['name']}') </script>";
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $cult_id = $data['cult_id'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$join_date', $cult_id)";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $cult_id = $data['cult_id'];
        $query = "update members set name = '$name', email = '$email', phone = '$phone', join_date = '$join_date', cult_id = '$cult_id' where id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

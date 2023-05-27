<?php

class MemberView{
    public function render($data){
        $dataMember = null;
        $no = 1;
        foreach($data['members'] as $val){
            list($id, $name, $email, $phone, $join_date, $cult_id, $cult_name) = $val;
            $dataMember .= "<tr>
            <td>" . $no . "</td>
            <td>" . $name . "</td>
            <td>" . $email . "</td>
            <td>" . $phone . "</td>
            <td>" . $join_date . "</td>
            <td>" . $cult_name . "</td>
            <td>
                <a href='index.php?id_edit=" . $id .  "' class='btn btn-success' '>Edit</a>
                <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
            </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/member.html");
        
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write(); 
    }

    public function createForm($cults){
        $dataCult = null;
        foreach($cults as $val){
            list($id, $name) = $val;
            $dataCult .= "<option value='".$id."'>".$name."</option>";
        }

        $tpl = new Template("templates/memberForm.html");
        $tpl->replace("OPTION", $dataCult);
        $tpl->replace("DATA_SUBMIT", 'add');
        $tpl->replace("DATA_TITLE", 'Add New');
        $tpl->write(); 
    }
    
    public function editForm($data){
        $dataMember = $data['member'];
        $idInput = '<input type="hidden" name="id" value="'.$dataMember['id'].'" class="form-control"> <br>';

        $dataCult = null;
        foreach($data['cults'] as $val){
            list($id, $name) = $val;
            $dataCult .= "<option value='".$id."' ".($id==$dataMember['cult_id']? "selected" : "").">".$name."</option>";
        }

        $tpl = new Template("templates/memberForm.html");
        $tpl->replace("DATA_ID_INPUT", $idInput);
        $tpl->replace("DATA_NAME", $dataMember['name']);
        $tpl->replace("DATA_EMAIL", $dataMember['email']);
        $tpl->replace("DATA_PHONE", $dataMember['phone']);
        $tpl->replace("DATA_JOIN_DATE", $dataMember['join_date']);
        $tpl->replace("OPTION", $dataCult);
        $tpl->replace("DATA_SUBMIT", 'edit');
        $tpl->replace("DATA_TITLE", 'Edit');
        $tpl->write(); 
    }
}

?>
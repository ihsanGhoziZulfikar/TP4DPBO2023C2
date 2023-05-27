<?php

class CultView{
    public function render($data){
        $dataCult = null;
        $no = 1;
        foreach($data['cults'] as $val){
            list($id, $name) = $val;
            $dataCult .= "<tr>
            <td>" . $no . "</td>
            <td>" . $name . "</td>
            <td>
                <a href='cult.php?id_edit=" . $id .  "' class='btn btn-success' '>Edit</a>
                <a href='cult.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
            </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/cult.html");
        
        $tpl->replace("DATA_TABEL", $dataCult);
        $tpl->write(); 
    }

    public function createForm(){
        $tpl = new Template("templates/cultForm.html");
        $tpl->replace("DATA_SUBMIT", 'add');
        $tpl->replace("DATA_TITLE", 'Add New');
        $tpl->write(); 
    }
    
    public function editForm($cult){
        $dataCult = $cult;
        $idInput = '<input type="hidden" name="id" value="'.$dataCult['id'].'" class="form-control"> <br>';


        $tpl = new Template("templates/cultForm.html");
        $tpl->replace("DATA_ID_INPUT", $idInput);
        $tpl->replace("DATA_NAME", $dataCult['name']);
        $tpl->replace("DATA_SUBMIT", 'edit');
        $tpl->replace("DATA_TITLE", 'Edit');
        $tpl->write(); 
    }
}
?>
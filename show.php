<?php
        require_once("!Classes/mysql.php");
        require_once("!Classes/tablazat.php");
    ?>
<script>
    $(document).ready(function (){
        $(".upd").on('click',function() {
            //alert("UPD :::::: "+ $(this).attr('name'))
            $('#jeh').removeClass("invisible");
            $('#jeh').load('upd.php?rn='+$(this).attr('name'));
        });

        $(".del").on('click',function() {
            //Ez lesset mű:
            var diakId = $(this).attr('name');
            var element = this;
            if(confirm("Biztos törli ezt az osztályzatot?")){
                $.ajax({
                    url: "validdel.php",
                    method: "POST",
                    data: {del_id : diakId},
                    success: function(data){
                        if(data){
                            $(element).closest("tr").fadeOut();
                        }else{
                            alert("Valami nem jó");
                        }
                    }
                });
            };
        });
    });
</script>
<div id='lsiting' class='position-relative'>
    <?php
        $db = new Mysql("proba");
        $sql = " SELECT osztalyzat.id,tanulo.nev, tantargy.nev, datum, jegy FROM osztalyzat INNER JOIN tanulo on osztalyzat.tanuloID = tanulo.id INNER JOIN tantargy on osztalyzat.tantargyID = tantargy.id ORDER BY osztalyzat.id";
        $data = $db->queryNUMERIC($sql);

        for($i = 0;$i < count($data);$i++){
            $data[$i][5] = "<a class='del btn btn-danger del' id='del' name='".$data[$i][0]."' >Törlés</a>";
            $data[$i][6] = "<a class='upd btn btn-success upd' id='upd' name='".$data[$i][0]."'>Módosít</a>";
        }

        $fejlec = array('id','Kié','Miből','Dátum','Jegy','','');
        $leces = new fejlecesBOOTSTRAP('table table-striped table-dark',$data, $fejlec);
        echo $leces->rajzol();
    ?>
</div>